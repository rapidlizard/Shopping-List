<?php
namespace App;

class EditItem
{
    public function edit_one_item(int $id, string $newName)
    {
        $query = "UPDATE ShoppingList SET itemName=$newName, WHERE id=$id";
        return $query;
    }
}