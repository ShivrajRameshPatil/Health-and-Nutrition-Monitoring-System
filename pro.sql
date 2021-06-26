DROP DATABASE health_app;
CREATE DATABASE IF NOT EXISTS health_app;
USE health_app;

show tables;

CREATE TABLE appuser
(
userid INT AUTO_INCREMENT,
username VARCHAR(60) NOT NULL,
user_email VARCHAR(100) NOT NULL ,
user_password VARCHAR(15) NOT NULL,
user_confirm VARCHAR(15) NOT NULL,
user_age INT,
user_gender VARCHAR(1),
user_weight FLOAT,
user_height INT,
PRIMARY KEY(userid)
);
describe appuser;
select * from appuser;


CREATE TABLE goals(
userid INT,
goal_weight FLOAT NOT NULL,
goal_date DATE,
goal_bcal INT DEFAULT '0',
goal_ical INT DEFAULT '0',
PRIMARY KEY(userid),
FOREIGN KEY(userid) REFERENCES appuser(userid) ON DELETE CASCADE
);
describe goals;
select * from goals;


CREATE TABLE inspiring_stories(
userid INT,
rate INT,
story VARCHAR(200) NOT NULL,
PRIMARY KEY(userid),
FOREIGN KEY(userid) REFERENCES appuser(userid) ON DELETE CASCADE
);
describe inspiring_stories;
select * from inspiring_stories;

CREATE TABLE track_record(
userid INT,
track_date DATE,
track_bcal INT DEFAULT 0,
track_ical INT DEFAULT 0,
PRIMARY KEY(userid,track_date),
FOREIGN KEY(userid) REFERENCES appuser(userid) ON DELETE CASCADE,
FOREIGN KEY(userid) REFERENCES appuser(userid) ON UPDATE CASCADE
);
describe track_record;
drop table track_record;
select * from track_record;
UPDATE track_record SET track_ical=100 WHERE track_date='2020-01-22';
INSERT INTO track_record (userid,track_date,track_bcal) VALUES ('$uid','$date','$bcal');

CREATE TABLE activity(
act_id INT AUTO_INCREMENT,
act_name VARCHAR(40) UNIQUE NOT NULL,
act_time INT NOT NULL,
act_bcal INT NOT NULL,
PRIMARY KEY(act_id)
);
describe activity;
select * from activity;
insert into activity(act_name,act_time,act_bcal) values('Burpees',1,546);
insert into activity(act_name,act_time,act_bcal) values('Climbing Stairs',1,273);
insert into activity(act_name,act_time,act_bcal) values('Sit ups',1,259);
insert into activity(act_name,act_time,act_bcal) values('Hiking',1,409);
insert into activity(act_name,act_time,act_bcal) values('Jumping Jacks',1,546);
insert into activity(act_name,act_time,act_bcal) values('Stationary Bike',1,464);
insert into activity(act_name,act_time,act_bcal) values('Squats',1,341);
insert into activity(act_name,act_time,act_bcal) values('Swimming',1,396);
insert into activity(act_name,act_time,act_bcal) values('Yoga',1,273);
insert into activity(act_name,act_time,act_bcal) values('Elliptical',1,341);
insert into activity(act_name,act_time,act_bcal) values('Lifitng Weights',1,239);
insert into activity(act_name,act_time,act_bcal) values('Jumping Rope',1,750);
insert into activity(act_name,act_time,act_bcal) values('Walking',1,239);

