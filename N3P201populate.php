<?php
// connect to mysqli
$db = mysqli_connect('localhost', 'root') or 
    die ('Unable to connect. Check your connection parameters.');

//make sure you're using the correct database
mysqli_select_db($db,'booksite') or die(mysqli_error($db));

// insert data into the movie table

$query = 'INSERT INTO book
        (book_id, book_name, book_type, book_year, book_artist )
    VALUES
        (1, "La Biblia", 1, 0, "no one knows"),
        (2, "Moby-Dick", 2, 1851, "Herman Melville"),
        (3, "El Guadian entre el Centeno", 2, 1951, "J. D. Salinger"),
        (4, "El gran Gatsby", 2, 1925, "F. Scott Fitzgerald"),
        (5, "Matar a un ruiseñor", 8, 1960, "Harper Lee"),
        (6, "Cien años de soledad", 2, 1982, "Gabriel Garcia Marquez")';
mysqli_query($db,$query) or die(mysqli_error($db));



// insert data into the movietype table
$query = 'INSERT INTO booktype 
        (booktype_id, booktype_label)
    VALUES 
        (1, "Mithology"),
        (2, "Drama"), 
        (3, "Adventure"),
        (4, "War"), 
        (5, "Comedy"),
        (6, "Horror"),
        (7, "Action"),
        (8, "Mystery")';
mysqli_query($db,$query) or die(mysqli_error($db));

// insert data into the people table
$query  = 'INSERT INTO people
        (people_id, people_fullname, people_writer, people_reader)
    VALUES
        (1, "Dane DeHaan", 1, 0),
        (2, "Luc Besson", 0, 1),
        (3, "Michael Dougherty", 0, 1),
        (4, "F. Scott Fitzgerald", 1, 1),
        (5, "Harper Lee", 1, 1),
        (6, "sample", 0, 1)';
mysqli_query($db,$query) or die(mysqli_error($db));

echo 'Data inserted successfully!';
?>
