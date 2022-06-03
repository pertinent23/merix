SELECT email, password, user_id, role FROM `USERS`
WHERE email = :email AND password = :password;