<?php
session_start();
$nomor_slide = $_SESSION['nomor_slide'] ?? 1;
$kontens = '';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
  <title>Slide-<?= $nomor_slide ?></title>
  <?php include '../includes/insho_styles.php'; ?>
  <style>
    * {
      margin: 0;
      padding: 0;

    }

    body {
      min-height: 100vh;
      background: linear-gradient(#ffc, #cff);
    }

    main {
      display: flex;
      justify-content: center;
      align-items: center;
      background: red;
      background: linear-gradient(white, lightblue);
      height: 88vh;
    }

    .hide {
      display: none;
    }

    #kontens {
      /* background: blue; */
      font-size: 40px;

    }

    #kontens h1 {
      font-size: 80px;
      text-align: center;
      margin-bottom: 30px;
      padding-bottom: 30px;
      border-bottom: solid 7px #ccc;
    }

    .profil {
      width: 250px;
      height: 250px;
      object-fit: cover;
      border-radius: 50%;
      padding: 10px;
      background: white;
      box-shadow: 0 0 10px gray;
    }
  </style>

  <script src="../assets/vendor/jquery/jquery-3.7.1.min.js"></script>
</head>

<body>
  <?php include "header.php"; ?>
  <main>
    <div id="kontens">

      <?= $kontens ?>
    </div>

  </main>

</body>

</html>