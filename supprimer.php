<?php
require_once 'connexion.php';

// Vérifier que l'id est présent et est un nombre
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    // Pas d'id valide → on retourne à la liste
    header('Location: liste.php');
    exit;
}

$id = $_GET['id'];

// Requête préparée pour supprimer
$sql = "DELETE FROM personnes WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute([':id' => $id]);

// Rediriger vers la liste
header('Location: liste.php');
exit;
?>