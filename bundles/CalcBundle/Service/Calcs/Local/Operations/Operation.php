<?php

namespace CalcBundle\Service\Calcs\Local\Operations;

use Exception;

class Operation
{
    /** @var OperationInterface */
    private $stratery;

    /**
     * Calculator constructor.
     * @param $operation
     * @throws Exception
     */
    public function __construct(?string $operation)
    {
        $this->stratery = $this->getStratery($operation);
    }

    /**
     * @param $operation
     * @return OperationInterface
     * @throws Exception
     */
    private function getStratery(?string $operation): OperationInterface
    {
        switch ($operation) {
            case '+' :
                return new Plus();
            case '-' :
                return new Subs();
            case '*' :
                return new Mult();
            case '/' :
                return new Div();
            case '^' :
                return new Pow();
            default:
                throw new Exception('Unknow operation "'.$operation.'"');
        }
    }

    public function calc(float $a, float $b): float
    {
        return $this->stratery->calc($a, $b);
    }
}