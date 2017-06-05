<?php
require_once '../config/connection.php';

class Mantenimiento {
    
    private $pdo;
    
    
    public function __CONSTRUCT() {
        
        $database = new Database();
		$db = $database->connection();
		$this->pdo = $db;        
    }
    
    // Registro nuevo
    public function Crear($id_chuto, $kilometraje, $falla, $tipo_mantenimiento, $fecha_ingreso) {
        
        try {
            
            $sql = "SELECT id_chuto FROM mantenimiento_chuto WHERE id_chuto = ?";
            $stm = $this->pdo->prepare($sql);
            $stm->execute(array($id_chuto));
            $row = $stm->fetch(PDO::FETCH_ASSOC);
            
            if (($row['id_chuto'] != $id_chuto)) { 
            
                $sql = "INSERT INTO mantenimiento_chuto (
                                    id_chuto, 
                                    kilometraje, 
                                    falla, 
                                    tipo_mantenimiento, 
                                    fecha_ingreso) VALUES (?, ?, ?, ?, ?)";
                $stm = $this->pdo->prepare($sql);
                $stm->execute(array(
                            $id_chuto,
                            $kilometraje,
                            $falla,
                            $tipo_mantenimiento,
                            $fecha_ingreso
                ));
                return true;    
            
            } else {
                return false;
            }
            
        } catch(PDOException $e) {
            die('ERROR: ' . $e->getMessage());
        }   
        
    }
        
    // Listar tablas relacionadas
    public function Listar() {
        
        try {
            
            $sql = "SELECT c.matricula_chuto, m.id_mantenimiento, m.kilometraje, m.falla, m.tipo_mantenimiento,             m.fecha_ingreso
                    FROM mantenimiento_chuto m INNER JOIN chuto c ON m.id_chuto = c.id_chuto
                    ORDER BY id_mantenimiento ASC";            
            $stm = $this->pdo->prepare($sql);
            $stm->execute();
            $data = $stm->fetchAll(PDO::FETCH_ASSOC);
            return $data;
            
        } catch(PDOException $e) {
            die('ERROR: ' . $e->getMessage());
        }   
        
    }
    
    // Buscador de registros
    public function Buscar($valor) {
        
        try {
            
            $sql = "SELECT c.matricula_chuto, m.id_mantenimiento, m.kilometraje, 
                    m.falla, m.tipo_mantenimiento, m.fecha_ingreso
                    FROM mantenimiento_chuto m INNER JOIN chuto c ON m.id_chuto = c.id_chuto
                    WHERE matricula_chuto LIKE '%".$valor."%'
                    ORDER BY id_mantenimiento ASC";            
            $stm = $this->pdo->prepare($sql);
            $stm->execute();
            $data = $stm->fetchAll(PDO::FETCH_ASSOC);
            return $data;
            
        } catch(PDOException $e) {
            die('ERROR: ' . $e->getMessage());
        }   
        
    }
    
    // Eliminar registro
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