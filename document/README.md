# Hướng dẫn cài đặt site

Tạo CSDL bằng cách chạy đoạn SQL sau trong PHPmyadmin

CREATE USER 'egov_nukeviet'@'localhost' IDENTIFIED BY 'IyeXh41v2rvN6JXVGwGx';

GRANT USAGE ON * . * TO 'egov_nukeviet'@'localhost' IDENTIFIED BY 'IyeXh41v2rvN6JXVGwGx' WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0 ;

CREATE DATABASE `egov_nukeviet` ;

GRANT SELECT , INSERT , UPDATE , DELETE , CREATE , DROP , INDEX , ALTER , CREATE TEMPORARY TABLES , CREATE VIEW , SHOW VIEW , CREATE ROUTINE, ALTER ROUTINE, EXECUTE ON `egov_nukeviet` . * TO 'egov_nukeviet'@'localhost';

Import CSDL từ file: /document/egov_nukeviet.sql

Copy các file:

document/.htaccess	--->  	/.htaccess
document/config.php		--->  	/config.php
document/config_global.php		--->  	 /data/config/config_global.php

# Đăng nhập
Địa chỉ: http://egov.nukeviet.dev
Tài khoản: admin
Mật khẩu: esnMcjxxAG48IY

# Ghi chú lập trình
https://docs.google.com/document/d/1rsUazWG14P8Odm-db-4mdXE1osGWU_ZizxE3Ywiv-Ic/edit