<?php get_header('Accueil'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="public/css/reset.css">
    <link rel="stylesheet" href="public/css/style.css">

</head>

<body>
    <h1>Tous nos films de Noël disponibles</h1>
    <?php foreach ($movies as $movie) { ?>
        <article class="movie">
            <div class="movieInfo">
                <div>
                    <h2><?php echo $movie->title; ?></h2>
                    <p>Date de sortie: <?php echo $movie->releaseDate; ?></p>
                </div>
            </div>
        </article>
        
    <?php } ?>

    <h2>Tous les nouveaux films</h2>
    <?php foreach ($movies as $movie) { ?>
        <article class="movie">
            <div class="movieInfo">
                <div>
                    <h2><?php echo $movie->title; ?></h2>
                    <p>Date de sortie: <?php echo $movie->releaseDate; ?></p>
                </div>
            </div>
        </article>
        
    <?php } ?>


    <?php get_footer(); ?>