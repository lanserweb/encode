<h1>{{HEADER}}</h1>

<?php 
if($module->isActive('1'))
	foreach($menu as $item) {
		if(ucfirst($item['URIname']).'Controller' == $_SESSION['currentpage']) {
			$activeli = ' class="active"';
		}else {
			$activeli = '';
		}
		echo "<li".$activeli."><a href=\"".$item['URIname']."\">".$item['name']."</a></li>";
	}
?>
 