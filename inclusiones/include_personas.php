<table border="1" align="center" cellpadding="4" cellspacing="0" class="DatatablePedidos table table-primary table-condensed table-bordered">
 <thead>
	<tr>
    <th width="26" >ED.</th>
    <th width="26" >ELI.</th>
    <th width="117" >ID</th>    
    <th width="231" >TIPO DOCUMENTO</th>
    <th width="353" >NOMBRE</th>
    <th width="231" >APELLIDO</th>
    <th width="189" >FECHA NACIMIENTO</th>
    <th width="141" >DIRECCION </th>
    <th width="89" >TELEFONO</th>
     <th width="231" >EMAIL</th>     
    <th width="189" >HABILITADO</th>
    <th width="141" >AREA</th>
    <th width="89" >NACIONALIDAD</th>
  </tr>
	</thead>
	<tbody>
  <?php
  while($x=$this->conexion->obtener_fila($stmt,0))
  {	    ?>

    <tr>

      <td > <a href="index.php?IdPer1=<?php echo $x['id_persona']; ?>" title="MODIFICAR REGISTRO"> <img src="../images/cog_go.png" alt="EDITAR" border="0" /></a></td>
      <td > <a href="index.php?IdPer=<?php echo $x['id_persona']; ?>" title="ELIMINAR"> <img src="../images/del.png" alt="EDITAR" border="0" /></a></td>
      <td ><?php echo  number_format($x['id_persona']); ?></td>
      <td ><?php echo  $x['tipo_documento']; ?></td>
      <td ><?php echo  $x['nombre_persona']; ?></td>
      <td ><?php echo  $x['apellido']; ?></td>
      <td ><?php echo  $x['fecha_nacimiento']; ?></td>
     <td ><?php echo  $x['direccion']; ?></td>
      <td ><?php echo  $x['telefono']; ?></td>
     <td ><?php echo  $x['email']; ?></td>     
      <td ><?php echo  $x['HABILITADO']; ?></td>
      <td ><?php echo  $x['nombre_area']; ?></td>
      <td ><?php echo  $x['nombre_nacionalidad']; ?></td>
    
  
    <?php } ?>
</tr>	
	</tbody>
</table>
