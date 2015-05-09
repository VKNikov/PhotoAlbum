<?php
/**
 * Created by PhpStorm.
 * User: Vassil
 * Date: 7.5.2015 г.
 * Time: 16:28
 */
//namespace Models;


class PicturesModel extends MainModel
{

    public function __construct($args = array())
    {
        parent::__construct(array('entity' => 'pictures'));
    }

    public function uploadPicture($element) {
        if ($_FILES['file']['tmp_name']) {
            if ($_FILES['file']['size'] > 2097152) {
                return array('error' => 'The file you are trying to upload is larger than 2mb in size!');
            }

            $type = $_FILES['file']['type'];
            if ($type != 'image/gif' && $type != 'image/jpeg' && $type != 'image/png') {
                return array('error' => 'The file you are trying to upload is not a valid image format!');
            }

            $filePath = ROOT_DIR . 'user_images/' . $_SESSION['user_id'] . '/' .
                $element['album_id'] . '/';
            if (!is_dir($filePath)) {
                mkdir($filePath);
            }

            $filename = $_FILES['file']['name'];
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            $filename = basename($filename, '.' . $ext) . '_' . time() . '.' . $ext;;
            $result = move_uploaded_file($_FILES['file']['tmp_name'], $filePath . $filename);
            $this->createThumbnail($filePath . $filename);

            if ($result) {
                $picFilename = array('pic_filename' => $filename);
                $element = array_merge($element, $picFilename);
                $this->add($element);

                return array('success' => 'Picture added to the album successfully!');
            }

            return array('error' => 'There was an error while copying the file. Please try again or contact the system administrator');
        }
    }

    public function postPictureComment($element) {
        $keys = array_keys($element);
        $values = array();

        foreach ($element as $key => $value) {
            $values[] = "'" . $this->db->real_escape_string($value) . "'";
        }

        $keys = implode(',', $keys);
        $values = implode(',', $values);

        $query = "INSERT INTO pictures_comments ($keys) VALUES($values)";

        $this->db->query($query);

        return $this->db->affected_rows;
    }

    public function postAlbumComment($element) {
        $keys = array_keys($element);
        $values = array();

        foreach ($element as $key => $value) {
            $values[] = "'" . $this->db->real_escape_string($value) . "'";
        }

        $keys = implode(',', $keys);
        $values = implode(',', $values);

        $query = "INSERT INTO albums_comments ($keys) VALUES($values)";

        $this->db->query($query);

        return $this->db->affected_rows;
    }

    public function getByAlbum($albumId) {
        return $this->find(array('columns' => 'id, description, pic_filename, album_id, user_id', 'where' => 'album_id = ' . $albumId));
    }

    public function getPicturesComments($picture_id) {
        $comments = $this->find(array('entity' => 'pictures_comments', 'columns' => 'id, picture_id, user_id ,comment, created_on',
            'where' => 'picture_id = ' . $picture_id, 'limit' => ''));

        foreach ($comments as $key => $value) {
            $user = $this->find((array('entity' => 'users', 'columns' => 'username',
                'where' => 'id = ' . $value['user_id'])));
            $comments[$key]['username'] = $user[0]['username'];
        }

        return $comments;
    }

    public function getAlbumsComments($albumId) {
        $comments = $this->find(array('entity' => 'albums_comments', 'columns' => 'id, album_id, user_id ,comment, created_on',
            'where' => 'album_id = ' . $albumId, 'limit' => ''));

        foreach ($comments as $key => $value) {
            $user = $this->find((array('entity' => 'users', 'columns' => 'username',
                'where' => 'id = ' . $value['user_id'])));
            $comments[$key]['username'] = $user[0]['username'];
        }

        return $comments;
    }

    public function checkUserPictureVote($userId, $pictureId) {
        $result = $this->find(array('entity' => 'users_pictures_votes',
            'where' => 'user_id = ' . $userId . ' and ' . 'picture_id = ' . $pictureId));

        if (!empty($result)) {
            return true;
        }

        return false;
    }

    public function checkUserAlbumVote($userId, $albumId) {
        $result = $this->find(array('entity' => 'users_albums_votes',
            'where' => 'user_id = ' . $userId . ' and ' . 'album_id = ' . $albumId));

        if (!empty($result)) {
            return true;
        }

        return false;
    }

    public function createThumbnail($source, $thumbnailWidth = 100) {
        $filePath = dirname($source);
        $filename = 'thumb_' . basename($source);

        if (exif_imagetype($source) == IMAGETYPE_GIF) {
            $img = imagecreatefromgif($source);
            $temp_image = $this->buildGenericThumb($img, $thumbnailWidth);
            imagegif($temp_image, $filePath . '/' . $filename);
        }

        if(exif_imagetype($source) == IMAGETYPE_JPEG) {
            $img = imagecreatefromjpeg($source);
            $temp_image = $this->buildGenericThumb($img, $thumbnailWidth);
            imagejpeg($temp_image, $filePath . '/' . $filename);
        }

        if (exif_imagetype($source) == IMAGETYPE_PNG) {
            $img = imagecreatefrompng($source);
            $temp_image = $this->buildGenericThumb($img, $thumbnailWidth);
            imagepng($temp_image, $filePath . '/' . $filename);
        }
    }

    public function buildGenericThumb($img, $thumbnailWidth) {
        $currentWidth = imagesx($img);
        $currentHeight = imagesx($img);

        $newWidth = $thumbnailWidth;
        $newHeight = floor($currentHeight * ($thumbnailWidth / $currentWidth));
        $temp_image = imagecreatetruecolor($newWidth, $newHeight);
        imagecopyresized($temp_image, $img, 0, 0, 0, 0, $newWidth, $newHeight, $currentWidth, $currentHeight);

        return $temp_image;
    }
}