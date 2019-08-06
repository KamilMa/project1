<?php session_start();

require_once 'api/connect.php';


if(isset($_POST['email'])) {
    $validated = true;

    $name = $_POST['name'];
    if((strlen($name)<3) || (strlen($name)>20)) {
      $validated = false;
      $_SESSION['e_name'] = '<span class="form-error">Imię powinno mieć od 3 do 20 znaków długości!</span>';
    }

    if(ctype_alnum($name) == false) {
      $validated = false;
      $_SESSION['e_name'] = '<span class="form-error">Imię nie powinno zawierać polsch znaków!</span>';
    }

    $email = $_POST['email'];
    $emailB = filter_var($email, FILTER_SANITIZE_EMAIL);
    if((filter_var($emailB, FILTER_VALIDATE_EMAIL)) == false || ($email != $emailB)) {
      $validated = false;
      $_SESSION['e_email'] = '<span class="form-error">Podaj poprawny adres email!</span>';
    }

    $password = $_POST['password'];
    $repeatPassword = $_POST['repeatPassword'];
    if((strlen($password)<8) || (strlen($password)>20)) {
      $validated = false;
      $_SESSION['e_password'] = '<span class="form-error">Hasło musi od 8 do 20 znaków!</span>';
    }
    if($password != $repeatPassword) {
      $validated = false;
      $_SESSION['e_password'] = '<span class="form-error">Hasło musi być identyczne!</span>';
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $checkbox = $_POST['regulations'];
    if(!isset($checkbox)) {
      $validated = false;
      $_SESSION['e_regulations'] = '<span class="form-error">Zaakceptuj regulamin!</span>';
    }

    if($link->connect_errno != 0) {
      echo "Błąd połączenia z bazą danych! Przepraszamy za utrudnienia.";
      // Developer info error
      echo $link->connect_error;
    } else {
      $query = $link->query("SELECT name FROM users WHERE name='$name'");
      $amountRows = $query->num_rows;

      if($amountRows>0) {
        $validated = false;
        $_SESSION['e_name'] = '<span class="form-error">Użytkownik o takiej nazwie jest juz zarejestrowany!</span>';
      }

      $query = $link->query("SELECT email FROM users WHERE email='$email'");
      $amountRows = $query->num_rows;

      if($amountRows>0) {
        $validated = false;
        $_SESSION['e_email'] = '<span class="form-error">Użytkownik o takim adresie email jest juz zarejestrowany!</span>';
      }

      if($validated == true) {
        $role = 0; //Domyślnie zero
        $query_Insert = $link->query("INSERT INTO users(email,password,name,role) VALUE ('$email','$hashed_password','$name','$role')");
        if($query_Insert) {
           $_SESSION['registered'] = true;
        } else {
          echo "Błąd połączenia z bazą danych! Przepraszamy za utrudnienia.";
           // Developer info error
           echo $link->connect_error;
           exit();
        }
      }

      $link->close();
    }
}

header('Location:login.php');

?>