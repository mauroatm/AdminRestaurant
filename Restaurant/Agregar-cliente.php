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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO cliente (Nombre, telefono, celular, Direccion, cedula, comentario) VALUES (%s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['Nombre'], "text"),
                       GetSQLValueString($_POST['telefono'], "text"),
                       GetSQLValueString($_POST['celular'], "text"),
                       GetSQLValueString($_POST['Direccion'], "text"),
                       GetSQLValueString($_POST['cedula'], "text"),
                       GetSQLValueString($_POST['comentario'], "text"));

  mysql_select_db($database_local, $local);
  $Result1 = mysql_query($insertSQL, $local) or die(mysql_error());

  $insertGoTo = "Agregar-cliente.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
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
<table width="729" height="195" border="4" align="center">
  <tr>
    <td width="713" height="25"><p><a href="index.php"><img src="Imagenes/home-icon.png" width="75" height="75" alt="home" /></a></p>
    <p><img src="Imagenes/banner.jpg" width="720" height="130" alt="Donao" /></p></td>
  </tr>
</table>
<div align="left">
  <table width="375" border="4" align="center">
    <tr>
      <td width="359" height="379" align="center">&nbsp;<span class="subtitulo">Agregar un nuevo cliente</span>
        <form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
          <table align="center" class="subtitulo">
            <tr valign="baseline">
              <td nowrap="nowrap" align="right"><div align="left">Nombre:</div></td>
              <td><input name="Nombre" type="text" required="required" class="estilo" autocomplete="off" value="" size="32" /></td>
            </tr>
            <tr valign="baseline">
              <td nowrap="nowrap" align="right"><div align="left">Telefono:</div></td>
              <td><input name="telefono" type="text" required="required" class="estilo" value="" size="32" /></td>
            </tr>
            <tr valign="baseline">
              <td nowrap="nowrap" align="right"><div align="left">Celular:</div></td>
              <td><input name="celular" type="text" required="required" class="estilo" value="" size="32" /></td>
            </tr>
            <tr valign="baseline">
              <td nowrap="nowrap" align="right"><div align="left">Direccion:</div></td>
              <td><input name="Direccion" type="text" required="required" class="estilo" value="" size="32" /></td>
            </tr>
            <tr valign="baseline">
              <td nowrap="nowrap" align="right"><div align="left">Cedula:</div></td>
              <td><input name="cedula" type="text" required="required" class="estilo" value="" size="32" /></td>
            </tr>
            <tr valign="baseline">
              <td nowrap="nowrap" align="right">Comentario:</td>
              <td><input name="comentario" type="text" required="required" class="estilo" value="" size="32" /></td>
            </tr>
            <tr valign="baseline">
              <td nowrap="nowrap" align="right">&nbsp;</td>
              <td bgcolor="#FFFFFF"><input type="submit" class="estilo" value="Agregar Cliente" /></td>
            </tr>
          </table>
          <input type="hidden" name="MM_insert" value="form1" />
        </form></td>
    </tr>
  </table>
</div>
</body>
</html>