<?php
function getFiles($directory)
{
    if ($dir = opendir($directory)) {
        $tmp = Array();
        while ($file = readdir($dir)) {
            if ($file != "." && $file != ".." && $file[0] != '.') {
                if (is_dir($directory . "/" . $file)) {
                    $tmp2 = getFiles($directory . "/" . $file);
                    if (is_array($tmp2)) {
                        $tmp = array_merge($tmp, $tmp2);
                    }
                } else {
                    array_push($tmp, $directory . "/" . $file);
                }
            }
        }
        closedir($dir);
        return $tmp;
    }
}

$theFiles = getFiles("Animals");
sort($theFiles);

foreach ($theFiles as $v) {
    echo "<img src=" . $v . " />";
}
?>