<?php

namespace App;

use App\ItemManager;
use App\view\View;

class Controller
{
    private $itemManager;
    private $view;

    public function __construct()
    {
        $dbConnection = mysqli_connect("localhost", "root", "", "shopping_list");
        $this->itemManager = new ItemManager($dbConnection);
        $this->view = new View();
    }

    public function read_list()
    {
        $items = $this->itemManager->read_item_list();
        $itemsToDisplay = $this->view->display_item_list($items);
        return $itemsToDisplay;
    }

    public function add_item(string $name)
    {
        $result = $this->itemManager->add_one_item($name);
        return $result;
    }

    public function delete_item(int $id)
    {
        $result = $this->itemManager->delete_one_item($id);
        return $result;
    }

    
    public function edit_item(int $id, string $newName)
    {
        $result = $this->itemManager->edit_one_item($id, $newName);
        return $result;
    }

    public function delete_all()
    {
        $result = $this->itemManager->delete_all_items();
        return $result;
    }

    public function change_status_true(int $id)
    {
        $result = $this->itemManager->change_item_status_true($id);
        return $result;
    }

    public function change_status_false(int $id)
    {
        $result = $this->itemManager->change_item_status_false($id);
        return $result;
    }

}
