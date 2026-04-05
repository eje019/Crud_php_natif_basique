<?php
require_once 'connexion.php';

// ======================
// ÉTAPE 2 : Traiter la modification
// ======================
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sql = "UPDATE personnes 
            SET nom = :nom, email = :email 
            WHERE id = :id";
    
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':nom' => $_POST['nom'],
        ':email' => $_POST['email'],
        ':id' => $_POST['id']
    ]);
    
    header('Location: liste.php');
    exit;
}

// ======================
// ÉTAPE 1 : Afficher le formulaire pré-rempli
// ======================

// Vérifier qu'on a un id valide dans l'URL
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header('Location: liste.php');
    exit;
}

$id = $_GET['id'];

// Récupérer la personne à modifier
$sql = "SELECT * FROM personnes WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute([':id' => $id]);
$personne = $stmt->fetch(PDO::FETCH_ASSOC);

// Si l'id n'existe pas dans la base
if (!$personne) {
    header('Location: liste.php');
    exit;
}
?>

<!-- Formulaire pré-rempli -->
<form method="POST">
    <input type="hidden" name="id" value="<?= $personne['id'] ?>">
    
    <input type="text" name="nom" value="<?= $personne['nom'] ?>" required>
    <input type="email" name="email" value="<?= $personne['email'] ?>" required>
    
    <button type="submit">Modifier</button>
</form>

<a href="liste.php">Annuler</a>