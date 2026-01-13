<?php
require 'db.php';
if (!isset($_SESSION['user_id'])) { header("Location: login.php"); exit; }

$mesaj = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = $_POST['data'];
    $ora = $_POST['ora'];

    if (strtotime($data) < strtotime(date('Y-m-d'))) {
        $mesaj = "Eroare: Nu poți rezerva o dată din trecut!";
    } else {
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM rezervari WHERE data_rezervare = ? AND ora_rezervare = ?");
        $stmt->execute([$data, $ora]);
        if ($stmt->fetchColumn() >= 3) {
            $mesaj = "Eroare: Această oră este complet ocupată!";
        } else {
            $stmt = $pdo->prepare("INSERT INTO rezervari (user_id, nume, prenume, data_rezervare, ora_rezervare, nr_persoane) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->execute([$_SESSION['user_id'], $_POST['nume'], $_POST['prenume'], $data, $ora, $_POST['persoane']]);
            $mesaj = "Rezervare confirmată!";
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Rezervări - CasaMare</title>
    <link rel="stylesheet" type="text/css" href="cont.css"/>
</head>
<body>
   <header>
    <?php include 'header.php'; ?>
    </header>
    <div class="centrat">
        <br><br>
        <h2>Rezervă o masă</h2>
        <?php if($mesaj) echo "<p>$mesaj</p>"; ?>
        <form method="POST" action="rezervari.php">
            Nume:<br><input type="text" name="nume" required><br>
            Prenume:<br><input type="text" name="prenume" required><br>
            Data:<br><input type="date" name="data" required><br>
            Ora:<br><input type="time" name="ora" required><br>
            Persoane:<br><input type="number" name="persoane" min="1" max="20" required><br><br>
            <input type="submit" value="Rezervă" style="background-color: blueviolet; color:white;">
        </form>
    </div>

    <footer class="footer"> © CasaMare - Toate drepturile rezervate</footer>
</body>
</html>