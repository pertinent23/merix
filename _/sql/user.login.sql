SELECT COUNT(user_id) FROM `USERS`
WHERE email = :email AND password = :password;