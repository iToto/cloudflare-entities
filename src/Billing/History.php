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
}
