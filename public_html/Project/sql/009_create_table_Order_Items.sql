CREATE TABLE IF NOT EXISTS Order_Items(
     
    id int AUTO_INCREMENT PRIMARY KEY,
    order_id int,
    item_id int,
    quantity int,
    unit_price int,
    FOREIGN KEY (order_id) REFERENCES Shop_Orders(id),
    FOREIGN KEY (item_id) REFERENCES Shop_Items(id),
    UNIQUE KEY (order_id, item_id),
    CHECK (quantity>=0)

);



