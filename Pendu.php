<?php

class Pendu{

    public $played;

    public function retirerAccents($mot)
	{
			$search  = array('À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'à', 'á', 'â', 'ã', 'ä', 'å', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ð', 'ò', 'ó', 'ô', 'õ', 'ö', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ');
			$replace = array('A', 'A', 'A', 'A', 'A', 'A', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'Y', 'a', 'a', 'a', 'a', 'a', 'a', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'y');

			$newmot = str_replace($search, $replace, $mot);
			return strtoupper($newmot); 
	}

    public function partiePerdue($mot)
    {
        echo "<div class='msg'> vous avez perdu ... Le mot était <br><span class='mot'> $mot </span> </div><a class='recommencer' href='./Recommencer.php'>Recommencer</a>";
        echo "<img src='./assets/Le-Pendu (8).png'>";
        exit();
    }

    public function partieGagne($mot)
    {
        echo "<div class='msg'> vous avez gagné ... le mot était bien <br> $mot </div><a class='recommencer' href='./Recommencer.php'>Nouveau Mot</a>";
        $_SESSION['victoires']++;
        echo "$_SESSION[victoires]";
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

    public function Accueil(){
        if(!empty($_SESSION['victoires'])){
            echo "<p class='bienvenue'> Bienvenue sur le jeu du Pendu Faites une partie :</p>";

            echo "<img src='./assets/pendu-accueil.png'>";
            echo "<a class='continuer' href='./index.php?etat=jouer'>Continuer</a>";  
            echo "<a class='nouvelleP' href='./NouvPartie.php'>Nouvelle partie</a>";  
        }
        else{
            echo "<p class='bienvenue'> Bienvenue sur le jeu du Pendu Faites une partie :</p>";
            echo "<img class='img-bienvenue' src='./assets/pendu-accueil.png'>";
            echo "<a class='nouvelleP' href='./NouvPartie.php'>Nouvelle partie</a>";  
        }
    }


}