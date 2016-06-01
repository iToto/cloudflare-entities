<?php

namespace mgirouard\CloudFlare\Entities\Billing;

use DateTime;
use DateTimeZone;

/**
 * A user billing history
 *
 * <pre>{
 *     "id": "b69a9f3492637782896352daae219e7d",
 *     "type": "charge",
 *     "action": "subscription",
 *     "description": "The billing item description",
 *     "occurred_at": "2014-03-01T12:21:59.3456Z",
 *     "amount": 20.99,
 *     "currency": "USD",
 *     "zone": {
 *         "name": "example.com"
 *     }
 * }</pre>
 *
 * @see <https://api.cloudflare.com/#user-billing-history-properties>
 * @see mgirouard\CloudFlare\Entities\Test\Billing\HistoryTest
 */
class History implements EntityInterface
{
    private $id;
    private $type;
    private $action;
    private $description;
    private $occurredAt;
    private $amount;
    private $currency;
    private $zone;
    
    /**
     * Get billing item identifier tag
     *
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set billing item identifier tag
     *
     * @param string $id
     * @return History
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Get the billing item type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set the billing item type
     *
     * @param string $type
     * @return History
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * Get the billing item action
     *
     * @return string
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * Set the billing item action
     *
     * @param string $action
     * @return History
     */
    public function setAction($action)
    {
        $this->action = $action;
        return $this;
    }

    /**
     * Get the billing item description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the billing item description
     *
     * @param string $description
     * @return History
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * Get when the billing item was created
     *
     * @return DateTime
     */
    public function getOccurredAt()
    {
        return $this->occurredAt;
    }

    /**
     * Set when the billing item was created
     *
     * @param DateTime $occurredAt
     * @return History
     */
    public function setOccurredAt(DateTime $occurredAt)
    {
        $this->occurredAt = $occurredAt;
        return $this;
    }

    /**
     * Get the amount associated with this billing item
     *
     * @return float
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set the amount associated with this billing item
     *
     * @param float $amount
     * @return History
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
        return $this;
    }

    /**
     * Get the monetary unit in which pricing information is displayed
     *
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * Set the monetary unit in which pricing information is displayed
     *
     * @param string $currency
     * @return History
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;
        return $this;
    }

    /**
     * Get the domain name
     *
     * @return Zone
     */
    public function getZone()
    {
        return $this->zone;
    }

    /**
     * Set the domain name
     *
     * @param Zone $zone
     * @return History
     */
    public function setZone(Zone $zone)
    {
        $this->zone = $zone;
        return $this;
    }

    /** {@inheritDoc} */
    public function jsonSerialize()
    {
        $json = [];

        foreach (self::jsonMap() as $jsonField => $userField) {
            $json[$jsonField] = $this->{'get' . $userField}();
        }

        $json['occurred_at'] = $json['occurred_at']->format(EntityInterface::DATE_FORMAT);
        $json['amount'] = (float) $json['amount'];

        return $json;
    }

    /** {@inheritDoc} */
    public static function jsonHydrate($json)
    {
        $profile = new self;
        $data    = json_decode($json, true);

        $data['occurred_at'] = new DateTime($data['occurred_at'], new DateTimeZone('UTC'));
        $data['amount'] = (float) $data['amount'];

        foreach (self::jsonMap() as $jsonField => $profileField) {
            $profile->{'set' . $profileField}($data[$jsonField]);
        }

        return $profile;
    }

    /** {@inheritDoc} */
    public static function jsonMap()
    {
        return [
            'id'          => 'Id',
            'type'        => 'Type',
            'action'      => 'Action',
            'description' => 'Description',
            'occurred_at' => 'OccurredAt',
            'amount'      => 'Amount',
            'currency'    => 'Currency',
            'zone'        => 'Zone',
        ];
    }
}
