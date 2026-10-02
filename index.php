<?php

require_once __DIR__ . '/bootstrap.php';

$products = [
    [
        'id' => 1,
        'nama' => 'Kopi Susu',
        'harga' => 15000
    ],
    [
        'id' => 2,
        'nama' => 'Matcha Latte',
        'harga' => 18000
    ],
    [
        'id' => 3,
        'nama' => 'Cokelat',
        'harga' => 17000
    ]
];

$tema = $_COOKIE['tema'] ?? 'terang';

if (isset($_GET['tema'])) {
    if ($_GET['tema'] === 'gelap' || $_GET['tema'] === 'terang') {
        setcookie('tema', $_GET['tema'], time() + (86400 * 30), '/');
        $tema = $_GET['tema'];
    }
}

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Produk</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: <?= $tema === 'gelap' ? '#222' : '#fff' ?>;
            color: <?= $tema === 'gelap' ? '#fff' : '#000' ?>;
        }
    </style>
</head>
<body>

    <h1>Katalog Produk</h1>

    <p>
        Tema:
        <a href="?tema=terang">Terang</a> |
        <a href="?tema=gelap">Gelap</a>
    </p>

    <?php foreach ($products as $product): ?>
        <div>
            <h3><?= htmlspecialchars($product['nama']) ?></h3>
            <p>Rp <?= number_format($product['harga'], 0, ',', '.') ?></p>

            <form action="actions.php" method="post">
                <input type="hidden" name="action" value="add">
                <input type="hidden" name="id" value="<?= $product['id'] ?>">
                <button type="submit">Tambah ke Keranjang</button>
            </form>
        </div>
        <hr>
    <?php endforeach; ?>

</body>
</html>