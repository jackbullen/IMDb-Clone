# IMDb Clone

## Description

This is a clone of the IMDb website. It allows users to search for movies and TV shows to see descriptions, crew, and ratings. Users can create an account and add movies and TV shows to their watchlist.

## Features

- Search for movies and TV shows
- View information about movies and TV shows
- Accounts with movie and TV shows watchlists

## Screenshots

![Home Page](https://i.imgur.com/5Q3Z3ZM.png)

![Search Results](https://i.imgur.com/5Q3Z3ZM.png)

![Movie Page](https://i.imgur.com/5Q3Z3ZM.png)

![TV Show Page](https://i.imgur.com/5Q3Z3ZM.png)

![Watchlist](https://i.imgur.com/5Q3Z3ZM.png)

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