<?php

// AutomationTest
// Manages database connection
//

include('./adodb519/adodb5/adodb.inc.php');

Class DBConnection {

    private $db = NULL;        // Database handle
    private $userName = NULL;
    private $password = NULL;
    private $databaseName = NULL;

    // Constructor
    // Setup the connection parameters
    //
    function __construct() {

        $this->db = ADONewConnection('mysql');
        $this->userName = "cosctea4_cosc";       // Username
        $this->password = "CoscTea4;";               // Password
        $this->databaseName = "cosctea4_cosc4345";  // Database Name
    }

    // dbConnect()
    // Create a connection to the database.
    // Returns the connection handle if success, otherwise returns NULL
    //
    public function dbConnect() {

        $this->db->PConnect('localhost',
        $this->userName,
        $this->password,
        $this->databaseName);

        $ret = $this->db->isConnected();

        if ($this->db->isConnected() == false) {
            return NULL;
        }

        return $this->db;
    }

    public function getDBHandle() {

        return $this->db;
    }
}

?>