<?php
use Core\Database;
$config = require base_path('config.php');
$db = new Database($config['database']); //// router require database and we will has database class o yüzden eski sıralmalarını değiştirip router en alta aldık index içinde
$currentUserId = 1;

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $note = $db->query('SELECT * FROM notes where id = :id', [
        ':id'=> $_GET['id']   //-------$id = $_GET['id'] yerine direk buray ayazdık.
    ] )->findOrFail();
    $db->query('DELETE FROM notes WHERE id = :id' ,
        [
            ':id' => $_GET['id']
        ]);
    header('location: /notes');
    exit();

}
else{

//superglobal _GEt //URL’deki query string (parametre) verilerini tutar. //Örn: /index.php?name=Ayşe → $_GET['name'] = "Ayşe"
//-----------------------------------------------------//wild card ID :id
$note = $db->query('SELECT * FROM notes where id = :id', [
    ':id'=> $_GET['id']   //-------$id = $_GET['id'] yerine direk buray ayazdık.
] )->findOrFail();

/*
URL’den id al

Notu veritabanından getir

Yoksa hata ver
 */

//note olmayınca bool false dönüyor dd($note); baktık.Şimdi finorfail dosyası içine gidince if($reuslt) aynı mantık

authorize($note['user_id'] === $currentUserId);


view("notes/show.view.php", [
    'heading' => 'Note',
    'note' => $note
]);
}

















?>