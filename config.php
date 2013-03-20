<?php
session_start();

##Get INFO############
##print_r($_SERVER);##
######################

if (isset($_GET['category']) || isset($_GET['pack'])) {
    $catnpage = "";
    if (isset($_GET['pack'])) {
        $pack = $_GET['pack'];
        $catnpage = "?pack=" . $pack . "&page=";
        switch ($pack) {
            case 1:
                $thumuc = "Packs/Animal_Sleep";
                $loai = "Animal Sleep";
                break;
            case 2:
                $thumuc = "Packs/Long_Exposure_Waterfall";
                $loai = "Long Exposure Waterfall";
                break;
            case 3:
                $thumuc = "Packs/Motivational";
                $loai = "Motivational";
                break;
            case 4:
                $thumuc = "Packs/Small_World";
                $loai = "Small World";
                break;
            case 5:
                $thumuc = "Packs/Star_Trails";
                $loai = "Star Trails";
                break;
            case 6:
                $thumuc = "Packs/Stormy";
                $loai = "Stormy";
                break;
            case 7:
                $thumuc = "Packs/Timelapse";
                $loai = "Timelapse";
                break;
            case 8:
                $thumuc = "Packs/Victoria_Secret1";
                $loai = "Victoria's Secret Angel I";
                break;
            case 9:
                $thumuc = "Packs/Victoria_Secret2";
                $loai = "Victoria's Secret Angel II";
                break;
            case 10:
                $thumuc = "Packs/Victoria_Secret3";
                $loai = "Victoria's Secret Angel III";
                break;
            case 11:
                $thumuc = "Packs/Wallpaper_Of_The_Day";
                $loai = "Most Downloaded";
                break;
            case 12:
                $thumuc = "Packs/WaterDrop";
                $loai = "Water Drop";
                break;
            case 13:
                $thumuc = "Packs/Zombies";
                $loai = "Zombies";
                break;
            default:
                header("Location: http://wallpaper.huynq.net/");
                break;
        }
    }
    if (isset($_GET['category'])) {
        $category = $_GET['category'];
        $catnpage = "?category=" . $category . "&page=";
        switch ($category) {
            case 1:
                $thumuc = "Animals";
                $loai = "Animals";
                break;
            case 2:
                $thumuc = "Architecture";
                $loai = "Architecture";
                break;
            case 3:
                $thumuc = "Bikes";
                $loai = "Bikes";
                break;
            case 4:
                $thumuc = "Cars";
                $loai = "Cars";
                break;
            case 5:
                $thumuc = "Cartoon_Comic";
                $loai = "Cartoon/Comic";
                break;
            case 6:
                $thumuc = "CityScape";
                $loai = "CityScape";
                break;
            case 7:
                $thumuc = "Computer_Tech";
                $loai = "Computer/Tech";
                break;
            case 8:
                $thumuc = "Digital_Artwork";
                $loai = "Digital/Artwork";
                break;
            case 9:
                $thumuc = "Fantasy";
                $loai = "Fantasy";
                break;
            case 10:
                $thumuc = "Food_Drink";
                $loai = "Food/Drink";
                break;
            case 11:
                $thumuc = "Girls";
                $loai = "Girls";
                break;
            case 12:
                $thumuc = "Guns";
                $loai = "Guns";
                break;
            case 13:
                $thumuc = "Holiday";
                $loai = "Holiday";
                break;
            case 14:
                $thumuc = "Humor";
                $loai = "Humor";
                break;
            case 15:
                $thumuc = "Industrial";
                $loai = "Industrial";
                break;
            case 16:
                $thumuc = "Informational";
                $loai = "Informational";
                break;
            case 17:
                $thumuc = "Insect";
                $loai = "Insect";
                break;
            case 18:
                $thumuc = "Love_Hate";
                $loai = "Love";
                break;
            case 19:
                $thumuc = "Misc";
                $loai = "Misc";
                break;
            case 20:
                $thumuc = "Mobile";
                $loai = "Mobile";
                break;
            case 21:
                $thumuc = "Movie";
                $loai = "Movie";
                break;
            case 22:
                $thumuc = "Music";
                $loai = "Music";
                break;
            case 23:
                $thumuc = "Nature";
                $loai = "Nature";
                break;
            case 24:
                $thumuc = "People";
                $loai = "People";
                break;
            case 25:
                $thumuc = "Quotes_Words";
                $loai = "Words";
                break;
            case 26:
                $thumuc = "Science";
                $loai = "Science";
                break;
            case 27:
                $thumuc = "SciFi";
                $loai = "Sci-Fi";
                break;
            case 28:
                $thumuc = "Space";
                $loai = "Space";
                break;
            case 29:
                $thumuc = "Sport";
                $loai = "Sport";
                break;
            case 30:
                $thumuc = "Television";
                $loai = "Television";
                break;
            case 31:
                $thumuc = "Video_Games";
                $loai = "Video Games";
                break;
            case 32:
                $thumuc = "Vintage";
                $loai = "Vintage";
                break;
            case 33:
                $thumuc = "War";
                $loai = "War";
                break;
            default:
                header("Location: http://wallpaper.huynq.net/");
                break;
        }
    }


    function curPage()
    {
        $url = $_SERVER['REQUEST_URI']; //returns the current URL
        $parts = explode('/', $url);
        $dir = $_SERVER['SERVER_NAME'];
        for ($i = 0; $i < count($parts) - 1; $i++) {
            $dir .= $parts[$i] . "/";
        }
        return $dir;
    }

    /*
    function getexts() {
        //list acceptable file extensions here 
        return '(jpg|png|gif|jpeg|bmp)';
    }

    function isfile($file) {
        return preg_match('/^[^.^:^?^\-][^:^?]*\.(?i)' . getexts() . '$/', $file);
        //first character cannot be . : ? - subsequent characters can't be a : ? 
        //then a . character and must end with one of your extentions 
        //getexts() can be replaced with your extentions pattern 
    }*/

    #Exclude folder#
    $exclude_list = array(".", "..", ".htaccess", "");

    #Allow extensions#
    $allow_extensions = array("jpg", "png", "gif", "jpeg", "bmp");

    #Filter folder#
    $directories = array_diff(scandir($thumuc), $exclude_list);

    $i = 0;
    //echo count($directories);
    foreach ($directories as $entry) {
        if (is_file($thumuc . "/" . $entry)) {
            $files[$i] = $thumuc . "/" . $entry;
            $i++;
        }
    }
    unset($entry);

    #Calculate size#
    function _format_bytes($a_bytes)
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

    #Filter Files#
    $i = 0;
    foreach ($files as $file) {
        //-- Xác định phần mở rộng của tập tin
        $extension = explode(".", $file);
        $extension = strtolower($extension[count($extension) - 1]);
        if (in_array($extension, $allow_extensions)) {
            $filelist[filemtime($file) . '_' . substr(md5($file), 0, 5)] = $file;
            //$filelist[$i][file] = $file;
            //$filelist[$i][time] = filemtime($file);
            $i++;
        }
    }
    ksort($filelist);
    $filelist = array_reverse($filelist, TRUE);
    $numfile = count($filelist);
    unset($file);

    #Get Size Info#
    foreach ($filelist as $key => $file) {
        $temp = pathinfo($file);
        $filelist_info[$key]["basename"] = $temp["basename"]; //Name with extension
        $filelist_info[$key]["filename"] = $temp["filename"]; //Name without extension
        $filelist_info[$key]["extension"] = strtolower($temp["extension"]); //Extension
        $filelist_info[$key]["size"] = _format_bytes(filesize($file)); //Size
    }
    unset($key);
    unset($file);

    #Pagination#
    $adjacents = 2; //Before and after current

    #Display items#
    if (isset($_GET['nitem']) && $_GET['nitem'] <= 100 && $_GET['nitem'] >= 20) {
        $_SESSION['nitem'] = $_GET['nitem'];
        $limit = $_SESSION['nitem'];
    } else if (isset($_SESSION['nitem'])) {
        $limit = $_SESSION['nitem'];
    } else {
        $limit = 20;
    }

    #Page#
    $page = $_GET['page'];
    if ($page)
        $start = ($page - 1) * $limit;
    else
        $start = 0;
    $files_per_page = array_slice($filelist, $start, $limit);
    $files_info = array_slice($filelist_info, $start, $limit);
    $total_files = count($filelist);
    if ($page == 0)
        $page = 1;
    $prev = $page - 1;
    $next = $page + 1;
    $lastpage = ceil($total_files / $limit);

    $pagination = "";
    if ($lastpage > 1) {
        $pagination .= "<div class='pagination pagination-centered'> <ul>";
        if ($lastpage < 7 + ($adjacents * 2)) {
            for ($counter = 1; $counter <= $lastpage; $counter++) {
                if ($counter == $page)
                    $pagination .= " <li class='active'><a href=\"#\">$counter</a></li> ";
                else
                    $pagination .= " <li class=\"\"><a href='$catnpage$counter'>$counter</a></li> ";
            }
        } elseif ($lastpage > 5 + ($adjacents * 2)) {
            if ($page < 1 + ($adjacents * 2)) {
                for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++) {
                    if ($counter == $page)
                        $pagination .= " <li class='active'><a href=\"#\">$counter</a></li> ";
                    else
                        $pagination .= " <li class=\"\"><a href='$catnpage$counter'>$counter</a></li> ";
                }
                $pagination .= "<li class='disabled'><a href=\"#\">...</a></li>";
                $pagination .= " <li class=\"\"><a href='$catnpage$lastpage'>$lastpage</a></li> ";
            } elseif ($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2)) {
                $pagination .= "<li class=\"\"><a href='?category=$category'>1</a></li>";
                $pagination .= "<li class='disabled'><a href=\"#\">...</a></li>";
                for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++) {
                    if ($counter == $page)
                        $pagination .= "<li class='active'><a href=\"#\">$counter</a></li>";
                    else
                        $pagination .= "<li class=\"\"><a href='$catnpage$counter'>$counter</a></li>";
                }
                $pagination .= "<li class='disabled'><a href=\"#\">...</a></li>";
                $pagination .= "<li class=\"\"><a href='$catnpage$lastpage'>$lastpage</a></li>";
            } else {
                $pagination .= "<li class=\"\"><a href='?category=$category'>1</a></li>";
                $pagination .= "<li class='disabled'><a href=\"#\">...</a></li>";
                for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++) {
                    if ($counter == $page)
                        $pagination .= "<li class='active'><a href=\"#\">$counter</a></li>";
                    else
                        $pagination .= "<li class=\"\"><a href='$catnpage$counter'>$counter</a></li>";
                }
            }
        }
        $pagination .= " </ul></div>";
    }

    if ($page == 1)
        $canonical = $root_uri;
    else
        $canonical = $root_uri . "?page=" . $page;

    if ($page == 1)
        $link_next_prev = "<link rel='next' title='" . $title . " — Trang " . ($page + 1) . "' href='" . $root_uri . "?page=" . ($page + 1) . "' />";
    elseif ($page == $lastpage)
        $link_next_prev = "<link rel='prev' title='" . $title . " — Trang " . ($page - 1) . "' href='" . $root_uri . "?page=" . ($page + 1) . "' />"; else
        $link_next_prev = "<link rel='prev' title='" . $title . " — Trang " . ($page - 1) . "' href='" . $root_uri . "?page=" . ($page + 1) . "' />\n\t\t<link rel='next' title='" . $title . " — Trang " . ($page + 1) . "' href='" . $root_uri . "?page=" . ($page + 1) . "' />";

    if ($page != 1)
        $title .= " — Trang " . $page;

    $root_uri = "http://" . curPage();

    $title = $loai . " | hWallpapers - Up to 80K HD Wallpapers";

    $stat = stat($thumuc);

} else {
    $title = "hWallpapers - Up to 80K HD Wallpapers";
}

$keywords = "Animals, Bikes, Architecture, Cars, Cartoon/Comic, CityScape, Computer/Tech, Digital/Artwork, Fantasy, Food/Drink, Girls, Guns, Holiday, Humor, Industrial, Informational, Insect, Love, Mobile, Movie, Nature,People, Quotes, Science, Sport, TV, Video Games, Space, Wars, Vintage";
$description = "HD Wallpapers of these categories: Animals, Bikes, Architecture, Cars, Cartoon/Comic, CityScape, Computer/Tech, Digital/Artwork, Fantasy, Food/Drink, Girls, Guns, Holiday, Humor, Industrial, Informational, Insect, Love, Mobile, Movie, Nature,People, Quotes, Science, Sport, TV, Video Games, Space, Wars, Vintage";
?>