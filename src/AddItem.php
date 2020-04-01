<?php
namespace App;


class AddItem
{
    public function add_one_item(int $id, string $name)
    {
        return "INSERT INTO ShoppingList(id, itemName) VALUES($id,'$name')";
    }
}