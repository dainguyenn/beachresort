<?php
class ArrayFunc
{
    private $arrValues;
    public function toArrValue($object)
    {
        foreach ($object as $val) {
            array_push($this->arrValues, $val);
        }

        return $this->arrValues;
    }
}
