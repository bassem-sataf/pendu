<!DOCTYPE html>
<html lang="fr">
<head>
  <!-- Google Fonts Pre Connect -->
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <!-- Meta Tags -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Fonts Links (Roboto 400, 500 and 700 included) -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap">

  <!-- CSS Files Links -->
  <link rel="stylesheet" href="./styles.css">

  <!-- Title -->
  <title>Jeux du pendu</title>
</head>
<body>

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



    echo '<br/>';
    var_dump($trueLetter);
    
  ?>

  </main>

</body>
</html>