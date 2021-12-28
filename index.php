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

    $alphabet = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z');
    $_SESSION['mot'] = 'bonjour';
    // $mot = substr($_SESSION['mot'], 0, 3);
    // echo $mot;

    for ($i=0; $i<strlen($_SESSION['mot']); $i++) {
        echo '_' . ' ';
        $_SESSION['try'][$i] = '_';
    }

    echo '<form method="post">';
    foreach ($alphabet as $letter) {
        if (isset($_POST[$letter])) {
            echo '';
        } else {
        echo '<input type="submit" name="'.$letter.'" value="'.$letter.'">';
        }
    }
    echo '</form>';

    $played = [
        'played' => []
    ];

 
    for ($i=0; isset($_SESSION['mot'][$i]); $i++) {
        foreach ($_POST as $letter) {
            if ($_SESSION['mot'][$i] == $letter) {
                $played['played'][] = $letter;
                // echo $played['played'];
            }
        }
    }
    // var_dump($_SESSION['played']);
    // echo json_encode($played);
    


    ?>
    
  </main>

</body>
</html>