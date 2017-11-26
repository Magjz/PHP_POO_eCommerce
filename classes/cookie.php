<?php
function cookie($name, $value){
    return setcookie($name, $value, time() + 365*24*3600, '/', 'localhost',false, true);
}

function unsetCookie($name){
    return setcookie($name, '', 1, '/', 'localhost');
}
?>