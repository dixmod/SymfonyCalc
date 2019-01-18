<?php

declare(strict_types=1);

namespace Unit\Service\Calcs\Local\Operations;

use CalcBundle\Service\Calcs\Local\Operations\Div;
use PHPUnit\Framework\TestCase;

class DivTest extends TestCase
{
    /**
     * @dataProvider dataProvider
     * @param $a
     * @param $b
     * @throws \Exception
     */
    public function testDivs($a, $b): void
    {
        $operation = new Div();

        $this->assertEquals(
            $operation->calc($a, $b),
            $a / $b
        );
    }

    public function testDivsByZero(): void
    {
        $operation = new Div();
        $this->expectException(\Exception::class);
        $a = 10;
        $b = 0;

        $operation->calc($a, $b);
    }

    public function dataProvider(): array
    {
        return [
            [
                10,
                2
            ],
            [
                0,
                2
            ],
        ];
    }
}