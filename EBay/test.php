<?php
			$id_article = 1;
			$database = "ebayece";
			$db_handle = mysqli_connect('localhost', 'root', '');
    		$db_found = mysqli_select_db($db_handle, $database);
                $sql = "UPDATE article SET Bool = '1' WHERE ID_Article LIKE ".$id_article;
                    $result = mysqli_query($db_handle, $sql);
?>