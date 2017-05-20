<?php
require_once '../config/connection.php';

class Chuto {
    
    private $pdo;
    
    
    public function __CONSTRUCT() {
        
        $database = new Database();
		$db = $database->connection();
		$this->pdo = $db;        
    }
    
    // Muestra todos los registros
    public function Listar() {
        
        try {
            
            $sql = "SELECT * FROM chuto ORDER BY id_chuto DESC";
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
            
            $sql = "SELECT * FROM chuto WHERE id_chuto = ?";
            $stm = $this->pdo->prepare($sql);
            $stm->execute(array($id));
            $data = $stm->fetch(PDO::FETCH_ASSOC);
            return $data;
                        
        } catch(PDOException $e) {
            die('ERROR: ' . $e->getMessage());
        }        
        
    }
    
    // Crea un nuevo registro
    public function Crear($matricula, $marca, $modelo, $color, $traccion, $annio, $serial_motor, $serial_carroceria) {
        
        try {
            
            $sql = "INSERT INTO chuto (
                                    matricula, 
                                    marca, 
                                    modelo, 
                                    color, 
                                    traccion, 
                                    annio, 
                                    serial_motor, 
                                    serial_carroceria) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            $stm = $this->pdo->prepare($sql);
            $stm->execute(array(
                        $matricula,
                        $marca,
                        $modelo,                        
                        $color,
                        $traccion,
                        $annio,
                        $serial_motor,
                        $serial_carroceria
            ));
            return true;    
            
        } catch(PDOException $e) {
            die('ERROR: ' . $e->getMessage());
        }   
        
    }
    
    // Realiza una actualizacion del registro seleccionado
    public function Actualizar($matricula, $marca, $modelo, $color, $traccion, $annio, $serial_motor, $serial_carroceria, $id) {
        
        try {
            
            $sql = "UPDATE chuto SET 
                                matricula = ?, 
                                marca = ?, 
                                modelo = ?, 
                                color = ?, 
                                traccion = ?, 
                                annio = ?, 
                                serial_motor = ?, 
                                serial_carroceria = ?
                                WHERE id_chuto = ?";
            $stm = $this->pdo->prepare($sql);
            $stm->execute(array(
                        $matricula,
                        $marca,
                        $modelo,                        
                        $color,
                        $traccion,
                        $annio,
                        $serial_motor,
                        $serial_carroceria,
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
            
            $sql = "DELETE FROM chuto WHERE id_chuto = ?";
            $stm = $this->pdo->prepare($sql);
            $stm->execute(array($id));
            
        } catch(PDOException $e) {
            die('ERROR: ' . $e->getMessage());
        }   
        
    }
    
}