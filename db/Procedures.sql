-- DELIMITER $$
-- DROP PROCEDURE IF EXISTS sp_action_select_one$$
-- CREATE PROCEDURE sp_action_select_one(IN request INT)
-- BEGIN
--     SELECT Act_id, Act_observation, Act_date, Stat_name FROM action
--     INNER JOIN status ON action.Stat_id = status.Stat_id
--     WHERE Req_id = request AND action.Stat_id > 12
--     ORDER BY Act_id DESC;
-- END$$

-- DELIMITER $$
-- DROP PROCEDURE IF EXISTS sp_action_insert$$
-- CREATE PROCEDURE sp_action_insert(IN id INT, IN observation VARCHAR(300), IN Actdate DATETIME, IN user INT, IN request INT, IN stat INT)
-- BEGIN
--     INSERT INTO action (Act_id, Act_observation, Act_date, User_id, Req_id, stat_id) VALUES (id, observation, Actdate, user, request, stat);
--     SELECT ROW_COUNT();
-- END$$

DELIMITER $$
DROP PROCEDURE IF EXISTS sp_client_insert_update$$
CREATE PROCEDURE sp_client_insert_update(IN id INT, IN name VARCHAR(100), IN identification VARCHAR(15), IN address VARCHAR(200), IN tel VARCHAR(10), IN email VARCHAR(320), IN contactName VARCHAR(100), IN contactTitle VARCHAR(100), IN contactTel VARCHAR(10), IN contactCel VARCHAR(15), IN contactEmail VARCHAR(320), IN stat INT, IN isUser INT, IN pass VARCHAR(100), IN company INT)
BEGIN
    SET @exist = (SELECT COUNT(Client_id)FROM client WHERE Client_id = id); 
    IF @exist = 0 THEN 
		INSERT INTO client (Client_name, Client_identification, Client_address, Client_tel, Client_email, Client_contactName, Client_contactTitle, Client_contactTel, Client_contactCel, Client_contactEmail, Stat_id, Client_user) VALUES (name, identification, address, tel, email, contactName, contactTitle, contactTel, contactCel, contactEmail, stat, isUser);
    ELSE
    	UPDATE client SET Client_identification = identification, Client_name = name, Client_address = address, Client_tel = tel, Client_email = email, Client_contactName = contactName, Client_contactTitle = contactTitle, Client_contactTel = contactTel, Client_contactCel = contactCel, Client_contactEmail = contactEmail, Stat_id = stat, Client_user = isUser
        WHERE Client_id = id;
    END IF;
    IF isUSer = 1 THEN
      SET @passMD5 = (SELECT MD5(pass));
      CALL sp_user_insert_update(name, identification, email, 'Cliente/Usuario', 6, @passMD5, tel, 0, 1, 1, company);
    END IF;
    SELECT ROW_COUNT();
END$$

DELIMITER $$
DROP PROCEDURE IF EXISTS sp_client_insert$$
CREATE PROCEDURE sp_client_insert(IN name VARCHAR(100), IN identification VARCHAR(15), IN address VARCHAR(200), IN tel VARCHAR(10), IN email VARCHAR(320), IN contactName VARCHAR(100), IN title VARCHAR(100), IN contactTel VARCHAR(10), IN contactCel VARCHAR(15), IN contactEmail VARCHAR(320))
BEGIN
    INSERT INTO client (Client_name, Client_identification, Client_address, Client_tel, Client_email, Client_contactName, Client_contactTitle, Client_contactTel, Client_contactCel, Client_contactEmail) VALUES (name, identification, address, tel, email, contactName, title, contactTel, contactCel, contactEmail);
SELECT Client_id FROM client WHERE Client_identification=identification;
END$$
DELIMITER ;

DELIMITER $$
DROP PROCEDURE IF EXISTS sp_client_active$$
CREATE PROCEDURE sp_client_active(IN name VARCHAR(100))
BEGIN
    IF name IS NULL THEN
        SELECT Client_id, Client_name, Client_identification, Client_tel, Client_email,Client_contactName, Client_contactCel, Client_contactEmail FROM client
       WHERE Stat_id = 3;
   ELSE
       SELECT Client_id, Client_name, Client_identification, Client_tel, Client_email,Client_contactName, Client_contactCel, Client_contactEmail FROM client WHERE (Client_name LIKE CONCAT('%', name ,'%') OR Client_identification LIKE CONCAT('%', name ,'%')) AND Stat_id = 3;
   END IF;
