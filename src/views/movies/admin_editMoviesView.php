<?php get_header('edit', 'admin'); ?>

<body>
    
    <form action="" method="post" novalidate>

        <div class="container">
        <h2>Ajouter un nouveau film</h2>
        <form action="ajouter_film.php" method="post">
            <label for="nomFilm">Nom du film:</label>
            <input type="text" id="nomFilm" name="nomFilm" required>

            <label for="dateSortie">Date de sortie:</label>
            <input type="date" id="dateSortie" name="dateSortie" required>

            <label for="dureeFilm">Durée du film (minutes):</label>
            <input type="number" id="dureeFilm" name="dureeFilm" required>

            <label for="dureeFilm">Casting:</label>
            <input type="text" id="castingFilm" name="castingFilm" required>

            <label for="notePresse">Note de la presse:</label>
            <input type="number" id="notePresse" name="notePresse" step="0.1" min="0" max="10" required>

            <label for="description">Description:</label>
            <textarea id="description" name="description" rows="4" required></textarea>

            <label for="lienYoutube">Bande annonce YouTube:</label>
            <input type="url" id="lienYoutube" name="lienYoutube" placeholder="https://www.youtube.com/watch?v=" required>

            <input type="submit" value="Ajouter le film">
        </form>
    </div>

</body>

</html>


<?php get_footer('admin'); ?>