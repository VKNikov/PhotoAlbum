<?php
/**
 * Created by PhpStorm.
 * User: Vassil
 * Date: 6.5.2015 г.
 * Time: 22:09
 */
//namespace Controllers;


class AlbumsController extends MainController
{
    protected $albumsModel;

    public function __construct()
    {
        parent::__construct(get_class(), '/views/albums/');
        $this->albumsModel = new AlbumsModel();
    }

    public function index()
    {
//        if ($this->authorization->isLoggedIn()) {
//            $albums = $this->albumsModel->getAlbumsByUser($_SESSION['user_id']);
//        } else {
//            $albums = $this->albumsModel->getAlbumsWithLimit();
//        }

        $albums = $this->albumsModel->getAlbumsWithLimit();

        if (empty($albums)) {
            $albums[0] = array('id' => 0, 'name' => 'There are no albums to display.');
        }
        $this->template = ROOT_DIR . '/views/albums/index.php';

        include_once $this->layout;
    }

    public function home() {
        $albums = $this->albumsModel->getAlbumsByUser($_SESSION['user_id']);

        if (empty($albums)) {
            $albums[0] = array('id' => 0, 'name' => 'There are no albums to display.');
        }

        $this->template = ROOT_DIR . '/views/albums/index.php';

        include_once $this->layout;
    }

    public function all()
    {
        $this->template = ROOT_DIR . '/views/albums/all.php';

        include_once $this->layout;
    }

    public function create()
    {
        if ($this->isPost) {
            $name = $_POST['albumName'];
            $description = $_POST['description'];
            $isPublic = $_POST['isPublic'];
            if ($this->albumsModel->add(array('user_id' => $_SESSION['user_id'], 'name' => $name,
                'description' => $description, 'is_public' => $isPublic))) {
                $this->addInfoMessage("Album created");
                $this->redirect("albums");
            } else {
                $this->addErrorMessage("Cannot create Album.");
            }
        }

        $this->template = ROOT_DIR . '/views/albums/create.php';

        include_once $this->layout;
    }
}