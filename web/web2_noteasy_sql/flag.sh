#!/usr/bin/env sh
mysql -e "create database jlenu_ctf; use jlenu_ctf;source /db.sql; UPDATE flag SET flag = '$FLAG';" -uroot -proot

export FLAG=not_flag
FLAG=not_flag

rm -rf /db.sql
rm -rf /flag.sh
