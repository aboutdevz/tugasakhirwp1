<?php

function view($path, $data = []) {
    extract($data);
    require_once basePath("/pages/layout/head.php");
    require_once basePath("/pages/$path.php");
    require_once basePath("/pages/layout/foot.php");
}


function script($path) {
    echo "<script src='$path'></script>";
}
