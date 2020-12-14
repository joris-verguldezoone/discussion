<?php


// Coucou j'ai galéré a faire les chemins,
// j'aurais pu faire ça en :focus grâce au css
// Mais j'ai préféré galerer et pratiquer mon php :p 
echo"
<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>$header_title</title>
    <link rel='stylesheet' href='$headerCss'> 
    <link rel='stylesheet' href='$header_css'>
    <link href='https://fonts.googleapis.com/css2?family=Roboto&display=swap' rel='stylesheet'>

   
</head>

<body>

<header>
  <nav>
    <ul>
       <li ";
       switch($id_page_header)
       {
        case 1:
          echo" class='nav_case' ";
        break;
        default:
          echo" class='nav_case_neutral' ";
        break;
        }
        echo" ><a href='$accueil_path'><img src='$img_accueil' class='img_accueil' ></a></li>
    </ul>
    <ul>";
        
          echo" <li ";
if(!isset($_SESSION['connected'])){
          switch($id_page_header)
          {
            case 3:
              echo" class='nav_case' ";
            break;
            default:
              echo" class='nav_case_locked' ";
          break;
        }
          echo" ><a href='$discussion_path'>Discussion</a></li></a></li>
      
    </ul>";
      }
      else{
        switch($id_page_header)
        {
          case 3:
            echo" class='nav_case' ";
          break;
          default:
          echo" class='nav_case_neutral'";
        break;
      }
        echo" ><a href='$discussion_path'>Discussion</a></li></a></li>
    
  </ul>";
      }




  if(!isset($_SESSION['connected'])){                           // condition
    echo "<ul>";
        echo" <li ";
        switch($id_page_header){
          case 5:
            echo" class='nav_case ' ";
          break;
          default:
            echo" class='nav_case_neutral' ";
          break;
      }
      echo" ><a href='$inscription_path'>Inscription</a></li>
    </ul>
    <ul>";
        echo"<li ";
        switch($id_page_header) 
        {                                                 // connexion
          case 7: 
            echo" class='nav_case '";
          break;
          default:
            echo" class='nav_case_neutral '";
          break;
      }

      echo" ><a href='$connexion_path'>Connexion</a></li>
    </ul>";
  }  
  
  

  
  if(isset($_SESSION['connected'])){          //condition

    echo "<ul>";
        echo"<li ";     
        switch($id_page_header)
        {
          case 9:
            echo" class='nav_case'";
          break;
          default:
            echo" class='nav_case_neutral'";
          break;
        }
  

        echo "><a href='$profil_path'>Profil</a></li>
      </ul>";
      }
      echo "
    </nav>
</header>
";
?>