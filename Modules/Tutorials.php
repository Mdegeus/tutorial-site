<?php

function createTutorial($title, $description) {
    global $conn;

    $img = "#"; //// no custom images for now.
    $user_id = $_SESSION['user']->id;

    $sql = "INSERT INTO tutorials(title, img, description, user_id) 
    VALUES('$title', '$img', '$description', '$user_id')";

    $stmt = $conn->prepare($sql);

    $stmt->execute();
}

function getTutorials() {
    global $conn;

    $sql = "SELECT * FROM tutorials WHERE published = '1'";

    $stmt = $conn->prepare($sql);

    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_CLASS);
}

function getCreations() {
    global $conn;

    $user_id = $_SESSION['user']->id;

    $sql = "SELECT * FROM tutorials WHERE user_id = '$user_id' AND published = '0'";

    $stmt = $conn->prepare($sql);

    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_CLASS);
}

function getTutorial($id) {
    global $conn;

    $sql = "SELECT * FROM tutorials WHERE id = '$id'";

    $stmt = $conn->prepare($sql);

    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_CLASS)[0];
}

function getTutorialItems($id) {
    global $conn;

    $sql = "SELECT * FROM tutorial_rules
    INNER JOIN tutorial_items
    ON tutorial_rules.tutorial_item_id = tutorial_items.id 
    WHERE tutorial_rules.tutorial_id = '$id'";

    $stmt = $conn->prepare($sql);

    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_CLASS);
}

function getTutorialTags($id) {
    global $conn;

    $sql = "SELECT * FROM tag_rules
    INNER JOIN tags
    ON tag_rules.tag_id = tags.id 
    WHERE tag_rules.tutorial_id = '$id'";

    $stmt = $conn->prepare($sql);

    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_CLASS);
}