create table ci_admin(
id int(11) unsigned auto_increment primary key comment "ID",
username varchar(128) not null comment "用户名" ,
password varchar(32) not null comment "密码",
create_time int(11) default 0 comment "创建时间",
update_time int(11) default 0 comment "更新时间",
status tinyint(2) default 1 comment "状态"
);



create table ci_channel(
id int(11) unsigned auto_increment primary key comment "ID",
pid int(11) unsigned default 0 comment "父类ID",
title varchar(128) not null comment "标题",
name varchar(64) not null comment "标识",
number int(11) default 0 comment "文章数目",
create_time int(11) default 0 comment "创建时间",
update_time int(11) default 0 comment "更新时间",
status tinyint(2) default 1 comment "状态"
);