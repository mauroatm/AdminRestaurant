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
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
</script>
</head>

<body onload="MM_preloadImages('Imagenes/nuevo-usuario.png','Imagenes/CONTACTOS-ICONO1.png')">
<table width="720" border="4" align="center">
  <tr>
    <td height="25"><p><a href="index.php"><img src="Imagenes/home-icon.png" width="75" height="75" alt="home" /></a></p>
    <p><img src="Imagenes/banner.jpg" width="720" height="130" alt="Donao" /></p></td>
  </tr>
</table>
<table width="737" border="4" align="center">
  <tr>
    <td width="359" align="center"><a href="Agregar-cliente.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('add-clientes','','Imagenes/nuevo-usuario.png',1)"><img src="Imagenes/nuevo-usuario1.png" width="256" height="256" id="add-clientes" /></a></td>
    <td width="344" align="center"><a href="tabla-cliente.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('tabla','','Imagenes/CONTACTOS-ICONO1.png',1)"><img src="Imagenes/CONTACTOS-ICONO.png" width="260" height="263" id="tabla" /></a></td>
  </tr>
  <tr>
    <td align="center" class="subtitulo"><a href="Agregar-cliente.php">Agregar nuevo cliente</a></td>
    <td align="center" class="subtitulo"><a href="tabla-cliente.php">Tabla clientes</a></td>
  </tr>
</table>
</body>
</html>