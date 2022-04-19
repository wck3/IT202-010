CREATE TABLE IF NOT EXISTS Shop_Orders(
    id int AUTO_INCREMENT PRIMARY KEY,
    user_id int,
    created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    total_price int,
    address varchar(95),
    payment_method varchar(15) NOT NULL,
    money_recieved int,
    FOREIGN KEY (user_id) REFERENCES Users(id)
);