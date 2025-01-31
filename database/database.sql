create table if not exists users (
    id integer primary key,
    name varchar(255),
    email varchar(255),
    password varchar(255),
    created_at timestamp
);
