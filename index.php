<!DOCTYPE html>
<html lang="fr">
<head>
<<<<<<< HEAD
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./pendu.css">
</head>
<body>
    <?php
    include('./header.php');
    ?>
    <main>
        <div class="global">

            <?php 
            session_start();
            $fichier = file("mots.txt");
            $alphabet = array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z');

            require('./Pendu.php');
            $pendu = new Pendu;

            $pendu->choixMot($fichier);
            $mot = strtolower($_SESSION['mot']);
            
            $_SESSION['false'] = 0; 
            $_SESSION['true'] = 0;

            if(!empty($_GET) && $_GET['etat']=='perdu'){
                $pendu->partiePerdue($mot);
            }

            if(!empty($_GET) && $_GET['etat']=='gagne'){
                $pendu->partieGagne($mot);
            }

                
            if (isset($_POST["lettre"])) {
               $pendu->stockagedesLettres();
            }
            
            if(!empty($_SESSION['played'])){
                $pendu->mauvaisesLettres($mot);
            }
            
            echo "<span class='tirets'>";
            $pendu->affichageLettres($mot);
            echo "</span>";

            echo '<form class="form" method="post">';
            $pendu->affichageInput($alphabet);
            echo '</form>';

            if($_SESSION['true']== strlen($mot)){
                header("location:./index.php?etat=gagne");
            }

            if($_SESSION['false'] >= 8 ){
                header("location:./index.php?etat=perdu");
            }

            $false = $_SESSION['false']; 

            if($false !=0){
                echo "<img src='./assets/Le-Pendu ($false).png'>";
            }
            ?>

            <a class='recommencer' href="./Recommencer.php">Recommencer</a>

        </div>
    </main>
</body>
</html>





















































<?php
// $difference = array_diff($played, str_split($mot)); 
        // var_dump($difference);
     // if (isset($_POST["lettre"])) {
    //             $pletter = $_POST["lettre"];
    //             $_SESSION['played'][]=$pletter;
    //         }
    
    // // for($i=0; isset($alphabet[$i]); $i++ ) 
    // // {
    
        
    // // }  
    
    
    // for($j=0; isset($alphabet[$j]); $j++)
    // {
        
    //         for($l=0; isset($_SESSION['played'][$l]); $l++)
    //         {
    //             // echo "$_SESSION[played][$l]";
    //             if($alphabet[$j]== $_SESSION['played'][$l])
    //             {
    //                 echo "<p></p>";
    //             }
    //             else {
    //                  echo '<input type="submit" name="'."lettre".'" value="'.$alphabet[$j].'">';
    //             }
                   
                
    //         }
        
           
        
        
    // }   
    // var_dump($_SESSION);    
        
    //     // for($j=0; isset($result[$j]); $j++){
    //     //     if($alphabet[$i] == $result[$j]){
    //     //         echo "";
    //     //     }
    //     // }
    
     
    // // var_dump($result);

