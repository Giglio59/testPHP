<?php
include('eleve.php');


$bdd = new PDO('mysql:dbname=eleves;host=127.0.0.1', 'root', '');
$queryExec = $bdd->query("SELECT * FROM eleves");
$lesEleves = $queryExec->fetchAll();







?>
<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>

<body>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">nom</th>
                <th scope="col">prenom</th>
                <th scope="col">datDeNaissance</th>

            </tr>
        </thead>
        <tbody>
            <?php foreach ($lesEleves as $unEleve) : ?>
                <?php $elv = new eleve($unEleve['id'], $unEleve['nom'], $unEleve['prenom'], $unEleve['dateDeNaissance']); ?>
                <tr>
                    <td scope="row"><?php echo $elv->getId(); ?></td>
                    <td><?php echo $elv->getNom(); ?></td>
                    <td><?php echo $elv->getPrenom(); ?></td>
                    <td><?php echo $elv->getDatedeNaissance(); ?></td>
                    <td>
                        <a href="modifier.php?id=<?php echo $elv->getId(); ?>">
                            <i class="bi bi-pencil-square"></i> Modifier
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>