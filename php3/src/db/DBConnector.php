<?php

class DBConnector
{
    protected $host = "localhost";
    protected $user = "root";
    protected $password = "";
    protected $dbName = "rezeptverwaltung";

    private $dbConnection = null;

    public function __construct()
    {
        try {
            $this->dbConnection = new PDO("mysql:host=$this->host;dbname=$this->dbName", $this->user, $this->password);
        } catch (PDOException $exception) {
            echo "Connection failed: " . $exception->getMessage();
        }
    }

    /**
     * @return PDO
     */
    public function getConnection(): PDO {
        return $this->dbConnection;
    }
}