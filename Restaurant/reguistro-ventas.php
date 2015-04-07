<?php require_once('Connections/local.php'); 
mysql_select_db($database_local,$local)or die ("problemas al conecta BASE DE DATOS ");
$codigo = date("dmY");//codigo de fecha
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
	left: 182px;
	top: 28px;
	overflow: visible;
}
#apDiv2 {
	position: absolute;
	width: 200px;
	height: 115px;
	z-index: 2;
}
#apDiv3 {
	position: absolute;
	width: 141px;
	height: 156px;
	z-index: 3;
	left: 1100px;
	top: 287px;
	overflow: auto;
}
#apDiv4 {
	position: absolute;
	width: 156px;
	height: 115px;
	z-index: 3;
	left: 1082px;
	top: 396px;
}
</style>

</head>

<body>
<table width="720" border="4" align="center">
  <tr>
    <td height="190"><p><a href="index.php"><img src="Imagenes/home-icon.png" width="75" height="75" alt="home" /></a><a href="tabla-ventas.php"><img src="Imagenes/estadisticas.png" width="75" height="75" alt="Estadistica" /></a><a href="Ventas.php"><img src="Imagenes/bag.png" width="75" height="75" alt="registro" /></a></p>
    <p><img src="Imagenes/banner.jpg" alt="Donao" width="720" height="130" align="right" /></p></td>
  </tr>
</table>
<div align="center">
  <table width="533" border="1">
    <tbody>
      <tr>
        <td>

		<?php
		$nombre = $_POST['Descripcion'];
		$valor = $_POST['costo'];
        // Establecer la zona horaria predeterminada a usar.
		
		$cliente =$_POST['cliente'];
		$busqueda= mysql_query("SELECT * FROM cliente WHERE id = $cliente "); 
		while($f=mysql_fetch_array($busqueda))
		{
			
			$nombre_cliente = $f['Nombre'];
			$direccion_cliente = $f['Direccion'];
			$telefono_cliente = $f['telefono'];
			$celular_cliente = $f['celular'];
		}
       
	   date_default_timezone_set("America/Bogota");
	   $fecha = date(" d/m/Y");
	   $hora = date("H:i");
        //Imprimimos la fecha actual dandole un formato
	    echo "Fecha : " .$fecha;  
        echo "   Hora:    ".$hora;
		?>
          </p>
          <!-- Es te codigo muestra la el numero de mesa-->
          <table width="287" align="center" class="estilo">
            <tr>
              <td width="98">Nombre cliente:</td>
              <td width="160" align="left"><?php echo $nombre_cliente; ?></td>
            </tr>
            <tr>
              <td>Direccion:</td>
              <td><?php echo $direccion_cliente; ?></td>
            </tr>
            <tr>
              <td>Telefono:</td>
              <td><?php echo $telefono_cliente; ?></td>
            </tr>
            <tr>
              <td>Celular:</td>
              <td><?php echo $celular_cliente;  ?></td>
            </tr>
        </table></td>
      </tr>
    </tbody>
  </table>
</div>
<table width="365" border="1" align="center" class="estilo" id="tab">
    <tr>
      <td width="74"><p>Fecha</p></td>
      <td width="76">Precio</td>
  </tr>
    <?php
		echo '<tr>';
		echo '<td width="150">'.$nombre.'</td>';
		echo '<td width="157">'.$valor.'</td>';
		

//Este codigo disminuye la unidades del inventario...
//mysql_query("UPDATE inventario set inicial = '$unifinal',vendidos = '$venta' where Nombre = '$name'",$Dely); 
	
	if($valor != 0){// se ejecuta el registro si valor del producto es mayor a cero
		$insertar_dia = "INSERT INTO ventas SET Fecha ='$fecha', Valor = '$valor', hora = '$hora' , user = '$cliente',Nombre = 		'$nombre',codigo = '$codigo' ";
		mysql_query($insertar_dia, $local) or die(mysql_error());
		
		}
?>
    </td>
  </tr>
</table>
</body>
</html>