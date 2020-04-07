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
        $this->itemManager->add_one_item($name);
    }


////////


    public function delete_all()
    {
        $this->itemManager->delete_all_items();
    }

    
}
