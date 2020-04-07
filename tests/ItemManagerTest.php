<?php
use PHPUnit\Framework\TestCase;
use App\ItemManager;

class ItemManagerTest extends TestCase
{

    public function setUp():void
    {
        $this->itemManager = new ItemManager();
    }

    public function test_add_item_created_correct_query()
    {
        $fakeItemName = 'milk';

        $addedItem = $this->itemManager->add_one_item($fakeItemName);
        $queryFakeItem = "INSERT INTO item_list(itemName) VALUES('$fakeItemName')";

        $this->assertEquals($queryFakeItem, $addedItem);
    }

    public function test_edit_item_created_correct_query()
    {
        $fakeId = 1;
        $fakeItemName = 'milk';

        $editedItem = $this->itemManager->edit_one_item($fakeId, $fakeItemName);
        $queryFakeItem = "UPDATE item_list SET itemName='$fakeItemName', WHERE id=$fakeId";

        $this->assertEquals($queryFakeItem, $editedItem);
    }

    public function test_delete_item_created_correct_query()
    {
        $id = 1;

        $itemDeleted = $this->itemManager->delete_one_item($id);
        $queryFakeItem = "DELETE FROM item_list WHERE id=$id";

        $this->assertEquals($queryFakeItem, $itemDeleted);
    }

    public function test_change_item_crossedOut_created_correct_query()
    {
        $id = 10;

        $returnQuery = $this->itemManager->change_status_to_false($id);
        $expectedQuery = "UPDATE item_list SET status=0, WHERE id=$id";

        $this->assertEquals($expectedQuery, $returnQuery);
    }

    public function test_change_item_default_created_correct_query()
    {
        $id = 10;

        $returnQuery = $this->itemManager->change_status_to_true($id);
        $expectedQuery = "UPDATE item_list SET status=1, WHERE id=$id";

        $this->assertEquals($expectedQuery, $returnQuery);
    }
}