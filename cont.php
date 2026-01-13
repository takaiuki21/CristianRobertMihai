<?php
require 'db.php';
if (!isset($_SESSION['user_id'])) { header("Location: login.php"); exit; }

$stmt = $pdo->prepare("SELECT * FROM rezervari WHERE user_id = ?");
$stmt->execute([$_SESSION['user_id']]);
$rezervari_user = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Contul Meu - CasaMare</title>
    <link rel="stylesheet" type="text/css" href="cont.css"/>
</head>
<body>
    <header>
    <?php include 'header.php'; ?>
    </header>

    <div class="centrat">
        <br><br>
        <h1>Bine ai venit, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
        <h3>Istoricul rezervărilor tale:</h3>
        
        <?php if (count($rezervari_user) > 0): ?>
            <table class="tabel" style="margin-left: auto; margin-right: auto;">
                <thead>
                    <tr>
                        <th>Data</th>
                        <th>Ora</th>
                        <th>Persoane</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($rezervari_user as $r): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($r['data_rezervare']); ?></td>
                        <td><?php echo htmlspecialchars($r['ora_rezervare']); ?></td>
                        <td><?php echo htmlspecialchars($r['nr_persoane']); ?></td>
                        <td>Confirmată</td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Nu ai nicio rezervare înregistrată.</p>
        <?php endif; ?>

        <br><br>
        <a href="logout.php" class="back-to-top" style="position: relative; right: 0; bottom: 0;">Log-out</a>
    </div>

    <a href="#top" class="back-to-top">Sus</a>
    <footer class="footer"> © CasaMare - Toate drepturile rezervate</footer>
</body>
</html>