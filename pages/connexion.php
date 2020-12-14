<?php
// .prenom:focus
require_once('../require/php_/function.php');
$header_css = '../css/connexion.css';
$header_title = 'Connexion';
$headerCss = '../css/header.css';

$id_page_header = 7;

$discussion_path = 'discussion.php';
$profil_path = 'profil.php';
$inscription_path = 'inscription.php';
$connexion_path = 'connexion.php';

$accueil_path = '../index.php';
$img_accueil = '../images/lerieur.png';

require_once('../require/html_/header.php');


?>
<main>
<section class="section_form">
        <form action="connexion.php" class="form_edited" method="post">

            <label for="login">Identifiant</label>
            <input type="text" id="login2" class="text" name="login">       <!-- class text-->

            <label for="password">Mot de passe</label>
            <input type="password" id="password2" class="password" name="password">     <!-- class password-->

            <input type="submit" id="sub1" class="deco_main" name="connect">        <!-- Bouton vert -->
        </form>
    </section>
    <?php
        if(isset($_POST['connect']))
            echo"<section class='section_result'>",  connexion($_POST['login'], $_POST['password'], $bdd);"</section>"; 
            
        ?>
</main>

<?php
$image_dev = '../images/netero.png';
$footerCss = '../css/footer.css';
$footer_deco = '../require/php_/deconnexion.php';
require_once("../require/html_/footer.php");
?>