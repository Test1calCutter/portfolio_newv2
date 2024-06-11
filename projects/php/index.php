<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="bg"></div>
    <?php
        session_start();

        if (!isset($_SESSION['list'])) {
            $_SESSION['list'] = array();
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['value'])) {
            $value = trim($_POST['value']);
            if (!empty($value)) {
                $_SESSION['list'][] = $value;
            }
            header("Location: " . $_SERVER['PHP_SELF']);
            exit();
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['clear'])) {
            $_SESSION['list'] = [];
            header("Location: " . $_SERVER['PHP_SELF']);
            exit();
        }
    ?>

    <div class="header">
        <h1>Todo List</h1>
    </div>

    <div class="list">

        <form method="post" style="display:inline;">
            <input type="hidden" name="clear" value="true">
            <button type="submit" id="clears" style="
                font-size:1.5rem;
                float: right;
                cursor: pointer;
                border: none;
                background: none;
            ">Clear</button>
        </form>

        <ul id="ul">
            <?php
                foreach ($_SESSION['list'] as $item) {
                    echo "<li>" . htmlspecialchars($item) . "</li>";
                }
            ?>
        </ul>

        <form method="post">
            <input type="text" name="value" placeholder="Type here">
            <button type="submit" name="submit" class="submit">Submit</button>
        </form>
    </div>
</body>
</html>
