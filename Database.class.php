<?php



/***
 * Classe para ligação a uma base de dados PDO-PHP
 * 
 * 
 * 
 * @author Luis Emanuel
 */

 class dataBase {

    const CONNECT_TIMEOUT = 5; // in seconds
    /**
     * Variavel caminho BD
     * 
     * @var string
     */
     private $dsn;

     /**
     * user name BD
     * 
     * @var string
     */
     private $username;
     /**
     * Password BD
     * 
     * @var string
     */
     private $password;
       /**
     *Ligação BD
     * 
     * @var object
     */
    private $connection;
    /**
     * Actions PDO
     *
     * @var array
     */
    private $pdoOptions;


/**
 * Construtor da Classe
 *
 * @param string $dsn Host da Ligaçao
 * @param string $username user name da BD
 * @param string $password passwor da BD
 * 
 * @return void
 */
    public function __construct($dsn, $username, $password){
        $this->dsn = $dsn;
        $this->username =$username;
        $this->password =$password;
        $this->pdoOptions =[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO:: ATTR_DEFAULT_FETCH_MODE => PDO:: FETCH_OBJ,
        PDO::ATTR_TIMEOUT => self::CONNECT_TIMEOUT
        
    ];
    $this->MakeConnection();


    }
/**
 * Criar Ligação
 *
 * @return object
 */
    protected function MakeConnection(){
      $this->connection = new PDO($this->dsn,$this->username, $this->password, $this->pdoOptions);
      return $this->connection;
    }

    /**
     * Verifica a ligação a BD
     *
     * @return boolean
     */
    public function isConnected(){
      return (boolean) $this->connection;

    }

 }