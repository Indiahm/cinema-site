<?php get_header('edit', 'admin'); ?>

<body>


    <div class="container">
        <form action="" method="post">

            <h1>Ajouter un nouveau film</h1>
            <label for="nomFilm">Nom du film:</label>
            <input type="text" id="nomFilm" name="title" value="<?= getValue('title'); ?>">


            <label for="dateSortie">Date de sortie:</label>
            <input type="date" id="dateSortie" name="releaseDate" value="<?= getValue('releaseDate'); ?>">

            <label for="dureeFilm">Durée du film (minutes):</label>
            <input type="number" id="dureeFilm" name="duration" value="<?= getValue('duration'); ?>">

            <label for="dureeFilm">Casting:</label>
            <input type="text" id="castingFilm" name="casting" value="<?= getValue('casting'); ?>">

            <label for="notePress">Note de la presse:</label>
            <input type="number" id="notePress" name="notePress" value="<?= getValue('notePress'); ?>">

            <label for="description">synopsis:</label>
            <textarea id="description" name="synopsis" value="<?= getValue('synopsis'); ?>"></textarea>

            <input type="submit" value="Ajouter le film">
        </form>
    </div>

</body>

</html>


<?php get_footer('admin'); ?>