<?php
require_once("class_dbConnect.php");

class area {
		private $AT_id_area;	
		private $AT_nombre_area;	
		private $AT_estado_habilitado;	
		private $table;
		private $Cllave1;
		private $Cllave2;
		private $conexion;
		private $stmt;
		private $query;

	  	private $GT; 
 
		public function __construct($P_nombre_area,$P_estado_habilitado,$p_id_area)
		{
		$this->AT_id_area = $p_id_area;	
		$this->AT_nombre_area = $P_nombre_area;		
		$this->AT_estado_habilitado = $P_estado_habilitado;	
	  		
		$this->table 	= "area"; //TABLA
		$this->Cllave1 	= "id_area"; //CAMPO LLAVE

		$this->conexion = Conexion::getInstance();
		}
/// es el distinto manejo que se puede obtener 
		public function Validar() 
			{
				$this->query = sprintf("SELECT ".$this->Cllave1." FROM ".$this->table." WHERE ".$this->Cllave1."= '%s' ", 
				mysql_real_escape_string($this->AT_id_area));
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
				
			$this->query  = sprintf("INSERT INTO area (nombre_area, estado_habilitado) VALUES ('%s', '%s')", 
																																	
			mysql_real_escape_string($this->AT_nombre_area ),
			mysql_real_escape_string($this->AT_estado_habilitado));
							
			$this->stmt = $this->conexion->ejecutar($this->query);
				if($this->stmt)
				{
				echo "<center><div  class='alert alert-success'> ".$this->AT_nombre_area." FUE REGISTRADO  EXITOSAMENTE! </div></center>";
				$this->GT = new GestionarArea ($this->AT_id_area);
				return $this->GT -> consultar();		
				}
				else
					{
					echo "<center><div class='alert alert-error'> SE ENCONTRÓ UN ERROR INTENTANDO REALIZAR EL REGISTRO, CONTACTE EL ADMINISTRADOR! (ERROR EN LA CONSULTA)</div></center>";
					}
					
			}
			
		  }

	public function modificar()
	{
	$this->query  = sprintf("UPDATE  area  SET nombre_area = '%s', id_area = '%s' WHERE id_area = '%s';
", 
			mysql_real_escape_string($this->AT_nombre_area ),
			mysql_real_escape_string($this->AT_estado_habilitado),
			mysql_real_escape_string($this->AT_id_area));
					
				
		$this->stmt = $this->conexion->ejecutar($this->query);
			if($this->stmt)
			
			{
			
			echo "<center><div  class='alert alert-success'>LOS DATOS ".$this->AT_nombre_area." SE MODIFICARON SATISFACTORIAMENTE!</div></center>";
			$this->GT = new GestionarArea($this->AT_id_area);
			return $this->GT -> consultar();
			}
			else
				{
				echo $this->query ;
				echo "<center><div class='alert alert-error'> NO FUE POSIBLE ACTUALIZAR LA INFORMACIÓN, CONTACTE EL ADMINISTRADOR! (ERROR EN LA CONSULTA)</div></center>";
				}

	}
}

class GestionarArea {

	  private $p_id_area; 
	  private $table; 
	  private $Cllave1; 
	  private $Cllave2; 
  	  private $conexion;
	  private $stmt;
	  private $query;

	public function __construct($id_area=0)
	  {
		$this->p_id_area = $id_area; 
		$this->table 	= "area"; //TABLA
		$this->Cllave1 	= "id_area"; //CAMPO LLAVE
		$this->conexion = Conexion::getInstance();
		
	  }

	public function eliminar()
	  {
		$status = "";
		$this->query = sprintf("DELETE FROM ".$this->table." WHERE ".$this->Cllave1." = '%s';", 
		mysql_real_escape_string($this->p_id_area));
		$this->stmt = $this->conexion->ejecutar($this->query);
				if($this->stmt)	
				
				{
					$this->limpiar();
					echo $this->p_id_area;
			
					
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
	
	  	$this->query = sprintf("SELECT id_area,nombre_area,estado_habilitado FROM pruebita.area WHERE id_area = '%s'",
		mysql_real_escape_string($this->p_id_area));
		$stmt= $this->conexion->ejecutar($this->query);	
		$x = $this->conexion->obtener_fila($stmt,0);
		if($x>0)
		{
			$R1 = $x['id_area'];
			$R2 = $x['nombre_area'];
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
		$this->query = sprintf("SELECT id_area ,nombre_area, IF(area.estado_habilitado = 1,'SI', 'NO') as HABILITADO FROM area ");
		$stmt = $this->conexion->ejecutar($this->query);	
		include("inclusiones/include_area.php");
	}
}
?>
