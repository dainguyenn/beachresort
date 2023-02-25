<?php
class Twovar
{
    private $id;
    private $a;
    private $b;
    private $c;
    private $d;

    public function __construct($id, $a, $b, $c, $d)
    {
        $this->id = $id;
        $this->a = $a;
        $this->b = $b;
        $this->c = $c;
        $this->d = $d;
    }

    public function get_object_vars()
    {
        return get_object_vars($this);
    }

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of a
     */
    public function getA()
    {
        return $this->a;
    }

    /**
     * Get the value of b
     */
    public function getB()
    {
        return $this->b;
    }

    /**
     * Get the value of c
     */
    public function getC()
    {
        return $this->c;
    }

    /**
     * Get the value of d
     */
    public function getD()
    {
        return $this->d;
    }
}
