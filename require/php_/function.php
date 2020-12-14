<?php
require_once('config.php');
//------------------------------------------------------------REDIRECT---------------------------------------------------------------
function redirect($destination){ // permet de centraliser les redirections au lieu d'en mettre partout et que ça créer des conflit
    header('Location: '. $destination);
}

function inscription($login, $password, $confirm_password, $bdd){ // fonction inscriptin
    if(isset($_POST['register'])){
        $login = $_POST['login'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];
        $errorLog = null;
        if(!empty($login) && !empty($password) && !empty($confirm_password)){ // si les champs sont vides alors $errorLog

            $login_length = strlen($login);
            $password_length = strlen($password);
            $confirm_password_length = strlen($confirm_password);
            if(($login_length >=2) && ($password_length  >=5) && ($confirm_password_length >=4)){ // si les champs n'ont pas assez de caractere alors $errorLog

                $query = mysqli_query($bdd, "SELECT login FROM utilisateurs WHERE login = '$login'");
                $count = mysqli_num_rows($query);

                if(!$count){ // si l'identifiant existe déjà alors $errorLog
                    if($confirm_password == $password) // si le mdp != confirm mdp alors $errorLog
                    {
                        $login = mysqli_real_escape_string($bdd,htmlspecialchars( trim($login))); // on enleve les espace, les \n -> string et caractere non affichable 
                        $password = mysqli_real_escape_string($bdd, htmlspecialchars(trim($password)));
                        $confirm_password = mysqli_real_escape_string($bdd, htmlspecialchars(trim($confirm_password)));
                        
                        $cryptedpass = password_hash($password, PASSWORD_BCRYPT); // CRYPTED 
                        $insert = "INSERT INTO utilisateurs (login, password) VALUES ('$login', '$cryptedpass')"; // insertion de l'inscription dans la $bdd
                        mysqli_query($bdd,$insert);
                        redirect('connexion.php'); // on configure la valeur de redirect qui est une variable de type string a la base
                    }
                else{
                    $errorLog = "Confirmation du mot de passe incorrect";
                    }
                }
            else{
                $errorLog = "Identifiant déjà existant";
                }
            }
            else{
                $errorLog = "login, doit avoir 2 caracteres minimum, le mdp doit avoir 5 caracteres minimum";
            }
        }        
        else{
            $errorLog = "Champs non remplis";
            }
    }
    else{
        $errorLog = "Erreur inconnue";
        }   
    echo $errorLog;
}
//                
function connexion($login, $password, $bdd){
    $login = mysqli_real_escape_string($bdd, htmlspecialchars(trim($login))); // on enleve les espace, les \n -> string et caractere non affichable 
    $password = mysqli_real_escape_string($bdd, htmlspecialchars(trim($password)));
    $errorLog = null;
    
    if(!empty($login) && !empty($password)){ // il faut remplir les champs sinon $errorLog
            
        $verification = mysqli_query($bdd, "SELECT password FROM utilisateurs WHERE login = '$login' "); // on repere le mdp crypté a comparer avec celui entré par l'utilisateur
        $count = mysqli_num_rows($verification);
        $query_all = mysqli_query($bdd, "SELECT * FROM utilisateurs WHERE login = '$login'"); // on récupère toutes les données pour les mettre dans une $_SESSION
        
        if($count){ // l'identifiant est - il reconnu par la bdd ? 
            $utilisateur = mysqli_fetch_assoc($query_all);
            $result = mysqli_fetch_assoc($verification);

            if(password_verify($password, $result['password'])){ 
                $_SESSION['connected'] = true;     
                $_SESSION['utilisateur'] = $utilisateur; // la carte d'identité de l'utilisateur à été créer et initialisé dans une $_SESSION
                
                if($login == 'admin'){  // Si l'identifiant est == admin  alors on créer une session qui lui permettra d'acceder la page admin
                    $_SESSION['admin'] = true;
                }
                else{
                    $_SESSION['admin'] = false; // sinon on emet un valeur pour etre sur qu'il n'y accedera pas par le header
                }
                redirect('profil.php');
            }
            else{
                $errorLog = "Mot de passe incorrect";
            }
        }
        else{
            $errorLog = "Identifiant incorrect";
        }
    }
    else{
        $errorLog = "Veuillez entrer des caracteres dans les champs";
    }
    echo $errorLog; // on aurait pu mettre un return mais flemme :-) pour un prochain projet

}

