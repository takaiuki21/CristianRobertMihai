<?php
require 'db.php';
// variabila de eroare 
$eroare = "";

// verifica daca formularul a fost trimis
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    // caut in baza de date utilizatorul cu username-ul dat
    // folosesc prepare pentru a preveni SQL Injection
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$user]);
    // extrag datele utilizatorului
    $user_db = $stmt->fetch();

    // verific 2 lucruri : daca utilizatorul exista si daca parola e corecta
    if ($user_db && password_verify($pass, $user_db['password'])) {
        // dacca exista si parola e corecta, setez variabilele de sesiune
        $_SESSION['user_id'] = $user_db['id'];
        $_SESSION['username'] = $user_db['username'];
        //redirectionez catre pagina contului
        header("Location: cont.php");
        exit;
    } else { 
        // daca utilizatorul nu exista sau parola e gresita 
        $eroare = "Username sau parolă incorectă!"; 
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login - CasaMare</title>
    <link rel="stylesheet" type="text/css" href="cont.css"/>
</head>
<body>
    <header>
    <?php include 'header.php'; ?>
    </header>

    <div class="centrat">
        <br><br>
        <h2>Login to your account</h2>
        <?php if($eroare) echo "<p style='color:red'>$eroare</p>"; ?>
        
        <form method="POST" action="login.php">
            Username:<br><input type="text" name="username" required><br>
            Password:<br><input type="password" name="password" required><br><br>
            <input type="submit" value="Login">
        </form>
    </div>

    <a href="#top" class="back-to-top">Sus</a>
    <footer class="footer"> © CasaMare - Toate drepturile rezervate</footer>
</body>
</html>