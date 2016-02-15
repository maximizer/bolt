<?php
require_once __DIR__ . '/vendor/autoload.php';

use Symfony\Component\HttpFoundation\Response;

date_default_timezone_set("America/Chicago") ;

$conn = r\connect("rethinkdb");
$result = r\table("bolt")->filter(["page_id" => "569948ef1c6fd"] )->run($conn);

foreach ($result as $doc) {
    print_r($doc);
}

