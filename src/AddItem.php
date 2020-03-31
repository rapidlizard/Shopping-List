<?php
namespace App;


class AddItem
{
    public function add_one_item(int $id, string $itemName)
    {
        $query = "INSERT INTO ShoppingList(id, itemName) VALUES($id,'$itemName')";
        return $query;
    }
}