END$$
DELIMITER ;

DELIMITER $$
DROP PROCEDURE IF EXISTS sp_client_id$$
CREATE PROCEDURE sp_client_id(IN email VARCHAR(320))
BEGIN
    SELECT Client_id, Client_name FROM client
    WHERE Client_email LIKE email;
END$$
DELIMITER ;

DELIMITER $$
DROP PROCEDURE IF EXISTS sp_client_select_identification$$
CREATE PROCEDURE sp_client_select_identification(IN identification VARCHAR(15))
BEGIN    
    SELECT Client_id, Client_name, Client_identification FROM client WHERE Client_identification = identification;
END$$
DELIMITER ;

DELIMITER $$
DROP PROCEDURE IF EXISTS sp_client_select_all$$
CREATE PROCEDURE sp_client_select_all()
BEGIN
SELECT Client_id, Client_name, Client_identification, Client_tel, Client_contactName, Client_contactCel, Client_contactEmail, Stat_id FROM client;
END$$
DELIMITER ;

DELIMITER $$
DROP PROCEDURE IF EXISTS sp_client_select_one$$
CREATE PROCEDURE sp_client_select_one(IN id INT)
BEGIN
    SELECT Client_id, Client_name, Client_identification, Client_address, Client_tel, Client_email, Client_contactName, Client_contactTitle, Client_contactTel, Client_contactCel, Client_contactEmail, Stat_id, Client_user FROM client WHERE Client_id = id;
END$$
DELIMITER ;

DELIMITER $$
DROP PROCEDURE IF EXISTS sp_client_select_search$$
CREATE PROCEDURE sp_client_select_search(IN name VARCHAR(100))
    NO SQL
BEGIN
    IF name IS NULL THEN
        SELECT Client_id, Client_name, Client_identification, Client_tel, Client_email,Client_contactName, Client_contactCel, Client_contactEmail FROM client;
   ELSE
       SELECT Client_id, Client_name, Client_identification, Client_tel, Client_email,Client_contactName, Client_contactCel, Client_contactEmail FROM client WHERE Client_name LIKE CONCAT('%', name ,'%') OR Client_identification LIKE CONCAT('%', name ,'%');
   END IF;
END$$
DELIMITER ;

DELIMITER $$
DROP PROCEDURE IF EXISTS sp_client_select_id$$
CREATE PROCEDURE sp_client_select_id(IN email VARCHAR(320)) 
BEGIN
    SELECT Client_id FROM client WHERE Client_email = email; 
END$$

DELIMITER $$
DROP PROCEDURE IF EXISTS sp_client_update_status$$
CREATE PROCEDURE sp_client_update_status(IN id INT, IN stat INT)
    NO SQL
BEGIN
	UPDATE client SET Stat_id = stat
    WHERE Client_id = id;
    SELECT ROW_COUNT();
END$$
DELIMITER ;

DELIMITER $$
DROP PROCEDURE IF EXISTS sp_event_insert_update$$
CREATE PROCEDURE sp_event_insert_update(IN idEvent INT, IN title VARCHAR(250), IN color VARCHAR(10), IN startEvent DATETIME, IN endEvent DATETIME, IN client INT)
BEGIN
    IF idEvent = 0 THEN
    	INSERT INTO events (Event_title, Event_color, Event_start, Event_end, Client_id) VALUES (title, color, startEvent, endEvent, client);
    ELSE
    	UPDATE events SET Event_title = title, Event_color = color, Event_start = startEvent, Event_end = endEvent
        WHERE Event_id = idEvent;
    END IF;
    SELECT ROW_COUNT();
END$$

DELIMITER $$
DROP PROCEDURE IF EXISTS sp_event_select_client$$
CREATE PROCEDURE sp_event_select_client(IN idClient INT)
BEGIN
    SELECT Event_id AS id, Event_title AS title, Event_color AS color, Event_start AS start, Event_end AS end, Client_id FROM events 
    WHERE Client_id = idClient
    ORDER BY Event_start DESC;
