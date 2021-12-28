<?php 
session_start();
$mot = "bonjour";
$_SESSION['lenght'] = strlen($mot);
$played = array();
$alphabet = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z');

    for ($k=0; $k<$_SESSION['lenght']; $k++) {
        echo '_' . ' ';
    }

    echo '<form method="post">';

    for($i=0; isset($alphabet[$i]); $i++ ) 
    {
        $j =0; 
        while(isset($_SESSION['played'][$j])){
            if($_SESSION['played'][$j]==$alphabet[$i]){
                echo "";
            }
            else{
                echo '<input type="submit" name="'.$alphabet[$i].'" value="'.$alphabet[$i].'">';
            }
            $j++;
        }  

        if (isset($_POST[$alphabet[$i]])) {
            $pletter = $_POST[$alphabet[$i]];
            $_SESSION['played'][]=$pletter;
        }
          
    }
    echo '</form>';
    

    ?>

    <a href="./Recommencer.php">Recommencer</a>


