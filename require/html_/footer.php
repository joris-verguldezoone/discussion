<?php
if(isset($_SESSION['connected']))
$utilisateur = $_SESSION['utilisateur'];

echo"
<link rel='stylesheet' href='$footerCss'> 

<footer>
    <section class='article_signature'>
    <img alt='signature dev' src='$image_dev' class='img_signature'>
       <p class='font_signature'> HARDJOJO </p>
    </section>";
    if(isset($_SESSION['connected'])){
        echo "<article class='footer_deco'><p class='bjr_utilisateur p_cyber'> Bonjour ". strtoupper($utilisateur['login']) . "</p>"; // si on est connecté la class coucou nous fait coucou :-)
    
        // si on est connecté le bouton deconnexion apparait + son pseudo

        if($id_page_header == 1){                                       // chemin index->deconnexion
            echo" <form method='POST' action='pages/deconnexion.php'> 
            <input type='submit' class='deco' name='deconnexion' value='DECONNEXION'> 
            </form>";
        }
        else{                                                               // chemin depuis le dossier pages
            echo"<form method='POST' action='deconnexion.php'>          
            <input type='submit' class='deco' name='deconnexion' value='DECONNEXION'> 
            </form>
            </article>";
    }
}
echo"              
</footer>
</body>
</html>";?>