END$$

DELIMITER $$
DROP PROCEDURE IF EXISTS sp_event_delete$$
CREATE PROCEDURE sp_event_delete(IN idEvent INT)
BEGIN
    DELETE FROM events
    WHERE Event_id = idEvent;
    SELECT ROW_COUNT();
END$$

DELIMITER $$
DROP PROCEDURE IF EXISTS sp_login$$
CREATE PROCEDURE sp_login(IN email VARCHAR(200), IN pass VARCHAR(30))
BEGIN
 SET @mail = '';
 SET @password = '';
 SET @mail = (SELECT COUNT(u.User_email) FROM user u WHERE u.User_email LIKE email AND Stat_id=1);
 IF @mail > 0 THEN
      SET @ok = (SELECT COUNT(*) FROM login LO
        INNER JOIN user USU ON LO.User_id=USU.User_id
        WHERE USU.User_email=email AND LO.Login_password=pass);
   IF @ok > 0 THEN
         SELECT U.User_id, U.User_name, U.User_email FROM user U
            INNER JOIN login L ON U.User_id = L.User_id
            WHERE L.Login_password LIKE pass AND U.User_email like email;
   ELSE
       SELECT 0;
   END IF;
 ELSE
   SELECT 0;
 END IF;
END$$
DELIMITER ;

DELIMITER $$
DROP PROCEDURE IF EXISTS sp_login_insert$$
CREATE PROCEDURE sp_login_insert(IN pass VARCHAR(30), IN user INT)
BEGIN 
  INSERT INTO login(Login_password, User_id) VALUES (pass,user); 
  SELECT ROW_COUNT(); 
END$$
DELIMITER ;

DELIMITER $$
DROP PROCEDURE IF EXISTS sp_login_update$$
CREATE PROCEDURE sp_login_update(IN mail VARCHAR(200), IN pass VARCHAR(30))
BEGIN 
  SET @user_id = (SELECT User_id FROM user WHERE User_email LIKE mail); 
  UPDATE login SET Login_password=pass WHERE User_id = @user_id; 
  SELECT ROW_COUNT(); 
END$$
DELIMITER ;

DELIMITER $$
DROP PROCEDURE IF EXISTS sp_provider_active$$
CREATE PROCEDURE sp_provider_active(IN name VARCHAR(100))
BEGIN
    IF name IS NULL THEN
        SELECT Pro_id, Pro_name, Pro_identification, Pro_tel, Pro_contactName, Pro_contactEmail FROM provider
       WHERE Stat_id = 3;
   ELSE
       SELECT Pro_id, Pro_name, Pro_identification, Pro_tel, Pro_contactName, Pro_contactEmail FROM provider WHERE (Pro_name LIKE CONCAT('%', name ,'%') OR Pro_identification LIKE CONCAT('%', name ,'%'))  AND Stat_id = 3;
   END IF;
END$$
DELIMITER ;

DELIMITER $$
DROP PROCEDURE IF EXISTS sp_provider_insert$$
CREATE PROCEDURE sp_provider_insert(IN name VARCHAR(100), IN identification VARCHAR(15), IN tel VARCHAR(10), IN address VARCHAR(200), IN contactName VARCHAR(100), IN contactEmail VARCHAR(320), IN attach BLOB)
BEGIN
INSERT INTO provider (Pro_name, Pro_identification, Pro_tel, Pro_address, Pro_contactName, Pro_contactEmail, Pro_attach) VALUES (name, identification, tel, address, contactName, contactEmail, attach);
  SELECT ROW_COUNT();
END$$
DELIMITER ;

DELIMITER $$
DROP PROCEDURE IF EXISTS sp_provider_insert_update$$
CREATE PROCEDURE sp_provider_insert_update(IN name VARCHAR(100), IN identification VARCHAR(15), IN tel VARCHAR(10), IN address VARCHAR(200), IN contactName VARCHAR(100), IN contactEmail VARCHAR(320), IN attach BLOB, IN stat INT)
    NO SQL
