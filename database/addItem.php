<?php

require '../vendor/autoload.php';

use MongoDB\Client;
use MongoDB\Driver\ServerApi;
$uri = 'mongodb+srv://Cluster47899:WmlrQmRheVFU@cluster47899.aom6tdy.mongodb.net/?retryWrites=true&w=majority';
// Specify Stable API version 1
$apiVersion = new ServerApi(ServerApi::V1);
// Create a new client and connect to the server
$client = new MongoDB\Client($uri, [], ['serverApi' => $apiVersion]);
try {
	// insert an item into the database
	$col = $client->inventory->item;
	$document = [
		"itemID" => $_POST["itemID"],
		"itemType" => $_POST["itemType"],
		"itemCategory" => $_POST["itemCategory"]
	];
	$result = $col->insertOne($document);
	echo "<h3>successfully added item!</h3>\n<h3>Rows affected: {$result->getInsertedCount()}</h3>\n<a href='../addItem.php'>Go back</a>";
} catch (Exception $e) {
    echo "<h3>Could not add item!</h3>\n<h3>{$e->getMessage()}</h3>\n<a href='../addItem.php'>Go back</a>";
}
