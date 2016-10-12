<?php
require_once("class_dbConnect.php");

class nacionalidad {
		private $AT_id_nacionalidad;	
		private $AT_nombre_nacionalidad;	
		private $AT_estado_habilitado;	
		private $table;
		private $Cllave1;
		private $Cllave2;
		private $conexion;
		private $stmt;
		private $query;

	  	private $GT; 
 
		public function __construct($P_nombre_nacionalidad,$P_estado_habilitado,$p_id_nacionalidad)
		{
		$this->AT_id_nacionalidad = $p_id_nacionalidad;	
		$this->AT_nombre_nacionalidad = $P_nombre_nacionalidad;		
		$this->AT_estado_habilitado = $P_estado_habilitado;	
	  		
		$this->table 	= "nacionalidad"; //TABLA
		$this->Cllave1 	= "id_nacionalidad"; //CAMPO LLAVE

		$this->conexion = Conexion::getInstance();
		}

		public function Validar() 
			{
				$this->query = sprintf("SELECT ".$this->Cllave1." FROM ".$this->table." WHERE ".$this->Cllave1."= '%s' ", 
				mysql_real_escape_string($this->AT_id_nacionalidad));
				$this->stmt = $this->conexion->ejecutar($this->query);
				if(mysql_num_rows($this->stmt)) 
				
				{
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
				
			$this->query  = sprintf("INSERT INTO nacionalidad (nombre_nacionalidad, estado_habilitado) VALUES ('%s', '%s')", 
																																	
			mysql_real_escape_string($this->AT_nombre_nacionalidad ),
			mysql_real_escape_string($this->AT_estado_habilitado));
							
			$this->stmt = $this->conexion->ejecutar($this->query);
				if($this->stmt)
				{
				
				$this->GT = new GestionarNacionalidad ($this->AT_id_nacionalidad);
				return $this->GT -> consultar();		
				}
				else
					{
					}
					
			}
			
		  }

	public function modificar()
	{
	$this->query  = sprintf("UPDATE  nacionalidad  SET nombre_nacionalidad = '%s', id_nacionalidad = '%s' WHERE id_nacionalidad = '%s';
", 
			mysql_real_escape_string($this->AT_nombre_nacionalidad ),
			mysql_real_escape_string($this->AT_estado_habilitado),
			mysql_real_escape_string($this->AT_id_nacionalidad));
					
				
		$this->stmt = $this->conexion->ejecutar($this->query);
			if($this->stmt)
			{
			$this->GT = new GestionarNacionalidad($this->AT_id_nacionaidad);
			return $this->GT -> consultar();
			}
			else
				{
								}

	}
}

class GestionarNacionalidad {

	  private $p_id_nacionalidad; 
	  private $table; 
	  private $Cllave1; 
	  private $Cllave2; 
  	  private $conexion;
	  private $stmt;
	  private $query;

	public function __construct($id_nacionalidad=0)
	  {
		$this->p_id_nacionalidad = $id_nacionalidad; 
		$this->table 	= "nacionalidad"; //TABLA
		$this->Cllave1 	= "id_nacionalidad"; //CAMPO LLAVE
		$this->conexion = Conexion::getInstance();
		
	  }

	public function eliminar()
	  {
		$status = "";
		$this->query = sprintf("DELETE FROM ".$this->table." WHERE ".$this->Cllave1." = '%s';", 
		mysql_real_escape_string($this->p_id_nacionalidad));
		$this->stmt = $this->conexion->ejecutar($this->query);
				if($this->stmt)	
				
				{
					$this->limpiar();
					
						
				} 
				else 
				{
				
				
				}
						

				$this->limpiar();
	  }

	public function consultar()
	  {
	
	  	$this->query = sprintf("SELECT id_nacionalidad,nombre_nacionalidad,estado_habilitado FROM pruebita.nacionalidad WHERE id_nacionalidad = '%s'",
		mysql_real_escape_string($this->p_id_nacionalidad));
		$stmt= $this->conexion->ejecutar($this->query);	
		$x = $this->conexion->obtener_fila($stmt,0);
		if($x>0)
		{
			$R1 = $x['id_nacionalidad'];
			$R2 = $x['nombre_nacionalidad'];
			$R3 = $x['estado_habilitado'];
				
			return array($R1, $R2, $R3);
										
		}
		else
			{
			//$status = "<center><div  class='alert alert-info'>SU BÚSQUEDA NO ARROJÓ RESULTADOS, PRUEBE CON OTRO CRITERIO.</div></center>";	
			$this->limpiar();	
			
			 }
			}
	  
	public function limpiar()
	  {
		unset($R1, $R2, $R3);
		return array($R1, $R2, $R3);				
	  }

	public function consultarTodos()
	{
		$this->query = sprintf("SELECT id_nacionalidad ,nombre_nacionalidad, IF(nacionalidad.estado_habilitado = 1,'SI', 'NO') as HABILITADO FROM nacionalidad ");
		$stmt = $this->conexion->ejecutar($this->query);	
		include("inclusiones/include_nacionalidad.php");
	}
}
?>

