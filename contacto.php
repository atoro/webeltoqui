<?php include("Conexion.php"); 
	$listado = "select * from  horario";
	$sentencia = mysql_query($listado,$conn);
	while($rs=mysql_fetch_array($sentencia,$mibase)){
		$horas = str_replace("\r\n","<br>",$rs["horas"]);
	}
	$listado = "select * from  datos";
	$sentencia = mysql_query($listado,$conn);
	while($rs=mysql_fetch_array($sentencia,$mibase)){
		$direccion = str_replace("\r\n","<br>",$rs["direccion"]);
		$telefono = str_replace("\r\n","<br>",$rs["telefono"]);
		$correo = str_replace("\r\n","<br>",$rs["correo"]);		
	}
	$listado = "select * from  productos_pie";
	$sentencia = mysql_query($listado,$conn);
	while($rs=mysql_fetch_array($sentencia,$mibase)){
		$columna1 = str_replace("\r\n","<br>",$rs["columna1"]);
		$columna2 = str_replace("\r\n","<br>",$rs["columna2"]);			
	}
	if ($_POST["Enviar"]){
	include_once("securimage/securimage.php");
	$img = new securimage();
	$valido_captcha = $img->check($_POST['captchacode']);
	if ($valido_captcha){
	$destinatario = $correo ;
	$nombre = $_POST["Nombre"];
	$telefono = $_POST["Telefono"];
	$mail = $_POST["Email"];
	$consulta = $_POST["Consulta"];
	$asunto = "Consulta sitio web"; 
	$cuerpo = "<table width=100% border=1 cellspacing=0 cellpadding=0><tr><td>NOMBRE: $nombre</td></tr><tr><td>TELEFONO: $telefono		    </td></tr><tr><td>MAIL: $mail</td></tr><tr><td>CONSULTA: $consulta</td></tr></table>";
	$headers = "MIME-Version: 1.0\r\n"; 
	$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
	$headers .= "From: $nombre <$mail>\r\n"; 
	mail($destinatario,$asunto,$cuerpo,$headers);
	header("location: postconsulta.php","_self");
	}else{
    echo "Consulta no enviada, debe escribir correctamente el codigo de seguridad";
	}

	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Muebleria el Toqui</title>
    <meta charset="iso-8859-1">
    <link rel="stylesheet" href="css/reset.css" type="text/css" media="screen">
    <link rel="stylesheet" href="css/style.css" type="text/css" media="screen">
    <link rel="stylesheet" href="css/estilos.css" type="text/css" media="screen">
    <link rel="stylesheet" href="css/grid.css" type="text/css" media="screen"> 
    <script src="js/jquery-1.6.2.min.js" type="text/javascript"></script>
    <script src="js/jquery.galleriffic.js" type="text/javascript"></script>
    <script src="js/jquery.opacityrollover.js" type="text/javascript"></script>  
    <script type="text/javascript">
$(window).load(function() {
			// We only want these styles applied when javascript is enabled
			$('div.navigation').css({'width' : '320px', 'float' : 'right'});
			$('div.content').css('display', 'block');
	
			// Initially set opacity on thumbs and add
			// additional styling for hover effect on thumbs
			var onMouseOutOpacity = 0.5;
			$('#thumbs ul.thumbs li span').opacityrollover({
				mouseOutOpacity:   onMouseOutOpacity,
				mouseOverOpacity:  0.0,
				fadeSpeed:         'fast',
				exemptionSelector: '.selected'
			});
			
			// Initialize Advanced Galleriffic Gallery
			var gallery = $('#thumbs').galleriffic({
				delay:                     7000,
				numThumbs:                 12,
				preloadAhead:              6,
				enableTopPager:            false,
				enableBottomPager:         false,
				imageContainerSel:         '#slideshow',
				controlsContainerSel:      '',
				captionContainerSel:       '',
				loadingContainerSel:       '',
				renderSSControls:          true,
				renderNavControls:         true,
				playLinkText:              'Play Slideshow',
				pauseLinkText:             'Pause Slideshow',
				prevLinkText:              'Prev',
				nextLinkText:              'Next',
				nextPageLinkText:          'Next',
				prevPageLinkText:          'Prev',
				enableHistory:             true,
				autoStart:                 7000,
				syncTransitions:           true,
				defaultTransitionDuration: 900,
				onSlideChange:             function(prevIndex, nextIndex) {
					// 'this' refers to the gallery, which is an extension of $('#thumbs')
					this.find('ul.thumbs li span')
						.css({opacity:0.5})
				},
				onPageTransitionOut:       function(callback) {
					this.find('ul.thumbs li span').css({display:'block'});
				},
				onPageTransitionIn:        function() {
					this.find('ul.thumbs li span').css({display:'none'});
				}
			});
		});
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
<body id="page1" onLoad="MM_preloadImages('imagenes/social/fb2.jpg','imagenes/social/tw2.jpg')">
<header>
	<div id="header">
    	<div id="logo"><img src="imagenes/logo.png" width="282" height="131"></div>
    	<nav>     	 
           	<div class="li"><a href="contacto.php" class="li">CONTACTO</a></div>
       		<div class="li"><a href="ubicacion.php" class="li">UBICACION</a></div>
       		<div class="li"><a href="productos.php" class="li">PRODUCTOS</a></div>
          	<div class="li"><a href="nosotros.php" class="li">NOSOTROS</a></div>
        	<div class="li"><a href="index.php" class="li">INICIO</a></div>
    	</nav>
    </div>
</header>
<div class="ic"></div>
    
<!-- content -->
    <section id="content">
        <div class="bg-top">
        	<div class="bg-top-2">
                <div class="bg">
                    <div class="bg-top-shadow">
                   	  <div id="banner"> 
                        	<div id="banner_img"><img src="imagenes/banner4.jpg" width="940" height="140"></div>
                      </div>
                    </div>
                </div>
            </div>	
        </div>
        
    </section>
<div id="contenido">
	<div id="contenidodentro">
      <table width="980" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td height="30" colspan="3">&nbsp;</td>
        </tr>
        <tr>
          <td width="310" height="225"><table width="310" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td height="225"><img src="imagenes/contacto.jpg" width="310" height="225"></td>
            </tr>
          </table></td>
          <td width="25"></td>
          <td height="225" ><table width="100%" height="285" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td height="36" valign="top" class="titulos">Contacto</td>
            </tr>
            <tr>
              <td height="214"><table width="50%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="318" height="400" valign="top" class="text5"><form name="form1" method="post" action="contacto.php">
                    <table width="53%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td height="20" align="left" class="productos"><h2 class="textos">Nombre</h2></td>
                      </tr>
                      <tr>
                        <td width="451" align="left"><label>
                          <input name="Nombre" type="text" class="boton2" id="Nombre" size="50" />
                        </label></td>
                      </tr>
                      <tr>
                        <td height="5" align="left"></td>
                      </tr>
                      <tr>
                        <td height="20" align="left" class="texto_b"><h2 class="textos">Tel&eacute;fono</h2></td>
                      </tr>
                      <tr>
                        <td align="left"><input name="Telefono" type="text" class="boton2" id="Telefono" size="50" /></td>
                      </tr>
                      <tr>
                        <td height="5" align="left"></td>
                      </tr>
                      <tr>
                        <td height="20" align="left" class="texto_b"><h2 class="textos">Mail</h2></td>
                      </tr>
                      <tr>
                        <td align="left"><input name="Email" type="text" class="boton2" id="Email" size="50" /></td>
                      </tr>
                      <tr>
                        <td height="5" align="left"></td>
                      </tr>
                      <tr>
                        <td height="20" align="left" class="texto_b"><h2 class="textos">Consulta</h2></td>
                      </tr>
                      <tr>
                        <td align="left"><textarea name="Consulta" cols="50" rows="4" class="boton3" id="Consulta"></textarea></td>
                      </tr>
                      <tr>
                        <td height="5" align="left"></td>
                      </tr>
                      <tr>
                        <td align="left"><div align="left"><img src="/securimage/securimage_show.php" name="captcha" id="captcha" /></div></td>
                      </tr>
                      <tr>
                        <td height="27" align="left"><div align="left"><a href="#" class="textos" onclick="document.getElementById('captcha').src = '/securimage/securimage_show.php?' + Math.random(); return false">Refrescar la imagen</a></div></td>
                      </tr>
                      <tr>
                        <td align="left"><div align="center">
                          <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td width="33%" class="textossesion"><h2 class="textos">Codigo de seguridad</h2></td>
                              <td width="67%"><div align="left">
                                <input name="captchacode" type="text" class="boton5" id="captchacode" size="20" />
                              </div></td>
                            </tr>
                          </table>
                        </div></td>
                      </tr>
                      <tr>
                        <td align="left">&nbsp;</td>
                      </tr>
                      <tr>
                        <td align="left"><div align="left">
                          <input name="Enviar" type="submit" class="boton4" id="Enviar" value="Enviar" />
                        </div></td>
                      </tr>
                    </table>
                  </form></td>
                  <td width="10" valign="top">&nbsp;</td>
                </tr>
              </table>                <p class="textos">&nbsp;</p></td>
            </tr>
          </table></td>
        </tr>
      </table>
      <table width="980" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td height="25">&nbsp;</td>
        </tr>
        <tr>
          <td height="60"><table width="980" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="357" height="60" valign="middle" bgcolor="#841e30" class="cotiza"><a href="contacto.php" class="cotiza">Cotiza con nosotros &gt;</a></td>
              <td width="25">&nbsp;</td>
              <td width="408" valign="middle" bgcolor="#d0cfc5" class="textos"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="4%">&nbsp;</td>
                  <td width="96%" height="60" valign="middle"><p><?php echo $horas; ?></p></td>
                </tr>
              </table></td>
              <td width="25">&nbsp;</td>
              <td width="165" valign="middle" bgcolor="#d0cfc5"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="16%">&nbsp;</td>
                  <td width="25%"><a href="https://www.facebook.com/eltoqui.muebleria" target="new" onMouseOver="MM_swapImage('Image8','','imagenes/social/fb2.jpg',1)" onMouseOut="MM_swapImgRestore()"><img src="imagenes/social/fb.jpg" width="42" height="42" id="Image8"></a></td>
                  <td width="18%">&nbsp;</td>
                  <td width="26%"><a href="https://twitter.com/MuebleraElToqui" target="new" onMouseOver="MM_swapImage('Image9','','imagenes/social/tw2.jpg',1)" onMouseOut="MM_swapImgRestore()"><img src="imagenes/social/tw.jpg" width="42" height="42" id="Image9"></a></td>
                  <td width="15%">&nbsp;</td>
                </tr>
              </table></td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td height="25">&nbsp;</td>
        </tr>
      </table>
    </div>
</div>
<div id="info"> 
  <div id="infocontenido">
    	<div id="lineafooter"></div>
    	<table width="100%" border="0" cellspacing="0" cellpadding="0">
    	  <tr>
    	    <td height="25" colspan="3">&nbsp;</td>
  	    </tr>
    	  <tr>
    	    <td width="17%" height="32" class="textos"><strong>Productos</strong></td>
    	    <td width="23%">&nbsp;</td>
    	    <td class="textos"><strong>Casa Matriz</strong></td>
  	    </tr>
    	  <tr>
    	    <td height="16" class="textos"><?php echo $columna1; ?></td>
    	    <td class="textos"><?php echo $columna2; ?></td>
    	    <td class="textos"><?php echo $direccion; ?><br>
    	      <?php echo $telefono; ?><br>
    	      <?php echo $correo; ?></td>
  	    </tr>
  	  </table>
  </div>
</div>
<footer>
	<div id="footer">
    	<div id="lineafooter"></div>
    	<div id="emagenic"> sitio desarrollado por <a href="http://emagenic.cl/" target="new" class="textos">emagenic.cl</a></div>
	</div>
</footer>  
</body>
</html>
