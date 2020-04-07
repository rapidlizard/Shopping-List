<?php
namespace App\view;

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
                        <?php
                            $action = isset($_GET['action']) ? $_GET['action'] : 'none';
                            if($action === 'init_edit_item' && isset($_POST['item_id'])){
                                if($itemList[$index]['id'] === $_GET['id']){
                                    $id = $_GET['id'];
                                    $name = $_GET['name'];
                                    ?>
                                    <form action="index.php?action=edit_item&id=<?php echo $id?>" method="POST">
                                        <input class="editItemInput" type="text" name="item_new_name" value="<?php echo $name;?>">
                                    </form>
                                    <?php
                                }
                                else {
                                    ?>
                                    <p class="itemName"><?php echo $itemList[$index]['itemName']?></p>
                                    <?php
                                }
                            }
                            else {
                                ?>
                                <p class="itemName"><?php echo $itemList[$index]['itemName']?></p>
                                <?php
                            }
                    ?>
                    </div>
                    <div class="itemInteraction">
                        <form action="index.php?action=init_edit_item&id=<?php echo $itemList[$index]['id']?>&name=<?php echo $itemList[$index]['itemName']?>" method="POST">
                            <button type="submit" name="item_id" class="itemIcon"><img src="./src/images/icon_edit_item.png" class="icon" alt="edit icon"></button>
                        </form>    
                        <form action="index.php?action=delete_item&id=<?php echo $itemList[$index]['id']?>&name=<?php echo $itemList[$index]['itemName']?>" method="POST">
                            <button type="submit" name="item_id" class="itemIcon"><img src="./src/images/icon_delete_item.png" class="icon" alt="delete icon"></button>
                        </form>
                    </div>
                </div>
                <?php
            }
        }
        if(count($itemList)==0){
            ?>
            <div class="emptyListText">
                <p>Your item list is empty</p>
            </div>
            <?php
        }
        
    }
}
