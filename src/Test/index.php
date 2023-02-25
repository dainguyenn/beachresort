<?php

abstract class b
{

    public function getobj(): array
    {
        print_r($this);
        return get_object_vars($this);
    }
}

class a extends b
{
    private $a;
    private $b;

    public function __construct($a, $b)
    {
        $this->a = $a;
        $this->b = $b;
    }
}

$instance1 = new a(1, 2);

print_r($instance1->getobj());
