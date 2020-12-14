<?php
require('../require/php_/function.php');
$header_css = '../css/inscription.css';
$header_title = 'Inscription';
$headerCss = '../css/header.css';

$id_page_header = 5;

$discussion_path = 'discussion.php';
$profil_path = 'profil.php';

$accueil_path = '../index.php';
$img_accueil = '../images/lerieur.png';

$inscription_path = 'inscription.php';
$connexion_path = 'connexion.php';

require('../require/html_/header.php');
$image_dev = '../images/netero.png';



?>
<main class="main_inscription">
    <section class="section_form">
        <form action="inscription.php" class="form_edited" method="post">
            
            <label for="login">Identifiant</label>
            <input type="text" id="login1" class="text" name="login">   <!-- class text -->

            <label for="password">Mot de passe</label>
            <input type="password" id="password1" class="password" name="password">    <!-- class password-->

            <label for="confirm_password">Confirmer le mot de passe</label>
            <input type="password" id="confirm_password1" class="password" name="confirm_password">

            <input type="submit" id="sub1" class="deco_main" name="register"> <!-- Bouton vert -->
        </form>
    </section>
    <?php
        if(isset($_POST['register']))
            echo"<section class='section_result'>",inscription($_POST['login'], $_POST['password'], $_POST['confirm_password'], $bdd);
            "</section>"; 
        ?>
  
</main>

<?php

$footerCss = '../css/footer.css';
include("../require/html_/footer.php");


?>