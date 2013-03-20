<?php
	##########################
	####Code view tung anh####
	##########################
	function full_url() {
    $s = empty($_SERVER["HTTPS"]) ? '' : ($_SERVER["HTTPS"] == "on") ? "s" : "";
    $sp = strtolower($_SERVER["SERVER_PROTOCOL"]);
    $protocol = substr($sp, 0, strpos($sp, "/")) . $s;
    $port = ($_SERVER["SERVER_PORT"] == "80") ? "" : (":" . $_SERVER["SERVER_PORT"]);
    return $protocol . "://" . $_SERVER['SERVER_NAME'] . $port . $_SERVER['REQUEST_URI'];
	}

	function _format_bytes2($a_bytes)
    {
        if ($a_bytes < 1024) {
            return $a_bytes . ' B';
        } elseif ($a_bytes < 1048576) {
            return round($a_bytes / 1024, 2) . ' KB';
        } elseif ($a_bytes < 1073741824) {
            return round($a_bytes / 1048576, 2) . ' MB';
        } elseif ($a_bytes < 1099511627776) {
            return round($a_bytes / 1073741824, 2) . ' GB';
        } elseif ($a_bytes < 1125899906842624) {
            return round($a_bytes / 1099511627776, 2) . ' TB';
        } elseif ($a_bytes < 1152921504606846976) {
            return round($a_bytes / 1125899906842624, 2) . ' PB';
        } elseif ($a_bytes < 1180591620717411303424) {
            return round($a_bytes / 1152921504606846976, 2) . ' EB';
        } elseif ($a_bytes < 1208925819614629174706176) {
            return round($a_bytes / 1180591620717411303424, 2) . ' ZB';
        } else {
            return round($a_bytes / 1208925819614629174706176, 2) . ' YB';
        }
    }
	$file = $_GET['view'];
	list($width, $height, $type, $attr) = getimagesize($file);
	$stat3 = stat($file);
	//echo $file;
	$link = "http://wallpaper.huynq.net/".$file;
	$size = _format_bytes2(filesize($file));
	//echo $link;
	$loai = $_SESSION['namecat'];
	$idloai = $_SESSION['idcat'];
	$fullurl = full_url();
	?>
<ul class="breadcrumb">
    <li><a href="http://wallpaper.huynq.net/">Home</a> <span class="divider">/</span></li>
    <li><a href="index.php?category=<?=$idloai?>"/><?=$loai?></a> <span class="divider">/</span></li>
	<li class="active">View Image</li>
</ul>
<div class="alert alert-info">
                    <p><i class="icon-picture"></i> Original size is <?php echo $width."x".$height." - ".$size; ?></p>
                    <p><i class="icon-calendar"></i> Uploaded: <?php echo date('Y-m-d H:i:s', $stat3['mtime']); ?></p>
					<p><i class="icon-download-alt"></i> Click image to download.</p>
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
<div class="row-fluid">
    <div class="span1"></div>
	
	<div class="span10">
    <p class="noonetouchme"><a href="<?=$link;?>" target='_blank' download="<?=$file;?>"><img src="rs.php?src=<?=$link;?>&w=1000"/></a></p>	
	</div>
	<div class="span1"></div>
</div>
<div class="row-fluid">
<div class="span2"></div>
<div class="span8">
	<div class="fb-comments" data-href="<?=$fullurl?>" data-width="800" data-num-posts="10"></div>
</div>
<div class="span2"></div>
</div>