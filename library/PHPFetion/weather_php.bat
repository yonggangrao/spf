@echo off
:�л���php�����̷��ĸ�Ŀ¼
d:
:����php��Ŀ¼
cd D:\AppServ\php5
:ִ��php�ű���URL�������޸�
php -r "file_get_contents('http://127.0.0.1/test/feixin/cron.php');"