<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ToDoList</title>
</head>
<body>
<?php

$sererName = 'localhost';
$userName = 'root';
$password = '';
$dataBaseName = 'to_do_list';

try {
    $conn = new PDO("mysql:host=$sererName;dbname=$dataBaseName", $userName, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $todos = $conn->query("SELECT * FROM todos ORDER BY id DESC");
    $result = $todos->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $PDOException) {
    echo "Connection failed " . $PDOException->getMessage();
}


?>

<div class="main-section">
    <div class="add-section">
        <form action="add.php" method="post">
            <input type="text" name="title" placeholder="Example"><br><br>
            <input type="datetime-local" name="date_time"><br><br>
            <button type="submit">&nbsp; Добавить &nbsp;
            </button>
        </form>
        <br>
    </div>
</div>

<?php

foreach ($result

as $item) { ?>

<div class="show-todo-section">
    <div class="todo-item">

        <?php
        echo "ID " . $item['id'] . "<br>";
        echo $item['title'] . "<br>";
        echo $item['date_time'] . "<br>";
        ?>

        <div class="main-section">
            <div class="edit-section">
                <form action="update.php" method="post">
                    <input type="hidden" name="id" value="<?php
                    echo $item['id']; ?>">
                    <input type="text" name="title" value="<?php
                    echo $item['title'] ?>">
                    <input type="datetime-local" name="date_time" value="<?php
                    echo $item['date_time'] ?>">
                    <button type="submit">Обновить</button>
                </form>
            </div>
        </div>

        <div class="main-section">
            <div class="add-section">
                <form action="delete.php" method="post">
                    <input type="hidden" name="id" value="<?php
                    echo $item['id']; ?>">
                    <button type="submit">&#10003;</button>
                </form>
                <br>
            </div>
        </div>

        <?php
        }
        ?>

    </div>
</div>

</body>
</html>