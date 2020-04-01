<?php
use PHPUnit\Framework\TestCase;
use App\DeleteItem;

class DeleteItemTest extends TestCase
{
    public function test_delete_item_created_correct_query()
    {
        $id = 190;
        $deleteItem = new DeleteItem;

        $itemDeleted = $deleteItem->delete_one_item($id);
        $queryFakeItem = "DELETE FROM ShoppingList WHERE id=$id";

        $this->assertEquals($queryFakeItem, $itemDeleted);
    }
}
//$sql = "DELETE FROM ShoppingList WHERE id=" . $itemId;