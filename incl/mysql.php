<?php

class MySQL {
    var $host;
    var $dbUser;
    var $dbPass;
    var $dbName;
    var $dbConn;
    var $connectError;
    
    function __construct($host, $dbUser, $dbPass, $dbName) {
        $this->host = $host;
        $this->dbUser = $dbUser;
        $this->dbPass = $dbPass;
        $this->dbName = $dbName;
        $this->connectToDb();
    }

    // Establishes connection to MySQL and selects a database
    function connectToDb() {
        $this->dbConn = new mysqli($this->host, $this->dbUser, $this->dbPass, $this->dbName);

        if ($this->dbConn->connect_error) {
            trigger_error('Connection failed: ' . $this->dbConn->connect_error);
            $this->connectError = true;
        }
    }

    // Returns an instance of MySQLResult to fetch rows with
    function query($sql) {
        if (!$queryResource = mysqli_query($this->dbConn, $sql)) {
            trigger_error('Query failed: ' . mysqli_error($this->dbConn) . ' SQL: ' . $sql);
        }
        return new MySQLResult($this, $queryResource);
    }
}

class MySQLResult {
    var $mysql;
    var $query;

    function __construct($mysql, $query) {
        $this->mysql = $mysql;
        $this->query = $query;
    }

    // Fetches a row from the result
    function fetch () {
        if ($row = mysqli_fetch_array($this->query, MYSQLI_ASSOC)) {
            return $row;
        }
        else {
            return false;
        }
    }
}
?>
