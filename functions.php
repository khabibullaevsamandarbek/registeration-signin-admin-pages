<?php
function hash_password($password){
    return password_hash($password, PASSWORD_BCRYPT);
}
function varify_password($password, $hash){
    return password_verify($password, $hash);
}

function sanitize_input($input){
    return htmlspecialchars(trim($input) ,ENT_QUOTES , "UTF-8");
}