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

            $filePath = ROOT_DIR . 'user_images/' . $_SESSION['user_id'] . '/';
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