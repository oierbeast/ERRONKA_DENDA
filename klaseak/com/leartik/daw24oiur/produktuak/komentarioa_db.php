<?php 

namespace com\leartik\daw24oiur\produktuak;

use PDO;
use Exception;

// Función helper para encontrar produktuak.db
function getDbPath() {
    $locations = [
        __DIR__ . "/../../../../../produktuak.db",      // Local/XAMPP
        dirname(dirname(dirname(dirname(dirname(dirname(__DIR__)))))) . "/produktuak.db",  // AWS con carpeta anidada
        "/var/www/html/produktuak.db",                   // AWS común
        "/home/ec2-user/html/produktuak.db",             // AWS alternativo
    ];
    
    foreach ($locations as $path) {
        if (file_exists($path)) {
            return $path;
        }
    }
    
    // Si no encuentra el archivo, retorna la ruta por defecto
    return __DIR__ . "/../../../../../produktuak.db";
}

class KomentarioaDB {

    public static function selectKomentarioak($id_albistea) {
        try {
            // Copiamos la ruta exacta de tu imagen
            $db = new PDO("sqlite:" . getDbPath());
            
            // Concatenamos el ID tal como hacéis en AlbisteaDB
            $erregistroak = $db->query("select * from komentarioak where id_albistea=" . $id_albistea);
            $komentarioak = array();

            while ($erregistroa = $erregistroak->fetch()) {
                $komentarioa = new Komentarioa();
                
                // Asumo que las columnas en la BD se llaman igual que en el objeto
                $komentarioa->setId($erregistroa['id']);
                $komentarioa->setIdAlbistea($erregistroa['id_albistea']);
                $komentarioa->setIzena($erregistroa['izena']);
                
                // Ojo: Asegúrate de que la columna en la BD se llame 'komentarioaren_testua'
                // Si en la base de datos se llama 'testua', cambia lo de abajo.
                $komentarioa->setKomentarioarenTestua($erregistroa['komentarioaren_testua']);
                
                $komentarioak[] = $komentarioa;
            }

            return $komentarioak;

        } catch (Exception $e) {
            echo "<p>Salbuespena: " . $e->getMessage() . "</p>\n";
            return null;
        }
    } 

    public static function insertKomentarioa($komentarioa) {
        try {
            $db = new PDO("sqlite:" . getDbPath());
            
            // Construimos la query concatenando strings al estilo de tu ejemplo
            $sql = "insert into komentarioak (id_albistea, izena, komentarioaren_testua) values (";
            $sql = $sql . "'" . $komentarioa->getIdAlbistea() . "',";
            $sql = $sql . "'" . $komentarioa->getIzena() . "',";
            $sql = $sql . "'" . $komentarioa->getKomentarioarenTestua() . "')";

            $emaitza = $db->exec($sql);
            return $emaitza;

        } catch (Exception $e) {
            echo "<p>Salbuespena: " . $e->getMessage() . "</p>\n";
            return 0;
        }
    }

    public static function selectAllKomentarioak() {
        try {
            // Copiamos la ruta exacta de tu imagen
            $db = new PDO("sqlite:" . getDbPath());
            
            // Traemos TODOS los comentarios sin filtro
            $erregistroak = $db->query("select * from komentarioak");
            $komentarioak = array();

            while ($erregistroa = $erregistroak->fetch()) {
                $komentarioa = new Komentarioa();
                
                // Asumo que las columnas en la BD se llaman igual que en el objeto
                $komentarioa->setId($erregistroa['id']);
                $komentarioa->setIdAlbistea($erregistroa['id_albistea']);
                $komentarioa->setIzena($erregistroa['izena']);
                
                // Ojo: Asegúrate de que la columna en la BD se llame 'komentarioaren_testua'
                // Si en la base de datos se llama 'testua', cambia lo de abajo.
                $komentarioa->setKomentarioarenTestua($erregistroa['komentarioaren_testua']);
                
                $komentarioak[] = $komentarioa;
            }

            return $komentarioak;

        } catch (Exception $e) {
            echo "<p>Salbuespena: " . $e->getMessage() . "</p>\n";
            return null;
        }
    }

}   
?>