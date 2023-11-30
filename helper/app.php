<?php

function basePath($path) {
    $path = str_replace('//', ']\\', $path);
    return  dirname(__DIR__) . "/$path";
}