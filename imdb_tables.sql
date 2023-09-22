CREATE DATABASE imdb;

USE imdb;

CREATE TABLE akas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titleId VARCHAR(255) NOT NULL,
    ordering INT NOT NULL,
    title TEXT,
    region VARCHAR(255),
    language VARCHAR(255),
    types TEXT,
    attributes TEXT,
    isOriginalTitle BOOLEAN
);

CREATE TABLE titles (
    tconst VARCHAR(255) NOT NULL PRIMARY KEY,
    titleType VARCHAR(255),
    primaryTitle TEXT,
    originalTitle TEXT,
    isAdult BOOLEAN,
    startYear YEAR,
    endYear YEAR,
    runtimeMinutes INT,
    genres TEXT
);

CREATE TABLE crew (
    tconst VARCHAR(255) NOT NULL PRIMARY KEY,
    directors TEXT,
    writers TEXT
);

CREATE TABLE episode (
    tconst VARCHAR(255) NOT NULL PRIMARY KEY,
    parentTconst VARCHAR(255),
    seasonNumber INT,
    episodeNumber INT
);

CREATE TABLE principals (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tconst VARCHAR(255) NOT NULL,
    ordering INT NOT NULL,
    nconst VARCHAR(255),
    category VARCHAR(255),
    job TEXT,
    characters TEXT
);

CREATE TABLE ratings (
    tconst VARCHAR(255) NOT NULL PRIMARY KEY,
    averageRating FLOAT,
    numVotes INT
);

CREATE TABLE names (
    nconst VARCHAR(255) NOT NULL PRIMARY KEY,
    primaryName TEXT,
    birthYear YEAR,
    deathYear YEAR,
    primaryProfession TEXT,
    knownForTitles TEXT
);

CREATE TABLE reviews (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tconst VARCHAR(255),
    review TEXT,
    rating INT,
    reviewDate DATE
);

CREATE TABLE users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) UNIQUE NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    date_registered DATETIME DEFAULT CURRENT_TIMESTAMP,
    last_login DATETIME
);

CREATE TABLE user_lists (
    list_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    list_name VARCHAR(255) NOT NULL,
    date_created DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(user_id)
);

CREATE TABLE list_items (
    item_id INT AUTO_INCREMENT PRIMARY KEY,
    list_id INT,
    tconst VARCHAR(255),
    nconst VARCHAR(255),
    date_added DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (list_id) REFERENCES user_lists(list_id),
    FOREIGN KEY (tconst) REFERENCES titles(tconst),
    FOREIGN KEY (nconst) REFERENCES names(nconst)
);