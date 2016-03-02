<?php
use Ratchet\Server\IoServer;
use ChatApp\Chat;

require 'c:/OpenServer/domains/ukrainianrealbrides/application/vendor/autoload.php';

$server = IoServer::factory(
    new Chat(),
    8000
);

$server->run();