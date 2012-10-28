<?php
	require('functions.php');
	
	if(!isset($_POST['submit']) || $_POST['searchterm']=="") {
		redirect('youtubesearch.php');
	}

?>

<html>
<head>
	<title></title>
</head>
<body>

<?php
	if (isset($_POST['submit'])) {
		$xml_obj=searchYoutube($_POST['searchterm']);
	
		//print_r($xml_obj);
		 foreach($xml_obj->entry as $entry) {
		$media = $entry->children('http://search.yahoo.com/mrss/');
		     	$attrs = $media->group->player->attributes();
		      	$watch = $attrs['url'];
				$author= $entry->author->name;
				$content = $entry->content;
				echo "<p><a href=". $watch. ">" . $entry->title . "</a> posted by <a href=http://www.youtube.com/user/". $author . "/>$author</a><br/>$content</p><br/>";
		        $attrs = $media->group->thumbnail[0]->attributes();
		        $thumbnail = $attrs['url']; 
		        echo "<a href=\"{$watch}\"><img src=\"$thumbnail\"/></a><br/>";
				echo "<br/><br/>";
		
		}	
	} else {
		header('Location: profile.php');
	}
?>

</body>
</html>