<?php
use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$currentUserId = 1;


//superglobal _GEt //URL’deki query string (parametre) verilerini tutar. //Örn: /index.php?name=Ayşe → $_GET['name'] = "Ayşe"
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




?>