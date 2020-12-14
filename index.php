<?php


require dirname( __DIR__ ) . '/discussions/require/php_/config.php' ;
//CSS + TITLE
$header_title = 'accueil';
$headerCss = 'css/header.css';
$header_css = 'css/index.css';
//PATH NAV
$discussion_path = 'pages/discussion.php';
$profil_path = 'pages/profil.php';
$accueil_path = 'index.php';
$img_accueil = 'images/lerieur.png';
$inscription_path = 'pages/inscription.php';
$connexion_path = 'pages/connexion.php';
//ID PAGES CSS
$id_page_header = 1;
//FOOTER
$footerCss = 'css/footer.css';
$image_dev = 'images/netero.png';

require_once('require/html_/header.php');


?>
<link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@800&display=swap" rel="stylesheet">

<main>

<section class="section_g">
<p> Cyberpunk addiction </p>
    <iframe width="360" height="170" src="https://www.youtube.com/embed/Y59YFmrb39g"
    frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

    <iframe width="360" height="170" src="https://www.youtube.com/embed/o9lT5MshbXI" 
    frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

    <iframe width="360" height="170" src="https://www.youtube.com/embed/q0z08OpmEPc"
    frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
<section>
</main>


<?php
require_once('require/html_/footer.php');

?>
