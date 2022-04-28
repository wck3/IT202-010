

CREATE TABLE IF NOT EXISTS Shop_Cart(
    
    id int AUTO_INCREMENT PRIMARY KEY,
    item_id int,
    quantity int,
    user_id int,
    price int DEFAULT 9999,
    created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    modified TIMESTAMP DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES Users(id),
    FOREIGN KEY (item_id) REFERENCES Shop_Items(id),
    UNIQUE KEY (user_id, item_id),
    CHECK (quantity>=0)
)
