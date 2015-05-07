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
        $this->albumsModel = new AlbumsModel();
    }

    public function index() {
        $this->template = ROOT_DIR . '/views/albums/index.php';

        include_once $this->layout;
    }

    public function all() {
        $this->template = ROOT_DIR . '/views/albums/all.php';

        include_once $this->layout;
    }

    public function create() {
        if ($this->isPosted) {
            $name = $_POST['albumName'];
            $description = $_POST['description'];
            if ($this->albumsModel->add(array('name' => $name, 'description' => $description))) {
                //$this->addInfoMessage("Author created.");
                //$this->redirect("authors");
            } else {
                //$this->addErrorMessage("Cannot create author.");
                exit('Error: Sorry, could not create this album');
            }
        }

        $this->template = ROOT_DIR . '/views/albums/create.php';

        include_once $this->layout;
    }
}