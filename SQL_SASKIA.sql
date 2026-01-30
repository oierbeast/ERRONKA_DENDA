-- Tabla para las compras/pedidos
CREATE TABLE IF NOT EXISTS eskariak (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    erabiltzaile_id INTEGER NOT NULL,
    data DATETIME DEFAULT CURRENT_TIMESTAMP,
    totala REAL NOT NULL,
    egoera TEXT DEFAULT 'pending',
    FOREIGN KEY (erabiltzaile_id) REFERENCES erabiltzaileak(id)
);

-- Tabla para los detalles de cada compra (productos incluidos)
CREATE TABLE IF NOT EXISTS eskari_xehetasunak (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    eskaria_id INTEGER NOT NULL,
    produktu_id INTEGER NOT NULL,
    kantitatea INTEGER NOT NULL,
    FOREIGN KEY (eskaria_id) REFERENCES eskariak(id),
    FOREIGN KEY (produktu_id) REFERENCES produktuak(id)
);

-- Tabla de usuarios (si no existe)
CREATE TABLE IF NOT EXISTS erabiltzaileak (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    izena TEXT NOT NULL,
    email TEXT UNIQUE NOT NULL,
    pasahitza TEXT NOT NULL,
    data_sortu DATETIME DEFAULT CURRENT_TIMESTAMP
);
