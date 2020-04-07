<?php
namespace App\view;

use App\Controller;

class View {

    public static function display_item_list(array $itemList)
    {  
        for($index = 0; $index < count($itemList); $index++){
        ?>
            <div class="item<?php echo $itemList[$index]['status'];?>">
                <p><?php echo $itemList[$index]['itemName']?></p>
                <form action="">
                    <button><img src="./images/edit.png" alt="edit icon"></button>
                    <button><img src="./images/delete.png" alt="delete icon"></button>
                </form>
            </div>
        <?php
        }
    }

    // public static function add_item()
    // {

    // }
}
