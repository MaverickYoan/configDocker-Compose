<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un jeu</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Ajouter un jeu</h1>
    <nav>
        <a href="index.php">Accueil</a>
        <a href="catalogue.php">Catalogue</a>
        <a href="contact.php">Contact</a>
    </nav>
   
    <form action="add_game.php" method="POST" enctype="multipart/form-data">
        <input type="text" name="title" placeholder="Titre" required>
        <input type="text" name="genre" placeholder="Genre">
        <input type="date" name="release_date">
        <input type="file" name="image" accept="image/*" required>
        <button type="submit">Ajouter un jeu</button>
    </form>
   
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $title = $_POST['title'];
        $genre = $_POST['genre'];
        $release_date = $_POST['release_date'];
       
        // Gestion de l'upload d'image
        $target_dir = "upload/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
       
        // Vérifiez si l'image est un vrai fichier image
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check === false) {
            echo "Ce n'est pas une image.";
            $uploadOk = 0;
        }

        // Vérifiez si le fichier existe déjà
        if (file_exists($target_file)) {
            echo "Désolé, ce fichier existe déjà.";
            $uploadOk = 0;
        }

        // Limiter la taille du fichier
        if ($_FILES
