<?php

declare(strict_types=1);

namespace Unit\Service\Calcs\Local;

use CalcBundle\Service\Calcs\Local\Calc;
use PHPUnit\Framework\TestCase;


class CalcTest extends TestCase
{
    /**
     * @param string $expression
     * @param float $result
     * @throws \Exception
     *
     * @dataProvider dataProvider
     */
    public function testCalc(string $expression, float $result): void
    {
        $calc = new Calc();
        $resultCalc = $calc->run($expression);

        $this->assertEquals($result, $resultCalc);
    }

    public function dataProvider(): array
    {
        return [
            ['(3+2)-3*2+4/2', 1],
        ];
    }
}