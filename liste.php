<?php
require_once "connexion.php";

$sql = "SELECT * FROM personnes";
$stmt = $pdo->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Affichage des utilisateurs</title>
</head>
<body>
    <table border = 1>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)):?>
        <tr>
            <td><?= $row["id"] ?></td>
            <td><?= $row["nom"] ?></td>
            <td><?= $row["email"] ?></td>
            <td>
                <a href="modifier.php?id=<?= $row['id'] ?>">Modifier</a> |
                <a href="supprimer.php?id=<?= $row["id"] ?>" onclick="return confirm ('Vraiment supprimer ?')"> Supprimer</a>
            </td>
        </tr>

        <?php endwhile; ?>
    </table>
</body>
</html>

