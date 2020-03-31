<?php
use PHPUnit\Framework\TestCase;
use App\AddItem;

class AddItemTest extends TestCase
{
    public function test_add_item_created_correct_query()
    {
        $fakeId = 1;
        $fakeItemName = 'milk';
        $addItem = new AddItem();

        $addedItem = $addItem->add_one_item($fakeId, $fakeItemName);
        $queryFakeItem = "INSERT INTO ShoppingList(id, itemName) VALUES($fakeId,'$fakeItemName')";

        $this->assertEquals($queryFakeItem, $addedItem);
    }
}