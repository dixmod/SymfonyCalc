<?php

declare(strict_types=1);

namespace Unit\Service\Calcs\Local;

use CalcBundle\Service\Calcs\CalcInterface;
use CalcBundle\Service\Calcs\Wolframalpha\Calc;
use PHPUnit\Framework\TestCase;

class CalcTest extends TestCase
{
    public function testCalc(): void
    {
        $calc = new Calc();
        $this->assertInstanceOf(CalcInterface::class, $calc);
        $this->assertTrue(method_exists($calc, 'run'));
    }
}