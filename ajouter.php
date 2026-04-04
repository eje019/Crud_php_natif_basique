<?php
require_once "connexion.php";

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $sql = "INSERT INTO personnes (nom, email) VALUES (:nom, :email)";
    $stmt = $pdo -> prepare($sql);
    $stmt->execute([
        ":nom" => $_POST['nom'],
        ":email" => $_POST["email"]
    ]);

    header("Location: liste.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout d'un utilisateur</title>
</head>
<body>
    <form action="" method="POST">
        <input type="text" name="nom" placeholder="Entrez votre Nom">
        <label for="name">Name :</label>
        <input type="text" name="email" placeholder="ntrez votre mail">
        <label for="email">Email :</label>
        <button type="submit">Ajout un utilisateur</button>
    </form>
    <a href="liste.php">Voir la liste</a>
</body>

</html>