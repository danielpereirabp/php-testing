<?php

namespace PHPTesting;

class MyClass extends MyParentClass
{

    public function getOption($option)
    {
        return $option;
    }

    public function fire()
    {
        return $this->getOption('bar');
    }

    public function getMyMethod()
    {
        if ($this->getParentMethod([])) {
            return 'ok';
        }

        return 'nops';
    }

}