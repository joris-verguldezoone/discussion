<?php
require('../require/php_/function.php');
$header_css = '../css/discussion.css';
$header_title = 'discussion';
$headerCss = '../css/header.css';

    $id_page_header = 3;



$discussion_path = 'discussion.php';
$profil_path = 'profil.php';
$accueil_path = '../index.php';
$img_accueil = '../images/lerieur.png';
$inscription_path = 'inscription.php';
$connexion_path = 'connexion.php';
require('../require/html_/header.php');
$utilisateur = $_SESSION['utilisateur'];


if(!isset($_SESSION['connected']))
redirect('connexion.php');
?>
<main>
    <section class="messages_display">
        <article class="elemnt_messages">
            <?php
            discussion_display ($bdd);                  //affichage des commentaire
            ?>   
        </article>
</section>
    <section class="blank_section"></section>
    <section class="dicussion_form" >

        <form action="" method="POST" class="form_edited">
        <label for="message">Ajouter un message</label>
        <textarea maxlength="140" id="message_id" name="message"
          rows="5" cols="33" placeholder="140 caracteres max"></textarea>

          <input type="submit" id="submit4" name="submit" class="deco_main">
        
        </form>
    </section>
    <?php if(isset($_POST['submit']))
     echo"<section class='section_result'>", discussion($_POST['message'], $utilisateur['id'], $bdd) , "</section>"; ?>   <!-- ajout de commentaire -->
    

</main>
        
        
<?php
$image_dev = '../images/netero.png';
$footerCss = '../css/footer.css';
include("../require/html_/footer.php");
?>