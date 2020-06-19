<?php
class class_User
{
    public function __construct()
    {
        $db = new class_ConnectDB();
        $this->_con = $db->con;
    }

    /**
	 * Este metodo para iniciar sesión
	 * @param array $data
	 * @return retorna falso o verdadero
	 */
    public function login(array $data)
    {
        if (!empty($data)) {

            // Trim a todos los datos entrantes:
            $trimmed_data = array_map('trim', $data);

            // escapar de las variables para la seguridad
            $user = mysqli_real_escape_string($this->_con,  $trimmed_data['user']);
            $pass = mysqli_real_escape_string($this->_con,  $trimmed_data['pass']);

            if ((!$user) || (!$pass)) {
                throw new Exception(LOGIN_FIELDS_MISSING);
            }
            $pass = md5($pass);
            $query = "SELECT USUARIO_ID, NOMBRE, CORREO, FOTO, CREADO FROM USUARIOS WHERE USUARIO = '$user' and PASSWORD = '$pass' ";
            $result = mysqli_query($this->_con, $query);
            $data = mysqli_fetch_assoc($result);
            $count = mysqli_num_rows($result);
            mysqli_close($this->_con);
            if ($count == 1) {
                $_SESSION = $data;
                $_SESSION['logged_in'] = true;
                return true;
            } else {
                throw new Exception(LOGIN_FAIL);
            }
        } else {
            throw new Exception(LOGIN_FIELDS_MISSING);
        }
    }
    
    public function logout()
	{
		session_unset();
		session_destroy();
		header('Location: index.php?success=logout');
	}
}
?>
