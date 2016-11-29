<!-- START TOP BAR -->
        <div id="topbar">
            <div class="container">
                <div class="row">
                    <div id="nav" class="span12 light">

                        <!-- START MAIN NAVIGATION -->
                        
                        
                       <?php 
                       include(ROOT.'/application/views/pieces/withphp/menu.php'); 
                       ?>
                        
                        <!-- END MAIN NAVIGATION -->

                        <!-- START TOPBAR LOGIN -->
					<?php if(!isset($_SESSION['user'])) : ?>
                        <div id="topbar_login" class="not_logged_in">

                            <a class="topbar_login" href="#">
                                LOGIN <span class="sf-sub-indicator"></span>
                            </a>

                            <div id="fast-login" class="access-info-box">
                                <form action="#" method="post" name="loginform" onsubmit="return false">

                                    <div class="form">
                                        <p>
                                            <label>
                                                Username<br/>
                                                <input type="text" tabindex="10" size="20" value="" name="login" class="input-text" />
                                            </label>
                                        </p>

                                        <p>
                                            <label>
                                                Password<br/>
                                                <input type="password" tabindex="20" size="20" value="" name="password" class="input-text" />
                                            </label>
                                        </p>
										<p>
                                            <label>
                                                <span id="hereerrors"></span>
                                            </label>
                                        </p>
                                        <a class="align-left lostpassword" href="#" title="Password Lost and Found">
                                            lost password?
                                        </a>

                                        <p class="align-right">
                                            <input type="submit" tabindex="100" value="Login" name="wp-submit" class="input-submit" />
                                            <input type="hidden" value="index.html" name="redirect_to" />
                                            <input type="hidden" value="1" name="testcookie" />
                                        </p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    <?php elseif(isset($_SESSION['user'])) : ?>
                       
                        <div id="topbar_login" class="logged_in">
                            <a class="topbar_logout" href="/encodingArt/user/logout">
                                Logout 
                            </a>
                        </div>
                         <div id="topbar_login" class="logged_in">
                            <a class="topbar_login" href="/encodingArt/user/profile">
                                Profile 
                            </a>
                        </div>
                    <?php endif; ?>
                        <!-- END TOPBAR LOGIN -->
                    </div>
                </div>
            </div>
        </div>
         <!-- END TOP BAR -->

    <!-- START HEADER -->
    <div id="header" class="group margin-bottom">

        <div class="group container">
            <div class="row" id="logo-headersidebar-container">
                <!-- START LOGO -->
                <div id="logo" class="span6 group">
                    <a id="logo-img" href="index.html" title="Libra">
                        <img src="/encodingArt/template/newencode/images/libra-logo1.png" title="Libra" alt="Libra" />
                    </a>
                    <p id='tagline'>Just another Your Inspiration Themes site</p>
                </div>
                <!-- END LOGO -->

                <!-- START HEADER SIDEBAR -->
                <div id="header-sidebar" class="span6 group">
                    <div class="widget-first widget header-text-image">
                        <div class="text-image" style="text-align:left">
                            <img src="/encodingArt/template/newencode/images/phone1.png" alt="CUSTOMER SUPPORT" />
                        </div>

                        <div class="text-content">
                            <h3>CUSTOMER SUPPORT</h3>
                            <p>+39 - 0973 - 645724</p>
                        </div>
                    </div>

                    <div class="widget-last widget widget_text">
                        <div class="textwidget">
                            <div class="socials-default-small facebook-small default">
                                <a href="# " class="socials-default-small default facebook" >facebook</a>
                            </div>

                            <div class="socials-default-small skype-small default">
                                <a href="# " class="socials-default-small default skype" >skype</a>
                            </div>

                            <div class="socials-default-small linkedin-small default">
                                <a href="#" class="socials-default-small default linkedin" >linkedin</a>
                            </div>

                            <div class="socials-default-small twitter-small default">
                                <a href="#" class="socials-default-small default twitter" >twitter</a>
                            </div>

                            <div class="socials-default-small flickr-small default">
                                <a href="#" class="socials-default-small default flickr" >flickr</a>
                            </div>

                            <div class="socials-default-small rss-small default">
                                <a href="#" class="socials-default-small default rss" >rss</a>
                            </div>

                            <div class="socials-default-small pinterest-small default">
                                <a href="#" class="socials-default-small default pinterest" >pinterest</a>

                            </div>
                         </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="top-border span12"></div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="/encodingArt/template/encode/js/encode.js"></script>
    <script src="/encodingArt/template/newencode/js/jquery/jquery.js"></script>
<?php include_once(ROOT.'/application/views/pieces/banner.php'); ?>

        <script type="text/javascript">
            jQuery(document).ready(function($){
                $('#slider-elastic-0.elastic').eislideshow({
        			easing		: 'easeOutExpo',
        			titleeasing	: 'easeOutExpo',
        			titlespeed	: 1200,
        			autoplay	: true,
        			slideshow_interval : 3000,
        			speed       : 800,
        			animation   : 'sides'
                });
            });
        </script>  
    </div>
    <!-- END HEADER -->

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
 


