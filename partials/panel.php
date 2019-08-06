<?php
if(!isset($_SESSION['loggedd'])) {
    header('Location:../index.php');
    exit();
}
require_once 'api/panel.php';
?>

<div class="space40"></div>
<div class="ui container">
    <h1 class="ui header centered"><i class="icon edit"></i> Panel administracyjny</h1>
    <p><i class="user icon"></i>Jesteś zalogowany jako: <strong><?php echo $_SESSION['name']; ?></strong></p>
    <div class="ui segment">
        <form class="ui form" id="form-save-content" action="" method="post">
             <h1 class="ui header">Strona główna</h1>
            <div class="space10"></div>
            <div class="two fields">
                <div class="field">
                    <input type="text" name="header_text" value="<?php echo $home['header_text'] ?>" placeholder="Home image header text">
                    </div>
                <div class="field img-form">header-image
                    <img src="img/header-img.jpg" class="ui top aligned small image"><span class="form-img-label"> Zdjęcie w headerze.</span>
                </div>
            </div>
            <div class="space10"></div>
            <div class="ui divider"></div>

            <div class="space10"></div>
            <div class="two fields">
                <div class="field">
                    <input type="text" name="c_title1" value="<?php echo $home['c_title1'] ?>" placeholder="Home image header text">
                    <div class="space10"></div>
                    <textarea name="c_content1" placeholder="Column content"><?php echo $home['c_content1'] ?></textarea>
                </div>
                <div class="field">
                    <div class="ui segment images-form">content-image1, content-image2
                        <img src="img/header-img.jpg" class="ui top aligned small image">
                        <img src="img/header-img.jpg" class="ui top aligned small image">
                    </div>
                </div>
            </div>
            <div class="space10"></div>
            <div class="ui divider"></div>

            <div class="space10"></div>
            <div class="two fields">
                <div class="field">
                    <input type="text" name="par_title1" value="<?php echo $home['par_title1'] ?>" placeholder="Home image header text">
                    <div class="space10"></div>
                    <textarea name="par_content1" value="<?php echo $home['par_content1'] ?>" placeholder="Home image header text">consectetur adipisicing elit. Doloremque sed debitis omnis voluptates assumenda quisquam culpa expedita dignissimos ullam velit. Explicabo accusamus iusto exercitationem odio veritatis, temporibus natus, modi blanditiis!</textarea>
                </div>
                <div class="field img-form">
                    <div class="ui segment images-form">
                        <img src="img/header-img.jpg" class="ui top aligned small image"><span class="form-img-label"> Zdjęcie parallaxa środek strony.</span>
                    </div>
                </div>
            </div>
            <div class="space10"></div>
            <div class="ui divider"></div>

            <div class="space10"></div>
            <div class="two fields">
                <div class="field">
                    <div class="ui segment images-form">
                        <img src="img/header-img.jpg" class="ui top aligned right floated small image">
                    </div>
                </div>
                <div class="field">
                    <input type="text" name="c_title2" value="<?php echo $home['c_title2'] ?>" placeholder="Home image header text">
                    <div class="space10"></div>
                    <textarea name="c_content2" placeholder="Column content"><?php echo $home['c_content2'] ?></textarea>
                </div>
            </div>
            <div class="space10"></div>
            <div class="ui divider"></div>

            <div class="space10"></div>
            <div class="two fields">
                <div class="field">
                    <input type="text" name="par_title2" value="<?php echo $home['par_title2'] ?>" placeholder="Home image header text">
                    <div class="space10"></div>
                    <input type="text" name="par_content2" value="<?php echo $home['par_content2'] ?>" placeholder="Home image header text">
                </div>
                <div class="field img-form">
                    <div class="ui segment images-form">
                        <img src="img/header-img.jpg" class="ui top aligned small image"><span class="form-img-label"> Zdjęcie parallaxa dół strony.</span>
                    </div>
                </div>
            </div>

            <div class="space10"></div>
            <h1 class="ui header">Strona kontakt</h1>
            <div class="space10"></div>
            <div class="two fields">
                <div class="field">
                     <input type="text" name="a_title1" value="<?php echo $contact['a_title1'] ?>" placeholder="Home image header text">
                     <div class="space10"></div>
                     <input type="text" name="a_content1" value="<?php echo $contact['a_content1'] ?>" placeholder="Home image header text">
                     <div class="space10"></div>
                     <input type="text" name="a_content2" value="<?php echo $contact['a_content2'] ?>" placeholder="Home image header text">
                     <div class="space10"></div>
                     <input type="text" name="a_content3" value="<?php echo $contact['a_content3'] ?>" placeholder="Home image header text">
                </div>
                <div class="field">
                    <input type="text" name="b_title1" value="<?php echo $contact['b_title1'] ?>" placeholder="Home image header text">
                    <div class="space10"></div>
                    <input type="text" name="b_content1" value="<?php echo $contact['b_content1'] ?>" placeholder="Home image header text">
                    <div class="space10"></div>
                    <input type="text" name="b_content2" value="<?php echo $contact['b_content2'] ?>" placeholder="Home image header text">
                    <div class="space10"></div>
                    <input type="text" name="b_content3" value="<?php echo $contact['b_content3'] ?>" placeholder="Home image header text">
                </div>
            </div>

            <div class="space10"></div>
            <h1 class="ui header">Kolor szablonu</h1>
            <div class="space10"></div>
            <div class="field">
                <select class="ui fluid search dropdown" name="tpl_color">
                    <option <?php if($tpl['tpl_color']==1) echo "selected" ?> value="1">Złoty</option>
                    <option <?php if($tpl['tpl_color']==2) echo "selected" ?> value="2">Niebieski</option>
                </select>
            </div>

            <div class="space20"></div>
            <input type="hidden" name="type" value="5">
            <button type="submit" class="ui blue right floated button">Zapisz zmiany</button>
            <div class="ui hidden clearing divider normal-divider"></div>
        </form>
    </div>
</div>
<div class="space40"></div>