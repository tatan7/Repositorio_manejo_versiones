<?
require("classes/nacionalidad.class.php");

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
	$p_id_nacionalidad =  		trim($_POST["txt_id"]); 
	$P_Nombre_nacionalidad =  	trim(strtoupper($_POST["txt_nombre_nacionalidad"])); 
	
	if($_POST["chk_habilitado"])
	{
		$P_estado_habilitado =  1; 
	}
	else
	{
		$P_estado_habilitado =  0; 
	}
	$p_id_nacionalidad =  	$_POST["ddl_nacionalidad"]; 

	if(isset( $_POST['btn_registrar']))
	{
		$nuevanacionalidad = new nacionalidad($P_Nombre_nacionalidad,$P_estado_habilitado,$p_id_nacionalidad);
		list($p_id_nacionalidad, $P_nombre_nacionalidad, $P_estado_nacionalidad) = $nuevanacionalidad->registrar();
	} 
	else
	{
		
	}
}

if(isset( $_POST['btn_consultar']))
{
	$p_id_nacionalidad = trim($_POST["txt_id"]); 
	
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
		$nuevaNacionalidad = new GestionarNacionalidad($p_id_nacionalidad);
		list($P_id_nacionalidad, $P_nombre_nacionalidad, $P_estado_habilitado) = $nuevaNacionalidad->consultar();
		
	
	}
}
	if(isset($_GET['IdPer1']))
	{		
		$nuevaNacionalidad = new GestionarNacionalidad($_GET['IdPer1'], $p_id_nacionalidad, $P_nombre_nacionalidad,$P_estado_habilitado);
		list($p_id_nacionalidad,$P_nombre_nacionalidad,$P_estado_habilitado) = $nuevaNacionalidad->consultar();	
	}
	if(isset($_GET['IdPer']))
	{		
		$nuevaNacionalidad = new GestionarNacionalidad($_GET['IdPer'], $P_nombre_nacionalidad,$P_estado_habilitado,$p_id_nacionalidad);
		list($p_id_nacionalidad,$P_nombre_nacionalidad,$P_estado_habilitado) = $nuevaNacionalidad->eliminar();	
	}
	if(isset( $_POST['btn_actualizar']))
{
	$p_id_nacionalidad =  	trim($_POST["txt_id"]); 
	$P_nombre_nacionalidad =  	trim(strtoupper($_POST["txt_nombre"])); 
	if($_POST["chk_habilitado"])
	{
		$P_estado_habilitado =  1; 
	}
	else
	{
		$P_estado_habilitado =  0; 
	}
	$p_id_nacionalidad =  	$_POST["ddl_nacionalidad"]; 

	if(isset( $_POST['btn_actualizar']))
	{
		$nuevaNacionalidad = new nacionalidad($p_id_nacionalidad, $P_nombre_nacionalidad,$P_estado_habilitado);
		$nuevaNacionalidad->modificar();
	} 
	else
	{
		
	}
}
if(isset( $_POST['btn_nuevo']))
{
	$p_id_nacionalidad =  		""; 
	$P_nombre_nacionalidad =  	""; 
	$P_estado_habilitado =  	"";  

}
?>

<h1 align="center">GESTION NACIONALIDAD </h1>
<form action="" method="post" name="frm_NACIONALIDAD" target="_self">
<table width="394" border="0" cellpadding="0" cellspacing="0" align="center">
  <tr>
    <td width="143">Identificación</td>
    <td width="245"><label for="txt_id"></label>
      <input name="txt_id" type="number" id="txt_id" required accesskey="i" value="<? echo $p_id_nacionalidad; ?>"></td>
        <tr>
      
        <td width="143">nombre</td>
    <td width="245"><label for="txt_nombre_nacionalidad"></label>
      <input id="txt_nombre_nacionalidad" name="txt_nombre_nacionalidad" type="text" required value="<? echo $P_nombre_nacionalidad; ?>"></td>
 
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
$todos = new GestionarNacionalidad();
$todos->consultarTodos();    

	?>
    
</body>
</html>