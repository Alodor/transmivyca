<?php
require_once '../config/connection.php';

class Chofer {
    
    private $pdo;
    
    
    public function __CONSTRUCT() {
        
        $database = new Database();
		$db = $database->connection();
		$this->pdo = $db;        
    }
    
    // Muestra todos los registros
    public function Listar() {
        
        try {
            
            $sql = "SELECT * FROM chofer ORDER BY id_chofer DESC";
            $stm = $this->pdo->prepare($sql);
            $stm->execute();
            $data = $stm->fetchAll(PDO::FETCH_ASSOC);
            return $data;
                        
        } catch(PDOException $e) {
            die('ERROR: ' . $e->getMessage());
        }        
        
    }
    
    // Obtener valor
    public function Obtener($id) {
        
        try {
            
            $sql = "SELECT * FROM chofer WHERE id_chofer = ?";
            $stm = $this->pdo->prepare($sql);
            $stm->execute(array($id));
            $data = $stm->fetch(PDO::FETCH_ASSOC);
            return $data;
                        
        } catch(PDOException $e) {
            die('ERROR: ' . $e->getMessage());
        }        
        
    }
    
    // Crea un nuevo registro
    public function Crear($cedula, $nombre, $apellido, $direccion, $telefono, $fecha_ingreso, $estatus) {
        
        try {
            
            $sql = "INSERT INTO chofer (
                                    cedula, 
                                    nombre, 
                                    apellido, 
                                    direccion, 
                                    telefono, 
                                    fecha_ingreso,
                                    estatus) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stm = $this->pdo->prepare($sql);
            $stm->execute(array(
                        $cedula,
                        $nombre,
                        $apellido,                        
                        $direccion,
                        $telefono,
                        $fecha_ingreso,
                        $estatus
            ));
            return true;    
            
        } catch(PDOException $e) {
            die('ERROR: ' . $e->getMessage());
        }   
        
    }
    
    // Realiza una actualizacion del registro seleccionado
    public function Actualizar($cedula, $nombre, $apellido, $direccion, $telefono, $estatus, $id) {
        
        try {
            
            $sql = "UPDATE chofer SET
                                cedula = ?, 
                                nombre = ?, 
                                apellido = ?, 
                                direccion = ?, 
                                telefono = ?,
                                estatus = ?
                                WHERE id_chofer = ?";
            $stm = $this->pdo->prepare($sql);
            $stm->execute(array(                        
                        $cedula,
                        $nombre,
                        $apellido,                        
                        $direccion,                        
                        $telefono,                        
                        $estatus,
                        $id
            ));
            return true;
            
        } catch(PDOException $e) {
            die('ERROR: ' . $e->getMessage());
        }   
        
    }
    
    // Elimina el registro seleccionado
    public function Eliminar($id) {
        
        try {
            
            $sql = "DELETE FROM chofer WHERE id_chofer = ?";
            $stm = $this->pdo->prepare($sql);
            $stm->execute(array($id));
            
        } catch(PDOException $e) {
            die('ERROR: ' . $e->getMessage());
        }   
        
    }
    
}