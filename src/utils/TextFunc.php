<?php
 
class TextFunc
{

    public function parseTextValuesInsert($object)
    {
        $obj = $object->get_object_vars();
        $result = '';


        foreach ($obj as $key => $value) {
            if (!empty($value)) {
                if (is_string($value)) {
                    $value = $this->replace($value);
                    $value = "'$value'";
                    $result .= $value . ',';
                } else if (is_bool($value)) {
                    $value = $value ? 'true' : 'false';

                    $result .= $value . ',';
                } else if (is_array($value)) {
                    $valueText = '';
                    foreach ($value as $val) {
                        $valueText .= $val . ',';
                    }
                    $valueText = substr($valueText, 0, strlen($valueText) - 1);
                    $result .= "'$valueText',";
                } else {
                    $result .= $value . ',';
                }
            }
        }
        return substr($result, 0, strlen($result) - 1);
    }



    public function parseTextParams($object)
    {
        $obj = $object->get_object_vars();
        $arrKeys = $this->toArrKey($obj);
        $result = '';
        for ($i = 0; $i < count($arrKeys); $i++) {
            if (isset($arrKeys[$i + 1])) {
                $result .=  $arrKeys[$i] . ",";
            } else {
                $result .=  $arrKeys[$i] . "";
            }
        }

        return $result;
    }
    public function toArrKey($object)
    {
        $arrKeys = [];

        foreach ($object as $key => $value) {
            if (!empty($value)) {
                array_push($arrKeys, $key);
            }
        }

        return $arrKeys;
    }

    public function toArrValue($object)
    {
        $arrValues = [];

        foreach ($object as $val) {
            array_push($arrValues, $val);
        }

        return $arrValues;
    }

    public function updateQuery($object)
    {
        $obj = $object->get_object_vars();
        $result = '';
        unset($obj->id);
        foreach ($obj as $key => $value) {
            if (isset($value)) {
                if (is_string($value)) {
                    $value = $this->replace($value);
                    $value = "'$value'";
                    $result .= $key . '=' . $value . ',';
                } else if (is_bool($value)) {
                    $value = $value ? 'true' : 'false';

                    $result .= $key . '=' . $value . ',';
                } else {
                    $result .= $key . '=' . $value . ',';
                }
            }
        }

        return substr($result, 0, strlen($result) - 1);
    }

    private function replace($value)
    {
        return str_replace("'", "\'", $value);
    }
}