CREATE TABLE food(
food_id INT AUTO_INCREMENT,
food_name VARCHAR(40) NOT NULL,
food_class VARCHAR(40) NOT NULL,
food_qty INT NOT NULL,
food_ical INT NOT NULL,
PRIMARY KEY(food_id)
);
describe food;
select * from food;
insert into food(food_name,food_class,food_qty,food_ical) values('Boiled Egg','Breakfast',1,80);
insert into food(food_name,food_class,food_qty,food_ical) values('Fried Egg','Breakfast',1,110);
insert into food(food_name,food_class,food_qty,food_ical) values('Egg Omlette','Breakfast',1,120);
insert into food(food_name,food_class,food_qty,food_ical) values('Paratha','Breakfast',1,150);
insert into food(food_name,food_class,food_qty,food_ical) values('Idli','Breakfast',1,100);
insert into food(food_name,food_class,food_qty,food_ical) values('Sambhar','Breakfast',1,150);
insert into food(food_name,food_class,food_qty,food_ical) values('Bread Butter','Breakfast',1,90);
insert into food(food_name,food_class,food_qty,food_ical) values('Tea','Breakfast',1,45);
insert into food(food_name,food_class,food_qty,food_ical) values('Coffee','Breakfast',1,45);
insert into food(food_name,food_class,food_qty,food_ical) values('Milk','Breakfast',1,75);

insert into food(food_name,food_class,food_qty,food_ical) values('Rice','Lunch',1,120);
insert into food(food_name,food_class,food_qty,food_ical) values('Dal','Lunch',1,150);
insert into food(food_name,food_class,food_qty,food_ical) values('Curd','Lunch',1,100);
insert into food(food_name,food_class,food_qty,food_ical) values('Salad','Lunch',1,100);
insert into food(food_name,food_class,food_qty,food_ical) values('Vegetable Curry','Lunch',1,150);
insert into food(food_name,food_class,food_qty,food_ical) values('Chapati','Lunch',1,60);

insert into food(food_name,food_class,food_qty,food_ical) values('Rice','Dinner',1,120);
insert into food(food_name,food_class,food_qty,food_ical) values('Dal','Dinner',1,150);
insert into food(food_name,food_class,food_qty,food_ical) values('Curd','Dinner',1,100);
insert into food(food_name,food_class,food_qty,food_ical) values('Salad','Dinner',1,100);
insert into food(food_name,food_class,food_qty,food_ical) values('Vegetable Curry','Dinner',1,150);
insert into food(food_name,food_class,food_qty,food_ical) values('Chapati','Dinner',1,60);
insert into food(food_name,food_class,food_qty,food_ical) values('Soup','Dinner',1,75);

-- SELECT * FROM food where food_name='Milk'and food_class='Breakfast';

CREATE TABLE contact_req(
req_id INT AUTO_INCREMENT,
email VARCHAR(100) NOT NULL,
req_subject VARCHAR(200) NOT NULL,
PRIMARY KEY(REQ_ID)
);
describe contact_req;
select * from contact_req;
delete from contact_req;
alter table contact_req AUTO_INCREMENT=1;

use health_app;
drop table contact_req;
CREATE TABLE nutrtion_val(
item_id INT AUTO_INCREMENT,
item_name VARCHAR(40) UNIQUE NOT NULL,
item_imglink VARCHAR(40) NOT NULL,
item_nutrition VARCHAR(50) NOT NULL,
PRIMARY KEY(item_id)
);
describe nutrtion_val;
select * from nutrtion_val;


CREATE TABLE appadmin(
admin_id INT AUTO_INCREMENT,
admin_email VARCHAR(100) UNIQUE NOT NULL,
admin_password VARCHAR(15) NOT NULL,
PRIMARY KEY(admin_id)
);
describe appadmin;
select * from appadmin;

insert into appadmin (admin_email,admin_password) values ('admin@db.com','1234');

show tables;





-- create table dietician(
-- dietician_id int primary key,
-- email varchar(30) unique,
-- password2 varchar(30) not null,
-- iet_name varchar(20) unique,
-- description1 varchar(50) not null,
-- charges int);

-- create table payment(
-- user_id int,pay_id int,
-- dietician_id int,
-- bill_amt int not null,
-- bank_name varchar(30) not null,
-- card_no varchar(20) not null,
-- primary key(user_id,pay_id,dietician_id),
-- foreign key(user_id) references user(user_id),
-- foreign key(dietician_id) references dietician(dietician_id));



