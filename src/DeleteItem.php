<?php
namespace App;


class DeleteItem
{

    public function delete_one_item(int $id)
    {
        $deleteQuery = "DELETE FROM ShoppingList WHERE id=$id";
        return $deleteQuery;
    }
}