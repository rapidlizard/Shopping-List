<?php
namespace App;


class ChangeItemStatus
{
    public function change_status_to_crossedOut(int $id)
    {
        return "UPDATE ShoppingList SET status='crossedOut', WHERE id=$id";
    }

    public function change_status_to_default(int $id)
    {
        return "UPDATE ShoppingList SET status='default', WHERE id=$id";
    }
}