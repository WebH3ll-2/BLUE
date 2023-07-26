<?php

namespace Controllers\API;

/**
 * http://localhost/cau-michelin/api/reviews
 */
class Reviews
{
    // api/reviews
    // api/reviews/root
    public function root()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            echo 'This is reviews!';
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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
            echo 'This is review ' . $params['id'] . '!';
        }
        if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
            echo 'review updated!';
        }
        if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
            echo 'review deleted!';
        }
    }

    // api/reviews/:id/image
    public function uploadImage($params)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            echo 'review image uploaded!';
        }
    }

    // api/reviews/:id/comment
    // api/reviews/reply-comment
    public function replyComment($params)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            echo 'review commented!';
        }
    }

    // api/reviews/:id/like
    // api/reviews/like-review
    public function likeReview($params)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            echo 'review liked!';
        }
    }
}
