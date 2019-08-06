<?php
require_once 'connect.php';

$startery = $link->query("SELECT * FROM food_menu WHERE type_dish='startery'");
$zupy = $link->query("SELECT * FROM food_menu WHERE type_dish='zupy'");
$glownee = $link->query("SELECT * FROM food_menu WHERE type_dish='glowne'");
$salatki = $link->query("SELECT * FROM food_menu WHERE type_dish='salatki'");
$makarony = $link->query("SELECT * FROM food_menu WHERE type_dish='makaron'");
$napoje = $link->query("SELECT * FROM food_menu WHERE type_dish='napoje'");

?>