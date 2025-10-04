<?php 

include_once 'app.config.php';

/**
 * Summary of Database
 * Class Database thực hiện nhiệm vụ kết nối tới CSDL
 */
class Database
{
    private $server = SERVER_NAME;
    private $user = DB_USER;
    private $password = DB_PASSWORD;
    private $database = DB_NAME;

    public function connect()
    {
        try {
            $mysqli = new mysqli($this->server, $this->user, $this->password, $this->database);
            
            return $mysqli;
        } catch (Exception $e) {
            print 'Error!: ' . $e->getMessage() . '<br>';
            die();
        }
    }
}