BEGIN
	SET @exist = (SELECT COUNT(Pro_identification) FROM provider WHERE Pro_identification = identification); 
    IF @exist = 0 THEN 
		INSERT INTO provider (Pro_name, Pro_identification, Pro_tel, Pro_address, Pro_contactName, Pro_contactEmail, Pro_attach, Stat_id) VALUES (name, identification, tel, address, contactName, contactEmail, attach, stat);
    ELSE
    	UPDATE provider SET Pro_name = name, Pro_tel = tel, Pro_address = address, Pro_contactName = contactName, Pro_contactEmail = contactEmail, Pro_attach = attach, Stat_id = stat
        WHERE Pro_identification = identification;
    END IF;
    SELECT ROW_COUNT();
END$$
DELIMITER ;

DELIMITER $$
DROP PROCEDURE IF EXISTS sp_provider_select_all$$
CREATE PROCEDURE sp_provider_select_all()
BEGIN
SELECT Pro_id, Pro_name, Pro_identification, Pro_tel, Pro_contactName, Pro_contactEmail, Stat_id  FROM provider;
END$$
DELIMITER ;

DELIMITER $$
DROP PROCEDURE IF EXISTS sp_provider_select_identification$$
CREATE PROCEDURE sp_provider_select_identification(IN identification VARCHAR(15))
BEGIN
    SELECT Pro_id, Pro_name, Pro_identification FROM provider WHERE Pro_identification = identification;
END$$
DELIMITER ;

DELIMITER $$
DROP PROCEDURE IF EXISTS sp_provider_select_one$$
CREATE PROCEDURE sp_provider_select_one(IN id VARCHAR(15))
BEGIN
SELECT Pro_name, Pro_identification, Pro_tel, Pro_address, Pro_contactName, Pro_contactEmail, Pro_attach, Stat_id FROM provider
WHERE Pro_id = id;
END$$
DELIMITER ;

DELIMITER $$
DROP PROCEDURE IF EXISTS sp_provider_select_prov$$
CREATE PROCEDURE sp_provider_select_prov()
BEGIN
SELECT Pro_id, Pro_name FROM provider;
END$$
DELIMITER ;

DELIMITER $$
DROP PROCEDURE IF EXISTS sp_provider_select_search$$
CREATE PROCEDURE sp_provider_select_search(IN name VARCHAR(100))
    NO SQL
BEGIN
    IF name IS NULL THEN
        SELECT Pro_id, Pro_name, Pro_identification, Pro_tel, Pro_contactName, Pro_contactEmail FROM provider;
   ELSE
       SELECT Pro_id, Pro_name, Pro_identification, Pro_tel, Pro_contactName, Pro_contactEmail FROM provider WHERE Pro_name LIKE CONCAT('%', name ,'%') OR Pro_identification LIKE CONCAT('%', name ,'%');
   END IF;
END$$
DELIMITER ;

DELIMITER $$
DROP PROCEDURE IF EXISTS sp_provider_update$$
CREATE PROCEDURE sp_provider_update(IN id VARCHAR(15), IN name VARCHAR(100), IN identification VARCHAR(15), IN tel VARCHAR(10), IN address VARCHAR(200), IN contactName VARCHAR(100), IN contactEmail VARCHAR(320), IN attach BLOB)
BEGIN
UPDATE provider SET Pro_name = name, Pro_identification = identification, Pro_tel = tel, Pro_address = address, Pro_contactName = contactName, Pro_contactEmail = contactEmail, Pro_attach = attach
WHERE Pro_id = id;
END$$
DELIMITER ;

DELIMITER $$
DROP PROCEDURE IF EXISTS sp_provider_update_status$$
CREATE PROCEDURE sp_provider_update_status(IN id INT, IN stat INT)
    NO SQL
BEGIN
	UPDATE provider SET Stat_id = stat
    WHERE Pro_id = id;
    SELECT ROW_COUNT();
END$$
DELIMITER ;

DELIMITER $$
DROP PROCEDURE IF EXISTS sp_quotation_select_date$$
CREATE PROCEDURE sp_quotation_select_date(IN iniDate DATE, IN finDate DATE)
BEGIN  
IF iniDate = 0000-00-00 THEN
  SELECT Quo_id, CONCAT(Quo_prefix, Quo_number) AS Quo_number, (SELECT COUNT(Quo_parentNumber)+1 FROM quotation WHERE Quo_parentNumber = Q.Quo_id GROUP BY Quo_parentNumber) AS Quo_version, Quo_hours, S.Stat_name FROM quotation Q
  INNER JOIN status S ON Q.Stat_id = S.Stat_id
  WHERE Quo_parentNumber IS NULL
  ORDER BY Quo_date DESC;
