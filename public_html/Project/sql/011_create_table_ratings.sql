CREATE TABLE IF NOT EXISTS ratings (

    id int AUTO_INCREMENT PRIMARY KEY,
    product_id int,
    user_id int, 
    rating tinyint,
    comment TEXT,
    created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    modified TIMESTAMP DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
    FOREIGN KEY (product_id) REFERENCES Shop_Items(id),
    FOREIGN KEY (user_id) REFERENCES Users(id)

)