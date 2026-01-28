<?php

// ce code php est l'exemple pour se connecter au serveur pour la base de donnée et permet s'afficher du html

$servername = "localhost";
$username = "fourtt209"; 
$password = "ZV753"; 
$dbname = "4tt209.4tt2_09_creative"; 

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch styles from database
$sql = "SELECT id, name FROM styles ORDER BY name";
$result = $conn->query($sql);
$styles = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $styles[] = $row;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>TEXTA music - Artiste</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-image: url(bg.webp);
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        .center {
            background-color: transparent;
            border: rgba(255, 255, 255, 0.5) solid 1px;
            border-radius: 25px;
            padding: 25px;
            margin: 200px;
            backdrop-filter: blur(10px);
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1), 0px 0px 10px rgba(0, 0, 0, 0.05) inset;
        }
    </style>
</head>
<body>
    <div class="center">
        <h2>Créer vos données artiste</h2>
        <p>Veuillez insérer vos données artiste pour que le public puisse savoir qui vous êtes.</p>
        <form action="insert.php" method="POST">
            <!-- Name input -->
            Nom artiste / groupe :
            <input name="artist_name" required type="text"/>
            <br/><br/>

            <!-- Description input -->
            Description (factuel) :
            <input name="description" type="text"/>
            <br/><br/>

            <!-- Style selection -->
            Style de musique :
            <select name="style" required>
                <option value="">Sélectionnez un style</option>
                <?php foreach($styles as $style): ?>
                    <option value="<?php echo $style['id']; ?>"><?php echo htmlspecialchars($style['nom']); ?></option>
                <?php endforeach; ?>
            </select>
            <br/><br/>

            <!-- Submit button -->
            <input type="submit" value="Submit"/>
        </form>
    </div>
</body>
</html>
<?php
// Close the connection
$conn->close();
?>