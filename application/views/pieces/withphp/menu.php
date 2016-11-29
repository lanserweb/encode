
                            
                               <?php 
                               if($module->isActive('1')) {
                                if(count($menu) >0) {
                                echo '<ul id="menu-menu" class="level-1">';
                                    foreach($menu as $item) {
                                if($item['parentId']==0) {
                                        if(ucfirst($item['URIname']).'Controller' == $_SESSION['currentpage']) {
                                            $activeli = ' class="active"';
                                        }else {
                                            $activeli = '';
                                        }
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
                                    echo "<li".$activeli."><a href=\"/encodingArt/".$item['URIname']."\">".$menuname."</a>";
                                        $mnmenu->getSubmenuFor($item['id']);
                                    echo '</li>';

                                
                            }
                                }
                                echo '</ul>';
                            }else {
                                echo 'onnnnnnooooo';
                            }
                                
                               }
                            

                         ?>