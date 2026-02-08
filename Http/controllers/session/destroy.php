
<?php

use Core\Authenticator;

//temporary
$logout = new Authenticator();
$logout->logout();

header('location: /');
exit();