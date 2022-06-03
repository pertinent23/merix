CREATE DATABASE IF NOT EXISTS merix;

CREATE TABLE IF NOT EXISTS USERS(
    user_id INT NOT NULL AUTO_INCREMENT,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(300) NOT NULL,
    name VARCHAR(200) NOT NULL,
    role VARCHAR(10) NOT NULL,
    createdAt DATETIME NOT NUll,
    updatedAt DATETIME NOT NUll,
    PRIMARY KEY(user_id)
);

CREATE TABLE IF NOT EXISTS FILES(
    file_id INT NOT NULL AUTO_INCREMENT,
    url VARCHAR(250) NOT NULL,
    title VARCHAR(50) NOT NULL,
    description VARCHAR(400) NOT NULL,
    type VARCHAR(20),
    createdAt DATETIME NOT NUll,
    updatedAt DATETIME NOT NUll,
    PRIMARY KEY(file_id)
);

CREATE TABLE IF NOT EXISTS THEMES(
    theme_id INT NOT NULL AUTO_INCREMENT,
    user_id INT NOT NULL,
    name VARCHAR(200) NOT NULL,
    createdAt DATETIME NOT NUll,
    updatedAt DATETIME NOT NUll,
    PRIMARY KEY(theme_id),
    FOREIGN KEY(user_id) REFERENCES USERS(user_id)
);

CREATE TABLE IF NOT EXISTS SITES(
    site_id INT NOT NULL AUTO_INCREMENT,
    user_id INT NOT NULL,
    file_id INT NOT NULL,
    name VARCHAR(200) NOT NULL,
    slogan VARCHAR(200) NOT NULL,
    district VARCHAR(200) NOT NULL,
    country VARCHAR(200) NOT NULL,
    position VARCHAR(200) NOT NULL,
    history TEXT NOT NULL,
    createdAt DATETIME NOT NUll,
    updatedAt DATETIME NOT NUll,
    PRIMARY KEY(site_id),
    FOREIGN KEY(user_id) REFERENCES USERS(user_id),
    FOREIGN KEY(file_id) REFERENCES FILES(file_id)
);

CREATE TABLE IF NOT EXISTS POSTS_TYPE(
    post_type_id INT NOT NULL AUTO_INCREMENT,
    site_id INT NOT NULL,
    label VARCHAR(200) NOT NULL,
    createdAt DATETIME NOT NUll,
    updatedAt DATETIME NOT NUll,
    PRIMARY KEY(post_type_id),
    FOREIGN KEY(site_id) REFERENCES SITES(site_id)
);

CREATE TABLE IF NOT EXISTS POSTS(
    post_id INT NOT NULL AUTO_INCREMENT,
    post_type_id INT NOT NULL,
    label VARCHAR(200) NOT NULL,
    description TEXT NOT NULL,
    createdAt DATETIME NOT NUll,
    updatedAt DATETIME NOT NUll,
    PRIMARY KEY(post_id),
    FOREIGN KEY(post_type_id) REFERENCES POSTS_TYPE(post_type_id)
);

CREATE TABLE IF NOT EXISTS POSTS_FILES(
    post_id INT NOT NULL,
    file_id INT NOT NULL,
    FOREIGN KEY(post_id) REFERENCES POSTS(post_id),
    FOREIGN KEY(file_id) REFERENCES FILES(file_id)
);

CREATE TABLE IF NOT EXISTS ROLES(
    role_id INT NOT NULL AUTO_INCREMENT,
    site_id INT NOT NULL,
    label VARCHAR(200) NOT NULL,
    description TEXT NOT NULL,
    createdAt DATETIME NOT NUll,
    updatedAt DATETIME NOT NUll,
    PRIMARY KEY(role_id),
    FOREIGN KEY(site_id) REFERENCES SITES(site_id)
);

CREATE TABLE IF NOT EXISTS EMPLOYEES(
    employee_id INT NOT NULL AUTO_INCREMENT,
    role_id INT NOT NULL,
    file_id INT,
    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    age INT NOT NULL,
    background TEXT NOT NULL,
    createdAt DATETIME NOT NUll,
    updatedAt DATETIME NOT NUll,
    PRIMARY KEY(employee_id),
    FOREIGN KEY(role_id) REFERENCES ROLES(role_id),
    FOREIGN KEY(file_id) REFERENCES FILES(file_id),
    CHECK(age >= 10)
);

CREATE TABLE IF NOT EXISTS PLACES(
    place_id INT NOT NULL AUTO_INCREMENT,
    site_id INT NOT NULL,
    name VARCHAR(200) NOT NULL,
    description TEXT NOT NULL,
    createdAt DATETIME NOT NUll,
    updatedAt DATETIME NOT NUll,
    PRIMARY KEY(place_id),
    FOREIGN KEY(site_id) REFERENCES SITES(site_id)
);

CREATE TABLE IF NOT EXISTS PLACES_FILES(
    place_id INT NOT NULL,
    file_id INT NOT NULL,
    FOREIGN KEY(place_id) REFERENCES PLACES(place_id),
    FOREIGN KEY(file_id) REFERENCES FILES(file_id)
);

CREATE TABLE IF NOT EXISTS ACTIVITIES(
    activity_id INT NOT NULL AUTO_INCREMENT,
    site_id INT NOT NULL,
    name VARCHAR(200) NOT NULL,
    description TEXT NOT NULL,
    createdAt DATETIME NOT NUll,
    updatedAt DATETIME NOT NUll,
    PRIMARY KEY(activity_id),
    FOREIGN KEY(site_id) REFERENCES SITES(site_id)
);

CREATE TABLE IF NOT EXISTS ACTIVITIES_FILES(
    activity_id INT NOT NULL,
    file_id INT NOT NULL,
    FOREIGN KEY(activity_id) REFERENCES ACTIVITIES(activity_id),
    FOREIGN KEY(file_id) REFERENCES FILES(file_id)
);

CREATE TABLE IF NOT EXISTS PUBS(
    pub_id INT NOT NULL AUTO_INCREMENT,
    site_id INT NOT NULL,
    file_id INT NOT NULL,
    name VARCHAR(200) NOT NULL,
    description TEXT NOT NULL,
    createdAt DATETIME NOT NUll,
    updatedAt DATETIME NOT NUll,
    PRIMARY KEY(pub_id),
    FOREIGN KEY(site_id) REFERENCES SITES(site_id),
    FOREIGN KEY(file_id) REFERENCES FILES(file_id)
);

CREATE TABLE IF NOT EXISTS PROJECTS(
    project_id INT NOT NULL AUTO_INCREMENT,
    site_id INT NOT NULL,
    file_id INT NOT NULL,
    name VARCHAR(200) NOT NULL,
    description TEXT NOT NULL,
    createdAt DATETIME NOT NUll,
    updatedAt DATETIME NOT NUll,
    PRIMARY KEY(project_id),
    FOREIGN KEY(site_id) REFERENCES SITES(site_id),
    FOREIGN KEY(file_id) REFERENCES FILES(file_id)
);