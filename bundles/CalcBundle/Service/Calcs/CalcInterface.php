<?php

namespace CalcBundle\Service\Calcs;

interface CalcInterface
{
    /**
     * @param string $expression
     * @return string
     */
    public function run(string $expression): string;
}