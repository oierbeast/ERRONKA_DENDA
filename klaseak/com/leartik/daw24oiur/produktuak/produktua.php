<?php

namespace com\leartik\daw24oiur\produktuak;

class Produktua
{
    private $id;
    private $izena;
    private $kontsola;
    private $marka;
    private $urtea;
    private $prezioa;
    private $kategoria_id;

    public function __construct() {
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }

    public function setIzena($izena) {
        $this->izena = $izena;
    }

    public function getIzena() {
        return $this->izena;
    }

    public function setKontsola($kontsola) {
        $this->kontsola = $kontsola;
    }

    public function getKontsola() {
        return $this->kontsola;
    }

    public function setMarka($marka) {
        $this->marka = $marka;
    }

    public function getMarka() {
        return $this->marka;
    }

    public function setUrtea($urtea) {
        $this->urtea = $urtea;
    }

    public function getUrtea() {
        return $this->urtea;
    }

    public function setPrezioa($prezioa) {
        $this->prezioa = $prezioa;
    }

    public function getPrezioa() {
        return $this->prezioa;
    }

    public function setKategoriaId($k) {
        $this->kategoria_id = $k;
    }

    public function getKategoriaId() {
        return $this->kategoria_id;
    }
}