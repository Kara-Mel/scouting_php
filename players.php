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

		<table class="table">
		<tr>
		<th>Ник</th>
		<th>Уровень</th>
		<th>Фраги</th>
		<th>Смерти</th>
		<th></th>
		</tr>
                        <?php 
                        foreach ($players['players'] as $player) {
                            echo '<tr><td>'.$player['nick'].'</td><td>' . $player['level'] . '</td><td>'.$player['frags'].'</td><td>'.$player['deaths'].'</td>';
							echo '<td>';
							echo '<form action="action.php" method="post"> <input type="hidden" value="'.$player['id'].'" name="playerID"/>'; 
							echo '<input type="submit" name="justbutton" value="Show" /></form>';
							echo '</td></tr>';

                        }                        
                        ?>
                    </table>
		
    </body>
</html>
