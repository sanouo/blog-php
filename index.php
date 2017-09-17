<!doctype html>
<html class="no-js" lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Blog-PHP</title>
        <meta name="description" content="blog sur le langage php">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->

        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="icon" href="favicon.ico">
        <link href="https://fonts.googleapis.com/css?family=Frijole" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Frijole|Roboto" rel="stylesheet">

    </head>
    <body>
        <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

        <!-- Add your site or application content here -->

        <header>
          <h1>BLOG</h1>
        </header>

        <?php
           try
           {
           $bdd = new PDO('mysql:host=localhost;dbname=blogexo;charset=utf8', 'phpmyadmin', 'sana15');
           }
           catch (Exception $e)
           {
               die('Erreur : ' . $e->getMessage());
           }



           $reponse = $bdd->query('SELECT * FROM billets LIMIT 0, 5');
    while ($donnees = $reponse->fetch())
    {
    ?>

    <div class="article">
            <p class="titr"><?php echo htmlspecialchars($donnees['titre']); ?></p> <br>
            <p class="conten"><?php echo htmlspecialchars($donnees['contenu']); ?> </p> <br>
            <p class="dat"><?php echo htmlspecialchars($donnees['date_creation']); ?></p>
            <a href="commentaires.php?recupinfo=<?php echo $donnees['id']; ?>">Commentaires</a>
          </div>

    <?php
    }
    $reponse->closeCursor();
    ?>




        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
        <script src="https://code.jquery.com/jquery-{{JQUERY_VERSION}}.min.js" integrity="{{JQUERY_SRI_HASH}}" crossorigin="anonymous"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-{{JQUERY_VERSION}}.min.js"><\/script>')</script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>

        <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
        <script>
            window.ga=function(){ga.q.push(arguments)};ga.q=[];ga.l=+new Date;
            ga('create','UA-XXXXX-Y','auto');ga('send','pageview')
        </script>
        <script src="https://www.google-analytics.com/analytics.js" async defer></script>
    </body>
</html>
