<?php
/**
 * Created by PhpStorm.
 * User: Vassil
 * Date: 9.5.2015 г.
 * Time: 20:25
 */

include_once('config/config.php');
include_once 'libs/Database.php';

$dbEntity = \Libs\Database::getInstance();
$db = $dbEntity->getDb();
$db->set_charset('utf8');

if (isset($_POST['like'])) {
    $element = $_POST['like'];
    $userId = (int)$element['user_id'];
    $pictureId = (int)$element['picture_id'];

    return insertIntoDb('users_pictures_votes', $db, $userId, $pictureId);
}

if (isset($_POST['unlike'])) {
    $element = $_POST['unlike'];
    $userId = (int)$element['user_id'];
    $pictureId = (int)$element['picture_id'];

    return deleteFromDb('users_pictures_votes', $db, $userId, $pictureId);
}

if (isset($_POST['likeAlbum'])) {
    $element = $_POST['likeAlbum'];
    $userId = (int)$element['user_id'];
    $albumId = (int)$element['album_id'];

    return insertIntoDb('users_albums_votes', $db, $userId, $albumId);
}

if (isset($_POST['unlikeAlbum'])) {
    $element = $_POST['unlikeAlbum'];
    $userId = (int)$element['user_id'];
    $albumId = (int)$element['album_id'];

    return deleteFromDb('users_albums_votes', $db, $userId, $albumId);
}

function insertIntoDb($table, $db, $userId, $entityId) {
    if ($table == 'users_pictures_votes') {
        $column = 'picture_id';
    } else {
        $column = 'album_id';
    }

    $statement = $db->prepare(
        "INSERT INTO {$table} ({$column}, user_id) VALUES(?, ?)");
    $statement->bind_param("ii", $entityId, $userId);
    $statement->execute();

    return $statement->affected_rows > 0;
}

function deleteFromDb($table, $db, $userId, $entityId) {
    if ($table == 'users_pictures_votes') {
        $column = 'picture_id';
    } else {
        $column = 'album_id';
    }

    $statement = $db->prepare(
        "DELETE FROM {$table} WHERE user_id = ? AND {$column} = ?");
    $statement->bind_param("ii", $userId, $entityId);
    $statement->execute();

    return $statement->affected_rows > 0;
}