<?php get_header('Liste des films', 'admin'); ?>

<h2>Liste des films</h2>

<a href="<?= $router->generate('listMovies'); ?>" class="btn btn-success">Ajouter un nouveau film</a>

<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th scope="col">Titre</th>
            <th scope="col">Release date</th>
            <th scope="col">Duration</th>
            <th scope="col">Synopsis</th>
            <th scope="col">Casting</th>
            <th scope="col">Note presse</th>
        </tr>""
    </thead>
    <tbody>
        <?php foreach ($movies as $movie) { ?>
            <tr>
                <td class="align-middle"><?= $user->email; ?></td>
                <td class="text-center align-middle">
                    <a href="<?= $router->generate('editUser', ['id' =>  $user->id]); ?>">Editer</a>
                    <a href="<?= $router->generate('deleteUser', ['id' =>  $user->id]); ?>">Supprimer</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<?php get_footer('admin'); ?>