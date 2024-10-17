<?php
include('includes/config.php');
include('includes/database.php');
include('includes/functions.php');

$conn = mysqli_connect('localhost', 'root', 'root', 'book-finder');
if (!$conn) {
    die("Erreur de connexion à la base de données: " . mysqli_connect_error());
}

if (!$conn) {
    die("Erreur de connexion à la base de données: " . mysqli_connect_error());
}

// Vérifier si le formulaire a été soumis
if (isset($_POST['login'])) {
    // Récupérer les données du formulaire
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Préparer la requête SQL pour vérifier les informations d'identification
    $query = "SELECT * FROM users WHERE email = '$email' AND password = '$password' ";
    $result = mysqli_query($conn, $query);

    // Vérifier si des résultats ont été renvoyés
    if (mysqli_num_rows($result) == 1) {
        // Authentification réussie, configurez la session
        $_SESSION['id'] = $email; // Utiliser un identifiant unique comme 'id'
        set_message("Successfully logged in");
        header("Location: landing.php"); // Rediriger vers le tableau de bord
        exit;
    } else {
        // Authentification échouée
        echo "Email ou mot de passe incorrect.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Finder</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
</body>
</html>
<div class="wrapper">
<form class="login-form" method="POST">
    <h1>Login</h1>
    <div class="input-box">
    <input type="email" id="email" name="email" placeholder="email" required/>
</div>
<div class="input-box">
<input type="password" id="password" name="password" placeholder="password" required/>
</div>
<div class="remember-forgot">
    <label for=""><input type="checkbox">Remember me</label>
    <a href="#">Forgot password?</a> 
</div>
<button type="submit" id='login' name='login' class="btn" >login</button>
<div class="register-link">
    <p>Don't have an account? <a href="#">Register</a></p>
</div>

</form>





</div>