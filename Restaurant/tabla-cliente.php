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
$query_cliente = "SELECT * FROM cliente";
$cliente = mysql_query($query_cliente, $local) or die(mysql_error());
$row_cliente = mysql_fetch_assoc($cliente);
$totalRows_cliente = mysql_num_rows($cliente);
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
<table width="939" border="4" align="center">
  <tr>
    <td width="899" align="center" class="subtitulo"><p>Tabla clientes</p></td>
  </tr>
  <tr>
    <td align="center">&nbsp;Eliminar cliente
      <form id="form1" name="form1" method="post" action="Eliminar-cliente.php">
        <label for="id">Elimina</label>
         cliente
         <select name="id" id="id">
           <option value="ninguno">ninguno</option>
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
         <input type="submit" name="eliminar-cliente" id="eliminar-cliente" value="Eliminar" />
      </form>
      <table width="923" border="2">
        <tr>
          <td align="center">id</td>
          <td align="center">Nombre</td>
          <td align="center">Telefono</td>
          <td align="center">Celular</td>
          <td align="center">Dirección</td>
          <td align="center">Cedula</td>
          <td align="center">Comentario</td>
        </tr>
        <?php do { ?>
          <tr>
            <td><?php echo $row_cliente['id']; ?></td>
            <td><?php echo $row_cliente['Nombre']; ?></td>
            <td><?php echo $row_cliente['telefono']; ?></td>
            <td><?php echo $row_cliente['celular']; ?></td>
            <td><?php echo $row_cliente['Direccion']; ?></td>
            <td><?php echo $row_cliente['cedula']; ?></td>
            <td><?php echo $row_cliente['comentario']; ?></td>
          </tr>
          <?php } while ($row_cliente = mysql_fetch_assoc($cliente)); ?>
    </table></td>
  </tr>
</table>
<div id="apDiv1"><a href="index.php"><img src="Imagenes/home-icon.png" width="115" height="122" alt="home" /></a></div>
</body>
</html>
<?php
mysql_free_result($cliente);
?>
