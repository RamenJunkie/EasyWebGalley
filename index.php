
<!doctype html>

<html lang="en">
  <head>
    <title>Gallery</title>
    <meta charset="utf-8">	

    
	<style>
		.row {
		  display: flex;
		  flex-wrap: wrap;
		  padding: 0 4px;
		}

		/* Create four equal columns that sits next to each other */
		.column {
		  flex: 23%;
		  max-width: 23%;
		  padding: 0 4px;
		}

		.column img {
		  margin-top: 8px;
		  vertical-align: middle;
		  width: 100%;
		}

		/* Responsive layout - makes a two column-layout instead of four columns */
		@media screen and (max-width: 800px) {
		  .column {
			flex: 46%;
			max-width: 46%;
		  }
		}

		/* Responsive layout - makes the two columns stack on top of each other instead of next to each other */
		@media screen and (max-width: 600px) {
		  .column {
			flex: 90%;
			max-width: 90%;
		  }
		}
	</style>
	
  </head>

  <body>
    <header>
      <h1>Gallery</h1>
    </header>
	

<?php

$dir = ".";

$fi = new FilesystemIterator(__DIR__, FilesystemIterator::SKIP_DOTS);
$numfiles = iterator_count($fi);
$maxper = round(($numfiles-2)/4,0);
$counter=1;

if (is_dir($dir)) {
	echo "<div class=\"row\">";
	echo "<div class=\"column\">";
    if ($dh = opendir($dir)) {
        while (($file = readdir($dh)) !== false) {
			$filetype = substr($file, -4);
			if ($filetype == ".jpg" OR $filetype == ".gif" OR $filetype == ".png") { 
				echo "<a href=\"".$file."\"><img src=\"".$file."\"\></a><br />"; 
				if ($counter < $maxper) {
					$counter++;
				} else {
					$counter = 1;
					echo "</div><div class=\"column\">";
				}
			}
        }
        closedir($dh);
    }
	echo "</div></div>";
}
?>

</body>

</html>