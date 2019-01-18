<?php

namespace CalcBundle\Command;

use CalcBundle\Service\Calcs\CalcInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CalcCommand extends Command
{
    /** @var CalcInterface */
    private $calc;

    /**
     * CalcCommand constructor.
     * @param CalcInterface $calc
     */
    public function __construct(CalcInterface $calc)
    {
        parent::__construct(null);
        $this->calc = $calc;
    }

    protected function configure()
    {
        $this->setName('string:calc')
            ->setDescription('Console string calc')
            ->addArgument('expression', InputArgument::REQUIRED, 'Input mathematical expression (example 2+2)');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int|null|void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        try {
            $expression = $input->getArgument('expression');
            $result = $this->calc->run($expression);

            $output->writeln('<info>'.$expression.' = '.$result.'</info>');
        } catch (\Exception $e) {
            $output->writeln('<error>'.$e->getMessage().'</error>');
        }
    }
}