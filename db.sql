create table banner (
    id int not null auto_increment primary key,
    photo varchar(255)
);

create table meta (
    id int not null auto_increment primary key,
    post_id int,
    relation varchar(75),
    content varchar(255)
);

create table taxonomy (
    id int not null auto_increment primary key,
    post_id int,
    post_taxonomy_id int,
    relation varchar(75)
);

create table product (
    id int not null auto_increment primary key,
    name varchar(75),
    slug varchar(75),
    description text,
    price double,
    price_offer double,
    photo varchar(255),

);

create table category (
    id int not null auto_increment primary key,
    name varchar(75),
    slug varchar(75)
);

create table delivery (
    id int not null auto_increment primary key,
    address varchar(75),
    post_code varchar(75),
    type varchar(75),
    money double
);

create table coupon (
    id int not null auto_increment primary key,
    code varchar(75),
    money double,
    porcetage double
);

create table item (
    id int not null auto_increment primary key,
    order_id int,
    product_id int,
    quantity int
);

create table `order` (
    id int not null auto_increment primary key,
    client_id int,
    product_id int,
    status varchar(75),
    data_register date,
    data_update date
);

create table address (
    id int not null auto_increment primary key,
    name varchar(75),
    client_id int,
    address varchar(255),
    number varchar(30),
    cyte varchar(75),
    complement varchar(75)
);

create table client (
    id int not null auto_increment primary key,
    name varchar(75),
    last_name varchar(75),
    email varchar(100),
    phome varchar(100),
    whatsapp varchar(100),
    password varchar(64),
    photo varchar(75),
    status binary(1),
    data_register date
);

create table admin (
    id int not null auto_increment primary key,
    name varchar(75),
    password varchar(64),
    photo varchar(75)
);

