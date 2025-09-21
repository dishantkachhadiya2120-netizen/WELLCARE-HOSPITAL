<?php
require_once __DIR__ . '/config.php';

class Database {
    private $host = "localhost";
    private $db_name = "wellcare_hospital";
    private $username = "root";
    private $password = "";
    public $conn;

    public function getConnection() {
        $this->conn = null;
        try {
            $this->conn = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->db_name,
                $this->username,
                $this->password
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Load queries from config.php
            global $table_queries;

            if (is_array($table_queries)) {
                foreach ($table_queries as $name => $query) {
                    $this->conn->exec($query);
                    // echo "Table '$name' created/exists.<br>";
                }
            } else {
                echo "⚠️ table_queries is not an array. Please check config.php";
            }

        } catch(PDOException $e) {
            echo "Connection Error: " . $e->getMessage();
        }
        return $this->conn;
    }
}
