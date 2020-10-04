<?php
require 'FixtureTestCase.php';

require dirname(__FILE__) . '/../Model/UserModel.php';

require 'vendor/autoload.php';
require 'lib/Db.php';
require 'config_test.php';


Db::connect_on_db($GLOBALS['DB_DBNAME'], $GLOBALS['DB_USER'], $GLOBALS['DB_PASSWD'], $GLOBALS['DB_DSN']);


class UserModelTestCase extends FixtureTestCase {


    public function testAddUser() {

        $guest = array( "name" => "test", "email" => "test@localhost.com", "password" => "test" );
        UserModel::insert($guest);

        $guest = array( "name" => "batata", "email" => "batata@localhost.com", "password" => "batata" );
        UserModel::insert($guest);

        $queryTable = $this->getConnection()->createQueryTable(
            'users', 'SELECT id, name, email, password FROM users'
        );

        $expectedTable = $this->createFlatXmlDataSet("./Tests/users_expected.xml")
            ->getTable("users");

        $this->assertTablesEqual($expectedTable, $queryTable);

    }

    public function testEditUser() {

        $guest = array( "name" => "test", "email" => "test@localhost.com", "password" => "test" );
        UserModel::insert($guest);

        $batata = array( "name" => "batata", "email" => "batata@localhost.com", "password" => "batata" );
        UserModel::insert($batata);

        UserModel::update($batata, 1);
        UserModel::update($guest, 2);

        $queryTable = $this->getConnection()->createQueryTable(
            'users', 'SELECT id, name, email, password FROM users'
        );

        $expectedTable = $this->createFlatXmlDataSet("./Tests/users_edited_expected.xml")
            ->getTable("users");

        $this->assertTablesEqual($expectedTable, $queryTable);

    }


    public function testDelUser() {

        $guest = array( "name" => "test", "email" => "test@localhost.com", "password" => "test" );
        UserModel::insert($guest);

        $guest = array( "name" => "batata", "email" => "batata@localhost.com", "password" => "batata" );
        UserModel::insert($guest);

        $queryTable = $this->getConnection()->createQueryTable(
            'users', 'SELECT id, name, email, password FROM users'
        );
        // há 2 usuarios no banco
        $this->assertEquals(2, $queryTable->getRowCount());

        UserModel::delete(1);
        $queryTable = $this->getConnection()->createQueryTable(
            'users', 'SELECT id, name, email, password FROM users'
        );
        // há 1 usuario no banco
        $this->assertEquals(1, $queryTable->getRowCount());

        UserModel::delete(2);
        $queryTable = $this->getConnection()->createQueryTable(
            'users', 'SELECT id, name, email, password FROM users'
        );
        // não há usuarios no banco
        $this->assertEquals(0, $queryTable->getRowCount());

    }


}