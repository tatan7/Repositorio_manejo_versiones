<?
require("classes/class_ListaDesplegable.php"); 
require("classes/persona.class.php");

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
	$P_id_persona =  		trim($_POST["txt_id"]); 
	$P_id_tipo_documento =  trim($_POST["ddl_id_tipo_documento"]); 
	$P_nombre_persona =  	trim(strtoupper($_POST["txt_nombre"])); 
	$P_apellido =  			trim(strtoupper($_POST["txt_apellido"])); 
	$P_fecha_nacimiento =  	trim($_POST["txt_fecha"]); 
	$P_direccion =  		trim(strtoupper($_POST["txt_direccion"])); 
	$P_telefono =  			trim($_POST["txt_telefono"]); 
	$P_email =  			trim(strtolower($_POST["txt_email"])); 
	if($_POST["chk_habilitado"])
	{
		$P_estado_habilitado =  1; 
	}	
	else

	{
		$P_estado_habilitado =  0; 
	}

	$P_id_area =  			$_POST["ddl_area"]; 
	$P_id_nacionalidad =  	$_POST["ddl_nacionalidad"]; 

	if(isset( $_POST['btn_registrar']))
	{

		$nuevaPersona = new Persona($P_id_persona, $P_nombre_persona,$P_apellido,$P_fecha_nacimiento,$P_direccion,$P_telefono,$P_email,$P_estado_habilitado,$P_id_tipo_documento,$P_id_area,$P_id_nacionalidad);
		list($P_id_persona, $P_nombre_persona,$P_apellido,$P_fecha_nacimiento,$P_direccion,$P_telefono,$P_email,$P_estado_habilitado,$P_id_tipo_documento,$P_id_area,$P_id_nacionalidad) = $nuevaPersona->registrar();
	} 
	else
	{
		
	}
}

if(isset( $_POST['btn_consultar']))
{
	$P_id_persona =  		trim($_POST["txt_id"]); 
	$P_id_tipo_documento =  trim($_POST["ddl_id_tipo_documento"]); 
	$P_nombre_persona =  	trim(strtoupper($_POST["txt_nombre"])); 
	$P_apellido =  			trim(strtoupper($_POST["txt_apellido"])); 
	$P_fecha_nacimiento =  	trim($_POST["txt_fecha"]); 
	$P_direccion =  		trim(strtoupper($_POST["txt_direccion"])); 
	$P_telefono =  			trim($_POST["txt_telefono"]); 
	$P_email =  			trim(strtolower($_POST["txt_email"]));
	
	if($_POST["chk_habilitado"])
	{
		$P_estado_habilitado =  1; 
	}
	else
	{
		$P_estado_habilitado =  0; 
	}

	$P_id_area =  			$_POST["ddl_area"]; 
	$P_id_nacionalidad =  	$_POST["ddl_nacionalidad"]; 
	
	if(isset( $_POST['btn_consultar']))
	{
		$nuevaPersona = new GestionarPersona($P_id_persona, $P_nombre_persona,$P_apellido,$P_fecha_nacimiento,$P_direccion,$P_telefono,$P_email,$P_estado_habilitado,$P_id_tipo_documento,$P_id_area,$P_id_nacionalidad);
		list($P_id_persona,$P_nombre_persona,$P_apellido,$P_fecha_nacimiento,$P_direccion,$P_telefono,$P_email,$P_estado_habilitado,$P_id_tipo_documento,$P_id_area,$P_id_nacionalidad) = $nuevaPersona->consultar();

	}
}
	if(isset($_GET['IdPer1']))
	{		
		$nuevaPersona = new GestionarPersona($_GET['IdPer1'], $P_nombre_persona,$P_apellido,$P_fecha_nacimiento,$P_direccion,$P_telefono,$P_email,$P_estado_habilitado,$P_id_tipo_documento,$P_id_area,$P_id_nacionalidad);
		list($P_id_persona,$P_nombre_persona,$P_apellido,$P_fecha_nacimiento,$P_direccion,$P_telefono,$P_email,$P_estado_habilitado,$P_id_tipo_documento,$P_id_area,$P_id_nacionalidad) = $nuevaPersona->consultar();	
	}
	if(isset($_GET['IdPer']))
	{		
		$nuevaPersona = new GestionarPersona($_GET['IdPer'], $P_nombre_persona,$P_apellido,$P_fecha_nacimiento,$P_direccion,$P_telefono,$P_email,$P_estado_habilitado,$P_id_tipo_documento,$P_id_area,$P_id_nacionalidad);
		list($P_id_persona,$P_nombre_persona,$P_apellido,$P_fecha_nacimiento, $P_fecha_nacimiento,$P_fecha_nacimiento, $P_direccion,$P_telefono,$P_email,$P_estado_habilitado,$P_id_tipo_documento,$P_id_area,$P_id_nacionalidad) = $nuevaPersona->eliminar();	
	}
	if(isset( $_POST['btn_actualizar']))
{
	$P_id_persona =  		trim($_POST["txt_id"]); 
	$P_id_tipo_documento =  trim($_POST["ddl_id_tipo_documento"]); 
	$P_nombre_persona =  	trim(strtoupper($_POST["txt_nombre"])); 
	$P_apellido =  			trim(strtoupper($_POST["txt_apellido"])); 
	$P_fecha_nacimiento =  	trim($_POST["txt_fecha"]); 
	$P_direccion =  		trim(strtoupper($_POST["txt_direccion"])); 
	$P_telefono =  			trim($_POST["txt_telefono"]); 
	$P_email =  			trim(strtolower($_POST["txt_email"])); 
	if($_POST["chk_habilitado"])
	{
		$P_estado_habilitado =  1; 
	}
	else
	{
		$P_estado_habilitado =  0; 
	}

	$P_id_area =  			$_POST["ddl_area"]; 
	$P_id_nacionalidad =  	$_POST["ddl_nacionalidad"]; 

	if(isset( $_POST['btn_actualizar']))
	{
		$nuevaPersona = new Persona($P_id_persona,$P_id_tipo_documento, $P_nombre_persona,$P_apellido,$P_fecha_nacimiento,$P_direccion,$P_telefono,$P_email,$P_estado_habilitado,$P_id_area,$P_id_nacionalidad);
		$nuevaPersona->modificar();
	} 
	else
	{
			
	}
}
if(isset( $_POST['btn_nuevo']))
{
	$P_id_persona =  		""; 
	$P_nombre_persona =  	""; 
	$P_apellido =  			"";  
	$P_fecha_nacimiento =  	"";  
	$P_direccion =  		""; 
	$P_telefono =  			""; 
	$P_email =  			"";
	
}
?>

