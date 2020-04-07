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

if ($action == 'delete_item' && isset($_POST['itemId'])) {
    $itemId = $_POST['itemId'];
    $controller->delete_item($itemId);
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
        <h1>Shopping List</h1>
    </header>

    <main>
        <div class="itemNameForm">
            <form action="index.php?action=add_item" method="POST">
                <input type="text" name="item_name" placeholder="Enter item name...">
                <!-- <input type="submit" name="submitNewItem" class="cta"> -->
            </form>
        </div>
        <div class="itemList">
            <?php echo $controller->read_list(); ?>
        </div>
    </main>
    <footer>
        <form action="" class="footerForm">
            <button type="submit" name="delete_all_items" class="cta">Delete all items</button>
        </form>
    </footer>
</body>

</html>