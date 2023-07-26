<?php

namespace Models;

use Models\Database;

class ReviewModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    /**
     * CREATE
     * @return boolean
     */
    public function createReview($author_id, $title, $content, $image_path, $address): bool
    {
        $this->db->query('INSERT INTO review (author_id, review_title, review_content, review_image, review_address) VALUES (:author_id, :title, :content, :image_path, :review_address)');
        $this->db->bind(':author_id', $author_id);
        $this->db->bind(':title', $title);
        $this->db->bind(':content', $content);
        $this->db->bind(':image_path', $image_path);
        $this->db->bind(':review_address', $address);

        if ($this->db->execute()) {
            return true;
        }
        return false;
    }

    /**
     * READ
     */
    public function getAllReviews()
    {
        $this->db->query('SELECT * FROM review LIMIT 10');
        $results = $this->db->resultSet();

        if ($results) {
            return json_encode($results);
        }
        return false;
    }

    /**
     * READ
     */
    public function getReviewById($id)
    {
        $this->db->query('SELECT * FROM review WHERE review_id = :id LIMIT 1');
        $this->db->bind(':id', $id);
        $result = $this->db->single();

        if ($result) {
            return json_encode($result);
        }
        return false;
    }

    /**
     * Update
     */
    public function updateReviewById($id, $title, $content, $address)
    {
        $this->db->query('UPDATE review SET review_title = :title, review_content = :content, review_address = :review_address WHERE review_id = :id');
        $this->db->bind(':id', $id);
        $this->db->bind(':title', $title);
        $this->db->bind(':content', $content);
        // $this->db->bind(':image_path', 'image.png');
        $this->db->bind(':review_address', $address);

        if ($this->db->execute()) {
            return true;
        }
        return false;
    }

    /**
     * Delete
     */
    public function deleteReviewById($id)
    {
        $this->db->query('DELETE FROM review WHERE review_id = :id');
        $this->db->bind(':id', $id);

        if ($this->db->execute()) {
            return true;
        }
        return false;
    }

    /**
     * Check if the user is the author of the review
     */
    public function checkReviewAuthor($review_id, $author_id)
    {
        $this->db->query('SELECT * FROM review WHERE review_id = :review_id AND author_id = :author_id');
        $this->db->bind(':review_id', $review_id);
        $this->db->bind(':author_id', $author_id);
        $result = $this->db->single();

        if ($result) {
            return true;
        }
        return false;
    }
}
