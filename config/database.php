<?php
class Database
{
    // Note: specify your own database credentials
    private $host = "us-cdbr-iron-east-04.cleardb.net";

    private $db_name = "heroku_fd28e1fd31eae28";

    private $username = '';

    private $password = '';

    private static $instance = null;
    public $conn;

    private function __construct(){
        $db_dsn = array(
            'host'    => $this->host,
            'dbname'  => $this->db_name,
            'charset' => 'utf8',
        );

        if (getenv('IDP_ENVIRONMENT') === 'heroku') {
            $db_dsn['host'] = 'us-cdbr-iron-east-04.cleardb.net';
            $this->username = getenv('DB_USER');
            $this->password = getenv('DB_PASSWORD');
        }

        try {
            $dsn        = 'mysql:' . http_build_query($db_dsn, '', ';');
            $this->conn = new PDO($dsn, $this->username, $this->password);
        } catch (PDOException $exception) {
            echo json_encode(
                array(
                    'error'   => 'Database connection failed',
                    'message' => $exception->getMessage(),
                )
            );
            exit;
        }
    }

    // get the database connection
    public function getConnection()
    {
        return $this->conn;
    }

    public static function getInstance(){
        if(!self::$instance){
            self::$instance = new Database();
        }

        return self::$instance;
    }
}
