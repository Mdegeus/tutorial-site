<?php

function createTutorial($title, $img, $description, $items) { //// items is an array
    global $conn;

    $sql = "INSERT INTO tutorials (title, img, description) 
    VALUES('$title', '$img', '$description')";

    $stmt = $conn->prepare($sql);

    $stmt->execute();

    //////////////////// loop through all items and create rules and inner joins for them.

}

function getTutorials() {
    global $conn;

    $sql = "SELECT * FROM tutorials";

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