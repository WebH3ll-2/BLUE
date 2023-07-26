START TRANSACTION;
SET time_zone = "+00:00"; -- UTC


-- --------------------------
-- Database: `michelin_db` --
-- --------------------------
CREATE DATABASE michelin_db;
USE `michelin_db`;

-- --------------------------
--     Table structures    --
-- --------------------------
CREATE TABLE USER(
    user_id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL,
    profile VARCHAR(50) DEFAULT 'default.png',
    PRIMARY KEY (user_id)
);

CREATE TABLE REVIEW(
    review_id INT NOT NULL AUTO_INCREMENT,
    author_id INT NOT NULL,
    review_title VARCHAR(50) NOT NULL,
    review_content VARCHAR(3000) NOT NULL,
    review_image VARCHAR(50) DEFAULT 'no-image.png',
    review_address VARCHAR(50) NOT NULL,
    review_likes INT DEFAULT 0,
    PRIMARY KEY (review_id),
    FOREIGN KEY (author_id) REFERENCES USER(user_id)
);

CREATE TABLE COMMENT(
    comment_id INT NOT NULL AUTO_INCREMENT,
    user_id INT NOT NULL,
    review_id INT NOT NULL,
    comment_content VARCHAR(400) NOT NULL,
    PRIMARY KEY (comment_id),
    FOREIGN KEY (user_id) REFERENCES USER(user_id),
    FOREIGN KEY (review_id) REFERENCES REVIEW(review_id)
);

CREATE TABLE BOOKMARK(
    bookmark_id INT NOT NULL AUTO_INCREMENT,
    user_id INT NOT NULL,
    review_id INT NOT NULL,
    PRIMARY KEY (bookmark_id),
    FOREIGN KEY (user_id) REFERENCES USER(user_id),
    FOREIGN KEY (review_id) REFERENCES REVIEW(review_id)
);

CREATE TABLE LIKES(
    likes_id INT NOT NULL AUTO_INCREMENT,
    user_id INT NOT NULL,
    review_id INT NOT NULL,
    PRIMARY KEY (likes_id),
    FOREIGN KEY (user_id) REFERENCES USER(user_id),
    FOREIGN KEY (review_id) REFERENCES REVIEW(review_id)
);


COMMIT;