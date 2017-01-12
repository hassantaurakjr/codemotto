
create table account (
account_id 	int primary key auto_increment,
email		varchar(45) not null,
username	varchar(45) not null unique,
password	varchar(45) not null,
gender		varchar(45) not null,
type		int default 0,
avatar		varchar(90) default null
);

create table topic (
topic_id	int primary key auto_increment,
topic		varchar(45) not null,
added_by	varchar(45) not null,
time_added	datetime,
discussion_counter	int default 0
);

create table discussion (
topic_id		int,
discussion_id	int primary key auto_increment,
discussion		text not null,
explanation		text,
actual_code		text,
added_by		varchar(45) not null,
time_added		datetime,
views_counter	int	default 0,
answers_counter	int	default 0,
constraint fk_topic_id foreign key(topic_id) references topic(topic_id)
);

create table answer (
discussion_id	int,
answer_id		int primary key auto_increment,
explanation		text,
actual_code		text,
resources		text,
added_by		varchar(45) not null,
time_added		datetime,
votes_counter	int default 0,
constraint fk_discussion_id foreign key(discussion_id) references discussion(discussion_id)
);

create table resources (
answer_id		int,
resources_id	int primary key auto_increment,
website			varchar(90),
title			varchar(90),
constraint fk_answer_id foreign key(answer_id) references answer(answer_id)
);

create table comments (
answer_id		int,
comments_id		int primary key auto_increment,
comments		text,
constraint fk_answer_id2 foreign key(answer_id) references answer(answer_id)
);