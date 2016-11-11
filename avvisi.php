<html lang="<?=$lang?>" dir="<?=$locale2?>">
<head>
<title>Avviso da Gastone</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="css/gastone.css" type="text/css">
</head>

<body bgcolor="#FFFFFF" text="#000000">
<div align="center">
  <table width="500" border="0" cellspacing="0" cellpadding="2">
    <tr> 
      <td colspan="4" height="4"><img src="img/spacer.gif" width="1" height="10"></td>
    </tr>
    <tr> 
      <td width="85" bgcolor="#002F55" height="60"><b><font color="#000099"><a href="http://www.grandeservice.it" target="_blank"><img src="img/loghetto%20bordato.gif" width="84" height="77" border="0"></a></font></b></td>
      <td width="101" bgcolor="#002F55" height="60"> 
        <h4><font size="2"><?= _("Local ")?><br>
          <?= _("Area")?><br>
          <?= _("Network")?></font></h4>
      </td>
      <td width="94" bgcolor="#002F55" height="60">&nbsp;</td>
      <td width="204" bgcolor="#002F55" height="60" valign="top"> 
        <div align="right"><img src="img/logo_gastone.gif" width="96" height="48"></div>
        <table width="99%" border="0" cellspacing="0" cellpadding="2" class="titolo">
          <tr> 
            <td> 
              <div align="right"><font color="#FFEB8E" size="2"><?= _("Avvisi e Note Informative")?></font></div>
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
  <table width="500" border="0" cellspacing="0" cellpadding="2" class="corpo">
    <tr> 
      <td colspan="2" class="fondo_a" height="9"><font color="#000066"> </font><font color="#FF0000"> 
        <?php
		  	echo $messaggio;
		  ?>
        </font><font color="#000066"> 
        <input type="hidden" name="oklogin" value="1">
        </font> </td>
    </tr>
    <?php
	  if($errore){
	  ?>
    <?php
	  }?>
  </table>
</div>
</body>
</html>
