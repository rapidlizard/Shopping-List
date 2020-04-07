<?php
namespace App\view;

use App\Controller;

class View {

    public static function display_item_list($itemList)
    {
        if(count($itemList)>0){
            for($index = 0; $index < count($itemList); $index++){
                ?>
                <div class="item <?php echo $itemList[$index]['status'];?>">
                    <div class="itemNameCheckbox">
                        <form action="">
                            <input type="checkbox" name="change_item_status" class="itemCheckbox">
                        </form>
                        <p class="itemName"><?php echo $itemList[$index]['itemName']?></p>
                    </div>
                    <div class="itemInteraction">
                        <form action="index.php?action=delete_item" method="POST">
                            <button type="submit" name="itemId<?php echo $itemList[$index]['id']?>" class="itemIcon"><img src="./src/images/icon_edit_item.png" class="icon" alt="edit icon"></button>
                            <button class="itemIcon"><img src="./src/images/icon_delete_item.png" class="icon" alt="delete icon"></button>
                        </form>
                    </div>
                </div>
                <?php
            }
        }
        if(count($itemList)==0){
            ?>
            <div>
                <p>Your item list is empty</p>
            </div>
            <?php
        }
        
    }

    public static function display_form_submitted_empty()
    {
        ?>
        <div>
            <p>Please enter an item name</p>
        </div>
        <?php
    }

    // public static function add_item()
    // {

    // }
}
