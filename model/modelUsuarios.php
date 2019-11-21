
<?php 
	class modelUsuarios
	{
		public $nombres;
		public $apellidos;
		public $dni;
		public $fechaNacimiento;
		public $mail;

		private $id;
		private $conexionDB;

		function __construct()
		{
			include "setting/DB.php";
			$conexion=new DB();
			$this->conexionDB = $conexion->conexion;
		}

		//guardar o registrar nuevos usuarios
		function crear()
		{
			$conexion=$this->conexionDB;
			if(
				$this->verificarCampo("nombres",$this->nombres)
				&& 
				$this->verificarCampo("apellidos",$this->apellidos)
			)
			{
				echo "El usuario ya existe, no puede registrarlo otra vez";
			}else{
				

				$q="insert into usuarios (nombres, apellidos, dni, feNac,mail)
					values(?,?,?,?,?)";

				if(!($q=$conexion->prepare($q)))
				{
					echo "Error al preparar la consulta";
				}

				if(!$q->bind_param("sssss",$this->nombres,$this->apellidos,$this->dni,$this->fechaNacimiento,$this->mail))
				{
					echo "Error al pasar los parametros";
				}

				if(!$q->execute())
					{
						echo "Error al ejecutar el script";
					}else{
						echo "Usuario Guardado Correctamente";
					}

			}

		}

		function modifyPassword(){}//cambiar clave

		
		//verifica la existencia de un dato
		function verificarCampo($campo,$valor)
		{
			$conexion=$this->conexionDB;
			$q="select $campo from usuarios where $campo='".$valor."'";
			
			$resultado=$conexion->query($q);

			if($resultado->num_rows)
			{
				return true;
			}else{
				return false;
			}

		}

		function verificarClave(){}//verifica la seguridad de la clave

		function iniciarsession(){}//verifica que el usuario y clave sean correctos

		private function campo(){}//limpiar y verificar el nombre de usuario
		
		function getID($user){}//
		function getUser($id){}//

	}
	
 ?>