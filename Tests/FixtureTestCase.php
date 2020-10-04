<?php

require 'config_test.php';


class FixtureTestCase extends PHPUnit_Extensions_Database_TestCase {

    public $fixtures = array(
        'users'
    );

    private $conn = null;

    public function setUp() {
        $conn = $this->getConnection();
        $pdo = $conn->getConnection();

        foreach ($this->fixtures as $table) {
            // truncate table
            $pdo->exec("TRUNCATE TABLE `$table`;");
        }

        parent::setUp();
    }

    public function tearDown() {

        parent::tearDown();
    }

    public function getConnection() {
        if ($this->conn === null) {
            try {

                $pdo = new PDO(
                    "mysql:host={$GLOBALS['DB_DSN']};dbname={$GLOBALS['DB_DBNAME']}",
                    $GLOBALS['DB_USER'],
                    $GLOBALS['DB_PASSWD']
                );
                $this->conn = $this->createDefaultDBConnection($pdo, 'users');
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
        return $this->conn;
    }

    public function getDataSet($fixtures = array()) {

        return new PHPUnit_Extensions_Database_DataSet_CompositeDataSet( array() );

    }


}