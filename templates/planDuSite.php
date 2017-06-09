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
		
		<div>
			<h2>Plan du Site</h2>
			<div>
				<ul>
					<?php foreach($pages as $e){
						echo("<li><a href =".$e[1].">".$e[0]."</a></li>"); 
				}
					?>
				</ul>
			</div>
		</div>
						
	</body>
</html>