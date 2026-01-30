<?php
session_start();
?>
<!doctype html>
<html lang="eu">
<head>
    <meta charset="utf-8">
    <title>Eskerrik Asko</title>
    <link rel="stylesheet" href="./css/index.css">
    <style>
        .success-message {
            text-align: center;
            padding: 60px 20px;
        }
        .success-message h1 {
            color: #4CAF50;
            font-size: 36px;
            margin-bottom: 20px;
        }
        .success-message p {
            font-size: 18px;
            color: #666;
            margin: 15px 0;
        }
        .order-id {
            font-size: 24px;
            font-weight: bold;
            color: #008CBA;
            margin: 20px 0;
            padding: 15px;
            background-color: #f0f8ff;
            border-radius: 4px;
            display: inline-block;
        }
        .success-message a {
            display: inline-block;
            margin-top: 30px;
            padding: 12px 30px;
            background-color: #008CBA;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            font-weight: bold;
        }
        .success-message a:hover {
            background-color: #007399;
        }
    </style>
</head>
<body>
    <?php include __DIR__ . '/index_bar.php'; ?>
    <main>
        <div class="success-message">
            <h1>¡Eskerrik asko zure erosketarengatik!</h1>
            <p>Zure eskaria arrakastaz gorde da.</p>
            <?php if (isset($_GET['eskaria_id'])): ?>
                <div class="order-id">
                    Eskaria zenbakia: #<?php echo htmlspecialchars($_GET['eskaria_id']); ?>
                </div>
            <?php endif; ?>
            <p>Laster kontaktuan jarriko gara zurekin.</p>
            <p>Zure eskariak prozesatzean, zure kontserbazioari buruzko informazioa bidaliko zaizu.</p>
            <a href="./index.php">Hasiera itzuli</a>
        </div>
    </main>
</body>
</html>
