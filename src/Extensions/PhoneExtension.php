<?php

namespace Xefi\Faker\BeBy\Extensions;

use Xefi\Faker\Extensions\PhoneExtension as BasePhoneExtension;

class PhoneExtension extends BasePhoneExtension
{
    public string $defaultPrefix = '80';

    public string $indicator = '+375';

    /**
     * Get the locale handled by this extension.
     *
     * @return string|null
     */
    public function getLocale(): ?string
    {
        return 'be_BY';
    }

    protected array $landlineFormats = [
        '17{separator}{d}{d}{d}{separator}{d}{d}{separator}{d}{d}',
        '152{separator}{d}{d}{separator}{d}{d}{separator}{d}{d}',
        '162{separator}{d}{d}{separator}{d}{d}{separator}{d}{d}',
        '212{separator}{d}{d}{separator}{d}{d}{separator}{d}{d}',
        '222{separator}{d}{d}{separator}{d}{d}{separator}{d}{d}',
        '232{separator}{d}{d}{separator}{d}{d}{separator}{d}{d}',
    ];

    protected array $cellFormats = [
        '25{separator}{d}{d}{d}{separator}{d}{d}{separator}{d}{d}',
        '29{separator}{d}{d}{d}{separator}{d}{d}{separator}{d}{d}',
        '33{separator}{d}{d}{d}{separator}{d}{d}{separator}{d}{d}',
        '44{separator}{d}{d}{d}{separator}{d}{d}{separator}{d}{d}',
    ];

    /**
     * Generate a phone number: "8 0" trunk prefix nationally, "+375" indicator internationally, each followed by
     * the separator.
     *
     * @param string|null $format
     * @param string      $separator
     * @param string|null $prefix
     *
     * @return string
     */
    public function phoneNumber(?string $format = null, string $separator = '', ?string $prefix = null): string
    {
        if ($prefix === $this->indicator) {
            $prefix .= $separator;
        } elseif ($prefix === null || $prefix === $this->defaultPrefix) {
            $prefix = '8'.$separator.'0';
        }

        return parent::phoneNumber($format, $separator, $prefix);
    }
}
