<?php

namespace CalcBundle\Service\Calcs\Local\Operations;

interface OperationInterface
{
    /**
     * @param float $a
     * @param float $b
     * @return float
     */
    public function calc(float $a, float $b): float;
}
