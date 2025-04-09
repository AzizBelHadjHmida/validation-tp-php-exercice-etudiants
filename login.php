<?php
session_start();


if (isset($_GET['reset'])) {
    session_destroy();
    header("Location: login.php");
    exit;
}


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nom = $_POST['nom'];
    $notesInput = explode(",", $_POST['notes']);
    $notes = array_map('floatval', $notesInput);

    $_SESSION['etudiant'] = [
        'nom' => $nom,
        'notes' => $notes
    ];

    header("Location: etudiant.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion Étudiant</title>
    <link rel="stylesheet" href="login.css">    
</head>
<body style="font-family:Arial; padding:20px;">
    <h2>Connexion Étudiant</h2>
    <div>
    <form method="post">
        <label>Nom :</label>
        <input type="text" name="nom" required><br><br>

        <label>Notes (séparées par des virgules) :</label>
        <input type="text" name="notes" placeholder="ex: 11,13,10,8" required><br><br>

        <button type="submit"  >envoyer</button>
        <button type="reset" >effacer</button>
    </form>
    </div>
</body>
</html>
