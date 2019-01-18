<?php

namespace CalcBundle\Service\Calcs\Wolframalpha;

use CalcBundle\Service\Calcs\CalcInterface;
use Exception;

class Calc implements CalcInterface
{
    /**
     * @param string $expression
     * @return string
     * @throws Exception
     */
    public function run(string $expression): string
    {
        return 'In developing';
    }
}