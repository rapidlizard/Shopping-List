<?php
use PHPUnit\Framework\TestCase;
use App\ItemManager;

class ItemManagerTest extends TestCase
{
    private $itemManager;

    public function setUp():void
    {
        $db = 1;
        $this->itemManager = new ItemManager($db);
    }

    public function test_add_item_created_correct_query()
    {
        $fakeItemName = 'milk';

        $addedItem = $this->itemManager->create_add_one_item_query($fakeItemName);
        $queryFakeItem = "INSERT INTO item_list(itemName) VALUES('$fakeItemName')";

        $this->assertEquals($queryFakeItem, $addedItem);
    }

    public function test_edit_item_created_correct_query()
    {
        $fakeId = 1;
        $fakeItemName = 'milk';

        $editedItem = $this->itemManager->create_edit_one_item_query($fakeId, $fakeItemName);
        $queryFakeItem = "UPDATE item_list SET itemName='$fakeItemName' WHERE id=$fakeId";

        $this->assertEquals($queryFakeItem, $editedItem);
    }

    public function test_delete_item_created_correct_query()
    {
        $id = 1;

        $itemDeleted = $this->itemManager->create_delete_one_item_query($id);
        $queryFakeItem = "DELETE FROM item_list WHERE id=$id";

        $this->assertEquals($queryFakeItem, $itemDeleted);
    }

    public function test_change_item_crossedOut_created_correct_query()
    {
        $id = 10;

        $returnQuery = $this->itemManager->create_change_status_to_false_query($id);
        $expectedQuery = "UPDATE item_list SET itemStatus=0, WHERE id=$id";

        $this->assertEquals($expectedQuery, $returnQuery);
    }

    public function test_change_item_default_created_correct_query()
    {
        $id = 10;

        $returnQuery = $this->itemManager->create_change_status_true_query($id);
        $expectedQuery = "UPDATE item_list SET itemStatus=1, WHERE id=$id";

        $this->assertEquals($expectedQuery, $returnQuery);
    }

    public function test_create_delete_all_items_query()
    {
        $allItemsDeleted = $this->itemManager->create_delete_all_items_query();
        $queryFakeItems = "DELETE FROM item_list";

        $this->assertEquals($queryFakeItems, $allItemsDeleted);
    }
}