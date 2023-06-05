CREATE TABLE tbl_product(
    pro_id INT(11) PRIMARY KEY auto_increment,
    pro_name VARCHAR(255),
    pro_price INT(11),
    pro_man_date datetime DEFAULT current_timestamp,
    added_by INT(11) DEFAULT 1,
    added_on datetime DEFAULT current_timestamp,
    updated_by INT(11) DEFAULT 1,
    updated_on datetime DEFAULT current_timestamp,
    status INT(1) DEFAULT 1
);



CREATE TABLE tbl_user(
    user_id INT(11) PRIMARY KEY auto_increment,
    username VARCHAR(255),
    password VARCHAR(255),
    email VARCHAR(255),
    added_on datetime DEFAULT current_timestamp,
    updated_on datetime DEFAULT current_timestamp,
    status INT(1) DEFAULT 1
);