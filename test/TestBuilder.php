<?php
include './Twovar.php';

class TestBuilder
{
    private $id;
    private $a;
    private $b;
    private $c;
    private $d;


    /**
     * add the value of id
     *
     * @return  self
     */
    public function addId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * add the value of a
     *
     * @return  self
     */
    public function addA($a)
    {
        $this->a = $a;

        return $this;
    }

    /**
     * add the value of b
     *
     * @return  self
     */
    public function addB($b)
    {
        $this->b = $b;

        return $this;
    }

    public function build(): Twovar
    {
        $Twovar = new Twovar(
            $this->id,
            $this->a,
            $this->b,
            $this->c,
            $this->d
        );
        return $Twovar;
    }

    /**
     * add the value of c
     *
     * @return  self
     */
    public function addC($c)
    {
        $this->c = $c;

        return $this;
    }

    /**
     * Set the value of d
     *
     * @return  self
     */
    public function addD($d)
    {
        $this->d = $d;

        return $this;
    }
}
