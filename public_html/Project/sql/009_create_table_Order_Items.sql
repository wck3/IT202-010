CREATE TABLE IF NOT EXISTS Order_Items(
     
    id int AUTO_INCREMENT PRIMARY KEY,
    item_id int,
    quantity int,
    unit_price int,
    user_id int,
    FOREIGN KEY (user_id) REFERENCES Users(id),
    FOREIGN KEY (item_id) REFERENCES Shop_Items(id),
    UNIQUE KEY (user_id, item_id),
    CHECK (quantity>=0)

);