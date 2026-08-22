<?php
session_start();

if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit();
}

// Temporary values. These will be retrieved from the database later.
$itemsForged = 20;
$gold = 1000;
$dailyGacha = "3 / 3";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home | Dwarven Forge</title>
  <link rel="stylesheet" href="assets/css/home.css">
</head>
<body>
  <main class="game-screen">
    <header class="player-hud">
      <div class="hud-column">
        <p class="hud-box username-box"><?php echo $_SESSION["username"]; ?></p>
        <p class="hud-box"><span class="hammer-icon"></span>Forged <?php echo $itemsForged; ?> items</p>
      </div>

      <img class="portrait-frame" src="assets/img/UI_Portrait.png" alt="Profile">

      <div class="hud-column">
        <p class="hud-box"><img src="assets/img/HUD_Coinpng.png" alt="Gold"><?php echo $gold; ?></p>
        <p class="hud-box">Daily Gacha: <?php echo $dailyGacha; ?></p>
      </div>
    </header>

    <section class="forge-room">
      <img class="pillar pillar-left" src="assets/img/BG_Pillar.png" alt="">
      <img class="blacksmith" src="assets/img/dude.png" alt="Dwarven blacksmith">
      <img class="pillar pillar-right" src="assets/img/BG_Pillar.png" alt="">
    </section>

    <nav class="main-menu" aria-label="Main menu">
      <a href="#" aria-label="Profile">
        <img src="assets/img/Profile_Btn.png" alt="Profile">
      </a>
      <a href="#" aria-label="Forge">
        <img src="assets/img/Forge_Btn.png" alt="Forge">
      </a>
      <a href="#" aria-label="Shop">
        <img src="assets/img/Shop_Btn.png" alt="Shop">
      </a>
    </nav>
  </main>
</body>
</html>
