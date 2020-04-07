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

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/style.css">
    <title>Shopping List</title>
</head>

<body>
    <header>
        <h1>Shopping List</h1>
    </header>

    <main>
        <form action="index.php?action=add_item" method="POST">
            <input type="text" name="item_name" placeholder="Enter item name...">
            <input type="submit" name="submitNewItem">
        </form>

        <?php echo $controller->read_list(); ?>

    </main>
</body>

</html>