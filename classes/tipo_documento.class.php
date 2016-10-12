<?php
require_once("class_dbConnect.php");

class tipo_documento {
		private $AT_id_tipo_documento;	
		private $AT_nombre_tipo_documento;	
		private $AT_estado_habilitado;	
		private $table;
		private $Cllave1;
		private $Cllave2;
		private $conexion;
		private $stmt;
		private $query;

	  	private $GT; 
 
		public function __construct($P_nombre_tipo_documento,$P_estado_habilitado,$p_id_tipo_documento)
		{
		$this->AT_id_tipo_documento = $p_id_tipo_documento;	
		$this->AT_nombre_tipo_documento = $P_nombre_tipo_documento;		
		$this->AT_estado_habilitado = $P_estado_habilitado;	
	  		
		$this->table 	= "tipo_documento"; //TABLA
		$this->Cllave1 	= "id_tipo_documento"; //CAMPO LLAVE

		$this->conexion = Conexion::getInstance();
		}

		public function Validar() 
			{
				$this->query = sprintf("SELECT ".$this->Cllave1." FROM ".$this->table." WHERE ".$this->Cllave1."= '%s' ", 
				mysql_real_escape_string($this->AT_id_tipo_documento));
				$this->stmt = $this->conexion->ejecutar($this->query);
				if(mysql_num_rows($this->stmt)) 
				
				{
				echo "<center><div  class='alert alert-info'> LA PERSONA YA EXISTE EN EL SISTEMA !!</div></center>";	
				return true;
				}  
				else
				{
					return false;
					}
			}
			

		public function registrar()
		  {
			if(!$this->Validar()) 
			{
				
			$this->query  = sprintf("INSERT INTO tipo_documento (nombre_tipo_documento, estado_habilitado) VALUES ('%s', '%s')", 
																																	
			mysql_real_escape_string($this->AT_nombre_tipo_documento),
			mysql_real_escape_string($this->AT_estado_habilitado));
							
			$this->stmt = $this->conexion->ejecutar($this->query);
				if($this->stmt)
				{
				echo "<center><div  class='alert alert-success'> ".$this->AT_nombre_tipo_documento." FUE REGISTRADO  EXITOSAMENTE! </div></center>";
				$this->GT = new GestionarTipo_documento ($this->AT_id_tipo_documento);
				return $this->GT -> consultar();		
				}
				else
					echo $this->query;
					{
	
					echo "<center><div class='alert alert-error'> SE ENCONTRÓ UN ERROR INTENTANDO REALIZAR EL REGISTRO, CONTACTE EL ADMINISTRADOR! (ERROR EN LA CONSULTA)</div></center>";
					}
					
			}
			
		  }

	public function modificar()
	{
	$this->query  = sprintf("UPDATE  tipo_documento  SET nombre_tipo_documento = '%s', id_tipo_documento = '%s' WHERE id_tipo_documento = '%s';
", 
			mysql_real_escape_string($this->AT_nombre_tipo_documento ),
			mysql_real_escape_string($this->AT_estado_habilitado),
			mysql_real_escape_string($this->AT_id_tipo_documento));
					
				
		$this->stmt = $this->conexion->ejecutar($this->query);
			if($this->stmt)
			{
			echo "<center><div  class='alert alert-success'>LOS DATOS ".$this->AT_nombre_tipo_documento." SE MODIFICARON SATISFACTORIAMENTE!</div></center>";
			$this->GT = new GestionarTipo_documento($this->AT_id_tipo_documento);
			return $this->GT -> consultar();
			}
			else
				{
				echo "<center><div class='alert alert-error'> NO FUE POSIBLE ACTUALIZAR LA INFORMACIÓN, CONTACTE EL ADMINISTRADOR! (ERROR EN LA CONSULTA)</div></center>";
				}

	}
}

class GestionarTipo_documento {

	  private $p_id_tipo_documento; 
	  private $table; 
	  private $Cllave1; 
	  private $Cllave2; 
  	  private $conexion;
	  private $stmt;
	  private $query;

	public function __construct($id_tipo_documento=0)
	  {
		$this->p_id_tipo_documento = $id_tipo_documento; 
		$this->table 	= "tipo_documento"; //TABLA
		$this->Cllave1 	= "id_tipo_documento"; //CAMPO LLAVE
		$this->conexion = Conexion::getInstance();
		
	  }

	public function eliminar()
	  {
		$status = "";
		$this->query = sprintf("DELETE FROM ".$this->table." WHERE ".$this->Cllave1." = '%s';", 
		mysql_real_escape_string($this->p_id_tipo_documento));
		$this->stmt = $this->conexion->ejecutar($this->query);
				if($this->stmt)	
				
				{
					$this->limpiar();
				
			
					
					echo "<center><div  class='alert alert-success'> SE HA ELIMINADO EL REGISTRO DE MANERA CORRECTA!! </div></center>";
					
				} 
				else 
				{
					
					echo  "<center><div class='alert alert-error'> NO FUE POSIBLE ELIMINAR EL REGISTRO, CONTACTE EL ADMINISTRADOR! (ERROR EN LA CONSULTA)</div></center>";
				
				}
						

				$this->limpiar();
	  }

	public function consultar()
	  {
	
	  	$this->query = sprintf("SELECT id_tipo_documento,nombre_tipo_documento,estado_habilitado FROM pruebita.tipo_documento WHERE id_tipo_documento = '%s'",
		mysql_real_escape_string($this->p_id_tipo_documento));
		//echo $this->query;
		$stmt= $this->conexion->ejecutar($this->query);	
		$x = $this->conexion->obtener_fila($stmt,0);
		if($x>0)
		{
			$R1 = $x['id_tipo_documento'];
			$R2 = $x['nombre_tipo_documento'];
			$R3 = $x['estado_habilitado'];
				
			return array($R1, $R2, $R3);
										
		}
		else
			{
			//$status = "<center><div  class='alert alert-info'>SU BÚSQUEDA NO ARROJÓ RESULTADOS, PRUEBE CON OTRO CRITERIO.</div></center>";	
			$this->limpiar();	
			
			 }
			echo "$status";
			}
	  
	public function limpiar()
	  {
		unset($R1, $R2, $R3);
		return array($R1, $R2, $R3);				
	  }

	public function consultarTodos()
	{
		$this->query = sprintf("SELECT id_tipo_documento ,nombre_tipo_documento, IF(tipo_documento.estado_habilitado = 1,'SI', 'NO') as HABILITADO FROM tipo_documento ");
		$stmt = $this->conexion->ejecutar($this->query);	
		include("inclusiones/include_tipo_documento.php");
	}
}
?>

