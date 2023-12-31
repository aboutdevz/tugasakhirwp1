<?php
session_start();

function addData($data) {
    if (empty($data)) {
        return;
    }

    if (!isset($_SESSION['dataTodoList'])) {
        setSessionDataEmpty($data);
        return;
    }

    setSessionDataExist($data);
}

function editData($id, $data) {
    $temp = $_SESSION['dataTodoList'];
    $oldData = findById($id);

    $newData = array_merge($oldData, $data);

    $findIndexById = array_search($id, array_column($_SESSION['dataTodoList'], 'id'));

    array_splice($temp, $findIndexById, 1);

    array_push($temp, $newData);

    $_SESSION['dataTodoList'] = $temp;
}

function deleteData($id) {
    $temp = $_SESSION['dataTodoList'];
    $findIndexById = array_search($id, array_column($_SESSION['dataTodoList'], 'id'));

    array_splice($temp, $findIndexById, 1);

    $_SESSION['dataTodoList'] = $temp;
}

function getAll() {
    return $_SESSION['dataTodoList'] ?? [];
}

function findById($id) {
    $data = $_SESSION['dataTodoList'];

    $filteredData = array_filter($data, function ($item) use ($id) {
        return $item['id'] === $id;
    });
    
    return $filteredData[0];
}


function setSessionDataExist($data) {
    $temp = $_SESSION['dataTodoList'];

    array_push($temp, $data);

    $_SESSION['dataTodoList'] = $temp;
}

function setSessionDataEmpty($data) {
    $_SESSION['dataTodoList'] = [$data];
}