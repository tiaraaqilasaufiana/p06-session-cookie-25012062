<?php

require_once __DIR__ . '/bootstrap.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

$action = $_POST['action'] ?? '';
$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);

if ($action === 'add') {
    if ($id === false || $id === null || $id <= 0) {
        header('Location: index.php');
        exit;
    }

    $_SESSION['cart'][] = $id;
}

if ($action === 'remove') {
    if ($id === false || $id === null || $id <= 0) {
        header('Location: cart.php');
        exit;
    }

    $key = array_search($id, $_SESSION['cart']);

    if ($key !== false) {
        unset($_SESSION['cart'][$key]);
        $_SESSION['cart'] = array_values($_SESSION['cart']);
    }
}

if ($action === 'clear') {
    $_SESSION['cart'] = [];
}

header('Location: index.php');
exit;