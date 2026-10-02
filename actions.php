<?php

require_once __DIR__ . '/bootstrap.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $action = $_POST['action'] ?? '';
    $id = (int) ($_POST['id'] ?? 0);

    if ($action === 'add' && $id > 0) {
        $_SESSION['cart'][] = $id;
    }

    if ($action === 'remove' && $id > 0) {
        $key = array_search($id, $_SESSION['cart']);

        if ($key !== false) {
            unset($_SESSION['cart'][$key]);
            $_SESSION['cart'] = array_values($_SESSION['cart']);
        }
    }

    if ($action === 'clear') {
        $_SESSION['cart'] = [];
    }
}

header('Location: index.php');
exit;