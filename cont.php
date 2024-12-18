<?php
// Подключение к базе данных
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test_db"; 

$conn = new mysqli($servername, $username, $password, $dbname);

// Проверка соединения
if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}

// Обработка загрузки
if (isset($_POST['submit'])) {
    $text = $_POST['text'];
    $image = $_FILES['image']['name'];
    $targetDir = "uploads/";
    $targetFilePath = $targetDir . basename($image);

    // Проверка, существует ли папка uploads
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0755, true); // Создать папку, если она не существует
    }

    // Перемещение загруженного файла
    if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFilePath)) {
        // Вставка данных в базу
        $stmt = $conn->prepare("INSERT INTO photos (image_path, text) VALUES (?, ?)");
        if ($stmt) {
            $stmt->bind_param("ss", $targetFilePath, $text);
            if ($stmt->execute()) {
                // Перенаправление после успешной загрузки
                header("Location: " . $_SERVER['PHP_SELF']);
                exit();
            } else {
                echo "Ошибка при вставке данных в базу: " . $stmt->error;
            }
            $stmt->close();
        } else {
            echo "Ошибка подготовки запроса: " . $conn->error;
        }
    } else {
        echo "Ошибка загрузки файла.";
    }
}

// Обработка удаления
if (isset($_POST['delete'])) {
    $id = intval($_POST['id']);
    $stmt = $conn->prepare("DELETE FROM photos WHERE id = ?");
    if ($stmt) {
        $stmt->bind_param("i", $id);
        if ($stmt->execute()) {
            echo "Запись успешно удалена.";
        } else {
            echo "Ошибка при удалении записи: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Ошибка подготовки запроса: " . $conn->error;
    }
}

// Получение существующих записей
$result = $conn->query("SELECT * FROM photos");
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Существующий контент</title>
</head>
<body>

<h1>Добавить фотографию и текст</h1>
    <form action="cont.php" method="post" enctype="multipart/form-data">
        <input type="file" name="image" required>
        <input type="text" name="text" placeholder="Введите текст" required>
        <button type="submit" name="submit">Загрузить</button> <!-- Кнопка добавления -->
    </form>

    <h1>Существующий контент</h1>
    <ul>
        <?php while ($row = $result->fetch_assoc()): ?>
            <li>
                <?php echo htmlspecialchars($row['text']); ?>
                <br>
                <img src="<?php echo htmlspecialchars($row['image_path']); ?>" alt="Изображение" style="max-width: 200px; max-height: 200px;">
                <form method="post" style="display:inline;">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <button type="submit" name="delete">Удалить</button> <!-- Кнопка удаления -->
                </form>
            </li>
        <?php endwhile; ?>
    </ul>
</body>
</html>

<?php
$conn->close();
?>