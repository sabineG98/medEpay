<p id="searchresults">
<?php
	// PHP5 Implementation - uses MySQLi.
	// mysqli('localhost', 'yourUsername', 'yourPassword', 'yourDatabase');
	$db = new mysqli('localhost', 'root', '', 'ukuri');
	
	if(!$db) {
		// Show error if we cannot connect.
		echo 'ERROR: Could not connect to the database.';
	} else {
		// Is there a posted query string?
		if(isset($_POST['queryString'])) {
			$queryString = $db->real_escape_string($_POST['queryString']);
			
			// Is the string length greater than 0?
			if(strlen($queryString) >0) {
				$query = $db->query("SELECT * FROM  news WHERE title LIKE '%" . $queryString . "%' ORDER BY news_id  LIMIT 8");
				
				if($query) {
					// While there are results loop through them - fetching an Object.
					
					// Store the category id
					$catid = 0;
					while ($result = $query ->fetch_object()) {
						if($result->news_id != $catid) { // check if the category changed
							echo '<span class="category">'.$result->category.'</span>';
							$catid = $result->news_id;
						}
						//"article.php?news_id='.$row['news_id'].'"
	         			echo '<a href="searchart.php?news_id='.$result->news_id.'">';
						//"showfile.php?image_id='.$row['news_id'].'"
	         			echo '<img src="showfile.php?image_id='.$result->news_id.'" alt="" width="50" height="50" />';
	         			
	         			$name = $result->title;
	         			if(strlen($name) > 35) { 
	         				$name = substr($name, 0, 35) . "...";
	         			}	         			
	         			echo '<span class="searchheading">'.nl2br($name).'</span>';
	         			
	         			$description = $result->title;
	         			if(strlen($description) > 80) { 
	         				$description = substr($description, 0, 80) . "...";
	         			}
						//'.nl2br($row['full_story']).'
	         			echo '<span>'.nl2br($description).'</span></a>';
	         			//echo '<span>'.$description.'</span></a>';
	         		}
	         		echo '<span class="seperator"><a href="#" title="Sitemap"></a></span><br class="break" />';
				} else {
					echo 'ERROR: There was a problem with the query.';
				}
			} else {
				// Dont do anything.
			} // There is a queryString.
		} else {
			echo 'There should be no direct access to this script!';
		}
	}
?>
</p>