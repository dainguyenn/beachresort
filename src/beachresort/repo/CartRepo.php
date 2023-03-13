<?php
include_once '/_Ky5/PHP/const.php';
include_once PATH_DIR . '/repository/impl/Repository.php';

class CartRepo extends Repository
{
    public function __construct()
    {
        parent::__construct('cart');
    }

    public function addToCart($user_id, $room_id)
    {
        $date_order = date("Y-m-d", time());
        $sql = "INSERT INTO cart (user_id, room_id, date_order) VALUES($user_id,$room_id,'$date_order')";
        $this->SQL_LOG($sql);
        $success = $this->conn->query($sql);
        return $success;
    }

    public function findAllByUser($id)
    {
        $sql = "SELECT * FROM room,cart WHERE user_id = $id AND cart.room_id = room.id";
        $this->SQL_LOG($sql);

        return mysqli_fetch_all($this->conn->query($sql), MYSQLI_ASSOC);
    }

    public function update($cartId, $date_order, $date_end)
    {

        $sql = "UPDATE cart SET date_order='$date_order',date_end='$date_end' WHERE id = $cartId";
        $this->SQL_LOG($sql);
        $this->conn->query($sql);
    }
}
