

<?php 

	class DB
	{
		public $conexion;

		function __construct()
		{
			$conexion=new mysqli("localhost","root","12345678","asistencia");

			if($conexion->connect_error)
			{
				echo $conexion->connect_errno," ";
				echo $conexion->connect_error;
			}else{
				$this->conexion=$conexion;
			}
		}

	}

 ?>