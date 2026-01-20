<?php
require 'db.php';
//variabila pentru mesajul de eroare sau succes
$mesaj = "";

// verific daca formularul a fost trimis
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = $_POST['username'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $confirm = $_POST['confirm_password'];

    // verific daca parolele coincid
    if ($pass === $confirm) {
        $hashed_pass = password_hash($pass, PASSWORD_DEFAULT);
        
        // pregatesc interogarea pentru inserare utilizator nou
        $stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        
        // try incearca sa execute codul, catch prinde eroarea daca apare
        try {
            // incerc executarea interogarii
            $stmt->execute([$user, $email, $hashed_pass]);
            
            // daca reuseste, redirectionez catre login
            header("Location: login.php");
            exit;
        } catch (PDOException $e) { 
           // daca apare eroare (de ex username sau email duplicat), setez mesajul de eroare
           // setez mesajul de eroare
            $mesaj = "Eroare: Username-ul sau Email-ul există deja!"; 
        }
    } else { 

        $mesaj = "Parolele nu coincid!"; 
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Signup - CasaMare</title>
    <link rel="stylesheet" type="text/css" href="cont.css"/>
</head>
<body>
    <header>
    <?php include 'header.php'; ?>
    </header>

    <div class="centrat">
        <br><br>
        <h2>Creează cont:</h2>
        <?php if($mesaj) echo "<p style='color:red'>$mesaj</p>"; ?>
        
        <form method="POST" action="signup.php">
            Username:<br><input type="text" name="username" required><br>
            Email:<br><input type="email" name="email" required><br>
            Password:<br><input type="password" name="password" required><br>
            Confirm Password:<br><input type="password" name="confirm_password" required><br><br>
            <input type="submit" value="Signup">
        </form>
    </div>

    <a href="#top" class="back-to-top">Sus</a>
    <footer class="footer"> © CasaMare - Toate drepturile rezervate</footer>
</body>
</html>