<?php 

namespace com\leartik\daw24oiur\produktuak;

class Komentarioa {
    private $id;
    private $id_albistea;
    private $izena;
    private $komentarioaren_testua;

    public function __construct() {

    }
    public function setId($id) {
          
    }
    
    public function getId() {
            return $this->id;
    }
    public function setIdAlbistea($id_albistea){
            return $this->id_albistea;
    }

    public function getIdAlbistea() {
        
    }
    public function setIzena($izena) {
        $this->izena = $izena;
    }

    public function getIzena() {
        return $this->izena;
    }

    public function setKomentarioarenTestua($komentarioaren_testua){
        $this->komentarioaren_testua = $komentarioaren_testua;
    }
    public function getKomentarioarenTestua() {
        return $this->komentarioaren_testua;
    }

}   