//--------------------------------------------------------------------PROFIL-----------------------------------------------------------------------------//

function profil($login, $password, $confirm_password, $bdd){

    $login = mysqli_real_escape_string($bdd, htmlspecialchars(trim($login)));
    // on enleve les espace, les \n -> string et caractere non affichable 
    $password = mysqli_real_escape_string($bdd, htmlspecialchars(trim($password)));
    $confirm_password = mysqli_real_escape_string($bdd, htmlspecialchars(trim($confirm_password)));
    $errorLog = null;

    if (!empty($login) && !empty($password) && !empty($confirm_password)) { // il faut entrer des modifications pour les appliquer 

        $login_lenght = strlen($login);
        $password_lenght = strlen($password);
        
        if(($login_lenght >=2) && ($password_lenght >=5) <=30){ // limitation du nbr de caractere minimum et maximum 
        
            $query = mysqli_query($bdd, "SELECT * FROM utilisateurs WHERE id = '$login'"); // on selectionne le bon utilisateur par rapport à sa connexion
            // 
            $fetch = mysqli_fetch_assoc($query);//????

            $verification = mysqli_query($bdd, "SELECT password FROM utilisateurs WHERE login = '$login' "); // on repere le mdp crypté a comparer avec celui entré par l'utilisateur
            $count = mysqli_num_rows($verification);

            if(!$count){ // l'identifiant est - il reconnu par la bdd ? 

                if($confirm_password == $password){     
            
                    $cryptedpassword =  password_hash($password, PASSWORD_BCRYPT); // on recrypte le nouveau mdp 
                    $utilisateur = $_SESSION['utilisateur']; 
                    $update = mysqli_query($bdd,"UPDATE utilisateurs SET login = '$login', password = '$cryptedpassword' WHERE id = '". $utilisateur['id']. "'"); //update des identifiants
                    echo ("les modifications on bien été effectuées");

                }
                else{
                    $errorLog = "Confirmation du mot de passe incorrect";
                }
            }
            else{
                $errorLog = "identifiant déjà pris";
            }

        }
        else{
            $errorLog = "2 caracteres minimum pour le login et 5 pour le mot de passe";
            }
    }
    else{
        $errorLog = "Veuillez entrer des caracteres dans les champs";
        }
        echo $errorLog;
}

function discussion($messages, $id_utilisateur, $bdd){
if(isset($_POST['submit']))
{ //si on appuie sur envoyer, $_POST prend un nouveau prénom dans son tableau 
    $_SESSION['messages'] = $messages = mysqli_real_escape_string($bdd, htmlspecialchars(trim($messages)));
    $errorLog = null;
    
    
    if(strlen($messages) <= 140){
        $utilisateur = $_SESSION['utilisateur'];
        $id = $utilisateur['id'];
        $query = "INSERT INTO messages (messages, id_utilisateur, date) VALUES ('$messages' , '$id', NOW() ) "; // les heures minutes seconde ne s'affichent pas
        $sql_messages = mysqli_query($bdd, $query);                                                            // alors que ça marchait dans mon precedent projet
      
        echo "Votre commentaire à bien été envoyé";
        redirect('discussion.php');
    }
    else{
        
        $errorLog = "La limite du nombre de caracteres est de 140.";
    }
}
echo $errorLog;
}

function discussion_display ($bdd){

$sql_recuperation = "SELECT u.login, m.date, m.messages FROM utilisateurs AS u 
INNER JOIN messages AS m WHERE m.id_utilisateur = u.id ORDER BY m.date DESC"; // je récupère les données qui m'interesse
$sql_result = mysqli_query($bdd ,$sql_recuperation);


while($messages_display = mysqli_fetch_assoc($sql_result)){//je les imprime depuis un tableau 
    echo "<section class='element_messages'><p class='p_pseudo'>". htmlspecialchars($messages_display['login']). "</p>
    <p class='p_date'>" . htmlspecialchars($messages_display['date']). "</p>
    <p class='p_messages'>" . htmlspecialchars($messages_display['messages']) . "</p></section>";
}
}





    ?>