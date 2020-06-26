<?php
class class_Debtors
{
    public function __construct()
    {
        $db = new class_ConnectDB();
        $this->_con = $db->con;
    }

    /**
     * Este metodo para capturar deudor
     * @param array $data
     * @return retorna falso o verdadero
     */
    public function insert(array $data)
    {
        if (!empty($data)) {

            // Trim a todos los datos entrantes:
            $trimmed_data = array_map('trim', $data);

            // Verifica la direccion de correo electrónico:
            if (filter_var($trimmed_data['email'], FILTER_VALIDATE_EMAIL)) {
                $email = mysqli_real_escape_string($this->_con, $trimmed_data['email']);
            } else {
                throw new Exception(INVALID_EMAIL);
            }

            // Verificar Telefono
            if (filter_var($trimmed_data['mobile'], FILTER_VALIDATE_INT)) {
                $mobile = mysqli_real_escape_string($this->_con, $trimmed_data['mobile']);
            } else {
                throw new Exception(INVALID_MOBILE);
            }

            // Escapar de las variables para la seguridad
            $name = mysqli_real_escape_string($this->_con,  $trimmed_data['name']);
            $last_name = mysqli_real_escape_string($this->_con,  $trimmed_data['last_name']);


            if ((!$name) || (!$last_name) || (!$email) || (!$mobile)) {
                throw new Exception(FIELDS_MISSING);
            }

            // Insertar deudor
            $name = $last_name . " " . $name;
            $query = "INSERT INTO DEUDORES (DEUDOR_ID, ID_USUARIO, NOMBRE, CORREO, CELULAR, CREADO) VALUES (NULL, '" . $_SESSION['USUARIO_ID'] . "', '$name', '$email', '$mobile', CURRENT_TIMESTAMP)";
            if (mysqli_query($this->_con, $query)) {
                mysqli_close($this->_con);
                return true;
            } else {
                // Error DB
                //$this->_con->error;
                throw new Exception(ERROR_MYSQL_01);
            }
        } else {
            throw new Exception(DEBTORS_FIELDS_MISSING);
        }
    }
}
