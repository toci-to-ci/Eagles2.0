create table users
(
    id serial primary key,
    creationDate timestamp default current_timestamp,
    name text,
    login text,
    password txt
);

select * from users;