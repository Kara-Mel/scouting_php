<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

//Parsing clans and returning thier list to browser;
if(isset($_POST["clanID"]))
	
{
	$id=($_POST["clanID"]);
	$urlList = 'https://berserktcg.ru/api/export/clan/';
	$urlList = $urlList.$id.'.json';
			   
	$players = json_decode(file_get_contents($urlList),true);
	require("players.php");
}

//Getting all records from DB based on player ID
if(isset($_POST["playerID"]))
	
{
	$playid=($_POST["playerID"]);
	require("DBconn.php");


	$sql="SELECT * FROM decks WHERE player_id=$playid;";
	$results = $myconn->query($sql);
	$myconn -> close();
	require("decks.php");
}
//+1 to frequency
if(isset($_POST["inc_1"]))
	
{
	$increment=($_POST["inc_1"]);
	$playid=($_POST["idplay"]);
	require("DBconn.php");
	$sql = "UPDATE decks SET frequency=frequency+1, updated_at = now() WHERE id=$increment;";
	$myconn->query($sql);
	$sql="SELECT * FROM decks WHERE player_id=$playid;";
	$results = $myconn->query($sql);
	//echo "Record updated, thanks";
	$myconn -> close();
	require("decks.php");
}
//New deck to DB
if(isset($_POST["deck"]))
	
{
	$deck_card=($_POST["deck"]);
	$player=($_POST["player"]);
	$replay=($_POST["replay"]);
	require("DBconn.php");
	$playid=($_POST["player"]);
	$sql = "INSERT INTO decks (player_id,decks_cards,replay,frequency, created_at, updated_at) VALUES ($player,'$deck_card','$replay', 1, now(), now());";
	$myconn->query($sql);
	
	$sql="SELECT * FROM decks WHERE player_id=$player;";
	$results = $myconn->query($sql);
	$myconn -> close();
	echo "You've entered deck ".$deck_card." with replay ".$replay." for player with ID ".$player." Thank you!";
	require("decks.php");
}

	
?>