ELSE 
	SELECT Quo_id, CONCAT(Quo_prefix, Quo_number) AS Quo_number, (SELECT COUNT(Quo_parentNumber)+1 FROM quotation WHERE Quo_parentNumber = Q.Quo_id GROUP BY Quo_parentNumber) AS Quo_version, Quo_hours, S.Stat_name FROM quotation Q
  INNER JOIN status S ON Q.Stat_id = S.Stat_id
  WHERE (Quo_date >= iniDate AND Quo_date <= finDate) AND Quo_parentNumber IS NULL
  ORDER BY Quo_date DESC;	
END IF;
END$$
DELIMITER ;

/*
Author: DIEGO CASALLAS
Date: 24/05/2020
Description : SP select security group 
*/
DELIMITER $$
DROP PROCEDURE IF EXISTS sp_user_insert_update$$
CREATE PROCEDURE sp_user_insert_update(IN name VARCHAR(80), IN identification VARCHAR(15), IN email VARCHAR(320), IN title VARCHAR(30), IN stat INT, IN pass VARCHAR(30), IN tel VARCHAR(15), IN id INT, IN role INT, IN securityGroup INT, IN company INT) 
BEGIN
    SET @exist =(SELECT COUNT(*)
    FROM user
    WHERE User_email = email AND User_identification = identification);
    SET @id = (SELECT User_id
    FROM user
    WHERE User_email = email);
    IF @exist = 0 AND id = 0 THEN
        INSERT INTO user (User_name, User_identification, User_email, User_title, Stat_id, User_telephone,Role_id,Sgroup_id, Comp_id) VALUES (name, identification, email, title, stat, tel, role, securityGroup, company);
        SET @user_id = LAST_INSERT_ID();
        INSERT INTO login(Login_password, User_id)VALUES(pass, @user_id);
        SET @return = @user_id;
    ELSE
        IF (SELECT COUNT(User_id) FROM new_user WHERE User_id = @id) =1 THEN
            SET @return = 'Inactive';
        ELSEIF id != 0 AND @exist = 1  THEN
            UPDATE user SET User_name = name, User_title = title, Stat_id = stat, User_telephone = tel, Role_id = role, Sgroup_id = securityGroup WHERE User_id = @id;
            SET @return = 'Update';
        ELSE
            SET @return = 'Registered';
        END IF;
    END IF;
    SELECT @return AS "return_value";
END$$
DELIMITER ; 


DELIMITER $$
DROP PROCEDURE IF EXISTS sp_user_select_active$$
CREATE PROCEDURE sp_user_select_active(IN name VARCHAR(320))
    NO SQL
BEGIN
    IF name IS NULL THEN
        SELECT User_id, User_name, User_email, User_title FROM user
       WHERE Stat_id = 1;
   ELSE
       SELECT User_id, User_name, User_email, User_title FROM user WHERE (User_name LIKE CONCAT('%', name ,'%') OR User_email LIKE CONCAT('%', name ,'%') OR User_title LIKE CONCAT('%', name ,'%')) AND Stat_id = 1;
   END IF;
END$$
DELIMITER ;
/*
Author: DIEGO CASALLAS
Date: 23/05/2020
Description : Update SP get data one user 
*/
DELIMITER $$
DROP PROCEDURE IF EXISTS sp_user_select_one$$
CREATE PROCEDURE sp_user_select_one(IN id INT)
BEGIN
SELECT User_id, User_name, User_identification, User_email, User_title, Stat_id, User_telephone,Role_id ,Sgroup_id, Comp_id FROM user  WHERE User_id = id;
END$$
DELIMITER ;

DELIMITER $$
DROP PROCEDURE IF EXISTS sp_user_validation$$
CREATE PROCEDURE sp_user_validation(IN id INT)
BEGIN
   SELECT User_name, User_email FROM user
   WHERE User_id = id;
END$$
DELIMITER ;

/*
Author: DIEGO CASALLAS
Date: 14/01/2020
Description : SP get email
*/
 
