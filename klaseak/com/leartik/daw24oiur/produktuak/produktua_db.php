<?php
namespace com\leartik\daw24oiur\produktuak;

use PDO;

class ProduktuaDB
{
    public static function selectProduktuak()
    {
        try {
            $db = new PDO("sqlite:" . __DIR__ . "/../../../../../produktuak.db");
            $erregistroak = $db->query("select * from produktuak");
            $produktuak = array();

            while ($erregistroa = $erregistroak->fetch()) {
                $produktua = new Produktua();
                $produktua->setId($erregistroa['id']);
                $produktua->setIzena($erregistroa['izena']);
                $produktua->setKontsola($erregistroa['kontsola']);
                $produktua->setMarka($erregistroa['marka']);
                $produktua->setUrtea($erregistroa['urtea']);
                $produktua->setPrezioa($erregistroa['prezioa']);
                $produktuak[] = $produktua;
            }

            return $produktuak;
        } catch (Exception $e) {
            echo "<p>Salbuespena: " . $e->getMessage() . "</p>\n";
            return null;
        }
    }

    public static function selectProduktua($id)
    {
        try {
            $db = new PDO("sqlite:" . __DIR__ . "/../../../../../produktuak.db");
            $erregistroak = $db->query("select * from produktuak where id=" . $id);
            $produktua = null;

            if ($erregistroa = $erregistroak->fetch()) {
                $produktua = new Produktua();
                $produktua->setId($erregistroa['id']);
                $produktua->setIzena($erregistroa['izena']);
                $produktua->setKontsola($erregistroa['kontsola']);
                $produktua->setMarka($erregistroa['marka']);
                $produktua->setUrtea($erregistroa['urtea']);
                $produktua->setPrezioa($erregistroa['prezioa']);
                if (isset($erregistroa['kategoria_id'])) {
                    $produktua->setKategoriaId($erregistroa['kategoria_id']);
                }
            }

            return $produktua;
        } catch (Exception $e) {
            echo "<p>Salbuespena: " . $e->getMessage() . "</p>\n";
            return null;
        }
    }

    public static function insertProduktua($produktua)
    {
        try {
            $db = new PDO("sqlite:" . __DIR__ . "/../../../../../produktuak.db");
            $kategoria_id = $produktua->getKategoriaId() ? $produktua->getKategoriaId() : "NULL";
            $sql = "insert into produktuak (izena, kontsola, marka, urtea, prezioa, kategoria_id) values (";
            $sql .= "'" . $produktua->getIzena() . "',";
            $sql .= "'" . $produktua->getKontsola() . "',";
            $sql .= "'" . $produktua->getMarka() . "',";
            $sql .= "'" . $produktua->getUrtea() . "',";
            $sql .= "'" . $produktua->getPrezioa() . "',";
            $sql .= $kategoria_id . ")";
            $emaitza = $db->exec($sql);
            return $emaitza;
        } catch (Exception $e) {
            echo "<p>Salbuespena: " . $e->getMessage() . "</p>\n";
            return 0;
        }
    }

    public static function updateProduktua($produktua)
    {
        try {
            $db = new PDO("sqlite:" . __DIR__ . "/../../../../../produktuak.db");
            $sql = "UPDATE produktuak SET
                        izena = '" . $produktua->getIzena() . "',
                        kontsola = '" . $produktua->getKontsola() . "',
                        marka = '" . $produktua->getMarka() . "',
                        urtea = '" . $produktua->getUrtea() . "',
                        prezioa = '" . $produktua->getPrezioa() . "',
                        kategoria_id = " . ($produktua->getKategoriaId() ? $produktua->getKategoriaId() : "NULL") . "
                    WHERE id = " . $produktua->getId();
            $emaitza = $db->exec($sql);
            return $emaitza;
        } catch (Exception $e) {
            echo "<p>Salbuespena: " . $e->getMessage() . "</p>\n";
            return 0;
        }
    }

    public static function deleteProduktua($id)
    {
        try {
            $db = new PDO("sqlite:" . __DIR__ . "/../../../../../produktuak.db");
            $sql = "DELETE FROM produktuak WHERE id = " . $id;
            $emaitza = $db->exec($sql);
            return $emaitza;
        } catch (Exception $e) {
            echo "<p>Salbuespena: " . $e->getMessage() . "</p>\n";
            return 0;
        }
    }
}
?>