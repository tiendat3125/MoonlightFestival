<?php 
function dd($data){
    echo "<pre>";
    var_dump($data);
    echo "</pre>";
}

function sanitize ($data){
    return htmlspecialchars(strip_tags(trim($data)));
}