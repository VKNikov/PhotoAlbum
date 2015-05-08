<?php
/**
 * Created by PhpStorm.
 * User: Vassil
 * Date: 6.5.2015 г.
 * Time: 22:10
 */
//namespace Controllers;


class PicturesController extends MainController
{
    protected $picturesModel;

    public function __construct()
    {
        parent::__construct(get_class(), '/views/pictures/');
        $this->picturesModel = new AlbumsModel();
    }

    public function index()
    {
        $this->template = ROOT_DIR . '/views/pictures/index.php';

        include_once $this->layout;
    }

    public function all()
    {
        $this->template = ROOT_DIR . '/views/pictures/all.php';

        include_once $this->layout;
    }

    public function add()
    {
        if ($this->isPosted) {
            $albumId = $_POST['albumName'];
            $pictureName = $_POST['pictureName'];
            $description = $_POST['description'];
            $isPublic = $_POST['isPublic'];
            if ($this->picturesModel->add(array('album_id' => $albumId, 'description' => $description))) {
                //$this->addInfoMessage("Author created.");
                //$this->redirect("authors");
            } else {
                //$this->addErrorMessage("Cannot create author.");
                exit('Error: Sorry, could not create this album');
            }
        }

        $this->template = ROOT_DIR . '/views/pictures/add.php';

        include_once $this->layout;
    }
}