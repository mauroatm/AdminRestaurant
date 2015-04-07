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
$query_inventario = "SELECT * FROM inventario";
$inventario = mysql_query($query_inventario, $local) or die(mysql_error());
$row_inventario = mysql_fetch_assoc($inventario);
$totalRows_inventario = mysql_num_rows($inventario);
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
	left: 194px;
	top: 10px;
}
</style>
<script type="text/javascript">
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}
</script>
</head>

<body>
<table width="720" border="4" align="center">
  <tr>
    <td height="25"><img src="Imagenes/banner.jpg" width="720" height="229" alt="Donao" /></td>
  </tr>
</table>
<div id="apDiv1"><a href="index.php"><img src="Imagenes/home-icon.png" width="115" height="122" alt="home" /></a></div>
<table width="737" border="4" align="center">
  <tr>
    <td width="359" height="201" align="left"><p><a href="Agregar-producto.php"><img src="Imagenes/agregar-producto.png" width="128" height="118" alt="agregar producto" /></a></p>
      <p><a href="Agregar-producto.php">Agregar un nuevo producto</a></p>
      <form id="form1" name="form1" method="post" action="Eliminar-producto.php">
        <label for="id"></label>
        <label for="id2">Eliminar producto </label>
        <select name="id" id="id">
          <?php
do {  
?>
          <option value="<?php echo $row_inventario['id']?>"><?php echo $row_inventario['Nombre']?></option>
          <?php
} while ($row_inventario = mysql_fetch_assoc($inventario));
  $rows = mysql_num_rows($inventario);
  if($rows > 0) {
      mysql_data_seek($inventario, 0);
	  $row_inventario = mysql_fetch_assoc($inventario);
  }
?>
        </select>
        <input type="submit" name="eliminar" id="eliminar" value="Eliminar" />
      </form></td>
  </tr>
  <tr>
    <td align="center">&nbsp;
      <table border="2" align="center">
        <tr valign="top">
          <td align="center">Codigo</td>
          <td align="center">Nombre</td>
          <td align="center">Valor</td>
        </tr>
        <?php do { ?>
          <tr>
            <td><?php echo $row_inventario['id']; ?></td>
            <td><?php echo $row_inventario['Nombre']; ?></td>
            <td><?php echo $row_inventario['Valor']; ?></td>
          </tr>
          <?php } while ($row_inventario = mysql_fetch_assoc($inventario)); ?>
    </table></td>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($inventario);
?>
