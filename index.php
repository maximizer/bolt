<?php
require_once __DIR__ . '/vendor/autoload.php';

use Symfony\Component\HttpFoundation\Response;

date_default_timezone_set("America/Chicago") ;

$app = new Silex\Application();

$app->get(
    '/beacon/{pageId}',
    function ($pageId) {

        $conn = r\connect("rethinkdb");
        $params = $_GET;
        $params['page_id'] = $pageId;
        $document = array($params);
        $result = r\table("bolt")->insert($document)
            ->run($conn);

        return new Response(
            json_encode(['message' => 'OK'], JSON_PRETTY_PRINT), 200);
    });

$app->get(
    '/sample/{pageId}',
    function ($pageId) {

        $conn = r\connect("rethinkdb");
        $result = r\table("bolt")->filter(["page_id" => $pageId] )->run($conn);

        $return = [];
        foreach ($result as $doc) {
            $return[] = $doc;
        }

        $return = count($return) == 1 ? $return[0] : $return;

        return new Response(
            json_encode($return, JSON_PRETTY_PRINT), 200);
    });



$app->run();