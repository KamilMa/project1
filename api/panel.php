<?php
require_once 'connect.php';

$query = $link->query("SELECT * FROM home_content");
$home = $query->fetch_assoc();

$query_contact = $link->query("SELECT * FROM contact_content");
$contact = $query_contact->fetch_assoc();

$query_tpl = $link->query("SELECT * FROM tpl");
$tpl = $query_tpl->fetch_assoc();

?>