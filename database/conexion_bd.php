<?php 
require 'config.php';

class BD_PDO
{

	public function Obtener_Fila($resultado) {
		if (is_array($resultado) && count($resultado) > 0) {
			return reset($resultado); 
		} else {
			return array();
		}
	}
	
	public function getConection ()	
	{
		try {
			    $conexion = new PDO("mysql:host=".DB_SERVER.";dbname=".DB_NAME.";",DB_USER,DB_PASS);
		}
		catch(PDOException $e)
		{
	         echo "Failed to get DB handle: " . $e->getMessage();
	         exit;    
	    }
	    return $conexion;
	}		

	public function Ejecutar_Instruccion($consulta_sql)
	{
		$conexion = $this->getConection();
        $rows = array();        
		$query=$conexion->prepare($consulta_sql);
		if(!$query)
		{
         	return "Error al mostrar";
        }
		else
		{			
        	$query->execute();   
        	while ($result = $query->fetch())
			{
            	$rows[] = $result;
          	}			
            return $rows;
        }
	}

}
?>