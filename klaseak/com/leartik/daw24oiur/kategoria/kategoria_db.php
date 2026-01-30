<?php

namespace com\leartik\daw24oiur\kategoria;

use PDO;
use Exception;

require_once(__DIR__ . '/kategoria.php');

class KategoriaDB
{
    public static function selectKategoriak()
    {
        try {
            $db = new PDO("sqlite:C:\\xampp\\htdocs\\ERRONKA_01\\produktuak.db");
            $erregistroak = $db->query("select * from kategoriak");
            $kategoriak = array();

            while ($erregistroa = $erregistroak->fetch()) {
                $kategoria = new Kategoria();
                $kategoria->setId($erregistroa['id']);
                $kategoria->setIzenburua($erregistroa['izena']);
                $kategoria->setDeskribapena($erregistroa['deskribapena']);
                $kategoriak[] = $kategoria;
            }

            return $kategoriak;
        } catch (Exception $e) {
            echo "<p>Salbuespena: " . $e->getMessage() . "</p>\n";
            return array();
        }
    }

    public static function selectKategoria($id)
    {
        try {
            $db = new PDO("sqlite:C:\\xampp\\htdocs\\ERRONKA_01\\produktuak.db");
            $erregistroak = $db->query("select * from kategoriak where id=" . $id);
            $kategoria = null;

            if ($erregistroa = $erregistroak->fetch(PDO::FETCH_ASSOC)) {
                $kategoria = new Kategoria();
                $kategoria->setId($erregistroa['id']);
                $kategoria->setIzenburua($erregistroa['izena']);
                $kategoria->setDeskribapena($erregistroa['deskribapena']);
            }

            return $kategoria;
        } catch (Exception $e) {
            echo "<p>Salbuespena: " . $e->getMessage() . "</p>\n";
            return null;
        }
    }

    public static function insertKategoria($kategoria)
    {
        try {
            $db = new PDO("sqlite:C:\\xampp\\htdocs\\ERRONKA_01\\produktuak.db");
            $sql = "insert into kategoriak (izena, deskribapena) values (";
            $sql .= "'" . $kategoria->getIzenburua() . "',";
            $sql .= "'" . $kategoria->getDeskribapena() . "')";
            $emaitza = $db->exec($sql);
            return $emaitza;
        } catch (Exception $e) {
            echo "<p>Salbuespena: " . $e->getMessage() . "</p>\n";
            return 0;
        }
    }

    public static function updateKategoria($kategoria)
    {
        try {
            $db = new PDO("sqlite:C:\\xampp\\htdocs\\ERRONKA_01\\produktuak.db");
            $sql = "UPDATE kategoriak SET 
                        izena = '" . $kategoria->getIzenburua() . "',
                        deskribapena = '" . $kategoria->getDeskribapena() . "'
                    WHERE id = " . $kategoria->getId();
            $emaitza = $db->exec($sql);
            return $emaitza;
        } catch (Exception $e) {
            echo "<p>Salbuespena: " . $e->getMessage() . "</p>\n";
            return 0;
        }
    }

    public static function deleteKategoria($id)
    {
        try {
            $db = new PDO("sqlite:C:\\xampp\\htdocs\\ERRONKA_01\\produktuak.db");
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $db->exec('PRAGMA foreign_keys = ON;');

            $kontsulta = $db->prepare("DELETE FROM kategoriak WHERE id = ?");
            $emaitza = $kontsulta->execute([(int)$id]);
            return $emaitza;
        } catch (Exception $e) {
            echo "<p>Salbuespena: " . $e->getMessage() . "</p>\n";
            return 0;
        }
    }
}
?>
