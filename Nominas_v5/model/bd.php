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
        $sql = "SELECT Contrasena FROM usuarios WHERE CorreoElectronico = ?";
        $stmt = $this->conection->prepare($sql);
        $stmt->bind_param("s", $REQUEST['User']);
        $stmt->execute();
        $stmt->bind_result($contrasenaCifrada);
        $stmt->fetch();
        $stmt->close();
    
        // Verificar la contraseña
        if ($contrasenaCifrada && password_verify($REQUEST['Password'], $contrasenaCifrada)) {
            return $REQUEST['User'];
        } else {
            return false;
        }
    }
    

    public function insertDb($REQUEST)
    {
        try {
            // Cifrar la contraseña antes de almacenarla
            $hashedPassword = password_hash($REQUEST['Password'], PASSWORD_DEFAULT);

            $sql = "INSERT INTO usuarios (CorreoElectronico, Contrasena) VALUES (?, ?)";
            $stmt = $this->conection->prepare($sql);
            $stmt->bind_param("ss", $REQUEST['User'], $hashedPassword);
            $stmt->execute();
        } catch (Exception $e) {
            echo "Error al insertar en la base de datos: " . $e->getMessage();
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