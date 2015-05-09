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
        $this->picturesModel = new PicturesModel();
    }

    public function index()
    {
        $this->template = ROOT_DIR . '/views/pictures/index.php';

        include_once $this->layout;
    }

    public function id($pictureId) {
        if ($this->isPost) {
            $user_id = $_SESSION['user_id'];
            $comment = $_POST['comment'];
            if (!empty($comment)) {
                $element = array('picture_id' => $pictureId, 'user_id' => $user_id,
                    'comment' => $comment);
                $this->picturesModel->postPictureComment($element);
                $this->addInfoMessage('Post added successfully!');
            } else {
                $this->addErrorMessage('Couldn not add the comment. Please try again.');
            }
        }

        $this->hasVoted = $this->picturesModel->checkUserVote($_SESSION['user_id'], $pictureId);

        $picture = $this->picturesModel->get($pictureId);
        $comments = $this->picturesModel->getPicturesComments($pictureId);

        $this->template = ROOT_DIR . '/views/pictures/id.php';

        include_once $this->layout;
    }

    public function all()
    {
        $this->template = ROOT_DIR . '/views/pictures/all.php';

        include_once $this->layout;
    }

    public function add()
    {
        if ($this->isPost) {
            $user_id = $_SESSION['user_id'];
            $albumId = $_POST['albumName'];
            $pictureName = $_POST['pictureName'];
            $description = $_POST['description'];
            $isPublic = $_POST['isPublic'];
            $result = $this->picturesModel->uploadPicture(array('user_id' => $user_id, 'album_id' => $albumId,
                'name' => $pictureName, 'description' => $description, 'is_public' => $isPublic));
            if (!is_null($result['success'])) {
                $this->addInfoMessage($result['success']);
                $this->redirect("pictures");
            } else {
                $this->addErrorMessage($result['error']);
                $this->redirect('pictures', 'add');
            }
        }

        $albums = $this->picturesModel->getAlbumsByUser($_SESSION['user_id']);
        $this->template = ROOT_DIR . '/views/pictures/add.php';

        include_once $this->layout;
    }

    public function album($albumId) {
        $pictures = $this->picturesModel->getByAlbum($albumId);
        $pictureComments = array();

        foreach ($pictures as $p) {
            $comments = $this->picturesModel->getPicturesComments($p['id']);
            if (!empty($comments)) {
                $pictureComments[$comments[0]['id']] = $comments;
            }
        }

        $this->template = ROOT_DIR . '/views/pictures/album.php';

        include_once $this->layout;
    }
}