DELIMITER $$
DROP PROCEDURE IF EXISTS sp_user_get_email$$
CREATE PROCEDURE sp_user_get_email(IN email VARCHAR(320)) 
BEGIN
    SET @valid =(SELECT User_id FROM user WHERE User_email=email AND Stat_id = 1);
    IF @valid != 0 THEN 
    SELECT User_id, User_name FROM user WHERE User_email=email;
    ELSE
    SELECT "0" AS User_id;
    END IF; 
END$$

/*
Author: LAURA GRISALES
Date: 13/11/2020
Description : SP select user identification
*/
DELIMITER $$
DROP PROCEDURE IF EXISTS sp_user_get_identification$$
CREATE PROCEDURE sp_user_get_identification(IN email VARCHAR(320)) 
BEGIN
	SELECT User_identification FROM user WHERE User_email = email;
END$$

/*
Author: DIEGO CASALLAS
Date: 14/01/2020
Description : SP insert recovery password 
*/
DELIMITER $$
DROP PROCEDURE IF EXISTS sp_recovery_password_insert$$
CREATE PROCEDURE sp_recovery_password_insert(IN id INT, IN pass_date VARCHAR(100), IN pass_hash VARCHAR(600),IN pass_state INT)
BEGIN 
	SET @count = (SELECT COUNT(*) FROM recovery_password WHERE User_id = id);
    IF @count = 0 THEN
  		INSERT INTO recovery_password (Recover_pass_id, User_id, Recover_pass_date, Recover_pass_hash, Recover_pass_state) VALUES (NULL, id, pass_date, pass_hash,pass_state);
  	ELSE
    	UPDATE recovery_password SET Recover_pass_date = pass_date, Recover_pass_hash = pass_hash, Recover_pass_state = pass_state WHERE User_id = id;
    END IF;
    SELECT ROW_COUNT(); 
END$$
DELIMITER ;
/*
Author: DIEGO CASALLAS
Date: 15/01/2020
Description : SP select hash 
*/
DELIMITER $$
DROP PROCEDURE IF EXISTS sp_recovery_password_select$$
CREATE PROCEDURE sp_recovery_password_select(IN pass_hash VARCHAR(600))
BEGIN 
SET @valid =(SELECT TIMESTAMPDIFF(MINUTE,NOW() ,DATE_ADD(Recover_pass_date,INTERVAL 24 HOUR)) AS Recover_difference FROM recovery_password WHERE Recover_pass_hash=pass_hash);
IF @valid >= 0 THEN 
  SELECT User_id FROM recovery_password WHERE Recover_pass_hash=pass_hash;
  ELSE
  SELECT "expire" AS Error_id;
 END IF; 
END$$
DELIMITER ;

-- DELIMITER $$
-- DROP PROCEDURE IF EXISTS sp_request_insert_update$$
-- CREATE PROCEDURE sp_request_insert_update(IN id INT, IN subject VARCHAR(100), IN message VARCHAR(300), IN observation VARCHAR(300), IN reqDate DATETIME, IN userId INT, IN stat INT)
-- BEGIN
--     IF id = 0 THEN 
-- 		INSERT INTO request (Req_subject, Req_message) VALUES (subject, message);
--         SET @id = (SELECT LAST_INSERT_ID());
--         INSERT INTO action (Act_observation, Act_date, Req_id, User_id, Stat_id) VALUES (observation, reqDate, @id, userId, stat);
--     ELSE
--     	UPDATE request SET Req_subject = subject, Req_message = message
--         WHERE Req_id = id;
--     END IF;
--     SELECT ROW_COUNT();
-- END$$

-- DELIMITER $$
-- DROP PROCEDURE IF EXISTS sp_request_select_all$$
-- CREATE PROCEDURE sp_request_select_all()
-- BEGIN
--     SELECT request.Req_id,  User_name, Req_subject, Act_id, (SELECT Act_date FROM action WHERE action.Req_id = request.Req_id AND Stat_id = 12 ORDER BY Stat_id ASC LIMIT 1) AS Act_date, (SELECT Stat_name FROM action INNER JOIN status ON action.Stat_id = status.Stat_id WHERE action.Req_id = request.Req_id ORDER BY Act_id DESC LIMIT 1) AS Stat_name FROM request
--     INNER JOIN action ON request.Req_id = action.Req_id
--     INNER JOIN user ON action.User_id= user.User_id
--     GROUP BY request.Req_id
--     ORDER BY Act_id DESC;
-- END$$

