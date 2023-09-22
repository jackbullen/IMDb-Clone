# IMDb Clone

## Description

This is a clone of the IMDb website. It allows users to search for movies and TV shows to see descriptions, crew, and ratings. Users can create an account and add movies and TV shows to their watchlist.

## Features

- Search for movies and TV shows
- View information about movies and TV shows
- Accounts with movie and TV shows watchlists

## Screenshots

<img width="689" alt="Screen Shot 2023-09-22 at 11 55 07 AM" src="https://github.com/jackbullen/IMDb-Clone/assets/37254717/98f5d80b-3388-4325-b736-650a308443e1">

<img width="663" alt="Screen Shot 2023-09-22 at 11 53 54 AM" src="https://github.com/jackbullen/IMDb-Clone/assets/37254717/e091dab9-0243-4728-8396-660cab1c9963">

<img width="689" alt="Screen Shot 2023-09-22 at 11 56 37 AM" src="https://github.com/jackbullen/IMDb-Clone/assets/37254717/9ca411ee-60ad-4934-9dbd-cfb78b6ef6bf">

## TODO

- Add reviews to the movie and TV show pages

- Implement user profiles, watchlists, and adding reviews.

## Getting Started

1. Clone the repository and navigate to the directory
2. Install all dependencies including MySQL and PHP
3. Login to MySQL as root and create a database called imdb
```sql
CREATE DATABASE imdb;
```    
4. Create a MySQL user with the username imdb and password imdb
```sql
CREATE USER 'imdb_user'@'localhost' IDENTIFIED BY 'password';
```
5. Grant all privileges to the imdb user
```sql
GRANT ALL PRIVILEGES ON imdb.* TO 'imdb_user';
```
6. (Maybe not required) 
```sql
ALTER USER 'imdb_user'@'localhost' IDENTIFIED WITH 'mysql_native_password' BY 'password_here';
```
7. Allow the sql scripts to run. Login to MySQL as the root

```sql
SET GLOBAL local_infile = 1;
\q
```
```bash
mysql --local-infile=1 -u root -p 
```

8. Create the tables and populate data
```sql
source imdb_tables.sql
source imdb_pop.sql
```

9. Start the PHP server
```bash
php -S localhost:8000
```

## Contribution Guidelines

If you would like to contribute to this project, please fork the repository and submit a pull request.

## Data

Data and schema are from [IMDb](https://www.imdb.com/interfaces/)
