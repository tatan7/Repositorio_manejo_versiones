<?
require("classes/tipo_documento.class.php");

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
	$p_id_tipo_documento =  		trim($_POST["txt_id"]); 
	$P_Nombre_tipo_documento =  	trim(strtoupper($_POST["txt_nombre_tipo_documento"])); 
	
	if($_POST["chk_habilitado"])
	{
		$P_estado_habilitado =  1; 
	}
	else
	{
		$P_estado_habilitado =  0; 
	}
	$p_id_tipo_documento =  	$_POST["ddl_tipo_documento"]; 

	if(isset( $_POST['btn_registrar']))
	{
		$nuevatipo_documento = new tipo_documento($P_Nombre_tipo_documento,$P_estado_habilitado,$p_id_tipo_documento);
		list($p_id_tipo_documento, $P_nombre_tipo_documento, $P_estado_tipo_documento) = $nuevatipo_documento->registrar();
	} 
	else
	{
		
	}
}

if(isset( $_POST['btn_consultar']))
{
	$p_id_tipo_documento = trim($_POST["txt_id"]); 
	
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
		$nuevaTipo_documento = new GestionarTipo_documento($p_id_tipo_documento);
		list($P_id_tipo_documento, $P_nombre_tipo_documento, $P_estado_habilitado) = $nuevaTipo_documento->consultar();
		
	
	}
}
	if(isset($_GET['IdPer1']))
	{		
		$nuevaTipo_documento = new GestionarTipo_documento($_GET['IdPer1'], $p_id_tipo_documento, $P_nombre_tipo_documento,$P_estado_habilitado);
		list($p_id_tipo_documento,$P_nombre_tipo_documento,$P_estado_habilitado) = $nuevaTipo_documento->consultar();	
	}
	if(isset($_GET['IdPer']))
	{		
		$nuevaTipo_documento = new GestionarTipo_documento($_GET['IdPer'], $P_nombre_tipo_documento,$P_estado_habilitado,$p_id_tipo_documento);
		list($p_id_tipo_documento,$P_nombre_tipo_documento,$P_estado_habilitado) = $nuevaTipo_documento->eliminar();	
	}
	if(isset( $_POST['btn_actualizar']))
{
	$p_id_Tipo_documento =  	trim($_POST["txt_id"]); 
	$P_nombre_tipo_documento =  	trim(strtoupper($_POST["txt_nombre"])); 
	if($_POST["chk_habilitado"])
	{
		$P_estado_habilitado =  1; 
	}
	else
	{
		$P_estado_habilitado =  0; 
	}
	$p_id_tipo_documento =  	$_POST["ddl_tipo_documento"]; 

	if(isset( $_POST['btn_actualizar']))
	{
		$nuevaTipo_documento = new tipo_documento($p_id_tipo_documento, $P_nombre_tipo_documento,$P_estado_habilitado);
		$nuevaTipo_documento->modificar();
	} 
	else
	{
		
	}
}
if(isset( $_POST['btn_nuevo']))
{
	$p_id_tipo_documento =  		""; 
	$P_nombre_tipo_documento =  	""; 
	$P_estado_habilitado =  	"";  

}
?>

<h1 align="center">GESTION TIPO DOCUMENTO </h1>
<form action="" method="post" name="frm_TIPO DOCUMENTO" target="_self">
<table width="394" border="0" cellpadding="0" cellspacing="0" align="center">
  <tr>
    <td width="143">Identificación</td>
    <td width="245"><label for="txt_id"></label>
      <input name="txt_id" type="number" id="txt_id" required accesskey="i" value="<? echo $p_id_tipo_documento; ?>"></td>
        <tr>
      
        <td width="143">nombre</td>
    <td width="245"><label for="txt_nombre_tipo_documento"></label>
      <input id="txt_nombre_tipo_documento" name="txt_nombre_tipo_documento" type="text" required value="<? echo $P_nombre_tipo_documento; ?>"></td>
 
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
$todos = new GestionarTipo_documento();
$todos->consultarTodos();    

	?>
    
</body>
</html>
