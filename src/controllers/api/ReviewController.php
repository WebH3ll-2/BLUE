<?php

namespace Controllers\Review;

/**
 * http://localhost/cau-michelin/api/reviews/index
 */
class Reviews
{
    public function index()
    {
        echo 'This is ' . __CLASS__;
    }

    public function reviews(): Returntype
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
}
