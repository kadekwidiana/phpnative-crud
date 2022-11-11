<?php
session_start();

// yg bisa login hanya yg ada di list dibawah
$list_user = [
    [
        'username' => 'kadek widi',
        'password' => '123456'
    ],
    [
        'username' => 'admin',
        'password' => 'admin'
    ]
];


//dapatkan data user dari form
$user = [
    'username' => $_POST['username'],
    'password' => $_POST['password'],
];

//cocokan data user dengan list user yang valid.
$not_found = false;

foreach ($list_user as $key => $registered_user) {

    //login success
    if ($registered_user['username'] == $user['username']) {

        if ($registered_user['password'] == $user['password']) {

            $_SESSION['login'] = true;
            $_SESSION['username'] =  $user['username'];
            $_SESSION['message']  = 'Berhasil login ke dalam sistem.';

            header("Location: admin.php");
            break;
        } else {
            $_SESSION['error'] = 'Password anda salah';
            $not_found = true;
        }
        } else {
            $_SESSION['error'] = 'Password anda salah';
        }
}
if ($not_found == true) {
    header("Location: login_admin.php");
}