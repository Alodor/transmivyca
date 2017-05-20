<?php
require_once '../config/connection.php';

class Destino {
    
    private $pdo;
    
    
    public function __CONSTRUCT() {
        
        $database = new Database();
		$db = $database->connection();
		$this->pdo = $db;        
    }
    
    // Muestra todos los registros
    public function Listar() {
        
        try {
            
            $sql = "SELECT * FROM destino ORDER BY id_destino DESC";
            $stm = $this->pdo->prepare($sql);
            $stm->execute();
            $data = $stm->fetchAll();
            return $data;
                        
        } catch(PDOException $e) {
            die('ERROR: ' . $e->getMessage());
        }        
        
    }
    
    // Obtener valor
    public function Obtener($id) {
        
        try {
            
            $sql = "SELECT * FROM destino WHERE id_destino = ?";
            $stm = $this->pdo->prepare($sql);
            $stm->execute(array($id));
            $data = $stm->fetch(PDO::FETCH_ASSOC);
            return $data;
                        
        } catch(PDOException $e) {
            die('ERROR: ' . $e->getMessage());
        }        
        
    }
    
    // Crea un nuevo registro
    public function Crear($destino, $distancia) {
        
        try {
            
            $sql = "INSERT INTO destino (
                                    destino, 
                                    distancia) VALUES (?, ?)";
            $stm = $this->pdo->prepare($sql);
            $stm->execute(array(
                        $destino,
                        $distancia
            ));
            return true;    
            
        } catch(PDOException $e) {
            die('ERROR: ' . $e->getMessage());
        }   
        
    }
    
    // Realiza una actualizacion del registro seleccionado
    public function Actualizar($destino, $distancia, $id) {
        
        try {
            
            $sql = "UPDATE destino SET 
                                destino = ?, 
                                distancia = ?
                                WHERE id_destino = ?";
            $stm = $this->pdo->prepare($sql);
            $stm->execute(array(
                        $destino,
                        $distancia,
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
            
            $sql = "DELETE FROM destino WHERE id_destino = ?";
            $stm = $this->pdo->prepare($sql);
            $stm->execute(array($id));
            
        } catch(PDOException $e) {
            die('ERROR: ' . $e->getMessage());
        }   
        
    }
    
}