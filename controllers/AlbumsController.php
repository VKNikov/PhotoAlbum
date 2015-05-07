<?php
/**
 * Created by PhpStorm.
 * User: Vassil
 * Date: 6.5.2015 г.
 * Time: 22:09
 */

//namespace Controllers;


class AlbumsController extends MainController{
    protected $albumsModel;

    public function __construct() {
        parent::__construct(get_class(),'/views/albums/');
    }

    public function index() {
        $this->template = ROOT_DIR . '/views/albums/index.php';

        include_once $this->layout;

        $this->albumsModel = new AlbumsModel();
    }

    public function all() {
        $this->template = ROOT_DIR . '/views/albums/all.php';

        include_once $this->layout;
    }

    public function create() {
        if ($this->isPosted) {
            $name = $_POST['AlbumName'];
            $description = $_POST[''];
        }

        $this->template = ROOT_DIR . '/views/albums/create.php';

        include_once $this->layout;
    }
}