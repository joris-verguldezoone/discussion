<?php
require('../require/php_/function.php');
$header_css = '../css/profil.css';
$header_title = 'profil';
$headerCss = '../css/header.css';

$id_page_header = 9;

$discussion_path = 'discussion.php';
$profil_path = 'profil.php';
$accueil_path = '../index.php';
$img_accueil = '../images/lerieur.png';
$inscription_path = 'inscription.php';
$connexion_path = 'connexion.php';

require('../require/html_/header.php');
$utilisateur = $_SESSION['utilisateur'];
?>
<main>
<section class="section_form">
        <form action="profil.php" class="form_edited" method="post">
            <label for="login">Nouvel Identifiant</label>
            <input type="text" id="login3" class="text" name="login" value="<?php echo $utilisateur['login'];?>">       <!-- class text-->

            <label for="password">Nouveau mot de passe</label>
            <input type="password" id="password3" class="password" name="password">     <!-- class password-->

            <label for="confirm_password">Confirmation du nouveau mot de passe</label>
            <input type="password" id="confirm_password3" class="password" name="confirm_password">

            <input type="submit" id="sub1" class="deco_main" name="update" value="mettre à jour">       <!-- Bouton vert -->
        </form>
    </section>
    <?php
        if(isset($_POST['update'])){
            echo"<section class='section_result'>", profil($_POST['login'], $_POST['password'], $_POST['confirm_password'], $bdd), "</section>"; 
        }
        ?>
</main>
        
        
<?php
$image_dev = '../images/netero.png';
$footerCss = '../css/footer.css';
include("../require/html_/footer.php");
?>