<?php

function makeTodoListData($title, $description, $dueDate, $id = null) {
    return [
        'id' => !$id ? uniqid() : $id,
        'title' => $title,
        'description' => $description,
        'createdDate' => date('d M Y H:i'),
        'dueDate' => $dueDate,
    ];
}