-- DELIMITER $$
-- DROP PROCEDURE IF EXISTS sp_request_select_one$$
-- CREATE PROCEDURE sp_request_select_one(IN requestId INT)
-- BEGIN
--   SELECT u.User_name, r.Req_id, r.Req_subject, r.Req_message, a.Act_date AS Req_date
-- 	FROM request r 
-- 	INNER JOIN action a ON r.Req_id = a.Req_id
--   INNER JOIN user u ON u.User_id = a.User_id
-- 	WHERE r.Req_id = requestId AND a.Stat_id = 12;
-- END$$

-- DELIMITER $$
-- DROP PROCEDURE IF EXISTS sp_request_select_pending$$
-- CREATE PROCEDURE sp_request_select_pending()
-- BEGIN
--     SELECT request.Req_id, Req_subject FROM action
-- 	INNER JOIN request ON action.Req_id = request.Req_id
--     GROUP BY request.Req_id
--     HAVING COUNT(*) = 1
-- 	ORDER BY Act_date ASC;
-- END$$

-- DELIMITER $$
-- DROP PROCEDURE IF EXISTS sp_request_status$$
-- CREATE PROCEDURE sp_request_status()
-- BEGIN
-- 	SELECT Stat_id, Stat_name FROM status WHERE Type_id = 4 AND Stat_id > 12;
-- END$$
-- DELIMITER ;

-- -- Se añade DATE_SUB INTERVAL 5 debido al desfase de la zona horario del Servidor
-- DELIMITER $$
-- DROP PROCEDURE IF EXISTS sp_request_select_today$$
-- CREATE PROCEDURE sp_request_select_today()
-- BEGIN
--     SELECT action.Req_id, Req_subject, Act_date FROM action
--     INNER JOIN request ON action.Req_id = request.Req_id
--     WHERE Act_date BETWEEN (DATE_FORMAT(DATE_SUB(NOW(),INTERVAL 5 HOUR),"%Y-%m-%d 00:00:00")) AND (DATE_FORMAT(DATE_SUB(NOW(), INTERVAL 5 HOUR),"%Y-%m-%d 23:59:59")) AND Stat_id = 12
--     ORDER BY Act_date ASC;
-- END$$

-- DELIMITER $$
-- DROP PROCEDURE IF EXISTS sp_request_select_user$$
-- CREATE PROCEDURE sp_request_select_user(IN userId INT)
-- BEGIN
--   	SELECT request.Req_id, request.Req_subject, request.Req_message, Act_date, Act_id, (SELECT Stat_name FROM action INNER JOIN status ON action.Stat_id = status.Stat_id WHERE action.Req_id = request.Req_id ORDER BY Act_id DESC LIMIT 1) AS Stat_name FROM request
--     INNER JOIN action ON request.Req_id = action.Req_id
--     INNER JOIN user ON action.User_id= user.User_id
--     WHERE action.User_id = userId AND action.Stat_id = 12
--     GROUP BY request.Req_id
--     ORDER BY Act_id DESC;
-- END$$

-- DELIMITER $$
-- DROP PROCEDURE IF EXISTS sp_request_chart1$$
-- CREATE PROCEDURE sp_request_chart1(IN dateInitial DATE, IN dateFinal DATE)
-- BEGIN 
-- 	SELECT MONTHNAME(action.Act_date) AS Act_month, COUNT(request.Req_id) AS totalRequest FROM request
-- 	INNER JOIN action ON request.Req_id = action.Req_id
-- 	WHERE (action.Act_date BETWEEN dateInitial AND dateFinal) AND action.Stat_id = 12
-- 	GROUP BY Act_month
-- 	ORDER BY action.Act_date ASC;
-- END$$
-- DELIMITER ;

