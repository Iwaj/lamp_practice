CREATE TABLE history(
    orde_id INT AUTO_INCREMENT,
    user_id VARCHAR(100),
    totalprice INT DEFAULT 0,
    date_time DATETIME,
    primary key(orde_id)
);

CREATE TABLE detal(
    orde_id INT,
    item_id INT,
    date_time DATETIME,
    amount INT,
);