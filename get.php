<?php
$mtime = microtime();
$mtime = explode(" ", $mtime);
$mtime = $mtime[1] + $mtime[0];
$starttime = $mtime;
?>

<?php
##                                   ##
## Get ảnh từ trang thepaperwall.com ##
##                                   ##

if ($_POST['password'] === "lon") {
    if (isset($_POST['foldername']) && $_POST['type'] === "createfolder") {
        $foldername = $_POST['foldername'];
        if (!is_dir($foldername)) {
            mkdir($foldername);
            chmod($foldername, 0755);
        }
    }

    #Valid form
    if (isset($_POST['url']) && isset($_POST['from']) && isset($_POST['to']) && $_POST['type'] === "getimages") {

        #include function
        //include("function.php");

        #Create folder and chmod 755
        if (isset($_POST['folder'])) {
            $folder_name = $_POST['folder'];
        } else {
            $folder_name = "downloads";
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

        #Get và save ảnh
        for ($i = $from; $i <= $to; $i++) {
            $url2 = $url . "&page=$i";
            $abc = getlink($url2);
            $count = 0;
            foreach ($abc as $cave) {
                $count++;
                $htmlx = layanh($cave);
                $imgurl = listanh($htmlx);
                $imagename = basename($imgurl);
                $filename = $folder_name . "/" . $imagename;
                if (file_exists($filename)) {
                    echo $count . " " . $imgurl . " Exist <br />";
                } else {
                    $image = saveanh($imgurl);
                    file_put_contents($folder_name . "/" . $imagename, $image);
                    echo $count . " " . $imgurl . " - Done " . $folder_name . " <br />";
                }
                //$imagename = basename($imgurl);

            }
            ;
            $url2 = $url;
            echo " - DONE Page " . $i . " - <br />";
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
echo "<br /><a href=\"http://huynq.net/code/wallpapers/get.html\">Get Again?</a>";
?>