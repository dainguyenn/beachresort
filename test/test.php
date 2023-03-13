<?php
$arr = [];
if (empty($arr)) {
    echo 'empty';
}
$arr[1] = 'abc';

if (empty($arr)) {
    echo ' empty  2';
} else {
    print_r($arr);
}
