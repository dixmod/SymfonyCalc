<?php

namespace CalcBundle\Service\Calcs\Local;

use CalcBundle\Service\Calcs\CalcInterface;
use CalcBundle\Service\Calcs\Local\Operations\Operation;
use Exception;

class Calc implements CalcInterface
{
    public function __construct()
    {
        \define('D', '\-?\d+(?:\.\d+)?');
        \define('G_MDB', '/(\(' . D . '[-+\/]' . D . '\)|' . D . '[\/]' . D . '|' . D . '[\*]' . D . '|' . D . '[\^]' . D . ')/');
        \define('G_AS', '/' . D . '[-+]' . D . '/');
        \define('G_D', '/(' . D . ')([-+^*\/])(' . D . ')/');
    }

    /**
     * @param string $expression
     * @return string
     * @throws Exception
     */
    public function run(string $expression): string
    {
        $i = 0;
        while (preg_match('/[^\^][-+\*\/]/', $expression)) {
            $expression = preg_replace('/\((' . D . ')\)/', '\1', $expression);
            $expression = preg_replace_callback(G_MDB, [$this, 'opers'], $expression);
            $expression = preg_replace_callback(G_AS, [$this, 'opers'], $expression);

            if ($i++ > 100) {
                throw new Exception('Error. Very long expression');
            }
        }

        return $expression;
    }


    /**
     * @param string $expression
     * @return float
     * @throws Exception
     */
    protected function opers($expression): float
    {
        preg_match(G_D, $expression[0], $operationParams);

        $operation = new Operation($operationParams[2]);
        return $operation->calc($operationParams[1], $operationParams[3]);
    }
}