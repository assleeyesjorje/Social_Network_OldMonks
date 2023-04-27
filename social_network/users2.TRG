TYPE=TRIGGERS
triggers='CREATE DEFINER=`root`@`localhost` trigger t before insert on users2 for each row set NEW.recovery_account = \'recovery123\''
sql_modes=1098907648
definers='root@localhost'
client_cs_names='utf8mb4'
connection_cl_names='utf8mb4_general_ci'
db_cl_names='utf8mb4_general_ci'
created=164270884565
