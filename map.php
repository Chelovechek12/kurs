<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>InterMedia - Контент</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="mapa.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
<script async src="https://maps.app.goo.gl/AkC9nf5JHAS1JjVt8"></script>
<script type="module" src="script.js"></script>
</head>
<body>
    <header>  

<div class="container"> 

        <ul class="menu-main">
            <li><a href="main.php" >Блог</a></li>
            <li><a href=""class="current">Контент </a></li>
            <li><a href="indexx.html">Разработка</a></li>
   
          </ul>
    
         
            <h1>InterMedia</h1>
            <p class="ras">Разработка сайтов и лендингов</p>
            
            <div class="searchs">
                <form action="" method="get">
              
                    <input  class="searc"   name="s" placeholder="Поиск по сайту..." type="search"   >
                
                  </form>
            </div>
     
      <h4 class="inter">InterMedia</h4> 
    </div>
    </header>

  
   <main>

  <div class="carta">
    <gmp-map
    center="37.4220656,-122.0840897"
    zoom="10"
    map-id="DEMO_MAP_ID"
    style="height: 200px"
  ><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d10848.848136397732!2d73.39365775669371!3d61.27021516076168!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x43739773194f954d%3A0x231da0789201f147!2z0KHRg9GA0LPRg9GCLCDQpdCw0L3RgtGLLdCc0LDQvdGB0LjQudGB0LrQuNC5INCw0LLRgtC-0L3QvtC80L3Ri9C5INC-0LrRgNGD0LM!5e0!3m2!1sru!2sru!4v1734328575987!5m2!1sru!2sru" width="1080" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></gmp-map></div>



  <div class="stat">

    <h2>
        Топ статьи на 2024 год
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
        
    </h2>
<div class="ims">
    <div class="image-container">

      <h1>Добавить фотографию и текст</h1>
      <form action="" method="post" enctype="multipart/form-data">
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
<style>
.image-container h1 {
font-size: 30px;

}
.image-container input {
    margin-bottom: 30px;
    left: 20px;
   
}
.image-container button{
    height: 30px;
    border-radius: 10px;


}
.ims img{
list-style-type: none;filter: none; 

}
.ims{
position: relative;



}

</style>
      <?php
      $conn->close();
      ?>
</div>

</div>

</div>

<div class=" contact">

<div><h1>У вас есть деловой запрос? </h2></div>

<div><h2>Давайте обсудим! </h2></div>

<div><h4>Оставьте свои контакты, мы свяжемся с вами в ближайшее время.</h2></div>

</div>
<form  method="POST">
    <div class="formContainer">
       
        <hr>
        <label for="email">
           
        </label>
        <input type="text" placeholder="Введите ваше имя" name="name" required>
        <label for="пароль">
          
        </label>
        <input type="email" placeholder="Введите адрес эл.почты" name="email" required>
        <label for="Повторный пароль">
       
        </label>
        <input type="number" placeholder="Введите номер телефона" name="number" required>
        <label>
            <input type="флажок" checked="checked" placeholder="Адрес сайта" name="запомнить" id="проверить"> </label>
        <p>Создайте учётную запись, и следите за новостями <a href="#" style="color: dodgerblue">Зарегистрироваться</a>. </p>
        <div class="btn">
            <button type="отправить" класс="связь">Отправить</button>
        </div>
    </div>
</form>

<?php
    // Подключение к базе данных
    $servername = "localhost";
    $username = "root"; // Ваше имя пользователя
    $password = ""; // Ваш пароль
    $dbname = "test_db"; // Имя вашей базы данных

    // Создание соединения
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Проверка соединения
    if ($conn->connect_error) {
        die("Ошибка подключения: " . $conn->connect_error);
    }

    // Обработка данных формы
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = trim($_POST['name']);
        $email = trim($_POST['email']);
        $phone_number = trim($_POST['number']);

        // Валидация данных
        if (empty($name) || empty($email) || empty($phone_number)) {
            echo "Пожалуйста, заполните все поля.";
        } else {
            // Подготовка SQL-запроса
            $stmt = $conn->prepare("INSERT INTO data (name, email, phone_number) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $name, $email, $phone_number);

            // Выполнение запроса и проверка на ошибки
            if ($stmt->execute()) {
                echo "Данные успешно отправлены!";
            } else {
                echo "Ошибка: " . $stmt->error;
            }

            // Закрытие подготовленного выражения
            $stmt->close();
        }
    }

    // Закрытие соединения с базой данных
    $conn->close();
    ?>

</main >

<footer>
<div class="top">
<h3>InterMedia</h3>


<ul class="menu">
    <li><a href="login.php" >Войти</a></li>
    <li><a href="signup.php">Регистрация</a></li>


  </ul>


</div>
<div class="create-line"></div>

<div class="bott">
<div>
<h3>В России: 142601, Московская область, г. Орехово-Зуево, ул. Ленина д. 99 </h3>
</div>
  <div>  В Китае:
   <h3> Room 2904,Kerry Center, No.2008 Renmin South Road,Luohu Community, <br>Nanhu Street,Luohu District, Shenzhen.China Postal code:518005 </h3></div>

</div>

</footer>


</body>
</html>