/*
Author: DIEGO CASALLAS
Date: 15/01/2020
Description : SP update login 
*/
DELIMITER $$
DROP PROCEDURE IF EXISTS sp_login_update$$
CREATE PROCEDURE sp_login_update(IN id SMALLINT, IN pass VARCHAR(600))
BEGIN 
  UPDATE login SET Login_password=pass WHERE User_id = id; 
  DELETE FROM recovery_password WHERE User_id=id;
  SELECT ROW_COUNT() AS Id_row;
END$$
DELIMITER ;
/*
Author: DIEGO CASALLAS
Date: 23/05/2020
Description : SP select status 
*/
DELIMITER $$
DROP PROCEDURE IF EXISTS `sp_select_status`$$
CREATE PROCEDURE `sp_select_status`(IN stat INT)
BEGIN
    SELECT * FROM status WHERE Type_id = stat;
END$$
DELIMITER ;
/*
Author: DIEGO CASALLAS
Date: 23/05/2020
Description : SP select role 
*/
DELIMITER $$
DROP PROCEDURE IF EXISTS `sp_select_role`$$
CREATE PROCEDURE `sp_select_role`()
BEGIN
    SELECT * FROM role;
END$$
DELIMITER ;

/*
Author: DIEGO CASALLAS
Date: 23/05/2020
Description : SP select security group 
*/
DELIMITER $$
DROP PROCEDURE IF EXISTS `sp_select_security_group`$$
CREATE PROCEDURE `sp_select_security_group`()
BEGIN
    SELECT * FROM security_group;
END$$
DELIMITER ;

DELIMITER $$
DROP PROCEDURE IF EXISTS sp_new_user_insert_update$$
CREATE PROCEDURE sp_new_user_insert_update(IN us_id INT(11), IN n_date VARCHAR(100), IN n_hash VARCHAR(600), IN n_status INT) 
BEGIN 
	SET @count = (SELECT COUNT(User_id) FROM new_user WHERE User_id = us_id);
    IF @count = 0 THEN
    	INSERT INTO new_user (Nuser_id, User_id, Nuser_date, Nuser_hash, Nuser_state) VALUES (NULL, us_id, n_date, n_hash, n_status);
    ELSE
    	UPDATE new_user SET Nuser_date = n_date, Nuser_hash = n_hash, Nuser_state = n_status WHERE User_id = us_id;
    END IF;
    SELECT ROW_COUNT();
END$$
DELIMITER ;

DELIMITER $$
DROP PROCEDURE IF EXISTS sp_new_user_active$$
CREATE PROCEDURE sp_new_user_active(IN n_hash VARCHAR(600))
BEGIN 
SET @valid =(SELECT TIMESTAMPDIFF(MINUTE,NOW() ,DATE_ADD(Nuser_date,INTERVAL 24 HOUR)) AS Recover_difference FROM new_user WHERE Nuser_hash = n_hash);
IF @valid >= 0 THEN 
  SET @idUser = (SELECT User_id FROM new_user WHERE Nuser_hash = n_hash);
  UPDATE user SET Stat_id = 1 WHERE User_id = @idUser;
  DELETE FROM new_user WHERE User_id = @idUser;
  SELECT ROW_COUNT();
  ELSE
  SELECT "expire" AS Error_id;
 END IF; 
END$$
DELIMITER ;

DELIMITER $$
DROP PROCEDURE IF EXISTS sp_new_user_clean$$
CREATE PROCEDURE sp_new_user_clean() 
BEGIN
	 DELETE FROM new_user WHERE TIMESTAMPDIFF(MINUTE, NOW(), DATE_ADD(Nuser_date, INTERVAL 24 HOUR)) < 0;
   SELECT ROW_COUNT();
END$$
DELIMITER ;

DELIMITER $$
DROP PROCEDURE IF EXISTS sp_select_client$$
CREATE PROCEDURE sp_select_client()
BEGIN
    SELECT Client_id, Client_name FROM client WHERE Stat_id = 3
    ORDER BY Client_name ASC;
END$$
DELIMITER ;

CREATE EVENT IF NOT EXISTS new_user_clean ON SCHEDULE EVERY 1 DAY 
STARTS '2020-03-01 00:00:01' 
ON COMPLETION NOT PRESERVE ENABLE 
DO 
DELETE FROM new_user WHERE TIMESTAMPDIFF(MINUTE, NOW(), DATE_ADD(Nuser_date, INTERVAL 24 HOUR)) < 0;