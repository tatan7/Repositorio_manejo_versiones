<table border="1" align="center" cellpadding="4" cellspacing="0" class="DatatablePedidos table table-primary table-condensed table-bordered">
 <thead>
	<tr>
    <th width="26" >ED.</th>
    <th width="26" >ELI.</th>
    <th width="117" >ID</th>    
    <th width="353" >NOMBRE</th>
    <th width="189" >HABILITADO</th>
  </tr>
	</thead>
	<tbody>
  <?php
  while($x=$this->conexion->obtener_fila($stmt,0))
  {	    ?>	

    <tr>

      <td > <a href="index4.php?IdPer1=<?php echo $x['id_tipo_documento']; ?>" title="MODIFICAR REGISTRO"> <img src="../images/cog_go.png" alt="EDITAR" border="0" /></a></td>
      <td > <a href="index4.php?IdPer=<?php echo $x['id_tipo_documento']; ?>" title="ELIMINAR"> <img src="../images/del.png" alt="EDITAR" border="0" /></a></td>
      <td ><?php echo  number_format($x['id_tipo_documento']); ?></td>
      <td ><?php echo  $x['nombre_tipo_documento']; ?></td>
     
      <td ><?php echo  $x['HABILITADO']; ?></td>
 
     
    <?php } ?>
</tr>	
	</tbody>
</table>
