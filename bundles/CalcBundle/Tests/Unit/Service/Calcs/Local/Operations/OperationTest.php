<?php

declare(strict_types=1);

namespace Unit\Service\Calcs\Local\Operations;

use CalcBundle\Service\Calcs\Local\Operations\Div;
use CalcBundle\Service\Calcs\Local\Operations\Mult;
use CalcBundle\Service\Calcs\Local\Operations\Operation;
use CalcBundle\Service\Calcs\Local\Operations\Plus;
use CalcBundle\Service\Calcs\Local\Operations\Pow;
use CalcBundle\Service\Calcs\Local\Operations\Subs;
use Exception;
use PHPUnit\Framework\TestCase;
use ReflectionMethod;

class OperationTest extends TestCase
{
    /**
     * @dataProvider dataProvider
     * @param $operationChar
     * @param $instanceClass
     * @throws Exception
     */
    public function testOperationType($operationChar, $instanceClass): void
    {
        if (empty($operationChar)) {
            $this->expectException(\Exception::class);
        }

        $operation = new Operation($operationChar);
        $strateryOperation = new ReflectionMethod(Operation::class, 'getStratery');
        $strateryOperation->setAccessible(true);
        $operationMethod = $strateryOperation->invoke($operation, $operationChar);

        $this->assertInstanceOf($instanceClass, $operationMethod);
    }

    public function dataProvider(): array
    {
        return [
            ['+', Plus::class],
            ['-', Subs::class],
            ['*', Mult::class],
            ['/', Div::class],
            ['^', Pow::class],
            ['', Exception::class],
        ];
    }
}