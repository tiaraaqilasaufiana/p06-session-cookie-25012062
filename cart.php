<?php

require_once __DIR__ . '/bootstrap.php';

$cart = $_SESSION['cart'];

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang</title>
</head>
<body>

<h1>Keranjang</h1>

<?php if (empty($cart)): ?>

    <p>Keranjang masih kosong.</p>

<?php else: ?>

    <?php foreach ($cart as $id): ?>
        <p>Produk ID: <?= htmlspecialchars($id) ?></p>
    <?php endforeach; ?>

<?php endif; ?>

<a href="index.php">Kembali ke Katalog</a>

</body>
</html>