<?php
/**
 * Created by PhpStorm.
 * User: Vassil
 * Date: 9.5.2015 г.
 * Time: 20:25
 */

if (isset($_POST['like'])) {
    $element = $_POST['like'];
    $userId = (int)$element['user_id'];
    $pictureId = (int)$element['picture_id'];

    include_once('config/config.php');
    include_once 'libs/Database.php';

    $dbEntity = \Libs\Database::getInstance();
    $db = $dbEntity->getDb();
    $db->set_charset('utf8');

    $statement = $db->prepare(
        "INSERT INTO users_pictures_votes (picture_id, user_id) VALUES(?, ?)");
    $statement->bind_param("ii", $pictureId, $userId);
    $statement->execute();

    return $statement->affected_rows > 0;
}

if (isset($_POST['unlike'])) {
    $element = $_POST['unlike'];
    $userId = (int)$element['user_id'];
    $pictureId = (int)$element['picture_id'];

    include_once('config/config.php');
    include_once 'libs/Database.php';

    $dbEntity = \Libs\Database::getInstance();
    $db = $dbEntity->getDb();
    $db->set_charset('utf8');

    $statement = $db->prepare(
        "DELETE FROM users_pictures_votes WHERE user_id = ? AND picture_id = ?");
    $statement->bind_param("ii", $userId, $pictureId);
    $statement->execute();

    return $statement->affected_rows > 0;
}