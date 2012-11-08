	<h1>All jokes of kushal</h1>

	<div id="body">
		<table>
		<tr>
			<th>id</th><th>title</th><th>description</th><th>rating</th><th>created</th><th>action</th>
		</tr>
		<?php 
			foreach ($records as $record) {
				echo '<tr>';
				echo '<td>'.$record['id'].'</td><td>' . $record['title'] . '</td><td>' . $record['description'] . '</td>';
				echo '<td>' . $record['rating'] . '</td><td>'.$record['created'].'</td>';
				echo '<td><a href="view/'. $record['id'] . '">view</a>| <a href="update/'. $record['id'] . '">Update</a></td>';
				echo '</tr>';
			}
		?>
		</table>
	</div>
