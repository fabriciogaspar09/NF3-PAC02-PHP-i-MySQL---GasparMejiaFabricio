<?php
$db = mysqli_connect('localhost', 'root') or die ('Unable to connect. Check your connection parameters.');
mysqli_select_db($db,'booksite') or die(mysqli_error($db));
$noRegistros = 2; //Registros por página
$pagina = 1; //Por defecto pagina = 1

if(isset($_GET['pagina'])){
    $pagina = $_GET['pagina']; //Si hay pagina, lo asigna
    
}
    else{
        $pagina = 1;
        
        
    }
$buskr=$_GET['searchs']; //Palabra a buscar
    

    
//Utilizo el comando LIMIT para seleccionar un rango de registros
$sSQL = "SELECT book_name,book_year FROM book WHERE book_name LIKE '%$buskr%' LIMIT ".($pagina-1)*$noRegistros.",$noRegistros";
$result = mysqli_query($db,$sSQL) or die(mysqli_error($db));
	
//Exploracion de registros

echo '<table>';
 
while($row = mysqli_fetch_array($result)) {
    /*
    echo '<tr>';
    foreach($row as $value){
        echo '<td height=80 align center>'.$book_id.'<br></td><td align=center><img src="fotos/'.$book_id."' width=70 height=70></td><td>".$book_name."</td></tr>';
        
    }
    echo '</tr>';
    */
    echo "<tr><td height=80 align=center>";
	echo $row["book_name"]."<br>";
	echo "</td>
	<td align=center><img src='fotos/$row[book_id]' width=70 height=70></td>
		<td>$row[book_name].</td>
		<td align=center>$row[book_year].</td>
	</tr>";
	
}

//Imprimiendo paginacion

$sSQL = "SELECT count(*) FROM book WHERE book_name LIKE '%$buskr%'"; //Cuento el total de registros
$result = mysqli_query($db,$sSQL);
$row = mysqli_fetch_array($result);
$totalRegistros = $row["count(*)"]; //Almaceno el total en una variable

$noPaginas = $totalRegistros/$noRegistros; //Determino la cantidad de paginas

?>
<tr>
    <td colspan="2" align="center"><?php echo "<strong>Total registros: </strong>".$totalRegistros; ?></td>
    <td colspan="2" align="center"><?php echo "<strong>Pagina: </strong>".$pagina; ?></td>
</tr>
<tr bgcolor="f3f4f1">
    <td colspan="4" align="right"><strong>Pagina:
<?php
for($i=1; $i<$noPaginas+1; $i++) { //Imprimo las paginas
	if($i == $pagina)
		echo "<font color=red>".$i."</font>"; //A la pagina actual no le pongo link
	else
		echo "<a href=\"?pagina=".$i."&searchs=". $buskr."\" style=color:#000;> ".$i."</a>";
}
?>
	</strong></td>
</tr>
</table>



<?php
    
    
    
    

    echo "<ul><li>Integrating HTML with PHP</li><li>Using Constants and Variables</li><li>Passing Variables between Pages</li><li>Passing Variables through a URL</li><li>Passing Variables with Sessions</li><li>Passing Variables with Cookies</li><li>Setting a Cookie</li><li>Using Forms to Get Information</li><li>Using if/else Arguments</li><li>Using if and else Together</li></ul>";
    echo "<p>Qualifies the document (0-10), and the teacher's explanation (0-10): Document/10; Explanation/10</p>";
    echo "<p>As a student, put a mark to yourself: dies de dies</p>";
    echo "<p>Explain an improvement: Nothing to add</p>"

?>
