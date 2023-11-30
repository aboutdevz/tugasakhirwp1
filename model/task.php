<?php

function makeTodoListData($title, $description, $dueDate, $id = null) {
    return [
        'id' => !$id ? uniqid() : $id,
        'title' => $title,
        'description' => $description,
        'createdDate' => date('Y-m-d H:i:s'),
        'dueDate' => $dueDate,
    ];
}