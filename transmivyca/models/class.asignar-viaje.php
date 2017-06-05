<?php
require_once '../config/connection.php';

class AsignarViaje {
    
    private $pdo;
    
    
    public function __CONSTRUCT() {
        
        $database = new Database();
		$db = $database->connection();
		$this->pdo = $db;        
    }
    
    // Registro nuevo
    public function Crear($numero_guia, $id_chofer, $id_destino, $id_cliente, $fecha) {
        
        try {
            
            $sql = "SELECT numero_guia, id_chofer FROM asignar_viaje 
                                WHERE numero_guia = ?
                                OR id_chofer = ?";
            $stm = $this->pdo->prepare($sql);
            $stm->execute(array(
                            $numero_guia,
                            $id_chofer
            ));
            $row = $stm->fetch(PDO::FETCH_ASSOC);
            
            if (($row['numero_guia'] != $numero_guia) && ($row['id_chofer'] != $id_chofer)) { 
            
                $sql = "INSERT INTO asignar_viaje (
                                    numero_guia,
                                    id_chofer, 
                                    id_destino, 
                                    id_cliente,
                                    fecha) VALUES (?, ?, ?, ?, ?)";
                $stm = $this->pdo->prepare($sql);
                $stm->execute(array(
                            $numero_guia,
                            $id_chofer,
                            $id_destino,
                            $id_cliente,
                            $fecha
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
            
            $sql = "SELECT v.id_viaje, v.numero_guia, v.fecha, 
                        ch.nombre, ch.apellido, 
                        d.origen, d.destino, 
                        c.razon_social
                        FROM asignar_viaje v INNER JOIN chofer ch ON v.id_chofer = ch.id_chofer
                        INNER JOIN destino d ON v.id_destino = d.id_destino
                        INNER JOIN cliente c ON v.id_cliente = c.id_cliente
                        ORDER BY id_viaje ASC";            
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
            
            $sql = "SELECT v.id_viaje, v.numero_guia, v.fecha, 
                        ch.nombre, ch.apellido, 
                        d.origen, d.destino, 
                        c.razon_social
                        FROM asignar_viaje v INNER JOIN chofer ch ON v.id_chofer = ch.id_chofer
                        INNER JOIN destino d ON v.id_destino = d.id_destino
                        INNER JOIN cliente c ON v.id_cliente = c.id_cliente
                        WHERE numero_guia LIKE '%".$valor."%'
                        ORDER BY id_viaje ASC";            
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
            
            $sql = "DELETE FROM asignar_viaje WHERE id_viaje = ?";
            $stm = $this->pdo->prepare($sql);
            $stm->execute(array($id));
            
        } catch(PDOException $e) {
            die('ERROR: ' . $e->getMessage());
        }   
        
    }
}