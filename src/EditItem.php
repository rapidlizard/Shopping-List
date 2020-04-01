<?php
namespace App;

class EditItem
{
    public function edit_one_item(int $id, string $newName)
    {
        return "UPDATE ShoppingList SET itemName='$newName', WHERE id=$id";
    }
}