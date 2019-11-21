
<?php 
	class modelCuentas
	{
		public $nick;
		public $clave;
		public $idUsuario;

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
			if($this->verificarCampo("nick",$this->nick))
			{
				echo "La cuenta de usuario ya existe, prueba con otra";
			}else{
				

				$q="insert into cuentas (nick, password, idUsuario)
					values(?,?,?)";

				if(!($q=$conexion->prepare($q)))
				{
					echo "Error al preparar la consulta";
				}

				if(!$q->bind_param("ssi",$this->nick,$this->clave,$this->idUsuario))
				{
					echo "Error al pasar los parametros";
				}

				if(!$q->execute())
					{
						echo "Error al ejecutar el script";
					};

			}

		}

		function modifyPassword(){}//cambiar clave

		
		//verifica la existencia de un dato
		function verificarCampo($campo,$valor)
		{
			$conexion=$this->conexionDB;
			$q="select $campo from cuentas where $campo='".$valor."'";
			
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