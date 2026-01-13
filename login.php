<?php
require 'db.php';
$eroare = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$user]);
    $user_db = $stmt->fetch();

    if ($user_db && password_verify($pass, $user_db['password'])) {
        $_SESSION['user_id'] = $user_db['id'];
        $_SESSION['username'] = $user_db['username'];
        header("Location: cont.php");
        exit;
    } else { 
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