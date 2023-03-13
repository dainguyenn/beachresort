<?php

class UploadFile
{
    private static $fileSavePath = 'S:/_Ky5/PHP/src/fileUpload/imgs/';

    public function __construct()
    {
    }

    public function save($fileSave, $filename)
    {
        move_uploaded_file($fileSave, self::$fileSavePath . time() . $filename);
    }
}
