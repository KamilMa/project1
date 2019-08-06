<?php

require_once 'api/connect.php';


/* counting posts */
$query = $link->query("SELECT * FROM posts");
$num_posts = $query->num_rows;

 if((isset($_SESSION['loggedd'])) && $_SESSION['loggedd']==true) {

    // Dodawanie nowego postu
    echo
        "<div class=\"space40\"></div>
        <div class=\"ui container\">
            <h1 class=\"ui horizontal divider header\">
                <i class=\"icon comments\"></i> Blog (" . $num_posts . ")
            </h1>
            <div class=\"ui segment piled\">
            <h2 class=\"ui header centered\"><i class=\"icon pencil\"></i>Dodawanie wpisu</h2>
            <form class=\"ui form\" method=\"post\" action=\"\" name=\"add-post\" id=\"add-post\">
                <div class=\"two fields\">
                    <div class=\"field\">
                        <textarea name=\"post-image\">Dodaj zdjęcie</textarea>
                    </div>
                    <div class=\"field\">
                        <input type=\"text\" name=\"post-title\" placeholder=\"Podaj tytuł\">
                        <div class=\"space10\"></div>
                        <input type=\"text\" name=\"post-date\" placeholder=\"Podaj datę\">
                    </div>
                </div>
                <div class=\"field\">
                    <textarea name=\"post-content\">Treść postu</textarea>
                    <input type=\"hidden\" name=\"type\" value=\"1\">
                </div>
                <button type=\"submit\" class=\"ui button red\"><i class=\"icon send\"></i> Dodaj wpis</button>
            </form>
            </div>
        </div>";
    };
?>

<!--=========== Modal post edit ==========-->
<div class="ui modal editt">
  <i class="close icon"></i>
  <div class="header">
    Edytuj post
  </div>
    <div class="content">
        <form class="ui form" id="edit-post" action="" method="post">
            <div class="field">
                 <label>Tytuł</label>
                 <input type="text" name="post-title" id="post-title" value="">
            </div>
            <div class="two fields">
                <div class="field">
                    <label>Zdjęcie</label>
                    <textarea name="post-image" id="post-image" placeholder="Dodaj zdjęcie"></textarea>
                </div>
                <div class="field">
                    <label>Autor</label>
                    <input type="text" name="post-author" id="post-author" value="">
                    <div class="space20"></div>
                    <label>Data publikacji</label>
                    <input type="text" name="post-date" id="post-date" value="">
                </div>
            </div>
            <div class="field">
                <label>Treść</label>
                <textarea name="post-content" id="post-content"></textarea>
            </div>
            <input type="hidden" name="type" value="4">
            <input type="hidden" name="post-id" id="post-id" value="">
            <button type="submit" class="ui positive button" id="editPost"> Zapisz zmiany !</button>
        </form>
    </div>
</div>

<!--=========== /Modal post edit ==========-->

<div class="space40"></div>
<div class="clearClass"></div><br>
<section class="blog-content">
    <!--==== Post wrapper =====-->
    <div class="posty"></div>

</section>

<div class="space40"></div>
