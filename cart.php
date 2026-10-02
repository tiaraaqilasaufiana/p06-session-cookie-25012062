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

        <form action="actions.php" method="post">
            <input type="hidden" name="action" value="remove">
            <input type="hidden" name="id" value="<?= $id ?>">
            <button type="submit">Hapus</button>
        </form>

    <?php endforeach; ?>

    <form action="actions.php" method="post">
        <input type="hidden" name="action" value="clear">
        <button type="submit">Kosongkan Keranjang</button>
    </form>

<?php endif; ?>

<br>

<a href="index.php">Kembali ke Katalog</a>

</body>
</html>