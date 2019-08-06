<?php
// session_start();

if((isset($_SESSION['logged'])) && ($_SESSION['logged']==true)) {
    echo '
    <div class="space50"></div>
    <h1 class="ui header centered align">Jesteś zalogowany jako ' . $_SESSION['name'] . '</h1>
    <div class="space50"></div>';

} else {
if(isset($_SESSION['registered'])) {
    echo "<p>Dziękujemy za rejestrację, możesz się teraz zalogować</p?";
    unset($_SESSION['registered']);

};
echo
'<div class="space90"></div>
<div class="ui container">
<h2 class="ui header tabs-title"></h2>
    <div class="ui segment">
        <div class="ui two column centered grid stakable">
            <div class="column">
                <div class="space10"></div>
                <div class="ui pointing secondary menu">
                        <a class="item active login" data-tab="first">Logowanie</a>
                        <a class="item register" data-tab="second">Rejestracja</a>
                </div>
                <div class="ui bottom attached tab active" data-tab="first">
                    <form class="ui form" action="api/login.php" method="post">
                    <div class="field"><label for="email">Email</label><div class="ui left icon input">
                    <i class="user icon"></i><input type="text" name="email" placeholder="Wpisz adres email"></div></div>
                    <div class="field"><label for="password">Hasło</label><div class="ui left icon input">
                    <i class="lock icon"></i><input type="password" name="password" placeholder="Wpisz swoje hasło"></div></div>
                    <button type="submit" class="ui button blue fluid"><i class="icon send"></i> Zaloguj się</button>
                </form>
                </div>

                <div class="ui bottom attached tab" data-tab="second">
                <form class="ui form" id="registration" action="" method="post">

                    <div class="field"><label for="name">Twój nick</label><input type="text" name="name" placeholder="Imię"></div>
                    ';
                    if(isset($_SESSION['e_name'])) {
                        echo $_SESSION['e_name'];
                        unset($_SESSION['e_name']);
                    };
                    echo
                    '<div class="field"><label for="email">Twój adres email</label><input type="text" name="email" placeholder="Email"></div>
                    ';
                    if(isset($_SESSION['e_email'])) {
                        echo $_SESSION['e_email'];
                        unset($_SESSION['e_email']);
                    };
                    echo
                    '<div class="field"><label for="password">Twoje hasło</label><input type="text" name="password" placeholder="Hasło"></div>
                    ';
                    if(isset($_SESSION['e_password'])) {
                        echo $_SESSION['e_password'];
                        unset($_SESSION['e_password']);
                    };
                    echo
                    '<div class="field"><label for="repeatPassword">Powtórz hasło</label><input type="text" name="repeatPassword" placeholder="Powtórz hasło"></div>
                    <div class="field"><label for="regulations">Akceptuję regulamin</label><input type="checkbox" name="regulations"></div>
                    ';
                    if(isset($_SESSION['e_regulations'])) {
                        echo $_SESSION['e_regulations'];
                        unset($_SESSION['e_regulations']);
                    };
                    echo
                    '<button type="submit" class="ui button blue fluid"><i class="icon send"></i> Zarejestruj się</button>
                </form>
                </div>
            </div>
        </div>
        ';
        // Nieprawidłowy login lub hasło
        if(isset($_SESSION['blad'])) {
            echo $_SESSION['blad'];
        };
        echo
        '<div class="space20"></div>
    </div>
</div>
<div class="space90"></div>';
}
?>