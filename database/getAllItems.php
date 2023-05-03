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
		// Select a database and collection, then find all items in that collection
		$db = $client->inventory;
		$col = $db->item;
		$cursor = $col->find();
		echo "<table>\n<tr><th>Item ID</th><th>Item Type</th><th>Item Category</th></tr>\n";
		foreach ($cursor as $document) {
			echo "<tr><td>" . $document["itemID"] . "</td><td>" . $document["itemType"] . "</td><td>" . $document["itemCategory"] . "</td></tr>\n";
		}
		echo "</table>\n<a href='../getAllItems.php'>Go back</a>";
	} catch (Exception $e) {
	    printf($e->getMessage());
	}
?>
