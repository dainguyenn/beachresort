<?php 

interface IRepository
{
    function save($E);
    function deleteById($id);
    function findById($id);
    function findAll();
    function exitsById($id): bool;
}
