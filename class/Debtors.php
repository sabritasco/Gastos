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
                throw new Exception(DEBTORS_INVALID_EMAIL);
            }

            // Verificar Telefono
            if (filter_var($trimmed_data['mobile_debtors'], FILTER_VALIDATE_INT)) {
                $mobile_debtors = mysqli_real_escape_string($this->_con, $trimmed_data['mobile_debtors']);
            } else {
                throw new Exception(IDEBTORS_NVALID_MOBILE);
            }

            // Escapar de las variables para la seguridad
            $name = mysqli_real_escape_string($this->_con,  $trimmed_data['name']);
            $last_name = mysqli_real_escape_string($this->_con,  $trimmed_data['last_name']);


            if ((!$name) || (!$last_name)) {
                throw new Exception(FIELDS_MISSING);
            }

            // Insertar deudor
            $name = $last_name . " " . $name;
            $query = "INSERT INTO DEUDORES (ID_DEUDOR, ID_USUARIO, NOMBRE, CORREO, CELULAR, CREADO) VALUES (NULL, '" . $_SESSION['ID_USUARIO'] . "', '$name', '$email', '$mobile_debtors', CURRENT_TIMESTAMP)";
            if (mysqli_query($this->_con, $query)) {
                mysqli_close($this->_con);
                return true;
            } else {
                // Error DB
                //$this->_con->error;
                throw new Exception(ERROR_MYSQL);
            }
        } else {
            throw new Exception(DEBTORS_FIELDS_MISSING);
        }
    }
}
