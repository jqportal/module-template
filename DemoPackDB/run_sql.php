<?php
$serv_config = json_decode(file_get_contents("../../config/your_config.json"), true);
$mysqli = new mysqli($serv_config["MYSQL_HOSTNAME"], $serv_config["MYSQL_USER"], $serv_config["MYSQL_PASS"], $serv_config["MYSQL_DATABASE"], $serv_config["MYSQL_PORT"]);
$packages_folder = dirname(__FILE__); echo $packages_folder;
		if(is_dir($packages_folder . "\sql")){
			$sql_files = array_diff(scandir($packages_folder . "\sql"), array('..', '.'));
			foreach($sql_files as $sql_file){
				echo 'SUCCESS on '. $sql_file;
				echo '<br>';
				$sql = file_get_contents( $packages_folder . "\sql\\" . $sql_file);
				$mysqli->multi_query($sql);
				echo $mysqli->error;
				while ($mysqli->next_result()) {;}
				echo '<br><br>';
			}
		}

echo "SUCCESS - Yau can visit now <a href='".$serv_config["BASE_REF"]."'>".$serv_config["BASE_REF"]."</a>" ;

header('Location: ./testpage.php');
?>