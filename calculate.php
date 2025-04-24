<?php
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $price = $_POST['price'];
    $discount = $_POST['discount'];
    // Validasi input
    $errors = [];
    if ($price <= 0) {
    $errors[] = "Harga harus lebih besar dari 0.";
    }
    if ($discount < 0 || $discount > 100) {
    $errors[] = "Diskon harus antara 0% dan 100%.";
    }
    // Jika tidak ada error, hitung diskon
    if (empty($errors)) {
    $discountAmount = $price * ($discount / 100);
    $finalPrice = $price - $discountAmount;
    }
   }
   ?>

<!DOCTYPE html>
<html lang="id">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Hasil Perhitungan Diskon</title>
 <link rel="stylesheet" href="style.css">
</head>
<body>
 <div class="container">
 <h1>Hasil Perhitungan Diskon</h1>
 <?php if (!empty($errors)): ?>
 <div class="error">
 <?php foreach ($errors as $error): ?>
 <p><?php echo $error; ?></p>
 <?php endforeach; ?>
 </div>
 <a href="index.html" class="button">Kembali</a>
 <?php else: ?>
 <p>Harga Awal: Rp <?php echo number_format($price, 0, ',', '.'); ?></p>
 <p>Diskon (<?php echo $discount; ?>%): Rp <?php echo number_format($discountAmount, 0, ',', '.');
?></p>
 <p>Harga Setelah Diskon: Rp <?php echo number_format($finalPrice, 0, ',', '.'); ?></p>
 <a href="index.html" class="button">Kembali</a>
 <?php endif; ?>
 </div>
</body>
</html>