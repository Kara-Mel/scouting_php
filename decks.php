<!DOCTYPE html>
<html lang="en">
    <head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Разведка Fireborn">
	<meta name="author" content="">
	<title>Разведка Fireborn</title>

	<!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </head>

    <body>
	
<?php echo $playid?>

		<table class="table">
		<tr>
		<th>Дека</th>
		<th>Реплей</th>
		<th>Дата апдейта</th>
		<th>Частота</th>
		<th>+1</th>
		</tr>
                        <?php 
                        while ($row = $results->fetch_assoc()) {
                            echo '<tr><td>'.$row['decks_cards'].'</td><td>' . $row['replay'] . '</td><td>'.$row['updated_at'].'</td><td>'.$row['frequency'].'</td>';
							echo '<td>';
							echo '<form action="action.php" method="post"> <input type="hidden" value="'.$row['id'].'" name="inc_1"/>
							<input type="hidden" value="'.$playid.'" name="idplay"/>
							<input type="submit" value="+1" name="justbutton"/></form>'; 
							echo '</td></tr>';

                        }                        
                        ?>
                    </table>
					
		<form  action="action.php" onsubmit="return validateForm()" name="form2" method="post">
		Deck: <input type="text" name="deck"><br>
		Replay: <input type="text" name="replay">
		<?php echo '<input type="hidden" name="player" value='.$playid.'>' ?>
		<input type="submit" value="New deck" />
		</form>
			
		
    </body>
</html>

<script>
function validateForm() {
  var x = document.forms["form2"]["deck"].value;
  if (x == "") {
    alert("Deck cannot be empty");
    return false;
  }
}
</script>
