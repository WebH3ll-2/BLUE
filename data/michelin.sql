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
CREATE TABLE user(
    user_id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(50) NOT NULL,
    profile VARCHAR(50) DEFAULT 'default.png',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (user_id)
);

CREATE TABLE review(
    review_id INT NOT NULL AUTO_INCREMENT,
    author_id INT NOT NULL,
    review_title VARCHAR(50) NOT NULL,
    review_content VARCHAR(3000) NOT NULL,
    review_image VARCHAR(50) DEFAULT 'no-image.png',
    review_address VARCHAR(50) NOT NULL,
    review_likes INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (review_id),
    FOREIGN KEY (author_id) REFERENCES user(user_id)
);

CREATE TABLE comment(
    comment_id INT NOT NULL AUTO_INCREMENT,
    user_id INT NOT NULL,
    review_id INT NOT NULL,
    comment_content VARCHAR(400) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (comment_id),
    FOREIGN KEY (user_id) REFERENCES user(user_id),
    FOREIGN KEY (review_id) REFERENCES review(review_id)
);

CREATE TABLE bookmark(
    bookmark_id INT NOT NULL AUTO_INCREMENT,
    user_id INT NOT NULL,
    review_id INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (bookmark_id),
    FOREIGN KEY (user_id) REFERENCES user(user_id),
    FOREIGN KEY (review_id) REFERENCES review(review_id)
);

CREATE TABLE likes(
    likes_id INT NOT NULL AUTO_INCREMENT,
    user_id INT NOT NULL,
    review_id INT NOT NULL,
    PRIMARY KEY (likes_id),
    FOREIGN KEY (user_id) REFERENCES user(user_id),
    FOREIGN KEY (review_id) REFERENCES review(review_id)
);


COMMIT;