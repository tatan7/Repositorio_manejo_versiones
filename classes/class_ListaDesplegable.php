<?php
require_once("class_dbConnect.php");
class Lista {
		private $C1;
		private $C2;
		private $C3;
		private $C4;
		private $C5;
		private $C6;
		private $C7;


		private $conexion;
		private $stmt;
		private $query;

	  	private $GT; 
 
		public function __construct($PTabla, $PValor, $PEtiquta, $PColumnaFiltro, $ParamFiltro, $ValorSeleccionado=0, $group_by=0)
		{
		
		$this->C1	= $PTabla;   
		$this->C2	= $PValor;
		$this->C3	= $PEtiquta;
		$this->C4	= $PColumnaFiltro;
		$this->C5	= $ParamFiltro;	
		$this->C6	= $ValorSeleccionado;	
		$this->C7	= $group_by;	
		$this->conexion = Conexion::getInstance();
		}
  
	  	public function CargarLista()
		{
		if (!$this->C7)
		{
			$this->C7 = "";
		}
		$this->query = sprintf("SELECT ".$this->C2.", ".$this->C3." FROM ".$this->C1." WHERE ".$this->C4." = ".$this->C5." ".$this->C7." ORDER BY ".$this->C3." ASC ");
		$this->stmt = $this->conexion->ejecutar($this->query);
		 while($x=$this->conexion->obtener_fila($this->stmt,0))
		  {	
		 	$elValor = $this->C2;
			$laEtiqueta = $this->C3;
		 	$elSeleccionado = $this->C6; 
			
			if (!(strcmp($x["$elValor"], $elSeleccionado))) 
			{
				$sele = '" selected=\"selected\""';
			}
			else
			{
				$sele ="";
				}
    		echo '<option value="'. $x["$elValor"]. $sele .'">'. $x["$laEtiqueta"] .' </option>';
		  }
		}
	}