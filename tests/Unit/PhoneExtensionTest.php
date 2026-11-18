<?php

namespace Xefi\Faker\BeBy\Tests\Unit;

final class PhoneExtensionTest extends TestCase
{
    public function testPhoneNumber(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $this->assertMatchesRegularExpression('/^80(17\d{7}|(152|162|212|222|232)\d{6}|(25|29|33|44)\d{7})$/', $this->faker->phoneNumber());
        }
    }

    public function testLandlinePhoneNumber(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $this->assertMatchesRegularExpression('/^8 0(17 \d{3}|(152|162|212|222|232) \d{2}) \d{2} \d{2}$/', $this->faker->spacedLandlinePhoneNumber());
        }
    }

    public function testCellPhoneNumber(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $this->assertMatchesRegularExpression('/^8-0(25|29|33|44)-\d{3}-\d{2}-\d{2}$/', $this->faker->dashedCellPhoneNumber());
        }
    }

    public function testIndicatoredPhoneNumber(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $this->assertMatchesRegularExpression('/^\+375(17\d{7}|(152|162|212|222|232)\d{6}|(25|29|33|44)\d{7})$/', $this->faker->indicatoredPhoneNumber());
            $this->assertMatchesRegularExpression('/^\+375 (25|29|33|44) \d{3} \d{2} \d{2}$/', $this->faker->spacedIndicatoredCellPhoneNumber());
        }
    }

    public function testIndicatorIsSeparatedFromTheNumber(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $this->assertStringStartsWith('+375 ', $this->faker->spacedIndicatoredPhoneNumber());
            $this->assertStringStartsWith('+375-', $this->faker->dashedIndicatoredPhoneNumber());
            $this->assertStringStartsWith('+375.', $this->faker->dottedIndicatoredPhoneNumber());
        }
    }
}
