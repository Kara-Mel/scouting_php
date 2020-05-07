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
	require("admin_player.php");
}

//Getting all records from DB based on player ID
if(isset($_POST["playerID"]))
	
{
	$playid=($_POST["playerID"]);
	require("DBconn.php");


	$sql="SELECT * FROM decks WHERE player_id=$playid;";
	$results = $myconn->query($sql);
	$myconn -> close();
	require("admin_decks.php");
}

//Delete record from DB
if(isset($_POST["deleteRecord"]))
	
{
	$recordid = ($_POST["deleteRecord"]);
	$playid=($_POST["playerid_del"]);
	require("DBconn.php");
	$sql = "DELETE FROM decks WHERE id=$recordid;";
	$myconn->query($sql);
	
	$sql="SELECT * FROM decks WHERE player_id=$playid;";
	$results = $myconn->query($sql);
	$myconn -> close();
	echo "Record deleted";
	require("admin_decks.php");
}

//Edit record from DB
if(isset($_POST["editRecord"]))
	
{
	$recordid = ($_POST["editRecord"]);
	require("DBconn.php");
	$sql="SELECT * FROM decks WHERE id=$recordid;";
	$results = $myconn->query($sql);
	$row = $results->fetch_assoc();
	$myconn -> close();
	$playerid=$row['player_id'];
	require("admin_edit_decks.php");

}
//Edit record from DB
if(isset($_POST["deck_upd"]))
	
{
	$deck_card=($_POST["deck_upd"]);
	$recordid=($_POST["recordid"]);
	$replay=($_POST["replay_upd"]);
	$playid=($_POST["player-id"]);
	
	require("DBconn.php");
	$sql = "UPDATE decks SET decks_cards='$deck_card', replay = '$replay' WHERE id=$recordid;";
	$myconn->query($sql);
	
	$sql="SELECT * FROM decks WHERE player_id=$playid;";
	$results = $myconn->query($sql);
	
	$myconn -> close();
	echo "Record edited, thanks";
	require("admin_decks.php");


}

	
?>
