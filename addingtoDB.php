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
			
			<div class="FORM">
			<form class="form" name="search_form"  >
			<div class= "vozvrat">
			
					<a class="form_button" href="adding.html">Добавление литературы</a> 
				
			</div>
		
			
			</form>
			
			<form class="form" name="search_form" > 
			
				
				<div class= "vozvrat">
					 <a class="form_button" href="index.html">Возврат на главную</a>
				</div>
			</form>
			</div>
			
			<div>
				<?php
					
					if ($_POST) {
						$host = '127.0.0.1';
						$db   = 'test';
						$user = 'litsyl';
						$pass = '178';
						$charset = 'utf8';
						$user_link = trim($_POST['User_Link']);
						$key_words = trim($_POST['Key_words']);
						$name = trim($_POST['Name']);
						
						 $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
						$opt = [
							PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
							PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
							PDO::ATTR_EMULATE_PREPARES   => false,
						];
						$pdo = new PDO($dsn, $user, $pass, $opt);
						
						$sql = "INSERT INTO test (Information,Link) Values (?,?)";
						$stmt= $pdo->prepare($sql);
						$stmt->execute([$key_words,$user_link]);
						
						/*
						
						$user_link = trim($_POST['User_Link']);
						$key_words = trim($_POST['Key_words']);
						$name = trim($_POST['Name']);
						$servername = "localhost";
						$username = "litsyl";
						$password = "178";
						$dbname = "litsyl";
						$conn = new mysqli($servername, $username, $password, $dbname);
						
						if (mysqli_connect_errno()) {
							printf("Не удалось подключиться: %s\n", mysqli_connect_error());
							exit();
						}
						
						if (!mysqli_set_charset($conn, "utf8")) {
							printf("Ошибка при загрузке набора символов utf8: %s\n", mysqli_error($conn));
							exit();
						}
						
						
						$sql = mysql_query("INSERT INTO test (Information,Link) Values ($key_words,$user_link)", $conn);
						
						
										 
							if (!$sql) {echo "Запрос не прошел.Попробуйте еще раз.";}
							else {
								echo "<h3 text-align='center'>Вы успешно добавили работу!</h3>";
							}
						
						$conn->close();
						*/
						
						
						/*
						$user_link = trim($_POST['User_Link']);
						$key_words = trim($_POST['Key_words']);
						$name = trim($_POST['Name']);
						//echo "<br> Данные: $user_link, $key_words <br>";
						
						
						$error = false;
						$errortext = "<p> <b> <font color='red'><h3>При добавлении в базу данных произошли следующие ошибки: </h3></font></p><ul>";
						if (empty($user_link)) {
							$error = true;
							$errortext .="<li><font color='red'>Вы не заполнили поле литературной ссылки по ГОСТ!</font></li>";
						}	else {	
							}
						if (empty($key_words)) {
							$error = true;
							$errortext .= " <li><font color='red'>Вы не заполнили поле с ключевыми словами!</font></li>";
						} else {
						}
						$errortext .="</ul></b>";
						if ($error){
							echo($errortext);
						} else {
							//подключение к базе данных
							$dbcon = mysqli_connect("localhost","litsyl","178","litsyl");
										
							mysql_set_charset("utf8",$dbcon);
							mysql_select_db("litsyl",$dbcon);
							
							if(!$dbcon) {
								echo "<p>Произошла ошибка при подсоединении к MySQL!</p>".mysql_error();
								exit();
							} else {
								if (!mysql_select_db("litsyl",$dbcon)) {
									echo ("<p>Выбранной базы данных не существует!</p>");
								}
							}
							
							//проверка на существование работы в БД
							$result = mysql_query("SELECT id FROM test WHERE Link LIKE '%$name%'",$dbcon);
										 
							$myrow = mysql_fetch_array($result);
										 
							if(!empty($myrow["id"])) {
								exit("Работа уже существует в базе данных. <form class='form' method='get' action='adding.html'><button class='form_button'>Измените ссылку?</button></form>.");
							}
							else {	 
							//Запись в БД данных SQL запросом
							$sql = mysql_query("INSERT INTO test (Information,Link) Values ('$key_words $user_link','$user_link')",$dbcon);
										 
							if (!$sql) {echo "Запрос не прошел.Попробуйте еще раз.";}
							if (sql)
							{
								echo "<h3 text-align='center'>Вы успешно добавили работу!</h3>";
							}
							mysqli_close($dbcon);//закрытие MySQL.
							}
						}
						*/
					}
					//if (($_POST&&$error)|| !$_POST){
					//	echo"<h3>Так делать нельзя!</h3>";}
				?>


			</div>
    </body>
    </html>
