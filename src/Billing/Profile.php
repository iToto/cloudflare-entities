<?php

namespace mgirouard\CloudFlare\Entities\Billing;

use DateTime;
use DateTimeZone;

/**
 * A user billing profile
 *
 * <pre>{
 *     "id": "0020c268dbf54e975e7fe8563df49d52",
 *     "first_name": "Bob",
 *     "last_name": "Smith",
 *     "address": "123 3rd St.",
 *     "address2": "Apt 123",
 *     "company": "CloudFlare",
 *     "city": "San Francisco",
 *     "state": "CA",
 *     "zipcode": "12345",
 *     "country": "US",
 *     "telephone": "+1 111-867-5309",
 *     "card_number": "xxxx-xxxx-xxxx-1234",
 *     "card_expiry_year": 2015,
 *     "card_expiry_month": 4,
 *     "vat": "aaa-123-987",
 *     "edited_on": "2014-03-01T12:21:02.0000Z",
 *     "created_on": "2014-03-01T12:21:02.0000Z"
 * }</pre>
 *
 * @see <https://api.cloudflare.com/#user-billing-profile-properties>
 * @see mgirouard\CloudFlare\Entities\Test\Billing\ProfileTest
 * @fixme The API uses `edited_on` instead of `modified_on`. This is a bug.
 * @fixme The docs denote a different date format than that on User.
 */
class Profile implements JsonSerializable
{
    /** 2014-03-01T12:21:02.0000Z */
    const DATE_FORMAT = 'Y-m-d\TH:i:s.u';

    private $id;
    private $firstName;
    private $lastName;
    private $address;
    private $address2;
    private $company;
    private $city;
    private $state;
    private $zipcode;
    private $country;
    private $telephone;
    private $cardNumber;
    private $cardExpiryYear;
    private $cardExpiryMonth;
    private $vat;
    private $editedOn;
    private $createdOn;

    public function __construct()
    {
        $this->setEditedOn(new DateTime('now', new DateTimeZone('UTC')));
        $this->setCreatedOn(new DateTime('now', new DateTimeZone('UTC')));
    }

    /**
     * Get billing profile identifier tag
     *
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set billing profile identifier tag
     *
     * @param string $id
     * @return Profile
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Get the first name on the billing profile
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set the first name on the billing profile
     *
     * @param string $barbaz
     * @return Profile
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
        return $this;
    }

    /**
     * Get the last name on the billing profile
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set the last name on the billing profile
     *
     * @param string $barbaz
     * @return Profile
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
        return $this;
    }

    /**
     * Get street address on the billing profile
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set street address on the billing profile
     *
     * @param string $barbaz
     * @return Profile
     */
    public function setAddress($address)
    {
        $this->address = $address;
        return $this;
    }

    /**
     * Get street address continued, apartment/suite, etc
     *
     * @return string
     */
    public function getAddress2()
    {
        return $this->address2;
    }

    /**
     * Set street address continued, apartment/suite, etc
     *
     * @param string $barbaz
     * @return Profile
     */
    public function setAddress2($address2)
    {
        $this->address2 = $address2;
        return $this;
    }

    /**
     * Get the company name on the billing profile
     *
     * @return string
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * Set the company name on the billing profile
     *
     * @param string $barbaz
     * @return Profile
     */
    public function setCompany($company)
    {
        $this->company = $company;
        return $this;
    }

    /**
     * Get the city on the billing profile
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set the city on the billing profile
     *
     * @param string $barbaz
     * @return Profile
     */
    public function setCity($city)
    {
        $this->city = $city;
        return $this;
    }

    /**
     * Get the state/province on the billing profile
     *
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set the state/province on the billing profile
     *
     * @param string $barbaz
     * @return Profile
     */
    public function setState($state)
    {
        $this->state = $state;
        return $this;
    }
    
    /**
     * Get the zipcode on the billing profile
     *
     * @return string
     */
    public function getZipcode()
    {
        return $this->zipcode;
    }

    /**
     * Set the zipcode on the billing profile
     *
     * @param string $barbaz
     * @return Profile
     */
    public function setZipcode($zipcode)
    {
        $this->zipcode = $zipcode;
        return $this;
    }

    /**
     * Get the country of the address on the billing profile
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set the country of the address on the billing profile
     *
     * @param string $barbaz
     * @return Profile
     */
    public function setCountry($country)
    {
        $this->country = $country;
        return $this;
    }

