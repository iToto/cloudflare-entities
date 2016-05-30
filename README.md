CloudFlare Entities
===================

Every [CloudFlare API][0] resource represented as stand-alone PHP classes.
Automatic JSON serialization and hydration is also provided.

Serialization
-------------

    <?php

    use mgirouard\CloudFlare\Entities;

    echo json_serialize(
        (new Entities\User)
        ->setId('7c5dae5552338874e5053f2534d2767a')
        ->setEmail('user@example.com')
        ->setFirstName('John')
        ->setLastName('Appleseed')
        ->setUsername('cfuser12345')
        ->setTelephone('+1 123-123-1234')
        ->setCountry('US')
        ->setZipcode('12345')
        ->setCreatedOn(new DateTime('2 years ago'))
        ->setModifiedOn(new DateTime('2 years ago'))
        ->setTwoFactorAuthenticationEnabled(false)
    );

Ouput:

    {
        "id": "7c5dae5552338874e5053f2534d2767a",
        "email": "user@example.com",
        "first_name": "John",
        "last_name": "Appleseed",
        "username": "cfuser12345",
        "telephone": "+1 123-123-1234",
        "country": "US",
        "zipcode": "12345",
        "created_on": "2014-01-01T05:20:00Z",
        "modified_on": "2014-01-01T05:20:00Z",
        "two_factor_authentication_enabled": false
    }

Hydration
---------

    <?php

    use mgirouard\CloudFlare\Entities;

    print_r(Entities\User::hydrateJson('{
        "id": "7c5dae5552338874e5053f2534d2767a",
        "email": "user@example.com",
        "first_name": "John",
        "last_name": "Appleseed",
        "username": "cfuser12345",
        "telephone": "+1 123-123-1234",
        "country": "US",
        "zipcode": "12345",
        "created_on": "2014-01-01T05:20:00Z",
        "modified_on": "2014-01-01T05:20:00Z",
        "two_factor_authentication_enabled": false
    }');

Generating the Docs
-------------------

Install dev dependencies with Composer:

    composer install --dev

Call API Gen and tell it where to render the docs:

    vendor/bin/apigen generate --source src --destination ~/Desktop/CloudFlare-Entities

or more simply,

   make docs

Running the Tests
-----------------

Assuming you've already installed dev dependencies, just call `phpunit`

    vendor/bin/phpunit

or more simply,

   make test

To Do
-----

There's still a decent about of work to do. This list has plenty of overlap so
a few entities can be merged down into a single common entity (for example:
App subscriptions and Zone subscriptions).

* [x] User
* [x] Billing\Profile
* [ ] Billing\History
* [ ] Billing\Subscription\App
* [ ] Billing\Subscription\Zone
* [ ] User\Firewall\Rule
* [ ] User\Organization
* [ ] User\Invite
* [ ] Zone
* [ ] Zone\Plan
* [ ] Zone\Setting
* [ ] Zone\Record
* [ ] Zone\RailgunConnection
* [ ] Zone\Analytics
* [ ] Railgun
* [ ] Zone\CustomPage
* [ ] Zone\CustomCertificate
* [ ] Zone\KeylessCertificate
* [ ] Zone\PageRule
* [ ] Zone\FirewallRule
* [ ] Zone\Waf\Package
* [ ] Zone\Waf\Group
* [ ] Zone\Waf\Rule
* [ ] Zone\Ssl\Analysis
* [ ] Zone\Ssl\Packs
* [ ] Organization
* [ ] Organization\Member
* [ ] Organization\Invite
* [ ] Organization\Role
* [ ] Organization\Waf\Rule
* [ ] Organization\Railgun
* [ ] Certificate
* [ ] User\VirtualDns
* [ ] Organization\VirtualDns
* [ ] IpAddress

[0]: https://api.cloudflare.com/
