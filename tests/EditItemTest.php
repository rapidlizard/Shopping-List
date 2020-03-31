<?php
use PHPUnit\Framework\TestCase;
use App\EditItem;

class EditItemTest extends TestCase
{
    public function test_edit_item_created_correct_query()
    {
        $fakeId = 1;
        $fakeItemName = 'milk';
        $editItem = new EditItem();

        $editedItem = $editItem->edit_one_item($fakeId, $fakeItemName);
        $queryFakeItem = "UPDATE ShoppingList SET itemName=$fakeItemName, WHERE id=$fakeId";

        $this->assertEquals($queryFakeItem, $editedItem);
    }
}