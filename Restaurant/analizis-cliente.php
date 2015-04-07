<?php require_once('Connections/local.php'); ?>
<?php require_once('Connections/local.php'); ?>
<?php require_once('Connections/local.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

mysql_select_db($database_local, $local);
$query_clientes = "SELECT DISTINCT * FROM cliente ORDER BY Nombre";
$clientes = mysql_query($query_clientes, $local) or die(mysql_error());
$row_clientes = mysql_fetch_assoc($clientes);
$totalRows_clientes = mysql_num_rows($clientes);

mysql_select_db($database_local, $local);
$query_ventas = "SELECT DISTINCT `codigo`, `Fecha` FROM ventas";
$ventas = mysql_query($query_ventas, $local) or die(mysql_error());
$row_ventas = mysql_fetch_assoc($ventas);
$totalRows_ventas = mysql_num_rows($ventas);

mysql_select_db($database_local, $local);
$query_new_ventas = "SELECT DISTINCT `codigo`, `Fecha` FROM ventas";
$new_ventas = mysql_query($query_new_ventas, $local) or die(mysql_error());
$row_new_ventas = mysql_fetch_assoc($new_ventas);
$totalRows_new_ventas = mysql_num_rows($new_ventas);
?>
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
    <td height="25"><p><a href="index.php"><img src="Imagenes/home-icon.png" width="75" height="75" alt="home" /></a></p>
    <p><img src="Imagenes/banner.jpg" width="720" height="130" alt="Donao" /></p></td>
  </tr>
</table>
<table width="726" border="4" align="center">
  <tr>
    <td width="359" align="center" class="subtitulo">Consumo Cliente</td>
    <td width="359" align="center" class="subtitulo">Total de Ingresos del día</td>
  </tr>
  <tr>
    <td height="88" align="center" class="subtitulo"><form id="form1" name="form1" method="post" action="consulta-cliente.php">
      <p>
        <label for="cliente-consulta">Nombre del cliente</label>
        <select name="cliente" id="cliente">
          <?php
do {  
?>
          <option value="<?php echo $row_clientes['id']?>"><?php echo $row_clientes['Nombre']?></option>
          <?php
} while ($row_clientes = mysql_fetch_assoc($clientes));
  $rows = mysql_num_rows($clientes);
  if($rows > 0) {
      mysql_data_seek($clientes, 0);
	  $row_clientes = mysql_fetch_assoc($clientes);
  }
?>
        </select>
      </p>
      <p>
        <input type="submit" name="cliente-consulta" id="cliente-consulta" value="Consultar" />
      </p>
    </form></td>
    <td align="center" class="subtitulo"><form id="form2" name="form2" method="post" action="consulta-dia.php">
      <p>
        <label for="Fecha">Seleccione día</label>
        <select name="Fecha" id="Fecha">
          <?php
do {  
?>
          <option value="<?php echo $row_ventas['codigo']?>"><?php echo $row_ventas['Fecha']?></option>
          <?php
} while ($row_ventas = mysql_fetch_assoc($ventas));
  $rows = mysql_num_rows($ventas);
  if($rows > 0) {
      mysql_data_seek($ventas, 0);
	  $row_ventas = mysql_fetch_assoc($ventas);
  }
?>
        </select>
      </p>
      <p>
        <input type="submit" name="consulta-fecha" id="consulta-fecha" value="Consultar" />
      </p>
    </form></td>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($clientes);

mysql_free_result($ventas);

mysql_free_result($new_ventas);
?>
