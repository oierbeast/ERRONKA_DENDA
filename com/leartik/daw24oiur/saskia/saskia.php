<?php

namespace com\leartik\daw24oiur\saskia;

class Saskia {
    
    public function __construct() {
        if (!isset($_SESSION['saskia'])) {
            $_SESSION['saskia'] = [];
        }
    }
    
    /**
     * Añade un producto al carrito o aumenta su cantidad
     * @param int $id ID del producto
     * @param int $kantitatea Cantidad a añadir
     */
    public function gehitu($id, $kantitatea = 1) {
        $id = intval($id);
        $kantitatea = intval($kantitatea);
        
        if ($kantitatea <= 0) return;
        
        if (isset($_SESSION['saskia'][$id])) {
            $_SESSION['saskia'][$id] += $kantitatea;
        } else {
            $_SESSION['saskia'][$id] = $kantitatea;
        }
    }
    
    /**
     * Modifica la cantidad de un producto en el carrito
     * @param int $id ID del producto
     * @param int $kantitatea Nueva cantidad
     */
    public function aldatu($id, $kantitatea) {
        $id = intval($id);
        $kantitatea = intval($kantitatea);
        
        if ($kantitatea > 0) {
            $_SESSION['saskia'][$id] = $kantitatea;
        }
    }
    
    /**
     * Elimina un producto del carrito
     * @param int $id ID del producto
     */
    public function ezabatu($id) {
        $id = intval($id);
        if (isset($_SESSION['saskia'][$id])) {
            unset($_SESSION['saskia'][$id]);
        }
    }
    
    /**
     * Devuelve el contenido del carrito
     * @return array Contenido del carrito [id => kantitatea]
     */
    public function getEdukia() {
        return $_SESSION['saskia'] ?? [];
    }
    
    /**
     * Vacía completamente el carrito
     */
    public function garbitu() {
        $_SESSION['saskia'] = [];
    }
    
    /**
     * Calcula el total de productos en el carrito
     * @return int Número total de items
     */
    public function getZenbakia() {
        $zenbakia = 0;
        foreach ($this->getEdukia() as $kantitatea) {
            $zenbakia += intval($kantitatea);
        }
        return $zenbakia;
    }
}
?>
