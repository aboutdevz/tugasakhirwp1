<?php

include_once "../model/task.php";
include "../db/session.php";
include "../helper/index.php";




if (isset($_POST['id']) && isset($_POST['title']) && isset($_POST['description']) && isset($_POST['dueDate'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $dueDate = $_POST['dueDate'];

    $dueDate = date_create($dueDate);
    $dueDate = date_format($dueDate, 'Y-m-d H:i:s');

    $todoListData = makeTodoListData($title, $description, $dueDate, $id);

    editData($id, $todoListData);

    echo json($data = [
        'status' => 'success',
        'message' => 'Data berhasil diubah',
    ], 200);

} else {
    echo json($data = [
        'status' => 'error',
        'message' => 'Data tidak lengkap',
    ], 400);
}