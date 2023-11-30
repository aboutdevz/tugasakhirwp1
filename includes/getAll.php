<?php

include "../db/session.php";
include "../helper/index.php";

// get All from getAll function
$todoList = getAll();
echo json($data = [
    'status' => 'success',
    'message' => 'Data berhasil diambil',
    'data' => $todoList,
], 200);