<?php
$host = 'db';
$db   = 'game_catalog';
$user = 'your_user';
$pass = 'your_password';
$dsn = "pgsql:host=$host;dbname=$db";

try {
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Exemple d'insertion dans la table games
    $sql = "CREATE TABLE IF NOT EXISTS games (
              id SERIAL PRIMARY KEY,
              title VARCHAR(255) NOT NULL,
              genre VARCHAR(255),
              release_date DATE
            )";
    $pdo->exec($sql);

    // Ajouter un jeu (Ceci est juste un exemple à remplacer par vos propres logiques)
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $title = $_POST['title'];
        $genre = $_POST['genre'];
        $release_date = $_POST['release_date'];
       
        $stmt = $pdo->prepare("INSERT INTO games (title, genre, release_date) VALUES (?, ?, ?)");
        $stmt->execute([$title, $genre, $release_date]);
    }

    // Afficher les jeux
    $stmt = $pdo->query("SELECT * FROM games");
    $games = $stmt->fetchAll(PDO::FETCH_ASSOC);
   
    echo '<h1>Catalogue de jeux vidéo</h1>';
    echo '<form method="POST">
            <input type="text" name="title" placeholder="Titre" required>
            <input type="text" name="genre" placeholder="Genre">
            <input type="date" name="release_date">
            <button type="submit">Ajouter un jeu</button>
          </form>';
         
    echo '<ul>';
    foreach ($games as $game) {
        echo '<li>' . htmlspecialchars($game['title']) . ' - ' . htmlspecialchars($game['genre']) . ' (' . htmlspecialchars($game['release_date']) . ')</li>';
    }
    echo '</ul>';
   
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
 
<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Accueil - Catalogue de jeux vidéo</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Bienvenue sur le catalogue de jeux vidéo</h1>
    <nav>
        <a href="catalogue.php">Catalogue</a>
        <a href="add_game.php">Ajouter un jeu</a>
        <a href="contact.php">Contact</a>
    </nav>
</body>
</html>
 
