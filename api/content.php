<?php

require_once 'connect.php';


$type_query = $_POST['type'];

// 0 pobieranie danych
// 1 zapis danych
// 2 usuwanie danych

if($type_query==0) {

    // Tworzenie zajawki postu (lead)
    $wordsreturned = 5;
    function shorten_string($string, $wordsreturned) {
        $retval = $string;
        $array = explode(" ", $string);
        if (count($array)<=$wordsreturned) {
            $retval = $string;
        } else {
            array_splice($array, $wordsreturned);
            $retval = implode(" ", $array)." ...";
        }
            return $retval;
    }


    $query = $link->query("SELECT * FROM posts");
    echo
    ' <div class="ui container">
            <div class="ui stackable grid">
                <div class="space30"></div>';
    $count = 0;
    while ($row = $query->fetch_assoc()) {
    $string = $row['post_content'];
    $post_lead = shorten_string($string, $wordsreturned);
    $count++;
    echo
    '<div class="row">
        <div class="ui divider"></div>
            <div class="four wide column">
                <img src="img/blog/fot1.jpg" class="ui image blog-image" alt="">
            </div>
            <div class="six wide column">
                <div class="ui segment blog-segment">
                    <h3><a href="post.php?id=' . $row['id'] . '">' . $row['post_title'] . '</a></h3>
                    <p class="date"><i class="calendar icon"></i>' . $row['post_date'] . '</p>
                    <p>' . $post_lead . '</p>
                    <p class="comments">Komentarze 2 <i class="comment icon"></i></p>';
                    
                    if($count > 3) { echo '
                    <button class="ui button red circular icon edit-post"  onClick="loadModal(' . $row['id'] . ')"><i class="edit icon"></i></button>
                    <button class="ui button red circular icon delete-post" onClick="deletePost(' . $row['id'] . ')"><i class="trash icon"></i></button>
                    ';}
            echo '
            </div>
        </div>
    </div>';
    }

    echo
    '</div>
    <br>
    <button class="ui button goToTop" onclick="$(\'body\').animatescroll();"><i class="arrow circl up icon"></i>Wróć do góry</button>
    <br>
    </div>';
$link->close();

} else if ($type_query==1) {
    $title = $_POST['post-title'];
    $content = $_POST['post-content'];
    $date = $_POST['post-date'];
    $img = $_POST['post-image'];
    $query = $link->query("INSERT INTO posts(post_title,post_date,post_img,post_content) VALUE ('$title','$date','$img','$content')");

    if(!$query) {
        echo "Wystąpił błąd:" . $link->error;
    } else {
        echo "0";
        $query->free();
    }
    $link->close();

} else if ($type_query==2) {
    $id=$_POST['id'];

    $link->query("DELETE FROM posts WHERE id='$id'");
    $link->close();

} else if ($type_query==3) {
    $id = $_POST['id'];
    $query = $link->query("SELECT * FROM posts WHERE id='$id'");
    $data = $query->fetch_assoc();
    echo json_encode($data);

    $query->free();
    $link->close();

    // if(!$query) {
    //     echo "Wystąpił błąd:" . $link->error;
    // } else {
    //     echo "0";
    // }
} else if ($type_query==4) {
    $id = $_POST['post-id'];
    $title = $_POST['post-title'];
    $content = $_POST['post-content'];
    $date = $_POST['post-date'];
    // $img = $_POST['post-image'];
    $img = "test";

    $query = $link->query("UPDATE posts SET post_title='$title',post_date='$date',post_img='$img',post_content='$content' WHERE id='$id'");

    if (!$query) {
        echo "Wystąpił błąd" . $link->error;
    }
    // else {
    //     echo 0;
    // }
    $query->free();
    $link->close();

} else if ($type_query==5) {

    $header_text = $_POST['header_text'];
    $c_title1 = $_POST['c_title1'];
    $c_content1 = $_POST['c_content1'];
    $par_title1 = $_POST['par_title1'];
    $par_content1 = $_POST['par_content1'];
    $c_title2 = $_POST['c_title2'];
    $c_content2 = $_POST['c_content2'];
    $par_title2 = $_POST['par_title2'];
    $par_content2 = $_POST['par_content2'];

    $a_title1 = $_POST['a_title1'];
    $a_content1 = $_POST['a_content1'];
    $a_content2 = $_POST['a_content2'];
    $a_content3 = $_POST['a_content3'];
    $b_title1 = $_POST['b_title1'];
    $b_content1 = $_POST['b_content1'];
    $b_content2 = $_POST['b_content2'];
    $b_content3 = $_POST['b_content3'];

    $tpl_color = $_POST['tpl_color'];


    $query = $link->query("UPDATE home_content SET header_text='$header_text',c_title1='$c_title1',c_content1='$c_content1',par_title1='$par_title1',par_content1='$par_content1',c_title2='$c_title2',c_content2='$c_content2',par_title2='$par_title2',par_content2='$par_content2'");
    $query_contact = $link->query("UPDATE contact_content SET a_title1='$a_title1',a_content1='$a_content1',a_content2='$a_content2',a_content3='$a_content3',b_title1='$b_title1',b_content1='$b_content1',b_content2='$b_content2',b_content3='$b_content3'");
    $query_tpl = $link->query("UPDATE tpl SET tpl_color='$tpl_color'");
    $link->close();

    /* $queryErr1 = $query-> dokończyć, sprawdzanie trzech zapytań */
} else if ($type_query == 6) {

    $type_dish = 'type_dish';
    $all = $_POST['allDishes'];

    $startery_content;
    $zupy_content;
    $glowne_content;
    $salatki_content;
    $makarony_content;
    $napoje_content;

        if($type_dish == "startery" || $all == true) {
            $startery = $link->query("SELECT * FROM food_menu WHERE type_dish='startery'");
            $startery_content = "";
            $counti = 0;
            $liczbaPoj = 0;
            $liczbaPoj++;
            while($starter = $startery->fetch_assoc()) {
                                   $counti++;
                                   $startery_content .= '
                                   <div class="item">
                                   <div class="header">' . $starter['name'] . '.........<span class="price-style">' . $starter['price'] . '</span></div>
                                   ' . $starter['description'] . ($counti > 4 ? '
                                   <a class="edit-menu" onClick="editMenu(' . $starter['id'] . ')"><i class="edit icon"></i></a>
                                   <a type="submit" class="delete-menu" onClick="deleteMenu(' . $starter['id'] . ', \'startery\')"><i class="trash icon"></i></a> ' : '').
                                   '</div>';
                                    }
            $startery->free();
        }

        if($type_dish == "zupy" || $all == true) {
            $zupy = $link->query("SELECT * FROM food_menu WHERE type_dish='zupy'");
            $zupy_content = "";
            $counti = 0;
            while($zupa = $zupy->fetch_assoc()) {
                                $counti++;
                                $zupy_content .= '
                                <div class="item">
                                <div class="header">' . $zupa['name'] . '.........<span class="price-style">' . $zupa['price'] . '</span></div>
                                ' . $zupa['description'] . ($counti > 4 ? '
                                <a class="edit-menu" onClick="editMenu(' . $zupa['id'] . ')"><i class="edit icon"></i></a>
                                <a type="submit" class="delete-menu" onClick="deleteMenu(' . $zupa['id'] . ', \'zupy\')"><i class="trash icon"></i></a> ' : '').
                                '</div>';
                                 }
            $zupy->free();
        }

        if($type_dish == "glowne" || $all == true) {
            $glownee = $link->query("SELECT * FROM food_menu WHERE type_dish='glowne'");
            $glowne_content = "";
            $counti = 0;
            while($glowne = $glownee->fetch_assoc()) {
                                $counti++;
                                $glowne_content .= '
                                <div class="item">
                                    <div class="header">' . $glowne['name'] . '.........<span class="price-style">' .$glowne['price'] . '</span></div>
                                ' . $glowne['description'] . ($counti > 4 ? '
                                    <a class="edit-menu" onClick="editMenu(' . $glowne['id'] . ')"><i class="edit icon"></i></a>
                                    <a class="delete-menu" onClick="deleteMenu(' . $glowne['id'] . ', \'glowne\')"><i class="trash icon"></i></a> ' : '').
                                '</div>';
                                }
            $glownee->free();
        }

        if($type_dish == "salatki" || $all == true) {
            $salatki = $link->query("SELECT * FROM food_menu WHERE type_dish='salatki'");
            $salatki_content = "";
            $counti = 0;
            while($salatka = $salatki->fetch_assoc()) {
                                $counti++;
                                $salatki_content .= '
                                <div class="item">
                                    <div class="header">' . $salatka['name'] . '.........<span class="price-style">' . $salatka['price'] . '</span></div>
                                    ' . $salatka['description'] . ($counti > 4 ? '
                                    <a class="edit-menu" onClick="editMenu(' . $salatka['id'] . ')"><i class="edit icon"></i></a>
                                    <a class="delete-menu" onClick="deleteMenu(' . $salatka['id'] . ', \'salatki\')"><i class="trash icon"></i></a> ' : '').
                                '</div>';
                                }
            $salatki->free();
        }

        if($type_dish == "makarony" || $all == true) {
            $makarony = $link->query("SELECT * FROM food_menu WHERE type_dish='makaron'");
            $makarony_content = "";
            $counti = 0;
            while($makaron = $makarony->fetch_assoc()) {
                                    $counti++;
                                    $makarony_content .= '
                                    <div class="item">
                                        <div class="header">' . $makaron['name'] . '.........<span class="price-style">' . $makaron['price'] . '</span></div>
                                        ' . $makaron['description'] . ($counti > 4 ? '
                                        <a class="edit-menu" onClick="editMenu(' . $makaron['id'] . ')"><i class="edit icon"></i></a>
                                        <a class="delete-menu" onClick="deleteMenu(' . $makaron['id'] . ', \'makarony\')"><i class="trash icon"></i></a> ' : '').
                                    '</div>';
                                }
            $makarony->free();
        }

        if($type_dish == "napoje" || $all == true) {
            $napoje = $link->query("SELECT * FROM food_menu WHERE type_dish='napoje'");
            $napoje_content = "";
            $counti = 0;
            while($napoj = $napoje->fetch_assoc()) {
                                    $counti++;
                                    $napoje_content .= '
                                    <div class="item">
                                        <div class="header">' . $napoj['name'] . '.........<span class="price-style">' . $napoj['price'] . '</span></div>
                                        ' . $napoj['description'] . ($counti > 4 ? '
                                        <a class="edit-menu" onClick="editMenu(' . $napoj['id'] . ')"><i class="edit icon"></i></a>
                                        <a class="delete-menu" onClick="deleteMenu(' . $napoj['id'] . ', \'napoje\')"><i class="trash icon"></i></a> ' : '').
                                    '</div>';
                                }
            $napoje->free();
        }

    $dataArray = array(
    'startery_content' => $startery_content,
    'zupy_content' => $zupy_content,
    'glowne_content' => $glowne_content,
    'salatki_content' => $salatki_content,
    'makarony_content' => $makarony_content,
    'napoje_content' => $napoje_content
    );

    echo json_encode($dataArray);
    $link->close();

} elseif ($type_query == 7) {

    $id = $_POST['id'];
    $query = $link->query("SELECT * FROM food_menu WHERE id='$id'");
    $data = $query->fetch_assoc();
    echo json_encode($data);

    $query->free();
    $link->close();


} elseif ($type_query == 8) {

    $id = $_POST['id-dish'];
    $type_dish = $_POST['type-dish'];
    $name = $_POST['name-dish'];
    $price = $_POST['price-dish'];
    $description = $_POST['description-dish'];
    $query = $link->query("UPDATE food_menu SET name='$name',price='$price',description='$description' WHERE id='$id'");
   
    if (!$query) {
            // echo "Wystąpił błąd" . $link->error;
            echo 0;
        } else {
            echo  $type_dish;
        }
        
    $link->close();

} else if ($type_query==9) {
    $id=$_POST['id'];

    $link->query("DELETE FROM food_menu WHERE id='$id'");
    $link->close();

} elseif ($type_query == 10) {

    $type_dish = $_POST['type-dish'];
    $name = $_POST['name-dish'];
    $price = $_POST['price-dish'];
    $description = $_POST['description-dish'];

    $query = $link->query("INSERT INTO food_menu(name,description,price,type_dish) VALUE ('$name','$description','$price','$type_dish')");
    if (!$query) {
            echo 0;
        } else {
            echo $type_dish;
            $query->free();
        }
    $link->close();
}

?>
