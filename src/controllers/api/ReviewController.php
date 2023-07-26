<?php

namespace Controllers\API;

use Models\ReviewModel;

error_reporting(E_ALL);
ini_set("display_errors", 1);

/**
 * http://localhost/cau-michelin/api/reviews
 */
class Reviews
{
    private $reviewModel;

    public function __construct()
    {
        $this->reviewModel = new ReviewModel();
    }

    // api/reviews
    // api/reviews/root
    public function root()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            echo $this->reviewModel->getAllReviews();
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $author_id = 1; #TODO: call this from session
            $this->reviewModel->createReview($author_id, $_POST['title'], $_POST['content'], 'image.png', $_POST['address']);
            echo 'review created!';
        }
        if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
            echo 'review updated!';
        }
        if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
            echo 'review deleted!';
        }
    }

    // api/reviews/:id
    // api/reviews/process-review-with-id
    public function processReviewWithId($params)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            echo $this->reviewModel->getReviewById($params['id']);
        }

        // check if author of review is the same as the author of request
        $author_id = 1; #TODO: call this from session
        if (!$this->reviewModel->checkReviewAuthor($params['id'], $author_id)) {
            echo 'you are not the author of this review!';
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
            // get PUT body
            parse_str(file_get_contents('php://input'), $_PUT);

            if ($this->reviewModel->updateReviewById($params['id'], $_PUT['title'], $_PUT['content'], $_PUT['address'])) {
                echo 'review updated!';
            }
        }
        if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
            if ($this->reviewModel->deleteReviewById($params['id'])) {
                echo 'review deleted!';
            }
        }
    }

    // api/reviews/:id/image
    public function uploadImage($params)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            echo 'This is review ' . $params['id'] . '. image path = ...';
        }
    }

    // api/reviews/:id/comment
    // api/reviews/reply-comment
    public function replyComment($params)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            echo 'This is review ' . $params['id'] . '. comments { ... }';
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            echo 'review commented!';
        }
    }

    // api/reviews/:id/like
    // api/reviews/like-review
    public function likeReview($params)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            echo 'This is review ' . $params['id'] . '. count like: 10';
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            echo 'review ' . $params['id'] . ' liked!';
        }
    }
}
