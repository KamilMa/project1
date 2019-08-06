<?php session_start();
?>
<!doctype html>
<html lang="pl">

<head>
    <meta name="theme-color" content="#0000">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kurs Semantic UI</title>
    <link rel="stylesheet" href="css/semantic.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <header>
        <div class="ui sidebar vertical left inverted icon menu">
            <a href="index.php" class="active item">O nas</a>
            <a href="menu.php" class="item">Nasze menu</a>
            <a href="blog.php" class="item">Blog</a>
            <a href="kontakt.php" class="item">Kontakt</a>
            <?php
            if((isset($_SESSION['logged'])) && ($_SESSION['logged']==true)) {
                echo '<a href="logout.php" class="item"><i class="icon red power off"></i> Wyloguj</a>';
            } else {
                echo '<a href="login.php" class="item">Zaloguj/Dołącz</a>';
            }
            ?>
        </div>
        <div class="ui basic icon top fixed menu mobile-menu">
            <a class="item" id="mobile-menu">
                <i class="sidebar icon"></i>
            </a>
        </div>
        <div class="space20"></div>
        <div class="ui container">
            <div class="ui grid custom-menu">
                <div class="five wide column">
                    <div class="header item">
                        <h1 class="ui header">Restauracja Thai Lo</h1>
                    </div>
                </div>

                <div class="ten wide column">
                    <div class="ui floated right secondary pointing menu">
                        <a href="index.php" class="active item">O nas</a>
                        <a href="menu.php" class="item">Nasze menu</a>
                        <a href="blog.php" class="item">Blog</a>
                        <a href="kontakt.php" class="item">Kontakt</a>
                        <?php
                        if((isset($_SESSION['logged'])) && ($_SESSION['logged']==true)) {
                            echo '<a href="logout.php" class="item"><i class="icon red power off"></i> Wyloguj</a>';
                        } else {
                            echo '<a href="login.php" class="item">Zaloguj/Dołącz</a>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="space40"></div>
        <div class="parallax-window header-image" data-parallax="scroll" data-image-src="img/header-img.jpg">
            <div class="ui container">
                <div class="ui grid">
                    <div class="five wide column">
                        <h2>Thai Cuisine</h2>
                    </div>
                </div>
            </div>
        </div>
    </header>
