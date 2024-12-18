<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>InterMedia - Блог</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="stel.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>
<body>
    <header>  

<div class="container"> 

        <ul class="menu-main">
            <li><a href="" class="current">Блог</a></li>
            <li><a href="map.php">Контент</a></li>
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
<div class="slova">

    <h2  >Компания InterMedia</h2>

   <p> Компания InterMedia — это динамично развивающаяся организация, специализирующаяся на разработке современных и функциональных веб-сайтов для бизнеса и частных клиентов. Наша команда состоит из опытных профессионалов в области веб-дизайна, программирования и цифрового маркетинга, что позволяет нам создавать уникальные решения, отвечающие потребностям наших клиентов.
    
    <h2>Основные направления нашей деятельности:</h2>
    
   <p> Разработка веб-сайтов: мы создаем сайты, которые не только привлекают внимание, но и удобны в использовании. Независимо от того, нужен ли вам корпоративный сайт, интернет-магазин или личный блог, мы обеспечим индивидуальный подход к каждому проекту.
    Ведение блогов: мы активно делимся своим опытом и знаниями в блогах, где рассказываем о последних тенденциях в веб-разработке, делимся полезными советами и кейсами из нашей практики. Наша цель — помочь клиентам лучше понять процессы разработки и использования веб-технологий.
    Поддержка и оптимизация: мы не только разрабатываем сайты, но и обеспечиваем их поддержку, обновление и оптимизацию для достижения максимальной эффективности и производительности.
    </p>
   <h2>Наша философия</h2> 
    
   <p> В InterMedia мы верим, что каждый проект — это возможность создать что-то уникальное и полезное. Мы стремимся к постоянному развитию, изучая новые технологии и подходы, чтобы предлагать нашим клиентам самые современные решения.
    Присоединяйтесь к нам в нашем блоге, чтобы быть в курсе последних новостей и тенденций в мире веб-разработки, и давайте вместе создавать что-то удивительное!
</p>
</p>

</div>
  
<div class="stat">

    <h2>
        Топ статьи на 2024 год

    </h2>
<div class="ims">
    <div class="image-container">
    <a href=" map.php">
        <img class="ser" src="image/orig.jpeg" > 
    <div class="overlay">
        <h2 class="text1">Обнволение сервера</h2>
    </div></a>
    </div>
    <div class="image-container">
        <a href="map.php">
   <img class="pg2" src="image/img9.jpg">
  <div class="overlay">
    <h2 class="text2">веб-дизайн</h2>
</div> </a>
  </div>
  <div class="image-container">
    <a href="map.php ">
   <img class="pg3"src="image/Saas_A1.jpg"> 
  <div class="overlay">
  <h2 class="text3">услуги</h2>
</div></a>
</div>
<div class="image-container"><a href="map.php"> 
   <img class="pg4"src="image/1056666-arch-linux-wallpaper-1920x1080-for-ios.jpg">
  <div class="overlay">
    <h2 class="text4">UNIX новости</h2>
</div></a>
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
        echo '<span style="color: red;">Пожалуйста, заполните все поля.</span>';
    } else {
        // Подготовка SQL-запроса
        $stmt = $conn->prepare("INSERT INTO data (name, email, phone_number) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $phone_number);

        // Выполнение запроса и проверка на ошибки
        if ($stmt->execute()) {
            echo '<span style="color: green;">Данные успешно отправлены!</span>';
        } else {
            echo '<span style="color: red;">Ошибка: ' . $stmt->error . '</span>';
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