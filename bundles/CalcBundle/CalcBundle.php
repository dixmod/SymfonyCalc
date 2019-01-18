<?php

namespace CalcBundle;

use CalcBundle\DependencyInjection\CalcBundleExtension;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class CalcBundle extends Bundle
{
    public function getContainerExtension()
    {
        return new CalcBundleExtension();
    }
}