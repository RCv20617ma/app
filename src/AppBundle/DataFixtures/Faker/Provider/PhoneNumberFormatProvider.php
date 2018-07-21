<?php

namespace AppBundle\DataFixtures\Faker\Provider;

use libphonenumber\PhoneNumberUtil;

/**
 * Class PhoneNumberFormatProvider
 * @package AppBundle\DataFixtures\Faker\Provider
 */
class PhoneNumberFormatProvider
{
    /**
     * @var PhoneNumberUtil
     */
    protected $phoneNumberUtil;

    /**
     * PhoneNumberFormatProvider constructor.
     * @param PhoneNumberUtil $phoneNumberUtil
     */
    public function __construct(PhoneNumberUtil $phoneNumberUtil)
    {
        $this->phoneNumberUtil = $phoneNumberUtil;
    }

    /**
     * @param string $number
     * @param string $region
     * @return \libphonenumber\PhoneNumber
     */
    public function fakePhoneNumber($number, $region)
    {
        return $this->phoneNumberUtil->parse($number, $region);
    }
}
