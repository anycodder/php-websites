<?php

$config = require base_path('config.php');
$db = new Database($config['database']); //// router require database and we will has database class o yüzden eski sıralmalarını değiştirip router en alta aldık index içinde

$currentUserId = 1 ;

//superglobal _GEt //URL’deki query string (parametre) verilerini tutar. //Örn: /index.php?name=Ayşe → $_GET['name'] = "Ayşe"
//-----------------------------------------------------//wild card ID :id
$note = $db->query('SELECT * FROM notes where id = :id', [
    ':id'=> $_GET['id']   //-------$id = $_GET['id'] yerine direk buray ayazdık.
] )->findOrFail();

//note olmayınca bool false dönüyor dd($note); baktık.Şimdi finorfail dosyası içine gidince if($reuslt) aynı mantık

authorize($note['user_id'] === $currentUserId);


view("notes/show.view.php", [
    'heading' => 'Note',
    'note' => $note
]);

















?>