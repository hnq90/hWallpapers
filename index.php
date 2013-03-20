<?php
$mtime = microtime();
$mtime = explode(" ", $mtime);
$mtime = $mtime[1] + $mtime[0];
$starttime = $mtime;
?>
<?php include("config.php"); ?>
<!DOCTYPE html>
<html>
<head>
    <title><?= $title ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="keywords" content="<?= $keywords ?>"/>
    <meta name="description" content="<?= $description ?>"/>
    <?php if (isset($_GET['category']) || isset($_GET['pack'])) { ?>
    <link rel="canonical" href="<?= $canonical ?>"/>
    <?= $link_next_prev ?>
    <?php } ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="Resource/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link rel="shortcut icon" href="Resource/img/fav.gif"/>
    <style type="text/css">
        body {
            padding-top: 60px;
            padding-bottom: 40px;
        }

        .sidebar-nav {
            padding: 9px 0;
        }

        @media (max-width: 980px) {
            .navbar-text.pull-right {
                float: none;
                padding-left: 5px;
                padding-right: 5px;
            }
        }
		.noonetouchme img {
			text-align: center;
			width: 1000px; 
			height: auto;
			border: 1px solid #ddd;
			padding: 5px;
			background: #f0f0f0;
			-ms-interpolation-mode: bicubic;
		}
		#fbcomments, .fb-comments, .fb-comments iframe[style], .fb-comments span {
		width: 100% !important;
		}

    </style>
    <link href="Resource/bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="Resource/js/html5shiv.js"></script>
    <![endif]-->
	<script>document.cookie='resolution='+Math.max(screen.width,screen.height)+'; path=/';</script>
</head>
<body>
<!--
    #######################################################################
    ############ Code đéo có thời gian tối ưu nên chậm lắm ################
    ############ Version 1.3 - Update: 3:03 24/02/2013    ################
    ############ Contact: huy@huynq.net                    ################
    ############ Mobile: 01668688310                       ################
    #######################################################################
-->
<!-- Menu -->
<?php include("menu.php"); ?>
<!-- /Menu -->

<?php $dem = 0; ?>
<div class="container-fluid">
    <!-- Container -->
    <div class="row-fluid">
        <!-- Responsive -->
        <div class="span12">
            <!-- 12 cols -->
            <?php
            if (isset($_GET['category']) || isset($_GET['pack'])) {
                #Category and display items#
                $catxx = "";
                if (isset($_GET['category'])) {
                    $catxx = "?category=" . $_GET['category'] . "&nitem";
                } elseif (isset($_GET['pack'])) {
                    $catxx = "?category=" . $_GET['pack'] . "&nitem";
                }
                ?>
                <?php include("eachcat.php"); ?>
				<?php } elseif(isset($_GET['view'])) { ?>
				<?php include("view.php"); ?>
                <?php } else { ?>
                <!-- Start homepage -->
                <?php $stat = stat("hp2.php"); ?>
                <!-- Breadcrumb -->
                <ul class="breadcrumb">
                    <li class="active">Home</li>
                </ul>
                <!-- /Breadcrumb -->

                <!-- Info vớ vẩn -->
                <h1>Choose Category</h1>
                <div class="alert alert-info">
                    <p><i class="icon-gift"></i> This is a gift for you <3</p>
                    <i class="icon-calendar"></i><em> Last
                    update:</em> <?php echo date('Y-m-d H:i:s', $stat['mtime']); ?>
					<div class="addthis_toolbox addthis_default_style">
					<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
					<a class="addthis_button_tweet"></a>
					<a class="addthis_button_pinterest_pinit"></a>
					<a class="addthis_counter addthis_pill_style"></a>
					</div>
					<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=naruto_thf90"></script>
					<script type="text/javascript">
					ch_fluidH = 1;
					ch_nump = "2";
					ch_client = "tapvietblog";
					ch_width = 300;
					ch_height = "auto";
					ch_type = "mpu";
					ch_sid = "Wallpapers";
					ch_color_site_link = "0000CC";
					ch_color_title = "0000CC";
					ch_color_border = "FFFFFF";
					ch_color_text = "000000";
					ch_color_bg = "FFFFFF";
					</script>
					<script src="http://scripts.chitika.net/eminimalls/amm.js" type="text/javascript">
					</script>
                </div>
                <!-- /Info vớ vẩn -->

                <!-- sucks -->
                <?php include("hp2.php"); ?>
                <?php } ?>
            <!-- /sucks -->

            <!-- Upload -->
            <div id="upload" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="UpForm"
                 aria-hidden="true">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 id="UpForm">Upload wallpapers</h3>
                </div>
                <div class="modal-body">
                    <p>Choose your file:</p>

                    <p><input type="file" name="file2up"></p>

                    <p>Enter name of category:</p>

                    <p><input type="text" name="cat" value="<?php if (isset($_GET['category'])) echo $loai; ?>"></p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary">Submit</button>
                </div>
            </div>
            <!-- /Upload -->

            <!-- Footer -->
            <?php include("footer.php"); ?>
            <?php
            $mtime = microtime();
            $mtime = explode(" ", $mtime);
            $mtime = $mtime[1] + $mtime[0];
            $endtime = $mtime;
            $totaltime = ($endtime - $starttime);
            echo "<!-- Process " . sprintf("%.4f", ($totaltime)) . " seconds -->";
            ?>
            <!-- /Footer -->
        </div>
        <!-- /12 cols -->
        <!-- Import fuck -->
        <script src="Resource/js/jquery.min.js" charset="utf-8"></script>
        <script src="Resource/js/jquery.lazyload.js?v=1.8.3" charset="utf-8"></script>
        <script src="Resource/bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="Resource/js/scrolltopcontrol.js"></script>
        <script type="text/javascript" charset="utf-8">
            $(function () {
                $("img").lazyload({
                    effect:"fadeIn"
                });
            });
        </script>
        <script type="text/javascript">
            $(document).ready(function () {
                $('html, body').delay(1000).animate({
                    scrollTop:$("#body").offset().top - 10
                }, 800);
            });
        </script>
		<script type="text/javascript">

		  var _gaq = _gaq || [];
		  _gaq.push(['_setAccount', 'UA-7053393-16']);
		  _gaq.push(['_setDomainName', 'huynq.net']);
		  _gaq.push(['_trackPageview']);

		  (function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		  })();

		</script>
		<div id="fb-root"></div>
		<script>(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=343615132410723";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));</script>
</body>
</html>