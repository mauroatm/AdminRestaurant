<?php require_once('Connections/local.php');
mysql_select_db($database_local,$local)or die ("problemas al conecta BASE DE DATOS "); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Restaurant adminitrador</title>
<link href="estilo.css" rel="stylesheet" type="text/css" />
<style type="text/css">
#apDiv1 {
	position: absolute;
	width: 85px;
	height: 82px;
	z-index: 1;
	left: 196px;
	top: 14px;
	overflow: visible;
}
</style>

</head>

<body>
<table width="720" border="4" align="center">
  <tr>
    <td height="25"><p><a href="index.php"><img src="Imagenes/home-icon.png" width="75" height="75" alt="home" /></a><a href="analizis-cliente.php"><img src="Imagenes/analisis.png" width="75" height="75" alt=""/></a></p>
    <p><img src="Imagenes/banner.jpg" width="720" height="130" alt="Donao" /></p></td>
  </tr>
</table>
<table width="743" border="4" align="center">
  <tr>
    <td width="359" align="center" class="subtitulo">	
	<?php $cliente =$_POST['Fecha'];
			?></td>
  </tr>
  <tr>
    <td align="center" class="subtitulo">
	<?php
$busca = "";
$busca = $_POST['Fecha'];

echo "Dia consulta: ";
echo $busca;

//corrige si el campo buscar esta indefinido.
$busqueda = mysql_query("SELECT * FROM ventas WHERE codigo = $cliente");//cambiar nombre de la tabla de busqueda

?>
</p>
<table width="365" border="1" align="center" id="tab">
  <tr>
      <td width="121">Producto</td>
      <td width="45">Precio</td>
      <td width="84">Fecha</td>
      <td width="87">Hora</td>

  </tr>
    <?php
while($f=mysql_fetch_array($busqueda))
{
	echo '<tr>';
	echo '<td width="150">'.$f['Nombre'].'</td>';
	echo '<td width="157">'.$f['Valor'].'</td>';
	echo '<td width="157">'.$f['Fecha'].'</td>';
	echo '<td width="157">'.$f['hora'].'</td>';
	$nombre = $f['Nombre'];
	$valor = $f['Valor'];
	$identificador = $busca;
	

}

?>

    
    
    </td>
  </tr>
  <tr>
    <td align="center" class="subtitulo">		
		              <?php
				 //Mauro castillo 2.0
				 //La variable $codigo recibe el valor del "select" del documento "neto.php"
	 			 $codigos = $busca;
				//Hace la suma de los valores de la columna valor de tabla venta_dia donde la columna codigo == $codigo;
				// Y la almacena en la varible $total;
				$total = 0;
				$result = mysql_query("SELECT SUM(Valor) as total FROM ventas WHERE codigo = $cliente");   
				$row = mysql_fetch_array($result, MYSQL_ASSOC);
				$total = $row["total"];
				echo "Consumo del cliente: ";
				echo $total;
				?> 
	</td> 
  </tr>
</table>
</body>
</html>