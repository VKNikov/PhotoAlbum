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

            $fileName = $_FILES['file']['name'] . '_' . time();
            $result = move_uploaded_file($_FILES['file']['tmp_name'], $filePath . $fileName);

            if ($result) {
                $picFilename = array('pic_filename' => $fileName);
                $element = array_merge($element, $picFilename);
                $this->add($element);

                return array('success' => 'Picture added to the album successfully!');
            }

            return array('error' => 'There was an error while copying the file. Please try again or contact the system administrator');
        }
    }

}