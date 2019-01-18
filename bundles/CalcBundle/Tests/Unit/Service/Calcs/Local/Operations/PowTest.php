<?php

declare(strict_types=1);

namespace Unit\Service\Calcs\Local\Operations;

use CalcBundle\Service\Calcs\Local\Operations\Pow;
use PHPUnit\Framework\TestCase;

class PowTest extends TestCase
{
    /**
     * @dataProvider dataProvider
     * @param $a
     * @param $b
     * @throws \Exception
     */
    public function testPow($a, $b): void
    {
        $operation = new Pow();

        $this->assertEquals(
            $operation->calc($a, $b),
            $a ** $b
        );
    }

    public function dataProvider(): array
    {
        return [
            [
                10,
                2
            ],
            [
                -10,
                2
            ],
            [
                0,
                2
            ],
            [
                0,
                0
            ],
            [
                10000,
                10000
            ],
        ];
    }
}