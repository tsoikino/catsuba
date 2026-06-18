<?php
require_once __DIR__ . "/cfg.php";
require_once __DIR__ . "/common.php";

#PDO

class DB {
    private array $pdo = [];

    public function __construct($config) {

        if ($config["driver"] === "sqlite") {

            foreach ($config["sqlite"] as $name => $file) {
                $this->pdo[$name] = new PDO("sqlite:" . $file);
                $this->pdo[$name]->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
        }

        if ($config["driver"] === "mysql") {
            $this->pdo["main"] = new PDO(
                "mysql:host={$config['mysql']['host']};dbname={$config['mysql']['db']}",
                $config["mysql"]["user"],
                $config["mysql"]["pass"]
            );
        }
    }

    public function query($db, $sql, $params = []) {
        $stmt = $this->pdo[$db]->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }
}


$db = new DB($config);
if ($config["driver"] === "sqlite") {
    $db->query("ib", "
        CREATE TABLE IF NOT EXISTS post (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            boardid INTEGER NOT NULL,
            replyid INTEGER,
            pwdelete TEXT NOT NULL,
            title TEXT,
            content TEXT NOT NULL,
            name TEXT,
            ipaddr TEXT NOT NULL
        );
    ");
}




#utils

function banned($ip) : bool {
    

    return false;
}

