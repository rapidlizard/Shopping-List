<?php
use PHPUnit\Framework\TestCase;
use App\ChangeItemStatus;

class ChangeItemStatusTest extends TestCase
{
    public function test_change_item_crossedOut_created_correct_query()
    {
        $id = 10;
        $changeItemStatus = new ChangeItemStatus();

        $returnQuery = $changeItemStatus->change_status_to_crossedOut($id);
        $expectedQuery = "UPDATE ShoppingList SET status='crossedOut', WHERE id=$id";

        $this->assertEquals($expectedQuery, $returnQuery);
    }

    public function test_change_item_default_created_correct_query()
    {
        $id = 10;
        $changeItemStatus = new ChangeItemStatus();

        $returnQuery = $changeItemStatus->change_status_to_default($id);
        $expectedQuery = "UPDATE ShoppingList SET status='default', WHERE id=$id";

        $this->assertEquals($expectedQuery, $returnQuery);
    }
}