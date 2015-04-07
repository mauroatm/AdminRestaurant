<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Restaurant adminitrador</title>
<link href="estilo.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
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

<body onload="MM_preloadImages('Imagenes/admin1.png','Imagenes/Ventas1.png','Imagenes/cliente1.png')">
<table width="720" border="4" align="center">
  <tr>
    <td height="25"><img src="Imagenes/banner.jpg" width="720" height="130" alt="Donao" /></td>
  </tr>
</table>
<div>
  <div align="center"><a href="Ventas.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Ventas','','Imagenes/Ventas1.png',1)">Administrador Base de Datos doña O</a></div>
</div>
<table width="737" border="4" align="center">
  <tr>
    <td width="97" height="127" align="center"><a href="Ventas.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Ventas','','Imagenes/Ventas1.png',1)"><img src="Imagenes/Ventas.png" width="110" height="130" id="Ventas" /></a></td>
    <td width="618" align="center"><p align="center"><span id="docs-internal-guid-bde78420-627e-7665-618e-ed3a160e9f0a">Realizar El registro de ventas de productos.</span></p></td>
  </tr>
  <tr>
    <td align="center"><a href="Administrador.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Administrador','','Imagenes/admin1.png',1)"><img src="Imagenes/admin.png" width="110" height="130" id="Administrador" /></a></td>
    <td align="center"><p align="center" id="docs-internal-guid-bde78420-627e-c8b5-eb53-f405570d2d8e" dir="ltr">Permitir visualizar el valor total del cliente y las ventas por dia.</p></td>
  </tr>
  <tr>
    <td height="123" align="center"><a href="Clientes.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Clientes','','Imagenes/cliente1.png',1)"><img src="Imagenes/cliente.png" width="110" height="130" id="Clientes" /></a></td>
    <td align="center"><div align="center"><span id="docs-internal-guid-bde78420-6280-93cb-cd5a-36e25a0a65fb">Crear de nuevos clientes y visualizar directorio de clientes existentes.</span></div></td>
  </tr>
</table>
</body>
</html>