<h1 align="center">GESTION PERSONAS </h1>
<form action="" method="post" name="frm_persona" target="_self">
<table width="394" border="0" cellpadding="0" cellspacing="0" align="center">
  <tr>
       <td>tipo documento</td>
    <td><label for="ddl_id_tipo_documento"></label>
      	<select name="ddl_id_tipo_documento"id="ddl_id_tipo_documento" requerid>
      		<option value="" <?php if (!(strcmp("", $P_id_tipo_documento))) {echo "selected=\"selected\"";} ?>>SELECCIONE</option>
       		<?php
        		$nuevalista = new Lista("tipo_documento","id_tipo_documento","nombre_tipo_documento","estado_habilitado",1,$P_id_tipo_documento);
				$nuevalista->CargarLista();
        	?>	
       
        </select>
	</tr>
    <td width="143">Identificación</td>
    <td width="245"><label for="txt_id"></label>
      <input name="txt_id" type="number" id="txt_id" required accesskey="i" value="<? echo $P_id_persona; ?>"></td>
  </tr>
  <tr>
    <td>Nombre</td>
    <td><label for="txt_nombre"></label>
      <input name="txt_nombre" type="text" id="txt_nombre" required value="<? echo $P_nombre_persona; ?>"></td>
  </tr>
  <tr>
    <td>Apellido</td>
    <td><label for="txt_apellido"></label>
      <input name="txt_apellido" type="text" required id="txt_apellido" value="<?echo $P_apellido; ?>"></td>
  </tr>
  <tr>
    <td>Fecha Nacimiento</td>
    <td><label for="txt_fecha"></label>
      <input name="txt_fecha" type="date" required id="txt_fecha" value="<? echo $P_fecha_nacimiento; ?>"></td>
  </tr>
  <tr>
    <td>Direcciòn</td>
    <td><label for="txt_direccion"></label>
      <input name="txt_direccion" type="text" id="txt_direccion" value="<? echo $P_fecha_nacimiento; ?>"></td>
  </tr>
  <tr>
    <td>Telefono</td>
    <td><label for="txt_telefono"></label>
      <input name="txt_telefono" type="text" id="txt_telefono" value="<? echo $P_telefono; ?>"></td>
  </tr>
  <tr>
    <td>Email</td>
    <td><label for="txt_email"></label>
      <input name="txt_email" type="email" required id="txt_email" value="<? echo $P_email; ?>"></td>
       </tr>
  <tr>  
   </tr>
  <tr>
    <td>Àrea</td>
    <td><label for="ddl_area"></label>
      <select name="ddl_area" id="ddl_area" required>
        <option value="" <?php if (!(strcmp("", $P_id_area))) {echo "selected=\"selected\"";} ?>>SELECCIONE</option>
        <?php
        $nuevalista = new Lista("area","id_area","nombre_area","estado_habilitado",1,$P_id_area);
		$nuevalista->CargarLista();
        ?>
      </select></td>
  </tr>
  <tr>
    <td>Nacionalidad</td>
    <td><label for="ddl_nacionalidad"></label>
      <select name="ddl_nacionalidad" id="ddl_nacionalidad"  required>
        <option value="" <?php if (!(strcmp("", $P_id_nacionalidad))) {echo "selected=\"selected\"";} ?>>SELECCIONE</option>
          <?php
        $nuevalista = new Lista("nacionalidad","id_nacionalidad","nombre_nacionalidad","estado_habilitado",1,$P_id_nacionalidad);
		$nuevalista->CargarLista();
        ?>
      </select></td>
 
         
      </tr>
  <tr>
       
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
$todos = new GestionarPersona();
$todos->consultarTodos();    

	?>
    
</body>
</html>