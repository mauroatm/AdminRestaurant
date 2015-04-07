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

mysql_select_db($database_local, $local);
$query_Recordset1 = "SELECT * FROM ventas";
$Recordset1 = mysql_query($query_Recordset1, $local) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
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
<table width="748" height="181" border="4" align="center">
  <tr>
    <td height="25"><p><a href="index.php"><img src="Imagenes/home-icon.png" width="75" height="75" alt="home" /></a></p>
    <p><img src="Imagenes/banner.jpg" width="720" height="131" alt="Donao" /></p></td>
  </tr>
</table>
<table width="741" border="4" align="center">
  <tr>
    <td width="480" align="center" class="subtitulo"><p>Tabla De ventas</p>
      <form action="eliminar-venta.php" method="post" name="form1" class="estilo" id="form1">
        <label for="id">Codigo a eliminar</label>
        <select name="id" id="id">
          <option value="ninguno">ninguno</option>
          <?php
do {  
?>
          <option value="<?php echo $row_Recordset1['id']?>"><?php echo $row_Recordset1['id']?></option>
          <?php
} while ($row_Recordset1 = mysql_fetch_assoc($Recordset1));
  $rows = mysql_num_rows($Recordset1);
  if($rows > 0) {
      mysql_data_seek($Recordset1, 0);
	  $row_Recordset1 = mysql_fetch_assoc($Recordset1);
  }
?>
        </select>
    Eliminar
    <input type="submit" name="eliminar" id="eliminar" value="Eliminar" />
    </form></td>
  </tr>
  <tr>
    <td align="center" class="estilo">&nbsp;
      <table border="2">
        <tr>
          <td align="center">Codigo</td>
          <td align="center">Nombre</td>
          <td align="center">Valor</td>
          <td>Codigo de cliente</td>
          <td align="center">Fecha</td>
          <td align="center">Hora</td>
        </tr>
        <?php do { ?>
          <tr>
            <td><?php echo $row_Recordset1['id']; ?></td>
            <td><?php echo $row_Recordset1['Nombre']; ?></td>
            <td><?php echo $row_Recordset1['Valor']; ?></td>
            <td><?php echo $row_Recordset1['user']; ?></td>
            <td><?php echo $row_Recordset1['Fecha']; ?></td>
            <td><?php echo $row_Recordset1['hora']; ?></td>
          </tr>
          <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
      </table></td>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
