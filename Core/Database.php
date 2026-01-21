<?php
//connect to the database, and execute a query.
class Database{

    public $connection;
    public $statement; ///

    //Veritabanına bağlanma
    //dinamik olsun d,ye password ve usuername construct içinde çağırdık http_build_query içinde direk tanımaktan....
    public function __construct($config ){


        $dsn = 'mysql:' . http_build_query($config , '',';');

        // http_build_query bunu birleştiyor ve sonuç -> mysql:host=localhost;port=3306;database=myapp;charset=utf8mb4

        $this->connection = new PDO($dsn, $config['username'],
            $config['password'] , [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
        /*
            $this->connection = PDO bağlantısı
            Artık bu nesne veritabanına bağlı 
            FETCH_ASSOC → sonuçlar dizi olarak gelsin diye
        */
    }
    public function query($query , $params = []){


        $this -> statement = $this->connection->prepare($query);  //this database ama conncetion pdo statment içeiyor aynı zamanda statmetta öyle    //PDO bağlantısından bir SQL sorgusu hazırla,$this->statement artık bir PDOStatement nesnesi.
        $this -> statement->execute($params);                     //Bu, hazırladığın (prepare ettiğin) SQL sorgusunu çalıştırır ve , parametrelerini ($params) sorguya güvenli şekilde bağlar.
        return $this;
    }

    public function get() // BÜTÜN sonuçlarını getirir
    {
        return $this->statement->fetchAll();
    }
    public function find()   //Sadece ilk satırı getirir Genelde WHERE id = ? gibi sorgularda kullanılır  //ismini istediğim gibi şekillendirebilirim bu benim kendi fonskiyonum olur ama içi fetch yani kendi sınıfım içinde pdo statement yani pdonun öethopdlarına erişebilirm
    {
        return $this -> statement -> fetch();
    }

    public function findOrFail() //Bulamazsan 404 ver
    {

        $result =  $this -> find();

        if(! $result){
            abort();
        }

        return $result;
    }
}






?>