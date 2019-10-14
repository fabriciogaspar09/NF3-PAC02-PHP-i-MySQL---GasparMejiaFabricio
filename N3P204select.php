<?php
$db = mysqli_connect('localhost', 'root') or 
    die ('Unable to connect. Check your connection parameters.');
mysqli_select_db($db,'booksite') or die(mysqli_error($db));

// select the movie titles and their genre after 1990
$query = 'SELECT
        book_name, booktype_label
    FROM
        book LEFT JOIN booktype ON book_type = booktype_id
    WHERE
        book.book_type = booktype.booktype_id AND
        book_year >= 0
    ORDER BY
        book_type';
$result = mysqli_query($db, $query) or die(mysqli_error($db));

// show the results
echo '<table border="1">';
while ($row = mysqli_fetch_assoc($result)) {
    echo '<tr>';
    foreach ($row as $value) {
        echo '<td>' . $value . '</td>';
    }
    echo '</tr>';
}
echo '</table>';
?>
