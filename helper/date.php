<?php

function transformDate($date) {
    $dateTransform = date_create($date);
    $dateTransform = date_format($dateTransform, 'Y-m-d H:i:s');
    return $dateTransform;
}