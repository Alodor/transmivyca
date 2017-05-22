<?php
require_once '../config/connection.php';

class Mantenimiento {
    
    private $pdo;
    
    
    public function __CONSTRUCT() {
        
        $database = new Database();
		$db = $database->connection();
		$this->pdo = $db;        
    }
    
    // Muestra todos los registros
    public function Listar() {
        
        try {
            
            $sql = "SELECT * FROM mantenimiento_chuto ORDER BY id_mantenimiento DESC";
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
            
            $sql = "SELECT * FROM mantenimiento_chuto WHERE id_mantenimiento = ?";
            $stm = $this->pdo->prepare($sql);
            $stm->execute(array($id));
            $data = $stm->fetch(PDO::FETCH_ASSOC);
            return $data;
                        
        } catch(PDOException $e) {
            die('ERROR: ' . $e->getMessage());
        }        
        
    }
    
    // Crea un nuevo registro
    public function Crear($kilometraje, $falla, $diagnostico, $fecha_ingreso, $fecha_egreso) {
        
        try {
            
            $sql = "INSERT INTO mantenimiento_chuto (
                                    kilometraje, 
                                    falla, 
                                    diagnostico, 
                                    fecha_ingreso, 
                                    fecha_egreso) VALUES (?, ?, ?, ?, ?)";
            $stm = $this->pdo->prepare($sql);
            $stm->execute(array(
                        $kilometraje,
                        $falla,
                        $diagnostico,                        
                        $fecha_ingreso,
                        $fecha_egreso
            ));
            return true;    
            
        } catch(PDOException $e) {
            die('ERROR: ' . $e->getMessage());
        }   
        
    }
    
    // Realiza una actualizacion del registro seleccionado
    public function Actualizar($kilometraje, $falla, $diagnostico, $fecha_ingreso, $fecha_egreso, $id) {
        
        try {
            
            $sql = "UPDATE mantenimiento_chuto SET 
                                kilometraje = ?, 
                                falla = ?, 
                                diagnostico = ?, 
                                fecha_ingreso = ?, 
                                fecha_egreso = ?
                                WHERE id_mantenimiento = ?";
            $stm = $this->pdo->prepare($sql);
            $stm->execute(array(
                        $kilometraje,
                        $falla,
                        $diagnostico,                        
                        $fecha_ingreso,
                        $fecha_egreso,
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
            
            $sql = "DELETE FROM mantenimiento_chuto WHERE id_mantenimiento = ?";
            $stm = $this->pdo->prepare($sql);
            $stm->execute(array($id));
            
        } catch(PDOException $e) {
            die('ERROR: ' . $e->getMessage());
        }   
        
    }
    
}