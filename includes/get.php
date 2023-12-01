<?php

include "../db/session.php";
include "../helper/index.php";

// get All from getAll function

if (isset($_GET['id'])) {
    $todoList = findById($_GET['id']);
    echo json($data = [
        'status' => 'success',
        'message' => 'Data berhasil diambil',
        'data' => $todoList,
    ], 200);
    return;
} else {
    echo json($data = [
        'status' => 'error',
        'message' => 'Data tidak lengkap',
    ], 400);
}