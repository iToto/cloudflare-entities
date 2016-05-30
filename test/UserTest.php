<?php

namespace mgirouard\CloudFlare\Entities\Test;

use DateTime;
use DateTimeZone;
use mgirouard\CloudFlare\Entities\User;

class UserTest extends \PHPUnit_Framework_TestCase
{
    /** @inheritDoc */
    public function setup()
    {
        $this->entity = new User;
    }
    
    public function getTestGetSetData()
    {
        return [
            ['id', '7c5dae5552338874e5053f2534d2767a'],
            ['email', 'user@example.com'],
            ['firstName', 'John'],
            ['lastName', 'Appleseed'],
            ['username', 'cfuser12345'],
            ['telephone', '+1 123-123-1234'],
            ['country', 'US'],
            ['zipcode', '12345'],
            ['createdOn', new DateTime('2014-01-01T05:20:00Z', new DateTimeZone('UTC'))],
            ['modifiedOn', new DateTime('2014-01-01T05:20:00Z', new DateTimeZone('UTC'))],
            ['twoFactorAuthenticationEnabled', false],
        ];
    }

    /** @dataProvider getTestGetSetData() */
    public function testGetSetData($field, $value)
    {
        // Mutator calls must be fluent
        $this->assertInstanceOf(User::class, $this->entity->{'set' . $field}($value));

        // Accessors should give back exactly what we set
        $this->assertSame($value, $this->entity->{'get' . $field}());
    }

    public function testDateTimeFormats()
    {
        $this->entity->setCreatedOn(
            new DateTime('2011-07-28 17:19:00', new DateTimeZone('UTC'))
        );
        $this->entity->setModifiedOn(
            new DateTime('2011-07-28 17:19:01', new DateTimeZone('UTC'))
        );

        $json = json_encode($this->entity);
        $data = json_decode($json);

        $this->assertEquals('2011-07-28T17:19:00Z', $data->created_on);
        $this->assertEquals('2011-07-28T17:19:01Z', $data->modified_on);
    }

    public function testHydration()
    {
    }

    public function testStringification()
    {
        $fieldMap = [
            'id'          => 'Id',
            'email'       => 'Email',
            'first_name'  => 'FirstName',
            'last_name'   => 'LastName',
            'username'    => 'Username',
            'telephone'   => 'Telephone',
            'country'     => 'Country',
            'zipcode'     => 'Zipcode',
            'telephone'   => 'Telephone',
            'created_on'  => 'CreatedOn',
            'modified_on' => 'ModifiedOn',
        ];

        $user = (new User)
            ->setId('7c5dae5552338874e5053f2534d2767a')
            ->setEmail('user@example.com')
            ->setFirstName('John')
            ->setLastName('Appleseed')
            ->setUsername('cfuser12345')
            ->setTelephone('+1 123-123-1234')
            ->setCountry('US')
            ->setZipcode('12345')
            ->setCreatedOn(new DateTime('2014-01-01T05:20:00Z', new DateTimeZone('UTC')))
            ->setModifiedOn(new DateTime('2014-01-01T05:20:00Z', new DateTimeZone('UTC')))
            ->setTwoFactorAuthenticationEnabled(false)
        ;

        $json = json_encode($user);
        $data = json_decode($json, true);

        foreach ($fieldMap as $jsonField => $userField) {
            $this->assertArrayHasKey($jsonField, $data);

            if (! in_array($jsonField, ['created_on', 'modified_on'])) {
                $this->assertSame($user->{'get' . $userField}(), $data[$jsonField]);
            }
        }

        $this->assertSame(
            $user->getModifiedOn()->format(User::DATE_FORMAT),
            $data['modified_on']
        );
        $this->assertSame(
            $user->getCreatedOn()->format(User::DATE_FORMAT),
            $data['created_on']
        );
    }
}
