<?php

require_once __DIR__ . '/bootstrap.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $action = $_POST['action'] ?? '';
    $id = (int) ($_POST['id'] ?? 0);

    if ($action === 'add' && $id > 0) {
        $_SESSION['cart'][] = $id;
    }
}

header('Location: index.php');
exit;