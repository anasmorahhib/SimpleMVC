<?php
class Model {
    static $cnx =array(); //
    public $db = 'default'; // name database
        public function __construct()
        {
            $config = Config::$database[$this->db];
            /*
             * test connexion to database
             */
            try{
                if (isset(Model::$cnx[$this->db]))
                { return true;}
                $db = new PDO('mysql:host='.$config['host'].';dbname='.$config['database'].';',$config['login'],$config['password']);
                Model::$cnx[$this->db] = $db;
            }
            catch (PDOException $e){
                if(Config::$debug == 1)
                    die($e->getMessage());
                else
                    die('Error');
            }
        }
}