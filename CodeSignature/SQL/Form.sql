CREATE DATABASE 'college';

CREATE TABLE 'utilisateur' (
    'user_id' SMALLINT UNSIGNED NOT NULL,
    'user_nom' varchar(255) NOT NULL,
    'user_prénom'varchar(255) NOT NULL,
    'user_pseudo' varchar(50) NOT NULL,
    'user_pays' int(255) NOT NULL,
    'user_email' varchar(80) NOT NULL,
    'user_password' varchar(255)NOT NULL,
    PRIMARY KEY ('student_id')
)