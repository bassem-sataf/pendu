<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendu</title>
    <link rel="stylesheet" href="./pendu.css">
</head>
<body>
<<<<<<< HEAD

  <main>
    <h1>Jeux du pendu</h1>

    <?php

    session_start();
    $_SESSION['mot'] = 'aurevoir';  
    $played = [];
    // $alphabet = 'abcdefghijklmnopqrstuvwxyz';
    $alphabet = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z');

    
    
    echo '<form method="post">';
    
    for ($j=0; isset($alphabet[$j]); $j++) {
         if (!isset($_POST[$alphabet[$j]])) {
             $input = '<input type="submit" name="'.$alphabet[$j].'" value="'.$alphabet[$j].'">' . ' ';
             echo $input;
         } else {
             $_SESSION['letter'] = $_SESSION['letter'].$_POST[$alphabet[$j]];
             echo ' ' . $alphabet[$j] . ' ';
             $played[] = $_SESSION['letter'];
         }
    }

    echo '</form>';
    var_dump($played);
    
    $trueLetter = [];

    for ($k=0; isset($_SESSION['mot'][$k]); $k++) {
        foreach ($alphabet as $letter) {
            if ($_SESSION['mot'][$k] == $letter) {
                $trueLetter[] = $_SESSION['mot'][$k];
        } 
    }
}

=======
    <?php
    include('./header.php');
    ?>
    <main>  
        <div class="global">

            <?php 
            session_start();
            $fichier = file("mots.txt");
            $alphabet = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');

            require('./Pendu.php');
            $pendu = new Pendu;
            $pendu->choixMot($fichier);
            $prevmot = strtoupper($_SESSION['mot']);
            $mot = $pendu->retirerAccents($prevmot);
            
            $_SESSION['false'] = 0; 
            $_SESSION['true'] = 0;

            if(!isset($_SESSION['victoires'])){
                $_SESSION['victoires'] = 0;
            }
>>>>>>> 124c4454ea78196d4bf41feafbe9b6936ed686c4

            if(!empty($_GET) && $_GET['etat']=='jouer')
            {    
                if (isset($_POST["lettre"])) {
                $pendu->stockagedesLettres();
                }
                
                if(!empty($_SESSION['played'])){
                    $pendu->mauvaisesLettres($mot);
                }
                echo "<div class='glob'>";
                    echo '<form class="form" method="post">';
                        $pendu->affichageInput($alphabet);
                    echo '</form>';

<<<<<<< HEAD
    echo '<br/>';
    var_dump($trueLetter);
    
  ?>

  </main>
=======
                    echo "<div class='droite'>";
                        echo "<div class='tirets'>";
                            $pendu->affichageLettres($mot);
                        echo "</div>";
                        echo "<div class='dessin'>";
                            $false = $_SESSION['false']; 
                            if($false !=0){
                                echo "<img src='./assets/Le-Pendu ($false).png'>";
                            }
                        echo "</div>";
                    echo "</div>";
                echo "</div>";
                if($_SESSION['true']== strlen($mot)){
                    header("location:./index.php?etat=gagne");
                }
                if($_SESSION['false'] >= 8 ){
                    header("location:./index.php?etat=perdu");
                }
                
                echo "<p class='victoires'> nombre de victoires : $_SESSION[victoires]</p>";
                echo "<a class='recommencer' href='./Recommencer.php'>Nouveau Mot</a>";
            }
>>>>>>> 124c4454ea78196d4bf41feafbe9b6936ed686c4

            elseif(!empty($_GET) && $_GET['etat']=='perdu'){
                $pendu->partiePerdue($mot);
            }

            elseif(!empty($_GET) && $_GET['etat']=='gagne'){
                $pendu->partieGagne($mot);
            }

            else{
                $pendu->Accueil();
            }
            ?>
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

