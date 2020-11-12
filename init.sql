create table country
(
    id int auto_increment,
    name varchar(128) not null,
    constraint country_pk
        primary key (id)
);

create table region
(
    id int auto_increment,
    name varchar(128) not null,
    country_id int not null,
    constraint region_pk
        primary key (id),
    constraint region_country_id_fk
        foreign key (country_id) references country (id)
            on update cascade on delete cascade
);

create table city
(
    id int auto_increment,
    name varchar(128) not null,
    region_id int not null,
    constraint city_pk
        primary key (id),
    constraint city_region_id_fk
        foreign key (region_id) references region (id)
            on update cascade on delete cascade
);

insert into country (name) values ('Украина');
insert into country (name) values ('Россия');

insert into region (name, country_id) values ('Киевская область', 1);
insert into region (name, country_id) values ('Донецкая область', 1);
insert into region (name, country_id) values ('Амурская область', 2);
insert into region (name, country_id) values ('Ленинградская область', 2);

insert into city (name, region_id) values ('Киев', 1);
insert into city (name, region_id) values ('Житомир', 1);
insert into city (name, region_id) values ('Борисполь', 1);
insert into city (name, region_id) values ('Донецк', 2);
insert into city (name, region_id) values ('Мариуполь', 2);
insert into city (name, region_id) values ('Макеевка', 2);
insert into city (name, region_id) values ('Благовещенск', 3);
insert into city (name, region_id) values ('Белогорск', 3);
insert into city (name, region_id) values ('Тында', 3);
insert into city (name, region_id) values ('Санкт Петербург', 4);
insert into city (name, region_id) values ('Гатчина', 4);
insert into city (name, region_id) values ('Луга', 4);