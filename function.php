<?php// CURLfunction layanh($url){    $ch = curl_init();    curl_setopt($ch, CURLOPT_HEADER, 0);    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);    curl_setopt($ch, CURLOPT_URL, $url);    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);    $data = curl_exec($ch);    curl_close($ch);    return $data;}function getlink($url){ //"http://thepaperwall.com/category.php?action=catcontent&c=0&t=&r=&l=200&cat=b9852f3cb23163976c69d3587f43e4ad5ecbdf2f&page=1"    $html = layanh($url);    preg_match_all("'<span class=\"img_push\" style=\"height:78px\">(.*)</span>'si", $html, $match);    foreach ($match[1] as $val) {        #if (preg_match_all('/href="([^"]*)"/si', $val , $regs))        #{        #   $result = $regs[1];        #   echo substr($result, strlen("wallpaper.php?view="), strlen($result) );        #   echo "<br />";        #}#        #echo $val;        preg_match_all('@\\<a\\b[^\\>]+\\bhref\\s*=\\s*"([^"]*)"[^\\>]*\\>@i', $val, $matches);    }    $linkx = "";    foreach ($matches[1] as $val2) {        if (preg_match("/wallpaper.php/i", $val2)) {            $filename = substr($val2, strlen("wallpaper.php?view="), strlen($val2));            $linkx .= "http://thepaperwall.com/wallpaper.php?view=" . $filename . " ";            $arr = explode(" ", $linkx);        } elseif (preg_match("/wallpaper2.php/i", $val2)) {            $filename = substr($val2, strlen("wallpaper2.php?view="), strlen($val2));            $linkx .= "http://thepaperwall.com/wallpaper2.php?view=" . $filename . " ";            $arr = explode(" ", $linkx);        }    }    ;    //var_dump($arr);    return $arr;}function listanh($html){    preg_match_all('/ src="([^"]*)"/', $html, $match);    foreach ($match[1] as $val2) {        if (preg_match("/wallpapers/i", $val2)) {            $linkanh = "http://thepaperwall.com/" . $val2;        } elseif (preg_match("/wallpacks/i", $val2)) {            $linkanh = "http://thepaperwall.com/" . $val2;        }    }    ;    return $linkanh;}function saveanh($url){    $headers[] = 'Accept: image/gif, image/x-bitmap, image/jpeg, image/pjpeg';    $headers[] = 'Connection: Keep-Alive';    $headers[] = 'Content-type: application/x-www-form-urlencoded;charset=UTF-8';    $user_agent = 'php';    $process = curl_init($url);    curl_setopt($process, CURLOPT_HTTPHEADER, $headers);    curl_setopt($process, CURLOPT_HEADER, 0);    curl_setopt($process, CURLOPT_USERAGENT, $user_agent);    curl_setopt($process, CURLOPT_TIMEOUT, 30);    curl_setopt($process, CURLOPT_RETURNTRANSFER, 1);    curl_setopt($process, CURLOPT_FOLLOWLOCATION, 1);    $return = curl_exec($process);    curl_close($process);    return $return;}/*  function curl_download($Url){  // is cURL installed yet?  if (!function_exists('curl_init')){  die('Sorry cURL is not installed!');  }  // OK cool - then let's create a new cURL resource handle  $ch = curl_init();  // Now set some options (most are optional)  // Set URL to download  curl_setopt($ch, CURLOPT_URL, $Url);  // Set a referer  curl_setopt($ch, CURLOPT_REFERER, "http://www.example.org/yay.htm");  // User agent  curl_setopt($ch, CURLOPT_USERAGENT, "MozillaXYZ/1.0");  // Include header in result? (0 = yes, 1 = no)  curl_setopt($ch, CURLOPT_HEADER, 0);  // Should cURL return or print out the data? (true = return, false = print)  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  // Timeout in seconds  curl_setopt($ch, CURLOPT_TIMEOUT, 10);  // Download the given URL, and return output  $output = curl_exec($ch);  // Close the cURL resource, and free system resources  curl_close($ch);  return $output;  } */?>