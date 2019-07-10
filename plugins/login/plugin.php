<?php

function login_form()
{
    if ($_POST['email'] && $_POST['password']) {

        session('user', null);

        $i = 1;
        foreach (users() as $id => $user) {
            $user['id'] = $i++;
            if ($user['email'] === $_POST['email']
            && $user['password'] === sha1($_POST['password'])) {
                session('user', $user);

                echo '<p>Welcome back ' . session('user')['name'] 
                . '! <a href="/">Back</a></p>';
            }
        }

        if (!session('user')) {
            echo 'The login details entered were incorrect';
        }
    }

    if (!session('user')) {
        partial('login-form', [
            'email' => $_POST['email'],
            'password' => $_POST['password'],
        ]);
    }
}

function logout()
{
    session_destroy();
}