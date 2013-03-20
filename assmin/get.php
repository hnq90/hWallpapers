<?php
$mtime = microtime();
$mtime = explode(" ", $mtime);
$mtime = $mtime[1] + $mtime[0];
$starttime = $mtime;
?>

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

function getlink($url)
{ //"http://thepaperwall.com/category.php?action=catcontent&c=0&t=&r=&l=200&cat=b9852f3cb23163976c69d3587f43e4ad5ecbdf2f&page=1"
    $html = layanh($url);
    preg_match_all("'<span class=\"img_push\">(.*)</span>'si", $html, $match);
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
            $linkanh = "http://thepaperwall.com" . $val2;
        } elseif (preg_match("/wallpacks/i", $val2)) {
            $linkanh = "http://thepaperwall.com" . $val2;
        }
    }
    ;
    return $linkanh;
}

function saveanh($url)
{
    $headers[] = 'Accept: image/gif, image/x-bitmap, image/jpeg, image/pjpeg';
    $headers[] = 'Connection: Keep-Alive';
    $headers[] = 'Content-type: application/x-www-form-urlencoded;charset=UTF-8';
    $user_agent = 'php';
    $process = curl_init($url);
    curl_setopt($process, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($process, CURLOPT_HEADER, 0);
    curl_setopt($process, CURLOPT_USERAGENT, $user_agent);
    curl_setopt($process, CURLOPT_TIMEOUT, 30);
    curl_setopt($process, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($process, CURLOPT_FOLLOWLOCATION, 1);
    $return = curl_exec($process);
    curl_close($process);
    return $return;
}

##                                   ##
## Get ảnh từ trang thepaperwall.com ##
##                                   ##

if ($_POST['password'] === "lon") {
    if (isset($_POST['foldername']) && $_POST['type'] === "createfolder") {
        $foldername = "../" . $_POST['foldername'];
        if (!is_dir($foldername)) {
            mkdir($foldername);
            chmod($foldername, 0755);
        }
    }

    #Valid form
    if (isset($_POST['url']) && isset($_POST['from']) && isset($_POST['to']) && $_POST['type'] === "getimages") {

        #include function
        #require("function.php");

        #Create folder and chmod 755
        if (isset($_POST['folder'])) {
            $folder_name = "../" . $_POST['folder'];
        } else {
            $folder_name = "../downloads";
        }

        #Nếu chưa có thì tạo folder mới.
        if (!is_dir($folder_name)) {
            //echo $folder_name;
            mkdir($folder_name);
            chmod($folder_name, 0755);
        }
        //echo $folder_name;

        #Gán biến linh tinh
        $url = $_POST['url'];
        $from = $_POST['from'];
        $to = $_POST['to'];

        #Get link ảnh
        $all = array();
        $dem = 0;
        //echo "1";
        for ($i = $from; $i <= $to; $i++) {
            $dem++;
            $a = "list" . $dem;
            $$a = array();
            $url2 = $url . "&page=$i";
            $abc = getlink($url2);
            //$count = 0;
            foreach ($abc as $cave) {
                //$count++;
                $htmlx = layanh($cave);
                $imgurl = listanh($htmlx);
                /*
                $imagename = basename($imgurl);
                $filename = $folder_name."/".$imagename;
                if (file_exists($filename)) {
                    echo $count." ".$imgurl." Exist <br />";
                } else {
                    $image = saveanh($imgurl);
                    file_put_contents($folder_name."/".$imagename, $image);
                    echo $count." ".$imgurl." - Done ".$folder_name." <br />";
                }
                //$imagename = basename($imgurl);
                */
                array_push($$a, $imgurl);
            }
            $url2 = $url;
            $$a = array_diff($$a, array(''));
            //$$a = array_reverse($$a, TRUE);
            $all = array_merge($all, $$a);
            //print_r($$a);
            //echo " - DONE Page ".$i." - <br />";
        }
        $all = array_reverse($all, TRUE);
        //print_r($all);
        //unset($listanh[count($listanh)-1]);
        //Đảo ngược lại array cho thuật toán save ảnh
        //$listanh = array_reverse($listanh, TRUE);
        //print_r($listanh);
        /*$xx = 0;
        foreach ($all as $anh) {
            $xx++;
            echo $xx." ".$anh."<br />";
        }
        $xx2 = 0;
        $listanh2 = array_diff($listanh, array(''));
        foreach ($listanh2 as $anh2) {
            $xx2++;
            echo $xx2." ".$anh2."<br />";
        }*/
        //echo "2";

        #Đến phần save ảnh#
        #Vui quá, cuối cùng cũng xong cái này :))#
        $count = 0;
        $ii = 0;
        foreach ($all as $anh) {
            $count++;
            //echo $count." ".$anh."<br />";
            $imagename = basename($anh);
            $filename = $folder_name . "/" . $imagename;
            if (file_exists($filename)) {
                echo $count . " " . $anh . " Exist <br />";
            } else {
                $image = saveanh($anh);
                file_put_contents($folder_name . "/" . $imagename, $image);
                echo $count . " " . $anh . " - Done " . $folder_name . " <br />";
                if ($count >= 200 && $count % 200 == 0) {
                    $ii++;
                    echo "Done page " . $ii . "<br />";
                }
            }
        }
    }
} else {
    echo "Fuck you";
}
?>

<?php
$mtime = microtime();
$mtime = explode(" ", $mtime);
$mtime = $mtime[1] + $mtime[0];
$endtime = $mtime;
$totaltime = ($endtime - $starttime);
echo "<br />Runtime " . sprintf("%.4f", ($totaltime)) . " seconds";
echo "<br /><a href=\"get.html\">Get Again?</a>";
?>