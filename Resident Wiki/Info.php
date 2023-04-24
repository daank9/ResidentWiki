<?php

$db = new PDO($dsn, $user, $password);

$sql = file_get_contents('Info Resident.sql');

$qr = $db->exec($sql);

