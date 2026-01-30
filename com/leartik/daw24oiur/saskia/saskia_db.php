<?php

namespace com\leartik\daw24oiur\saskia;

// Función helper para encontrar produktuak.db
function getDbPath() {
    $locations = [
        __DIR__ . "/../../../../produktuak.db",         // Local/XAMPP
        dirname(dirname(dirname(dirname(__DIR__)))) . "/produktuak.db",  // AWS con carpeta anidada
        "/var/www/html/produktuak.db",                   // AWS común
        "/home/ec2-user/html/produktuak.db",             // AWS alternativo
    ];
    
    foreach ($locations as $path) {
        if (file_exists($path)) {
            return $path;
        }
    }
    
    // Si no encuentra el archivo, retorna la ruta por defecto
    return __DIR__ . "/../../../../produktuak.db";
}

class SaskiaDB {
    
    /**
     * Guarda una compra (Eskaria) en la base de datos
     * @param int $erabiltzaile_id ID del usuario
     * @param array $edukia Contenido del carrito [id => kantitatea]
     * @param float $totala Total de la compra
     * @return int ID de la compra generado
     */
    public static function gordeEskaria($erabiltzaile_id, $edukia, $totala) {
        try {
            $db = new \PDO('sqlite:' . getDbPath());
            $db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            
            // Iniciar transacción
            $db->beginTransaction();
            
            // Insertar el pedido
            $sql = "INSERT INTO eskariak (erabiltzaile_id, data, totala, egoera) 
                    VALUES (:erabiltzaile_id, datetime('now'), :totala, 'pending')";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':erabiltzaile_id', $erabiltzaile_id, \PDO::PARAM_INT);
            $stmt->bindParam(':totala', $totala);
            $stmt->execute();
            
            $eskaria_id = $db->lastInsertId();
            
            // Insertar detalles del pedido
            foreach ($edukia as $produktu_id => $kantitatea) {
                $sql = "INSERT INTO eskari_xehetasunak (eskaria_id, produktu_id, kantitatea) 
                        VALUES (:eskaria_id, :produktu_id, :kantitatea)";
                $stmt = $db->prepare($sql);
                $stmt->bindParam(':eskaria_id', $eskaria_id, \PDO::PARAM_INT);
                $stmt->bindParam(':produktu_id', $produktu_id, \PDO::PARAM_INT);
                $stmt->bindParam(':kantitatea', $kantitatea, \PDO::PARAM_INT);
                $stmt->execute();
            }
            
            // Confirmar transacción
            $db->commit();
            
            return $eskaria_id;
        } catch (\Exception $e) {
            if (isset($db)) {
                $db->rollBack();
            }
            throw $e;
        }
    }
    
    /**
     * Obtiene los detalles de una compra
     * @param int $eskaria_id ID de la compra
     * @return array Datos de la compra con detalles
     */
    public static function getEskaria($eskaria_id) {
        try {
            $db = new \PDO('sqlite:' . getDbPath());
            $db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            
            $sql = "SELECT * FROM eskariak WHERE id = :id";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':id', $eskaria_id, \PDO::PARAM_INT);
            $stmt->execute();
            
            return $stmt->fetch(\PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            throw $e;
        }
    }
}
?>
