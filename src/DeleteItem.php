<?php
namespace App;


class DeleteItem
{

    public function delete_one_item(int $id)
    {
        return "DELETE FROM ShoppingList WHERE id=$id";
    }
}