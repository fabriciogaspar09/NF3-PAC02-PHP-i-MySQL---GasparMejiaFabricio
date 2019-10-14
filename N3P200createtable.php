<?php
//connect to MySQL
$db = mysqli_connect('localhost', 'root') or 
    die ('Unable to connect. Check your connection parameters.');

//create the main database if it doesn't already exist
$query = 'CREATE DATABASE IF NOT EXISTS booksite';
mysqli_query($db,$query) or die(mysqli_error($db));

//make sure our recently created database is the active one
mysqli_select_db($db,'booksite') or die(mysqli_error($db));

//create the movie table
$query = 'CREATE TABLE book (
        book_id        INTEGER UNSIGNED  NOT NULL AUTO_INCREMENT, 
        book_name      VARCHAR(255)      NOT NULL, 
        book_type      TINYINT           NOT NULL DEFAULT 0, 
        book_year      SMALLINT UNSIGNED NOT NULL DEFAULT 0, 
        book_artist    VARCHAR(255)  NOT NULL DEFAULT 0,
        PRIMARY KEY (book_id),
        KEY song_type (book_type, book_year) 
    ) 
    ENGINE=MyISAM';
mysqli_query($db,$query) or die (mysqli_error($db));

//create the movietype table
$query = 'CREATE TABLE booktype ( 
        booktype_id    TINYINT UNSIGNED NOT NULL AUTO_INCREMENT, 
        booktype_label VARCHAR(100)     NOT NULL, 
        PRIMARY KEY (booktype_id) 
    ) 
    ENGINE=MyISAM';
mysqli_query($db,$query) or die(mysqli_error($db));

//create the people table
$query = 'CREATE TABLE people ( 
        people_id         INTEGER UNSIGNED    NOT NULL AUTO_INCREMENT, 
        people_fullname   VARCHAR(255)        NOT NULL, 
        people_writer    TINYINT(1) UNSIGNED NOT NULL DEFAULT 0, 
        people_reader TINYINT(1) UNSIGNED NOT NULL DEFAULT 0, 
        PRIMARY KEY (people_id)
    ) 
    ENGINE=MyISAM';
mysqli_query($db,$query) or die(mysqli_error($db));

echo 'book database successfully created!';
?>
