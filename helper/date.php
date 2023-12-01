<?php
date_default_timezone_set('Asia/Jakarta');
function transformDate($date) {
    $dateTransform = date_create($date);
    $dateTransform = date_format($dateTransform, 'd M Y H:i');
    return $dateTransform;
}