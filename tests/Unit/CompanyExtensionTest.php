<?php

namespace Xefi\Faker\BeBy\Tests\Unit;

use Random\Randomizer;
use ReflectionClass;
use Xefi\Faker\BeBy\Extensions\CompanyExtension;

final class CompanyExtensionTest extends TestCase
{
    protected array $companies = [];

    protected function setUp(): void
    {
        parent::setUp();

        $companyExtension = new CompanyExtension(new Randomizer());
        $this->companies = (new ReflectionClass($companyExtension))->getProperty('companies')->getValue($companyExtension);
    }

    public function testCompany(): void
    {
        $results = [];
        for ($i = 0; $i < count($this->companies); $i++) {
            $results[] = $this->faker->unique()->company();
        }

        $this->assertEqualsCanonicalizing($this->companies, $results);
    }

    public function testUnpHasValidFormatAndCheckDigit(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $unp = $this->faker->unp();

            $this->assertMatchesRegularExpression('/^[1-7]\d{8}$/', $unp);
            $this->assertSame(self::unpCheckDigit($unp), (int) $unp[8]);
        }
    }

    public function testCheckDigitFormulaMatchesAPublishedUnp(): void
    {
        // Validates the oracle used above against an external example (python-stdnum, stdnum.by.unp),
        // so the generator and the test cannot share the same wrong weights.
        $this->assertSame(1, self::unpCheckDigit('200988541'));
    }

    private static function unpCheckDigit(string $unp): int
    {
        $sum = 0;
        foreach ([29, 23, 19, 17, 13, 7, 5, 3] as $position => $weight) {
            $sum += $weight * (int) $unp[$position];
        }

        return $sum % 11;
    }
}
