<?php

class Pendu{

    public $played;

    public function partiePerdue($mot)
    {
        echo "<div class='msg'> vous avez perdu ... Le mot était <br><span class='mot'> $mot </span> </div><a class='recommencer' href='./Recommencer.php'>Recommencer</a>";
        echo "<img src='./assets/Le-Pendu (8).png'>";
        session_destroy();
        exit();
    }

    public function partieGagne($mot)
    {
        echo "<div class='msg'> vous avez gagné ... le mot était bien <br> $mot </div><a class='recommencer' href='./Recommencer.php'>Recommencer</a>";
        session_destroy();  
        exit();
    }

    public function choixMot($fichier)
    {
        if(!isset($_SESSION['mot'])){
            $_SESSION['mot'] = rtrim($fichier[array_rand($fichier)]);
        }
    }

    public function stockagedesLettres()
    {
        $pletter = $_POST["lettre"];
        $_SESSION['played'][]=$pletter;
    }

    public function mauvaisesLettres($mot)
    {
        $played = $_SESSION['played'];
        $this->played = $played;
                
            for($k=0; isset($played[$k]); $k++){
                if(!in_array($played[$k], str_split($mot))){
                    $_SESSION['false']++;
                }
            }
    }

    public function affichageInput($alphabet)
    {
        for($i=0; isset($alphabet[$i]); $i++ )
            {
                if(!empty($this->played) && in_array($alphabet[$i], $this->played ))
                {
                    echo "";
                }
                else
                {
                    echo '<input type="submit" name="'."lettre".'" value="'.$alphabet[$i].'">';
                }
            }
    }

    public function affichageLettres($mot)
    {
        for ($j=0; isset($mot[$j]); $j++) {
            if(!empty($this->played) && in_array($mot[$j], $this->played)){
                $_SESSION['true']++;
                echo "$mot[$j]";
            }
            else{
                echo "<span class='tirets'>_ </span>";
            }      
        }
    }



}