<ul class="breadcrumb">
    <li><a href="http://wallpaper.huynq.net/">Home</a> <span class="divider">/</span></li>
    <li class="active"><?= $loai ?></li>
</ul>
<h1><?= $loai ?></h1>
<div class="alert alert-success">
    <p>
        <i class="icon-gift"></i> <?php echo "There are <span class=\"badge badge-important\">" . $numfile . "</span> wallpapers in this category."; ?>
    </p>

    <p><i class="icon-cog"></i><em> Setting:</em> Display <a href='<?= $catxx ?>=20'><strong>20</strong></a> | <a
            href='<?= $catxx ?>=40'><strong>40</strong></a> | <a href='<?= $catxx ?>=60'><strong>60</strong></a> | <a
            href='<?= $catxx ?>=100'><strong>100</strong></a> items each page. Now <span
            class="badge badge-success"><?= $limit ?></span> wallpapers/page.</p>
    <p><i class="icon-calendar"></i><em> Last update:</em> <?php echo date('Y-m-d H:i:s', $stat['mtime']); ?></p>
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
<!--<div class="row-fluid">-->
<ul class="thumbnails">
    <div class="span1"></div>
	<?php 
	function full_url() {
    $s = empty($_SERVER["HTTPS"]) ? '' : ($_SERVER["HTTPS"] == "on") ? "s" : "";
    $sp = strtolower($_SERVER["SERVER_PROTOCOL"]);
    $protocol = substr($sp, 0, strpos($sp, "/")) . $s;
    $port = ($_SERVER["SERVER_PORT"] == "80") ? "" : (":" . $_SERVER["SERVER_PORT"]);
    return $protocol . "://" . $_SERVER['SERVER_NAME'] . $port . $_SERVER['REQUEST_URI'];
	}
	$fullurl = full_url();
	?>
<?php foreach ($files_per_page as $key => $file) : ?>
    <?php
    $dem++;
    $basename = $files_info[$key]["basename"];
    $filename = $files_info[$key]["filename"];
    $extension = $files_info[$key]["extension"];
    $size = $files_info[$key]["size"];
    $link = $thumuc . "/" . $basename;
    $stat2 = stat($link);
    /*
      + <?=$basename;?>: Tên tập tin có phần mở rộng
      + <?=$filename;?>: Tên tập tin không có phần mở rộng
      + <?=$extension;?>: Phần mở rộng của tập tin
      + <?=$size;?>: Kích thước của tập tin
      + <?=$link;?>: Liên kết của tập tin
     */
    list($width, $height, $type, $attr) = getimagesize($link);
	
	$_SESSION['namecat'] = $loai;
	$_SESSION['idcat'] = $_GET['category'];
    ?>

    <li class="span2">
        <div class="thumbnail">
            <a href='index.php?view=<?=$link?>' target="_blank"><img src='Resource/img/grey.gif'
                                                         data-original="rs.php?src=<?= $link; ?>&w=200&h=200"
                                                         alt="Click to see real size: <?= $basename; ?>"/></a>
            <h5 align="center"><?php echo $width . "x" . $height . " - " . $size; ?></h5>

            <p><span class="label label-info">Upload <?php echo date('Y-m-d', $stat2['mtime']); ?></span></p>
        </div>
    </li>
    <?php if ($dem % 5 === 0) { ?>
        <div class="span1"></div>
        </ul>
        <ul class="thumbnails">
            <div class="span1"></div>
        <?php } ?>
    <?php endforeach; ?>
    <div class="span1"></div>
</ul>
<div class="row-fluid">
<div class="span2"></div>
<div class="span8">
	<div class="fb-comments" data-href="<?=$fullurl?>" data-width="800" data-num-posts="10"></div>
</div>
<div class="span2"></div>
</div>
<?= $pagination
; ?>
<div id="buy" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="DownAll" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="DownAll">Get All Wallpapers in 1 Zip file with $1</h3>
    </div>
    <div class="modal-body">
        <p>We will create a zip file and send a download link to the email you provided.</p>
        <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
            <input type="hidden" name="cmd" value="_s-xclick">
            <input type="hidden" name="hosted_button_id" value="UCZ6DRYJXXEH2">
            <table>
                <tr>
                    <td><input type="hidden" name="on0" value="You want to download all this category:">You want to
                        download all this category:
                    </td>
                </tr>
                <tr>
                    <td><input type="text" name="os0" maxlength="200" value="<?=$loai?>"></td>
                </tr>
            </table>
            <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_paynowCC_LG.gif" border="0"
                   name="submit" alt="PayPal - The safer, easier way to pay online!">
            <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
        </form>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    </div>
</div>