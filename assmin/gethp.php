<?php

// CURL
function layanh($url)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    $data = curl_exec($ch);
    curl_close($ch);
    return $data;
}

/*for($i=1;$i<=33;$i++) {
	$html = layanh("http://wallpaper.huynq.net/index.php?category=$i");
	preg_match("'data-original=\"(.*)&w=200&h=180\"'i", $html, $match);
	echo $match[1]."<br />";
}*/
$hp = "";
for ($i = 1; $i <= 33; $i++) {
    $html = layanh("http://wallpaper.huynq.net/index.php?category=$i");
    preg_match("'data-original=\"(.*)&w=200&h=200\"'i", $html, $match);
    preg_match("'<h1>(.*)</h1>'si", $html, $match2);
    if ($i == 1 || $i == 6 || $i == 11 || $i == 16 || $i == 21 || $i == 26) {
        $hp .= "<div class=\"row-fluid\">
			<div class=\"span1\"></div>
			<div class=\"span2\">
			<p><a href=\"index.php?category=" . $i . "\"><img src=\"" . $match[1] . "&w=200&h=200\" class=\"img-circle\" /></a></p>
			<p><span class=\"label label-important\">" . $match2[1] . "</span></p></div>\n";
    } elseif ($i == 5 || $i == 10 || $i == 15 || $i == 20 || $i == 25 || $i == 30) {
        $hp .= "<div class=\"span2\">
			<p><a href=\"index.php?category=" . $i . "\"><img src=\"" . $match[1] . "&w=200&h=200\" class=\"img-circle\" /></a></p>
			<p><span class=\"label label-important\">" . $match2[1] . "</span></p></div><div class=\"span1\"></div></div>\n";
    } elseif ($i == 31) {
        $hp .= "<div class=\"row-fluid\">
			<div class=\"span3\"></div>
			<div class=\"span2\">
			<p><a href=\"index.php?category=" . $i . "\"><img src=\"" . $match[1] . "&w=200&h=200\" class=\"img-circle\" /></a></p>
			<p><span class=\"label label-important\">" . $match2[1] . "</span></p></div>\n";
    } elseif ($i == 33) {
        $hp .= "<div class=\"span2\">
			<p><a href=\"index.php?category=" . $i . "\"><img src=\"" . $match[1] . "&w=200&h=200\" class=\"img-circle\" /></a></p>
			<p><span class=\"label label-important\">" . $match2[1] . "</span></p></div><div class=\"span3\"></div></div>\n";
    } else {
        $hp .= "<div class=\"span2\">
			<p><a href=\"index.php?category=" . $i . "\"><img src=\"" . $match[1] . "&w=200&h=200\" class=\"img-circle\" /></a></p>
			<p><span class=\"label label-important\">" . $match2[1] . "</span></p></div>\n";
    }
}
$hp .= "<hr />
		<h2>Awesome Wallpaper Packs</h2>
		<table class=\"table table-hover\">
		<tr>
		<td><a href=\"index.php?pack=1\"><strong>Animal Sleep</strong></a></td>
		<td><a href=\"index.php?pack=2\"><strong>Long Exposure Waterfall</strong></a></td>
		<td><a href=\"index.php?pack=3\"><strong>Motivational</strong></a></td>
		<td><a href=\"index.php?pack=4\"><strong>Small World</strong></a></td>
		</tr>
		<tr>
		<td><a href=\"index.php?pack=5\"><strong>Star Trails</strong></a></td>
		<td><a href=\"index.php?pack=6\"><strong>Stormy</strong></a></td>
		<td><a href=\"index.php?pack=7\"><strong>Timelapse</strong></a></td>
		<td><a href=\"index.php?pack=8\"><strong>Victoria's Secret Angel I</strong></a></td>
		</tr>
		<tr>
		<td><a href=\"index.php?pack=9\"><strong>Victoria's Secret Angel II</strong></a></td>
		<td><a href=\"index.php?pack=10\"><strong>Victoria's Secret Angel III</strong></a></td>
		<td><a href=\"index.php?pack=11\"><strong>Most Downloaded</strong></a></td>
		<td><a href=\"index.php?pack=12\"><strong>WaterDrop</strong></a></td>
		</tr>
		<tr>
		<td><a href=\"index.php?pack=13\"><strong>Zombies</strong></a></td>
		</tr>
		</table>";

$my_file = '../hp2.php';
$handle = fopen($my_file, 'w') or die('Cannot open file:  ' . $my_file);
$data = $hp;
fwrite($handle, $data);
fclose($handle);
?>
<?php

function getlink($url)
{
    $html = layanh($url);
    preg_match_all("'<span class=\"img_push\" style=\"height:78px\">(.*)</span>'si", $html, $match);
    foreach ($match[1] as $val) {
        #if (preg_match_all('/href="([^"]*)"/si', $val , $regs))
        #{
        #   $result = $regs[1];
        #   echo substr($result, strlen("wallpaper.php?view="), strlen($result) );
        #   echo "<br />";
        #}#
        #echo $val;
        preg_match_all('@\\<a\\b[^\\>]+\\bhref\\s*=\\s*"([^"]*)"[^\\>]*\\>@i', $val, $matches);
    }
    $linkx = "";
    foreach ($matches[1] as $val2) {
        if (preg_match("/wallpaper.php/i", $val2)) {
            $filename = substr($val2, strlen("wallpaper.php?view="), strlen($val2));
            $linkx .= "http://thepaperwall.com/wallpaper.php?view=" . $filename . " ";
            $arr = explode(" ", $linkx);
        } elseif (preg_match("/wallpaper2.php/i", $val2)) {
            $filename = substr($val2, strlen("wallpaper2.php?view="), strlen($val2));
            $linkx .= "http://thepaperwall.com/wallpaper2.php?view=" . $filename . " ";
            $arr = explode(" ", $linkx);
        }
    }
    ;
    //var_dump($arr);
    return $arr;
}

function listanh($html)
{
    preg_match_all('/ src="([^"]*)"/', $html, $match);
    foreach ($match[1] as $val2) {
        if (preg_match("/wallpapers/i", $val2)) {
            $linkanh = "http://thepaperwall.com/" . $val2;
        } elseif (preg_match("/wallpacks/i", $val2)) {
            $linkanh = "http://thepaperwall.com/" . $val2;
        }
    }
    ;
    return $linkanh;
}

?>