<?php

$config = require base_path('config.php');
$db = new Database($config['database']); //// router require database and we will has database class o yüzden eski sıralmalarını değiştirip router en alta aldık index içinde


$notes = $db->query("SELECT * FROM notes where user_id = 1")->get();




view("notes/index.view.php", [
    'heading' => 'My Notes',
    'notes' => $notes
]);




/*
 Bu dosya bir controller dosyası.
Görevi:

 -Veriyi almak (Model / Database)
 -Hazırlamak
 -View’a göndermek



-----------------
$config['database']


içinde:

host

port

dbname

charset

var.


db = new Database($config['database']);  --> Database nesnesi oluşturuluyor PDO bağlantısı kurulur
$db->connection = MySQL bağlantısı açık 🔌



🧩 A. query(...)
$db->query("SELECT * FROM notes where user_id = 1")


Bu ne yapıyor?

SQL hazırlanıyor (prepare)

Çalıştırılıyor (execute)

Sonuç $db->statement içine konuyor

Ve Database nesnesi geri dönüyor (return $this)

Yani buranın sonucu hâlâ $db nesnesi.

🧩 B. ->get()
->get();


Bu:

$this->statement->fetchAll() çağırır
BÜTÜN satırları alır

Array olarak döndürür


Sonuç:

$notes = [
   ['id' => 1, 'body' => '...', 'user_id' => 1],
   ['id' => 2, 'body' => '...', 'user_id' => 1],
   ...
];


Artık:

$notes = kullanıcının bütün notları 📝

🔹 4. View’a gönderiliyor (asıl MVC olayı)
view("notes/index.view.php", [
    'heading' => 'My Notes',
    'notes' => $notes
]);

 */


?>