<?php
include_once '/_Ky5/PHP/const.php';
include_once PATH_DIR . '/repository/impl/Repository.php';

class DiveRepo extends Repository
{
    public function __construct()
    {
        parent::__construct('dive');
    }
}
