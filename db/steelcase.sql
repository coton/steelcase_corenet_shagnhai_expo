 /*========================================================= Steelcase HBR数据库*/

/*================================= 建立表空间及对应dba*/
 -- create user
 GRANT USAGE ON *.* TO 'steelcase'@'localhost' IDENTIFIED BY 'steelcase' WITH GRANT OPTION;
 -- create database
 CREATE DATABASE steelcase CHARACTER SET  utf8  COLLATE utf8_general_ci;
 -- grant user 权限1,权限2,select,insert,update,delete,create,drop,index,alter,grant,references,reload,shutdown,process,file等14个权限
 GRANT SELECT,INSERT,UPDATE,DELETE,CREATE,DROP,LOCK TABLES ON steelcase.*  TO 'steelcase'@'localhost' IDENTIFIED BY 'steelcase';

 /*================================= 建立表、表主外键、多表关联等T-SQL*/
 -- 改变当前数据库
 USE steelcase;

/*
建立注册信息表
*/
create table user (
id INT(19) NOT NULL auto_increment COMMENT 'ID标识',
name VARCHAR(128) NOT NULL COMMENT '姓名',
company VARCHAR(128) NOT NULL COMMENT '公司信息',
phone CHAR(11) NOT NULL COMMENT '电话号码',
email VARCHAR(128) NOT NULL COMMENT 'Email邮箱',
area VARCHAR(2) NOT NULL COMMENT '来自哪个区域',
product VARCHAR(128) NOT NULL COMMENT '来自哪个产品',
primary key (id) -- 主键
) ENGINE=InnoDB DEFAULT CHARSET=utf8;