    /**
     * Get the telephone associated with the billing profile
     *
     * @return string
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set the telephone associated with the billing profile
     *
     * @param string $barbaz
     * @return Profile
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;
        return $this;
    }

    /**
     * Get the last four digits of the credit card on file
     *
     * @return string
     */
    public function getCardNumber()
    {
        return $this->cardNumber;
    }

    /**
     * Set the last four digits of the credit card on file
     *
     * @param string $barbaz
     * @return Profile
     */
    public function setCardNumber($cardNumber)
    {
        $this->cardNumber = $cardNumber;
        return $this;
    }

    /**
     * Get the year when the credit card on file expires
     *
     * @return string
     */
    public function getCardExpiryYear()
    {
        return $this->cardExpiryYear;
    }

    /**
     * Set the year when the credit card on file expires
     *
     * @param string $barbaz
     * @return Profile
     */
    public function setCardExpiryYear($cardExpiryYear)
    {
        $this->cardExpiryYear = $cardExpiryYear;
        return $this;
    }

    /**
     * Get the month number of when the credit card on file expires
     *
     * @return string
     */
    public function getCardExpiryMonth()
    {
        return $this->cardExpiryMonth;
    }

    /**
     * Set the month number of when the credit card on file expires
     *
     * @param string $barbaz
     * @return Profile
     */
    public function setCardExpiryMonth($cardExpiryMonth)
    {
        $this->cardExpiryMonth = $cardExpiryMonth;
        return $this;
    }

    /**
     * Get value Added Tax ID
     *
     * @return string
     */
    public function getVat()
    {
        return $this->vat;
    }

    /**
     * Set value Added Tax ID
     *
     * @param string $barbaz
     * @return Profile
     */
    public function setVat($vat)
    {
        $this->vat = $vat;
        return $this;
    }

    /**
     * Get when the profile was last modified
     *
     * @return string
     */
    public function getEditedOn()
    {
        return $this->editedOn;
    }

    /**
     * Set when the profile was last modified
     *
     * @param string $barbaz
     * @return Profile
     */
    public function setEditedOn($editedOn)
    {
        $this->editedOn = $editedOn;
        return $this;
    }

    /**
     * Get when the profile was created
     *
     * @return string
     */
    public function getCreatedOn()
    {
        return $this->createdOn;
    }

    /**
     * Set when the profile was created
     *
     * @param string $barbaz
     * @return Profile
     */
    public function setCreatedOn($createdOn)
    {
        $this->createdOn = $createdOn;
        return $this;
    }

    /** {@inheritDoc} */
    public function jsonSerialize()
    {
        $json = [];

        foreach (self::jsonMap() as $jsonField => $userField) {
            $json[$jsonField] = $this->{'get' . $userField}();
        }

        $json['created_on'] = $json['created_on']->format(self::DATE_FORMAT);
        $json['edited_on'] = $json['edited_on']->format(self::DATE_FORMAT);
        $json['card_expiry_month'] = (int) $json['card_expiry_month'];
        $json['card_expiry_year'] = (int) $json['card_expiry_year'];

        return $json;
    }

    /** {@inheritDoc} */
    public static function jsonHydrate($json)
    {
        $profile = new self;
        $data    = json_decode($json, true);

        $data['created_on'] = new DateTime($data['created_on'], new DateTimeZone('UTC'));
        $data['edited_on'] = new DateTime($data['edited_on'], new DateTimeZone('UTC'));

        foreach (self::jsonMap() as $jsonField => $profileField) {
            $profile->{'set' . $profileField}($data[$jsonField]);
        }

        return $profile;
    }

    /** {@inheritDoc} */
    public static function jsonMap()
    {
        return [
            'id'                => 'Id',
            'first_name'        => 'FirstName',
            'last_name'         => 'LastName',
            'address'           => 'Address',
            'address2'          => 'Address2',
            'company'           => 'Company',
            'city'              => 'City',
            'state'             => 'State',
            'zipcode'           => 'Zipcode',
            'country'           => 'Country',
            'telephone'         => 'Telephone',
            'card_number'       => 'CardNumber',
            'card_expiry_year'  => 'CardExpiryMonth',
            'card_expiry_month' => 'CardExpiryYear',
            'vat'               => 'Vat',
            'edited_on'         => 'EditedOn',
            'created_on'        => 'CreatedOn',
        ];
    }
}
