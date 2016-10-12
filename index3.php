<?
require("classes/area.class.php");

?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Bienvenido al sistema</title>
<link href="theme/css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<?
if(isset( $_POST['btn_registrar'])||isset( $_POST['btn_actualizar']))
{
	$p_id_area =  		trim($_POST["txt_id"]); 
	$P_Nombre_area =  	trim(strtoupper($_POST["txt_nombre_area"])); 
	
	if($_POST["chk_habilitado"])
	{
		$P_estado_habilitado =  1; 
	}
	else
	{
		$P_estado_habilitado =  0; 
	}
	$p_id_area =  	$_POST["ddl_area"]; 

	if(isset( $_POST['btn_registrar']))
	{
		$nuevaarea = new area($P_Nombre_area,$P_estado_habilitado,$p_id_area);
		list($p_id_area, $P_nombre_area, $P_estado_area) = $nuevaarea->registrar();
	} 
	else
	{
		
	}
}

if(isset( $_POST['btn_consultar']))
{
	$p_id_area = trim($_POST["txt_id"]); 
	
	if($_POST["chk_habilitado"])
	{
		$P_estado_habilitado =  1; 
	}
	else
	{
		$P_estado_habilitado =  0; 
	}
	
	if(isset( $_POST['btn_consultar']))	
	{
		//echo $p_id_area."+";
		$nuevaArea = new GestionarArea($p_id_area);
		list($P_id_area, $P_nombre_area, $P_estado_habilitado) = $nuevaArea->consultar();
		
	
	}
}
	if(isset($_GET['IdPer1']))
	{		
		$nuevaArea = new GestionarArea($_GET['IdPer1'], $p_id_area, $P_nombre_area,$P_estado_habilitado);
		list($p_id_area,$P_nombre_area,$P_estado_habilitado) = $nuevaArea->consultar();	
	}
	if(isset($_GET['IdPer']))
	{		
		$nuevaArea = new GestionarArea($_GET['IdPer'], $P_nombre_area,$P_estado_habilitado,$p_id_area);
		list($p_id_area,$P_nombre_area,$P_estado_habilitado) = $nuevaArea->eliminar();	
	}
	if(isset( $_POST['btn_actualizar']))
{
	$p_id_area =  	trim($_POST["txt_id"]); 
	$P_nombre_area =  	trim(strtoupper($_POST["txt_nombre"])); 
	if($_POST["chk_habilitado"])
	{
		$P_estado_habilitado =  1; 
	}
	else
	{
		$P_estado_habilitado =  0; 
	}
	$p_id_area =  	$_POST["ddl_area"]; 

	if(isset( $_POST['btn_actualizar']))
	{
		$nuevaArea = new area($p_id_area, $P_nombre_area,$P_estado_habilitado);
		$nuevaArea->modificar();
	} 
	else
	{
		
	}
}
if(isset( $_POST['btn_nuevo']))
{
	$p_id_area =  		""; 
	$P_nombre_area =  	""; 
	$P_estado_habilitado =  	"";  

}
?>

<h1 align="center">GESTION AREA </h1>
<form action="" method="post" name="frm_AREA" target="_self">
<table width="394" border="0" cellpadding="0" cellspacing="0" align="center">
  <tr>
    <td width="143">Identificación</td>
    <td width="245"><label for="txt_id"></label>
      <input name="txt_id" type="number" id="txt_id" required accesskey="i" value="<? echo $P_id_area; ?>"></td>
        <tr>
      
        <td width="143">nombre</td>
    <td width="245"><label for="txt_nombre_area"></label>
      <input id="txt_nombre_area" name="txt_nombre_area" type="text" required value="<? echo $P_nombre_area; ?>"></td>
 
  </tr>
  
    <td>Habilitado</td>
    <td><input name="chk_habilitado" type="checkbox" id="chk_habilitado" value="1" <?php if (!(strcmp($P_estado_habilitado,1))) {echo "checked=\"checked\"";} ?>>
      Sí</td>
  </tr>
  <tr>
    <td colspan="2">
    <?php
    
	include("inclusiones/include_controles.php");
	?>
    
    </td>
    </tr>
</table>

</form>

<h2 align="center">HISTÓRICO </h2>
 <?php
$todos = new GestionarArea();
$todos->consultarTodos();    

	?>
    
</body>
</html>