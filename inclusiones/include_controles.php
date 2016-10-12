<table width="290" border="0" align="center" cellpadding="5" cellspacing="0" class="fondo_tabla">
	<tr>
    	<td width="54">
  		<button  type="submit" name="btn_consultar" formnovalidate  <? echo $estado_c; ?> class="btn btn-icon btn-info glyphicons search" id="btn_consultar"  <?php echo $requerido?>   "><i></i>Buscar</button>
    	</td>
    	<td width="62">
      	<button type="submit"  name="btn_registrar" <? echo $estado_r; ?> class="btn btn-icon btn-success glyphicons circle_ok" onClick="return validar()" id="btn_registrar"   " ><i></i>Registrar</button>
    	</td>
    	<td width="72">
    	<button name="btn_actualizar" type="submit" <? echo $estado_m; ?> class="btn btn-icon btn-success glyphicons circle_plus" onClick="return validar()" id="btn_actualizar"  "><i></i>Actualizar</button>
		</td>
    	<td width="62">
    	<button name="btn_nuevo" type="submit"  <? echo $estado_n; ?>  class="btn btn-icon btn-warning glyphicons delete" id="btn_nuevo" <?php echo $requerido?> formnovalidate  "><i></i>Nuevo</button>
    	</td>
        
        <td width="62">
    	<button name="btn_nuevo" type="button"  <? echo $estado_i; ?>  class="btn btn-icon btn-info glyphicons print" id="btn_imprimir"  formnovalidate onclick="window.print();"><i></i>Imprimir</button>
    	</td>
   	</tr>
</table>