<?php

function read_users_json() {
    return read_json_file(DOCUMENT_ROOT . '/../plugins/users/users.json');
}

function users() {

    global $global_users;
    if (!$global_users) {
        $global_users = read_users_json();
    }

    // Return all users
    return $global_users;
}

function user($id = null) {
    
    global $global_users;
    if (!$global_users) {
        $global_users = read_users_json();
    }

    // Return a specific user
    if ($id) {
        return $global_users[$id];
    }
    else {
        return [];
    }
}