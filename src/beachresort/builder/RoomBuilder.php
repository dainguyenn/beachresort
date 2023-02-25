<?php
include_once '/_Ky5/PHP/const.php';
include_once PATH_DIR_RESORT . '/entity/Room.php';


class RoomBuilder
{
    private $id;
    private string $name;
    private string $description;
    private string $img;
    private float $rate;



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
     * Set the value of description
     *
     * @return  self
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Set the value of rate
     *
     * @return  self
     */
    public function setRate($rate)
    {
        $this->rate = $rate;

        return $this;
    }

    public function build(): Room
    {
        return new Room(
            $this->id,
            $this->name,
            $this->description,
            $this->img,
            $this->rate
        );
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
}
