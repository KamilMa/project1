<?php
session_start();

if ((!isset($_POST['email'])) || (!isset($_POST['password'])))
	{
		header('Location:../index.php');
		exit();
	}

require_once "connect.php";

if($link->connect_errno!=0) {
    // Obsługa błędu łączenia z bazą danych
    echo "<h2>Wystąpił błąd bazy danych, sprawdź połączenie</h2>";
}

else

{
    $email = $_POST['email'];
    $password = $_POST['password'];

    $email = htmlentities($email, ENT_QUOTES, "UTF-8");

    $query = $link->query(sprintf("SELECT * FROM users WHERE email = '%s'",
    mysqli_real_escape_string($link,$email)));

    if($query) {
        // Sprawdzamy czy użytkownik jest w bazie
        $no_users = $query->num_rows;
        if($no_users>0) {
            $row = $query->fetch_assoc();
            if(password_verify($password, $row['password'])) {
                $_SESSION['logged'] = true;
                $_SESSION['name'] = $row['name'];
                $_SESSION['id'] = $row['id'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['role'] = $row['role'];

                unset($_SESSION['blad']);
                $query->free();
                
                header('Location:../panel.php');
            }  else {
            $_SESSION['blad'] = '<span style="color:red">Nieprawidłowy login lub hasło! hasło</span>';
            echo $link->connect_error;
			header('Location:../login.php');
            };
        } else {
            $_SESSION['blad'] = '<span style="color:red">Nieprawidłowy login lub hasło!no-users</span>';
              echo $link->connect_error;
			header('Location:../login.php');
        };
    };
    $link->close();
}

?>