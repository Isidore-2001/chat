create schema tchat;

create table tchat.users(
    numUsers  serial,
    nom varchar(250) not null,
    prenom varchar(250) not null,
    login varchar(250) not null,
    password varchar(250) not null,
    email varchar(250) not null,
    image varchar(250) not null,
    status varchar(250) not null,
    
    primary key (email)


);


create table tchat.message(
    message_id serial,
    texte varchar(1000) not null,
    
    email1 varchar(250),
    
    email2 varchar(250),
    date_ms time  without time zone ,
    primary key(message_id),
    constraint fk_users
                foreign key (email1) references tchat.users(email)
    on delete cascade,
     constraint fk_users2
                foreign key (email2) references tchat.users(email)
    on delete cascade




);
