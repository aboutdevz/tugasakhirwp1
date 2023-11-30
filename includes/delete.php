<?php

include_once "../db/session.php";
include_once "../helper/index.php";




if (isset($_POST['id'])) {
    $id = $_POST['id'];
    deleteData($id);

    echo json($data = [
        'status' => 'success',
        'message' => 'Data berhasil dihapus',
    ], 200);
} else {
    echo json($data = [
        'status' => 'error',
        'message' => 'Data tidak lengkap',
    ], 400);
}