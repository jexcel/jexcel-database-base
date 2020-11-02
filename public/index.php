<?php

chdir('..');

include 'config.php';
include 'vendor/autoload.php';

use \bossanova\Database\Database;
use \bossanova\Render\Render;

// Connect to the database

$database = Database::getInstance(null, [
    DB_CONFIG_TYPE,
    DB_CONFIG_HOST,
    DB_CONFIG_USER,
    DB_CONFIG_PASS,
    DB_CONFIG_NAME
]);

// Jexcel license
$license = 'YjQzMzdlOTRiOGY3ZTQ0ZDQ4ZTI1YWU3MDFjMDI0ZWJmOTNjODA1NWFiZTRiNDJhNmRiYTJlZjkwODQ3N2IwMWRmNWRjYWUwZDViM2VhMmI3NzVjOTcwMzVlN2ZhODI1Y2EyMmE3NDI0ZmE0ZjVmNGQ2MWEzN2M3MTA4MThhMDUsZXlKdVlXMWxJam9pY0dGMWJDNW9iMlJsYkNJc0ltUmhkR1VpT2pFMk16SXdPVEkwTURBc0ltUnZiV0ZwYmlJNld5SnFjMlpwWkdSc1pTNXVaWFFpTENKcVpYaGpaV3d1Ym1WMElpd2lZMjlrWlhOaGJtUmliM2d1YVc4aUxDSnFjMmhsYkd3dWJtVjBJaXdpTVROemQyMHVZM05pTG1Gd2NDSXNJbXh2WTJGc2FHOXpkQ0pkTENKd2JHRnVJam9pTXlKOQ==';

// Jexcel db
$jexcel = new \jexcel\Jexceldb($database, 'users');
$jexcel->setPrimaryKey('user_id');

if (Render::isAjax()) {
    echo $jexcel->save($_POST);
} else {
    echo '<html>
                <script src="https://jexcel.net/v7/jexcel.js"></script>
                <script src="https://jexcel.net/v7/jsuites.js"></script>
                <link rel="stylesheet" href="https://jexcel.net/v7/jsuites.css" type="text/css" />
                <link rel="stylesheet" href="https://jexcel.net/v7/jexcel.css" type="text/css" />';

    echo $jexcel->create([
        'license' => $license,
        'persistance' => 'jexcel',
    ]);
}
