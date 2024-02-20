<?php get_header('Liste des films', 'admin'); ?>
<!-- admin = layout -->

<h2>Liste des films</h2>

<a href="<?= $router->generate('addMovie'); ?>" class="btn btn-success">Ajouter un nouveau film</a>

<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th scope="col">Titre du film</th>
            <th scope="col">Modifier/supprimer</th>
    </thead>
    <tbody>

        <?php foreach ($movies as $movie) { ?>
            <tr>
                <td class="align-middle"><?= $movie['title']; ?>
</td>
        
                <td class="align-middle">
                    <a href="<?= $router->generate('editMovie', ['id' => $movie['id']]); ?>" class="btn btn-primary">Editer</a>
                    <a href="<?= $router->generate('deleteMovie', ['id' => $movie['id']]); ?>" class="btn btn-danger">Supprimer</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<?php get_footer('admin'); ?>