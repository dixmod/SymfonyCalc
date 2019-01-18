<?php

declare(strict_types=1);

namespace Unit\Service\Calcs\Local\Operations;

use CalcBundle\Service\Calcs\Local\Operations\Plus;
use PHPUnit\Framework\TestCase;

class PlusTest extends TestCase
{
    /**
     * @dataProvider dataProvider
     * @param $a
     * @param $b
     * @throws \Exception
     */
    public function testPlus($a, $b): void
    {
        $operation = new Plus();

        $this->assertEquals(
            $operation->calc($a, $b),
            $a + $b
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