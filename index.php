<?php
namespace App;

include('vendor/autoload.php');
use App\Controller;

$controller = new Controller();


$action = isset($_GET['action']) ? $_GET['action'] : 'none';

if ($action == 'add_item' && isset($_POST['item_name'])) {
    $itemName = $_POST['item_name'];
    $controller->add_item($itemName);
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
} 

if ($action == 'delete_item' && isset($_POST['item_id'])) {
    $itemId = $_GET['id'];
    $controller->delete_item($itemId);
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}

if ($action == 'edit_item' && isset($_POST['item_new_name'])) {
    $itemIdString = $_GET['id'];
    $itemId = (int)$itemIdString;
    $newName = $_POST['item_new_name'];
    $controller->edit_item($itemId, $newName);
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}

if ($action == 'delete_all' && isset($_POST['delete_all_items'])) {
    $result = $controller->delete_all();
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}

if ($action == 'change_item_status_1' && isset($_POST['change_item_status'])) {
    $itemIdString = $_GET['id'];
    $itemId = (int)$itemIdString;
    $result = $controller->change_status_true($itemId);
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}

if ($action == 'change_item_status_0' && isset($_POST['change_item_status'])) {
    $itemIdString = $_GET['id'];
    $itemId = (int)$itemIdString;
    $result = $controller->change_status_false($itemId);
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./src/styles/styles.css">
    <title>Shopping List</title>
</head>

<body>
    <header>
        <h1><a href="index.php">Shopping List</a></h1>
    </header>

    <main>
        <div class="itemNameForm">
            <form action="index.php?action=add_item" method="POST">
                <input class="newItemInput" type="text" name="item_name" placeholder="Enter item name...">
                <!-- <input type="submit" name="submitNewItem" class="cta"> -->
            </form>
        </div>
        <div class="itemList">
            <?php
            echo $controller->read_list();
            ?>
        </div>
    </main>
    <footer>
        <form action="index.php?action=delete_all" class="footerForm" method="POST">
            <button type="submit" name="delete_all_items" class="cta">Delete all items</button>
        </form>
    </footer>
</body>

</html>