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

    /** @dataProvider getTestGetSetData() */
    public function testGetSetData($field, $value)
    {
        // Mutator calls must be fluent
        $this->assertInstanceOf(User::class, $this->entity->{'set' . $field}($value));

        // Accessors should give back exactly what we set
        $this->assertSame($value, $this->entity->{'get' . $field}());
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
            ['createdOn', new DateTime('2 years ago', new DateTimeZone('UTC'))],
            ['modifiedOn', new DateTime('2 years ago', new DateTimeZone('UTC'))],
            ['twoFactorAuthenticationEnabled', false],
        ];
    }
}
