<?php
/**
 * Created by PhpStorm.
 * User: Vassil
 * Date: 9.5.2015 г.
 * Time: 20:25
 */

include_once('config/config.php');
include_once 'libs/Database.php';
define( 'ROOT_DIR', dirname( __FILE__ ) . '/' );

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

if (isset($_POST['deletePicture'])) {
    $element = $_POST['deletePicture'];
    $pictureId = (int)$element['pictureId'];

    $query = "SELECT album_id FROM pictures WHERE id = {$pictureId}";
    $query = $db->escape_string($query);
    $statement= $db->query($query);
    $albumId =  $statement->fetch_all(MYSQLI_ASSOC);

    $picFilename = $element['filename'];
    $userId = (int)$element['user_id'];

    $filePath = ROOT_DIR . 'user_images/' . $userId . '/' .
        $albumId[0]['album_id'] . '/';

    $thumbFile = 'thumb_' . $picFilename;
    $isDeletedThumb = unlink($filePath . $thumbFile);
    $isDeletedFile = unlink($filePath . $picFilename);
    $result = deletePicture($db, $pictureId);
    if ($result) {
        header('Location: photoalbum/albums');
        die;
    } else {

    }
}

function deletePicture($db, $pictureId)
{
    $statement = $db->prepare(
        "DELETE FROM pictures WHERE id = ?");
    $statement->bind_param("i", $pictureId);
    $statement->execute();

    return $statement->affected_rows > 0;
}

function insertIntoDb($table, $db, $userId, $entityId)
{
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

function deleteFromDb($table, $db, $userId, $entityId)
{
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

function downloadAlbum($albumId)
{
    $pictures = $this->getAll($albumId);

    $zipname = 'pictures.zip';
    $zip = new ZipArchive;
    $zip->open($zipname, ZipArchive::CREATE);
    foreach ($pictures as $file) {
        $zip->addFile($file);
    }
    $zip->close();

    header('Content-Type: application/zip');
    header("Content-Disposition: attachment; filename='pictures.zip'");
    header('Content-Length: ' . filesize($zipname));
    header("Location: pictures.zip");

    $this->template = ROOT_DIR . '/views/pictures/album.php';

    include_once $this->layout;
}