<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Plan du site</title>
	</head>

	<body>
		<style>
			
			.ul{
				
				text-decoration: none;
			}
		
		</style>
		<?php
		
		$root = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/';
		
		?>
		<div>
			<h2>Plan du Site</h2>
			<div>
				<ul>
					<?php foreach($pagesPlan as $e){
						echo("<li><a href =".$root."/?page=".$e[0].">".$e[0]."</a></li>"); 
				}
					?>
				</ul>
			</div>
		</div>
						
	</body>
</html>