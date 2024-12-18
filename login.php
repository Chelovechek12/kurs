<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['uname']) && isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uname = validate($_POST['uname']);
	$pass = validate($_POST['password']);

	if (empty($uname)) {
		header("Location: index.php?error=User  Name is required");
	    exit();
	}else if(empty($pass)){
        header("Location: index.php?error=Password is required");
	    exit();
	}else{
		// Хеширование пароля
        $pass = md5($pass);

		// Проверка на admin/admin
		if ($uname === 'admin' && $pass === md5('admin')) {
			// Сохранение данных в сессии
			$_SESSION['role_name'] = 'admin';
			$_SESSION['name'] = 'Administrator'; // Можно изменить на нужное имя
			$_SESSION['roles'] = 'admin'; // Установка роли
			header("Location: cons.html"); // Перенаправление на страницу для администраторов
			exit();
		}

		$sql = "SELECT * FROM users WHERE user_name='$uname' AND password='$pass'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['user_name'] === $uname && $row['password'] === $pass) {
            	$_SESSION['user_name'] = $row['user_name'];
            	$_SESSION['name'] = $row['name'];
            	$_SESSION['id'] = $row['id'];
            	$_SESSION['roles'] = $row['roles']; // Сохранение роли в сессии

            	// Перенаправление в зависимости от роли
            	if ($row['roles'] === 'admin') {
                	header("Location: cons.html"); // Страница для администраторов
            	} else {
                	header("Location: home.php"); // Страница для обычных пользователей
            	}
		        exit();
            }else{
				header("Location: index.php?error=Incorrect User name or password");
		        exit();
			}
		}else{
			header("Location: index.php?error=Incorrect User name or password");
	        exit();
		}
	}
	
}else{
	header("Location: index.php");
	exit();
}