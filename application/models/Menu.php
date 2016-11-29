<?php

class Menu extends Database {
	public function getMainMenu() {
		$sql = "SELECT * FROM menu WHERE parentId=0";
		$res = parent::$db->query($sql);
		if(!$res) 
			throw new Exception("Error! Can't connect to MySQL Database");
		
		$arr =Array();
		$i = 0;
		while($obj = $res->fetch(PDO::FETCH_OBJ)) {
			$arr[$i]['parentId'] = $obj->parentId;
			// $arr[$i]['childId'] = $obj->childId;  
			$arr[$i]['name_en'] = $obj->name_en; 
			$arr[$i]['name_am'] = $obj->name_am; 
			$arr[$i]['name_ru'] = $obj->name_ru; 
			$arr[$i]['id'] = $obj->id; 
			$arr[$i]['URIname'] = $obj->URIname; 
			$i++;
		}//while loop End

		return $arr;
	}//getMenu Method End

	public function getSubmenuFor($id) {
		$sql = "SELECT * FROM menu WHERE parentId=$id";
		$res = parent::$db->query($sql);
		if(!$res) 
			throw new Exception("Error! Can't connect to MySQL Database");
		
		$arr =Array();
		$i = 0;
		while($obj = $res->fetch(PDO::FETCH_OBJ)) {
			$arr[$i]['parentId'] = $obj->parentId;
			// $arr[$i]['childId'] = $obj->childId;  
			$arr[$i]['name_en'] = $obj->name_en; 
			$arr[$i]['name_am'] = $obj->name_am; 
			$arr[$i]['name_ru'] = $obj->name_ru; 
			$arr[$i]['id'] = $obj->id; 
			$arr[$i]['URIname'] = $obj->URIname; 
			$i++;
		}//while loop End

		if(count($arr)>0) {
			echo '<ul class="sub-menu">';
			foreach($arr as $item) {
				if(isset($_SESSION['lang'])) {
                        switch ($_SESSION['lang']) {
                            case 'am': $menuname = $item['name_am'];
                                break;
                            case 'ru': $menuname = $item['name_ru'];
                                break;
                            case 'en': $menuname = $item['name_en'];
                                break;
                        }  
                    }else {
                        $menuname = $item['name_en'];
                }
				echo "<li><a href=\"/encodingArt/".$item['URIname']."\">".$menuname."</a>";
                $this->getSubmenuFor($item['id']);
                echo '</li>';
			}
			echo '</ul>';
		}
	}//getMenu Method End


}