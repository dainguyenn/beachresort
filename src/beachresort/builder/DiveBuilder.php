<?php
include_once '/_Ky5/PHP/const.php';
include_once PATH_DIR_RESORT . '/entity/Dive.php';

class DiveBuilder
{
    private $id;
    private $name;
    private $img;
    private $description;

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Set the value of img
     *
     * @return  self
     */
    public function setImg($img)
    {
        $this->img = $img;

        return $this;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    public function build(): Dive
    {
        return new Dive($this->id, $this->name, $this->img, $this->description);
    }
}
