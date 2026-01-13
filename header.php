<nav class="bara">
    <a href="home.php">Home</a>    
    <a href="contact.php">Contact</a>
    <a href="meniu.php">Meniu</a>

    <?php if (isset($_SESSION['user_id'])): ?>
        <a href="rezervari.php">Rezervari</a>
        <a href="cont.php">Cont</a>
        <a href="logout.php">Log-out</a>
    <?php else: ?>
        <a href="login.php">Log-in</a>
        <a href="signup.php">Signup</a>
    <?php endif; ?>
</nav>