<?php

namespace App;

class ItemManager
{

    private $dbConnection;

    public function __construct($dbConnection)
    {
        $this->dbConnection = $dbConnection;
    }


    public function read_item_list()
    {
        $query = "SELECT * FROM item_list";
        $result = mysqli_query($this->dbConnection, $query);
        $items = array();

        if (mysqli_num_rows($result) > 0) {
            while ($item = mysqli_fetch_assoc($result)) {
                $itemArray = array('id' => $item["id"], 'itemName' => $item["itemName"], "status" => $item["status"]);
                array_push($items, $itemArray);
            }
        }
        if (mysqli_num_rows($result) == 0) {
            $emptyArray = array();
            return $emptyArray;
        }

        return $items;
    }


    public function create_add_one_item_query(string $name)
    {
        return "INSERT INTO item_list(itemName) VALUES('$name')";
    }

    public function add_one_item(string $name)
    {
        if($name == ""){
            return false;
        }
        $query = $this->create_add_one_item_query($name);
        mysqli_query($this->dbConnection, $query);
    }


    public function edit_one_item(int $id, string $newName)
    {
        return "UPDATE item_list SET itemName='$newName', WHERE id=$id";
    }

    public function edit_one_item_from_DB(int $id, string $name)
    {
        $query = $this->edit_one_item($id, $name);
        mysqli_query($this->dbConnection, $query);
    }


    public function create_delete_one_item_query(int $id)
    {
        return "DELETE FROM item_list WHERE id=$id";
    }

    public function delete_one_item(int $id)
    {
        $query = $this->delete_one_item($id);
        mysqli_query($this->dbConnection, $query);
    }


    public function create_change_status_to_false_query(int $id)
    {
        return "UPDATE item_list SET status=0, WHERE id=$id";
    }

    public function change_item_status_false(int $id)
    {
        $query = $this->create_change_status_to_false_query($id);
        mysqli_query($this->dbConnection, $query);
    }

    public function create_change_item_status_true_query(int $id)
    {
        return "UPDATE item_list SET status=1, WHERE id=$id";
    }

    public function set_item_status_false(int $id)
    {
        $query = $this->create_change_status_to_false_query($id);
        mysqli_query($this->dbConnection, $query);
    }
}
