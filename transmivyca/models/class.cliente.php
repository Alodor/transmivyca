<?php
require_once '../config/connection.php';

class Cliente {
    
    private $pdo;
    
    
    public function __CONSTRUCT() {
        
        $database = new Database();
		$db = $database->connection();
		$this->pdo = $db;        
    }
    
    // Muestra todos los registros
    public function Listar() {
        
        try {
            
            $sql = "SELECT * FROM cliente ORDER BY id_cliente DESC";            
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
            
            $sql = "SELECT * FROM cliente WHERE id_cliente = ?";
            $stm = $this->pdo->prepare($sql);
            $stm->execute(array($id));
            $data = $stm->fetch(PDO::FETCH_ASSOC);
            return $data;
                        
        } catch(PDOException $e) {
            die('ERROR: ' . $e->getMessage());
        }        
        
    }
    
    // Crea un nuevo registro
    public function Crear($rif, $razon_social, $direccion, $telefono, $responsable) {
        
        try {
            
            $sql = "INSERT INTO cliente (
                                    rif, 
                                    razon_social, 
                                    direccion, 
                                    telefono, 
                                    responsable) VALUES (?, ?, ?, ?, ?)";
            $stm = $this->pdo->prepare($sql);
            $stm->execute(array(
                        $rif,
                        $razon_social,
                        $direccion,                        
                        $telefono,
                        $responsable
            ));
            return true;    
            
        } catch(PDOException $e) {
            die('ERROR: ' . $e->getMessage());
        }   
        
    }
    
    // Realiza una actualizacion del registro seleccionado
    public function Actualizar($rif, $razon_social, $direccion, $telefono, $responsable, $id) {
        
        try {
            
            $sql = "UPDATE cliente SET 
                                rif = ?, 
                                razon_social = ?, 
                                direccion = ?, 
                                telefono = ?, 
                                responsable = ?
                                WHERE id_cliente = ?";
            $stm = $this->pdo->prepare($sql);
            $stm->execute(array(
                        $rif,
                        $razon_social,
                        $direccion,                        
                        $telefono,
                        $responsable,
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
            
            $sql = "DELETE FROM cliente WHERE id_cliente = ?";
            $stm = $this->pdo->prepare($sql);
            $stm->execute(array($id));
            
        } catch(PDOException $e) {
            die('ERROR: ' . $e->getMessage());
        }   
        
    }
    
}