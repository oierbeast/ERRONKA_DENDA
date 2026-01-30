<?php
session_start();
require_once __DIR__ . '/../com/leartik/daw24oiur/saskia/saskia.php';
require_once __DIR__ . '/../klaseak/com/leartik/daw24oiur/produktuak/produktua_db.php';

use com\leartik\daw24oiur\saskia\Saskia;
use com\leartik\daw24oiur\produktuak\ProduktuaDB;

$saskia = new Saskia();
$edukia = $saskia->getEdukia();
?>
<!doctype html>
<html lang="eu">
<head>
    <meta charset="utf-8">
    <title>Saskia</title>
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/produktua.css">
    <style>
        .saskia-table {
            width: 90%;
            margin: 30px auto;
            border-collapse: collapse;
            background: white;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .saskia-table th, .saskia-table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        .saskia-table th {
            background-color: #333;
            color: white;
            font-weight: bold;
        }
        .saskia-table tr:hover {
            background-color: #f9f9f9;
        }
        .saskia-table input[type="number"] {
            width: 60px;
            padding: 6px;
            border: 1px solid #ddd;
            border-radius: 3px;
        }
        .btn-update, .btn-remove {
            padding: 8px 12px;
            margin: 3px;
            cursor: pointer;
            border: none;
            border-radius: 4px;
            font-size: 14px;
        }
        .btn-update {
            background-color: #4CAF50;
            color: white;
        }
        .btn-update:hover {
            background-color: #45a049;
        }
        .btn-remove {
            background-color: #f44336;
            color: white;
        }
        .btn-remove:hover {
            background-color: #da190b;
        }
        .btn-checkout {
            display: block;
            width: 300px;
            margin: 30px auto;
            padding: 15px;
            background-color: #008CBA;
            color: white;
            text-align: center;
            font-size: 18px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            font-weight: bold;
        }
        .btn-checkout:hover {
            background-color: #007399;
        }
        .total-row {
            font-weight: bold;
            font-size: 18px;
            background-color: #f0f0f0;
        }
        .empty-basket {
            text-align: center;
            padding: 60px 20px;
            font-size: 18px;
            color: #666;
        }
        .empty-basket a {
            display: inline-block;
            margin-top: 20px;
            padding: 12px 24px;
            background-color: #008CBA;
            color: white;
            text-decoration: none;
            border-radius: 4px;
        }
        .empty-basket a:hover {
            background-color: #007399;
        }
        .actions-cell {
            white-space: nowrap;
        }
    </style>
</head>
<body>
    <?php include __DIR__ . '/../index_bar.php'; ?>
    
    <main>
        <h2 style="text-align: center; margin-top: 30px;">Nire Saskia</h2>
        
        <?php if (empty($edukia)): ?>
            <div class="empty-basket">
                <p>Zure saskia hutsik dago.</p>
                <a href="../kategoria/index.php">Produktuak ikusi</a>
            </div>
        <?php else: ?>
            <form method="POST" action="./index.php">
                <table class="saskia-table">
                    <thead>
                        <tr>
                            <th>Produktua</th>
                            <th>Prezioa</th>
                            <th>Kantitatea</th>
                            <th>Guztira</th>
                            <th>Akzioak</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $totalGuztira = 0;
                        foreach ($edukia as $id => $kantitatea): 
                            $produktua = ProduktuaDB::selectProduktua($id);
                            if ($produktua):
                                $prezioa = $produktua->getPrezioa();
                                $izena = $produktua->getIzena();
                                $subtotal = $prezioa * $kantitatea;
                                $totalGuztira += $subtotal;
                        ?>
                            <tr>
                                <td><?php echo htmlspecialchars($izena); ?></td>
                                <td><?php echo number_format($prezioa, 2); ?>€</td>
                                <td>
                                    <input type="number" name="kantitatea[<?php echo $id; ?>]" 
                                           value="<?php echo $kantitatea; ?>" min="1">
                                </td>
                                <td><?php echo number_format($subtotal, 2); ?>€</td>
                                <td class="actions-cell">
                                    <button type="submit" name="aldatu" value="<?php echo $id; ?>" 
                                            class="btn-update">Gorde</button>
                                    <button type="submit" name="ezabatu" value="<?php echo $id; ?>" 
                                            class="btn-remove">Ezabatu</button>
                                </td>
                            </tr>
                        <?php 
                            endif;
                        endforeach; 
                        ?>
                        <tr class="total-row">
                            <td colspan="3" style="text-align: right;">Guztira:</td>
                            <td><?php echo number_format($totalGuztira, 2); ?>€</td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
                
                <a href="./erosi.php" class="btn-checkout">Erosketa Bukatu</a>
            </form>
        <?php endif; ?>
    </main>
</body>
</html>
