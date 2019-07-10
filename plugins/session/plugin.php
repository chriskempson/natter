<?php

session_start();

function session($id, $value = null) {

    if ($value !== null) {
        $_SESSION[$id] = $value;
    }

    if (isset($_SESSION[$id])) {
        return $_SESSION[$id];
    }
    else {
        return false;
    }
}

// session_unset()
// session_destroy()