<!DOCTYPE html>
<html >
    <head>
        <title>Поиск ссылок на научные работы</title>
        <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
		<link href="Css.css" rel="stylesheet" type="text/css">
    </head>
    <body>
			<div id='K'>
			<div id='kartinka'> <img src="main_logo.png"  vspace="25"> </div>
			</div>
			
			<form id="form" name="search_form" method="GET" action="SearchRes.php"> 
			
				<div id='box' class="input-field" >
					<input id="keywords" type="text" name="request"  placeholder="Укажите ключевые слова для поиска">
				</div>    
				
				<div id='box' class="search-button">
					<button class="btn-search" type="submit">Поиск</button>
				</div>
			
			</form>
			
			<?php
			if($_POST){
				session_start();
				
				$request = trim($_POST['request']);
				if ($request==NULL) {
					header('Location: /index.html');
				}
				else{
					$array = explode(' ',$request);
					$count = count($array);
					
					$error = false;
					$errortext = "<p> <b> <font color='red'><h3>При регистрации на сайте произошли следующие ошибки: </h3></font></p><ul>";
					
					if (empty($request)) {
							$error = true;
							$errortext .="<li><font color='red'>Вы ничего не написали.</font></li>";
					}
					
					$servername = "localhost";
					$username = "litsyl;
					$password = "123";
					$dbname = "litsyl";
					
					//connection
					//$conn = new mysqli($servername, $username, $password, $dbname);
					$dsn = "mysql:host={$servername}; dbname= {$dbname}";
					$db = new PDO($dsn, $username, $password)
					$db->exec("set names utf8");
					
					//checking connection
					if ($db->connect_error) {
						die("Connection failed: " . $db->connect_error);
					}
					//1st word cheking
					$sql = "SELECT Work_id, Name_of_work FROM works WHERE Name_of_work LIKE '%".$array[0]."%'";
					$result = $db->query($sql);
					$result->setFetchMode(PDO::FETCH_ASSOC);
					$id_mass = array();
					$i=1;
					while ($row=$result->fetch()) {
						
						$id_mass[$i] = $row['Work_id'];
						$i++;
					}
					
					$id_count = count($id_mass); 
					
					
					
					
					
					//проверка 
					for ($i=1; $i<=$count-1; $i++) {
						for ($j=1; $j<=$id_count; $j++) {
							$sql = "SELECT id, content FROM news WHERE id=".$id_mass[$j]." AND content LIKE '%".$mass[$i]."%'";
							$result = $db->query($sql);
							$result->setFetchMode(PDO::FETCH_ASSOC);
							$result->execute();
							$id_mass2 = array();
							$row=$result->fetch();
							$temp = $row['id'];
							
							if($temp!=$id_mass[$j]) {
								$id_mass[$j] = -1;
							}
						}
					}
					
					if ($result->num_rows > 0) {
						//printing data of each row
						echo "<ol>";
						while($row = $result->fetch_assoc()) {
							echo "<li>" . $row["Name_of_work"]. ": ". $row["Name_of_type"]. "/". $row["Author's_name"]. " - ". $row["City"]. ": ". $row["Name_pub"]. ", ". $row["Year_of_publication"]. ".- ". $row["Pages_amount"]. " с." "</li>";
						}
						echo "</ol>";
					} else {
						echo "0 results";
					}
					$db->close();
				}
			}
			/*	if ($_SERVER['REQUEST_METHOD']=='POST') {
					$keywords=$_POST['keywords'];
				}
			*/	
			?>
    </body>
    </html>