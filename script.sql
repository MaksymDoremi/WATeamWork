create database WATeamWork;

use WATeamWork;

start transaction;

create table users(
	id int primary key auto_increment,
    name varchar(255) not null unique,
	password varchar(255) not null check(length(password) > 5),
    email varchar(255) not null unique check(email like '%@%'),
    is_admin bit not null -- 0 -not admin, 1- admin
);


DELIMITER //

create procedure `add_user` (in namex varchar(20), in emailx varchar(200), in passwordx varchar(255), in is_adminx bit, out success tinyint)
begin
	declare exist int default 0;
    
    select count(id) into exist from users where namex = name or emailx = email;
    
    if exist = 0
    then
		insert into users(name, email, password, is_admin)
			values
				(namex, emailx, passwordx, is_adminx);

		set success = 1;
	else
		set success = 0;
	end if;
end //

-- objednavky
create table user_order(
	id int primary key auto_increment,
    is_canceled bit not null, -- 0 not visible to others, 1 - visible to others
    message varchar(255) not null,
    user_id int,
    foreign key (user_id) references users(id)
);


DELIMITER //

CREATE PROCEDURE insert_user_order(
    IN message_text VARCHAR(255),
    IN is_canceled_bit bit, 
    IN user_name VARCHAR(255)
)
BEGIN
    DECLARE user_id_val INT;

    -- Get user_id based on user_name
    SELECT id INTO user_id_val FROM users WHERE name = user_name;

    -- Insert the message
    INSERT INTO message (message, is_canceled, user_id)
    VALUES (message_text, is_canceled_bit, user_id_val);

END //

DELIMITER ;


commit;

