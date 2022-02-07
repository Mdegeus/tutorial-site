<?php

function createUser($username, $email, $password) {
    global $conn;

    if (!findUser($username) && !findUser($email)) {
        $password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (username, email, password, age) 
        VALUES('$username', '$email', '$password', '18')";

        $stmt = $conn->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }
}

function findUser($input) {
    global $conn;

    $sql = "SELECT * FROM users WHERE username = '$input' OR email = '$input'";

    $stmt = $conn->prepare($sql);

    $stmt->execute();

    $array = $stmt->fetchAll(PDO::FETCH_CLASS);

    if ($array) {
        return $array[0];
    }

    return false;
}

function checkLogin($input, $password) { // input refers to username/email
    global $conn;

    $user = findUser($input);

    if ($user) {
        $passwordValid = password_verify($password, $user->password);

        if ($passwordValid) {
            $_SESSION['user'] = $user;
        }
    }
}

function updateCurrentUserData() {
    global $conn;

    $userID = $_SESSION['user']->id;

    $_SESSION['user'] = getUser($userID);
}

function getUser($userID) {
    global $conn;

    $sql = "SELECT * FROM users WHERE id = '$userID'";

    $stmt = $conn->prepare($sql);

    $stmt->execute();

    $array = $stmt->fetchAll(PDO::FETCH_CLASS);

    if ($array) {
        return $array[0];
    }

    return false;
}

function changeUserName($newName) {
    global $conn;

    if (!findUser($newName)) {
        $userID = $_SESSION['user']->id;

        $sql = "UPDATE users SET username = '$newName' WHERE id = '$userID'"; /// select the user with $userID and set its new name

        $stmt = $conn->prepare($sql);

        $stmt->execute(); 
    }
}

function changeUserEmail($newEmail) {
    global $conn;

    $userID = $_SESSION['user']->id;

    $sql = "UPDATE users SET email = '$newEmail' WHERE id = '$userID'"; /// select the user with $userID and set its new name

    $stmt = $conn->prepare($sql);

    $stmt->execute(); 
}

function changeUserPassword($newPassword) {
    global $conn;

    $newPassword = password_hash($newPassword, PASSWORD_DEFAULT);

    $userID = $_SESSION['user']->id;

    $sql = "UPDATE users SET password = '$newPassword' WHERE id = '$userID'"; /// select the user with $userID and set its new password

    $stmt = $conn->prepare($sql);

    $stmt->execute();
}

function changeCreator($bool)
{
    global $conn;

    if ($bool) {
        $bool = "1";
    } else {
        $bool = "0";
    }

    $userID = $_SESSION['user']->id;

    $sql = "UPDATE users SET creator = '$bool' WHERE id = '$userID'"; /// select the user with $userID and set creator to $bool

    $stmt = $conn->prepare($sql);

    $stmt->execute();
}