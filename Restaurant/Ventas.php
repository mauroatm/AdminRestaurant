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
$query_cliente = "SELECT * FROM cliente ORDER BY Nombre";
$cliente = mysql_query($query_cliente, $local) or die(mysql_error());
$row_cliente = mysql_fetch_assoc($cliente);
$totalRows_cliente = mysql_num_rows($cliente);

mysql_select_db($database_local, $local);
$query_pedido = "SELECT * FROM inventario";
$pedido = mysql_query($query_pedido, $local) or die(mysql_error());
$row_pedido = mysql_fetch_assoc($pedido);
$totalRows_pedido = mysql_num_rows($pedido);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Restaurant adminitrador</title>
<link href="estilo.css" rel="stylesheet" type="text/css" />
<style type="text/css">
#apDiv1 {	position: absolute;
	width: 85px;
	height: 82px;
	z-index: 1;
	left: 196px;
	top: 14px;
	overflow: visible;
}
</style>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
</head>

<body>
<table width="730" border="4" align="center">
  <tr>
    <td height="25"><p><a href="index.php"><img src="Imagenes/home-icon.png" width="75" height="75" alt="home" /></a></p>
    <p><img src="Imagenes/banner.jpg" width="720" height="130" alt="Donao" /></p></td>
  </tr>
</table>
<table width="730" border="4" align="center">
  <tr>
    <td width="541" align="center" class="subtitulo">Registro Ventas </td>
    <td width="174" align="center"></td>
  </tr>
  <tr>
    <td height="129" align="center"><form id="form1" name="form1" method="post" action="reguistro-ventas.php">
      <p>
        <label for="cliente" class="subtitulo">Nombre del Cliente: </label>
        <select name="cliente" class="estilo" id="cliente" title="Nombre del Cliente">
          <?php
do {  
?>
          <option value="<?php echo $row_cliente['id']?>"><?php echo $row_cliente['Nombre']?></option>
          <?php
} while ($row_cliente = mysql_fetch_assoc($cliente));
  $rows = mysql_num_rows($cliente);
  if($rows > 0) {
      mysql_data_seek($cliente, 0);
	  $row_cliente = mysql_fetch_assoc($cliente);
  }
?>
        </select>
      </p>
      <p align="left"><span class="subtitulo">Fecha: 
        </span>
        <input name="Descripcion" type="text" class="estilo" id="Descripcion" /> 
        </p>
      <p align="left"><span class="subtitulo">Valor:</span> <span id="sprytextfield1">
        <input name="costo" type="text" class="estilo" id="costo" />
        <span class="textfieldRequiredMsg">Se necesita un valor.</span><span class="textfieldInvalidFormatMsg">Formato no válido.</span></span></p>
      <div align="left"></div>
      <div align="left"></div>
      <div align="left"></div>
      <p>
        <input name="registra" type="submit" class="subtitulo" id="registra" value="Realizar Operacion" />
        <label for="Registrar"></label>
    </p>
    </form></td>
    <td align="center"><img src="Imagenes/bag.png" width="167" height="176" /></td>
  </tr>
</table>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "integer");
</script>
</body>
</html>
<?php
mysql_free_result($cliente);

mysql_free_result($pedido);
?>
