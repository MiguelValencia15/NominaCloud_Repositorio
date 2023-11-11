<?php
class ModelDB
{
    private $host = '127.0.0.1';
    private $user = 'root';
    private $pass = "";
    private $db = 'nominascloud';
    private $conection = "";

    public function __construct()
    {
        try {
            $this->conection = new mysqli($this->host, $this->user, $this->pass, $this->db);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function getValidate($REQUEST)
    {
        $sql = "SELECT * FROM usuarios WHERE CorreoElectronico = '" . $REQUEST['User'] . "' AND Contrasena='" . $REQUEST['Password'] . "'";
        if ($this->conection->query($sql)->num_rows != 0) {
            return $REQUEST['User']; 
        } else {
            return false;
        }
    }

    public function insertDb($REQUEST)
    {
        echo $REQUEST['User'] . $REQUEST['Password'];
        try {
            $strSQL = "INSERT INTO usuarios (CorreoElectronico, Contrasena) VALUES ('" . $REQUEST['User'] . "','" . $REQUEST['Password'] . "')";
            $this->conection->query($strSQL);
        } catch (Exception $e) {
            $e->getMessage();
        }
    }

    public function deleteDb($REQUEST)
    {
        try {
            $strSQL = "DELETE FROM usuarios WHERE CorreoElectronico = '" . $REQUEST['User'] . "' AND Contrasena='" . $REQUEST['Password'] . "'";
            $this->conection->query($strSQL);
            echo "Arriba el bicho y abajo Messi";
        } catch (Exception $e) {
            $e->getMessage();
        }
    }

    public function selectDb($user)
    {
        try {
            if ($user == 0) {
                $cadsql = "SELECT * FROM usuarios";
            } else {
                $cadsql = "SELECT * FROM usuarios WHERE CorreoElectronico='" . $user . "'";
            }
            // Regresa los registros completos
            $registros = $this->conection->query($cadsql);

            return $registros;
        } catch (Exception $e) {
            $e->getMessage();
        }
    }
}
?>