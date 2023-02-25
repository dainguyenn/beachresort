<?php
include '/_Ky5/PHP/const.php';

include './TestBuilder.php';
include_once '../repository/impl/Repository.php';

$testInsert = (new TestBuilder())->addA('add')->addC(2)->addD(false)->build();
$repo = new Repository('tiec');

$repo->deleteById(2);
