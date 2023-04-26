<?php

function dd(mixed ...$values) {
    echo '<pre>' , var_dump(...$values) , '</pre>';
    die();
}

function d(mixed ...$values) {
    echo '<pre>' , var_dump(...$values) , '</pre>';
}

function separator($str) {
    $caseStr = '';
    for ($i = 0; $i < strlen($str); $i++) {
        $caseStr .= ctype_upper($str[$i]) ? ' ' . strtolower($str[$i]) : $str[$i];
    }

    return $caseStr;
}