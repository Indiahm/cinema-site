<?php

// function deleteUser()
// {

//     try {
//         global $db;
//         $sql = 'DELETE FROM users WHERE id = :id';
//         $query = $db->prepare($sql);
//         $query->execute(['id' => $_GET['id']]);

//         alert('L\utilisateur a bien été supprimé.', 'success');
//     } catch (PDOException $e) {
//         if ($_ENV['DEBUG'] == 'true') {
//             var_dump($e->getMessage());
//             die;
//         } else {
//             alert('Une erreur est survenue. Merci de réessayer plus tard. ', 'danger');
//         }
//     }
// }


function deleteUser()
{
    try {
        global $db;
        $sql = 'DELETE FROM users WHERE id = :id';

        $query = $db->prepare($sql);
        $query->execute(['id' => $_GET['id']]);
        
        // Vérifie si des lignes ont été affectées (une ligne doit être supprimée).
        if ($query->rowCount() > 0) {
            alert('L\'utilisateur a bien été supprimé.', 'success');
        } else {
            alert('Aucun utilisateur trouvé avec cet identifiant.', 'warning');
        }

    } catch (PDOException $e) {
        if ($_ENV['DEBUG'] == 'true') {
            var_dump($e->getMessage());
            die;
        } else {
            alert('Une erreur est survenue. Merci de réessayer plus tard. ', 'danger');
        }
    }
}





function getAlreadyExistId()
{
    try {
        global $db;
        $sql = 'SELECT id FROM users WHERE id = :id';
        $query = $db->prepare($sql);
        $query->execute(['id' => $_GET['id']]);

        return $query->fetch();
    } catch (PDOException $e) {
        if ($_ENV['DEBUG'] == 'true') {
            dump($e->getMessage());
            die;
        } else {
            alert('Une erreur est survenue. Merci de réessayer plus tard.', 'danger');
        }
    }
}


function countUsers()
{
    global $db;
    $sql = 'SELECT COUNT(*) FROM users';
    $query = $db->prepare($sql);
    $query->execute();

    return $query->fetchColumn();
}
