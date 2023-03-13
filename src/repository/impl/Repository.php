<?php

require_once '/_Ky5/PHP/const.php';

include_once PATH_DIR . '/repository/Connect.php';
require_once PATH_DIR . '/utils/TextFunc.php';
require_once PATH_DIR . '/repository/IRepository.php';

class Repository  implements IRepository
{
    protected $textFunc;
    protected $conn;
    protected $table;

    public function __construct($table)
    {
        $this->textFunc = new TextFunc();
        $this->conn = new Connect();
        $this->table = $table;
    }

    public function save($entity)
    {
        $sql = '';
        if (empty($entity->getId())) {
            $sql = "INSERT INTO " . $this->table . " (" . $this->textFunc->parseTextParams($entity) . ") " . " VALUES(" . $this->textFunc->parseTextValuesInsert($entity) . ")";
        } else {
            $sql = "UPDATE " . $this->table  . " SET " . $this->textFunc->updateQuery($entity) . " WHERE id =" . $entity->getId();
        }
        $this->SQL_LOG($sql);

        $this->conn->query($sql);
    }

    public function deleteById($id)
    {
        $sql = "DELETE FROM " . $this->table . " WHERE id =" . $id;
        $this->SQL_LOG($sql);

        $this->conn->query($sql);
    }

    public function findById($id)
    {
        $sql = "SELECT * FROM " . $this->table . " WHERE id = " . $id;
        $this->SQL_LOG($sql);

        return $this->conn->query($sql);
    }

    public function exitsById($id): bool
    {
        $sql = "SELECT * FROM " . $this->table . " WHERE id = " . $id;
        $this->SQL_LOG($sql);
        $run = $this->conn->query($sql);
        return mysqli_num_rows($run) > 0;
    }

    public function findAll()
    {
        $sql = "SELECT * FROM " . $this->table;
        $this->SQL_LOG($sql);
        return $this->conn->query($sql);
    }

    protected function SQL_LOG($sql)
    {
        $date  = date_create('now', timezone_open('Asia/Saigon'))->format('Y-m-d H:i:s');
        $fp = fopen('/_Ky5/PHP/LOG/SQL.log', 'a');
        $message = $date . ' | INFO: SQL(table: ' . $this->table . ', query: ' . $sql . ')';
        fwrite($fp, $message . "\n");
        fclose($fp);
    }
}
