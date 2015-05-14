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
        $pictures = $this->picturesModel->getAllPicturesWithVotes();
        $pictureComments = array();

        if (!empty($pictures)) {
            foreach ($pictures as $p) {
                $comments = $this->picturesModel->getPicturesComments($p['id']);
                if (!empty($comments)) {
                    $pictureComments[$comments[0]['id']] = $comments;
                }
            }
        }

        $this->template = ROOT_DIR . '/views/pictures/index.php';

        include_once $this->layout;
    }

    public function id($pictureId)
    {
        if (!$this->isPost) {
            $_SESSION['secToken'] = hash('sha256', microtime());
        }

        if ($this->isPost) {
            $securityToken = $_SESSION['secToken'];
            if (!isset($_SESSION['secToken']) || $securityToken != $_SESSION['secToken']) {
                $this->addErrorMessage('Something went terribly wrong! Please try again.');
                $this->redirect('pictures', 'id');
            }

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

        if ($this->authorization->isLoggedIn()) {
            $this->hasVoted = $this->picturesModel->checkUserPictureVote($_SESSION['user_id'], $pictureId);
            $isOwnPicture = $this->picturesModel->checkPictureOwner($_SESSION['user_id'], $pictureId);
        }


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

    public function album($albumId)
    {
        if (!$this->isPost) {
            $_SESSION['secToken'] = hash('sha256', microtime());
        }

        if ($this->isPost) {
            $securityToken = $_SESSION['secToken'];
            if (!isset($_SESSION['secToken']) || $securityToken != $_SESSION['secToken']) {
                $this->addErrorMessage('Something went terribly wrong! Please try again.');
                $this->redirect('pictures', 'album');
            }

            $user_id = $_SESSION['user_id'];
            $comment = $_POST['comment'];
            if (!empty($comment)) {
                $this->picturesModel->postAlbumComment(array('user_id' => $user_id, 'album_id' => $albumId,
                    'comment' => $comment));
                $this->addInfoMessage('Comment added successfully!');
            } else {
                $this->addErrorMessage('Couldn not add the comment. Please try again.');
            }
        }

        $album = $this->picturesModel->getAlbum($albumId);
        $pictures = $this->picturesModel->getByAlbum($albumId);
        $pictureComments = array();

        foreach ($pictures as $p) {
            $comments = $this->picturesModel->getPicturesComments($p['id']);
            if (!empty($comments)) {
                $pictureComments[$comments[0]['id']] = $comments;
            }
        }

        if ($this->authorization->isLoggedIn()) {
            $this->hasVoted = $this->picturesModel->checkUserAlbumVote($_SESSION['user_id'], $albumId);
        }

        $albumComments = $this->picturesModel->getAlbumsComments($albumId);

        $this->template = ROOT_DIR . '/views/pictures/album.php';

        include_once $this->layout;
    }


}