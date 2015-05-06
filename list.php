<?php
header('Content-type: text/html; charset=utf-8');

function listdir($dir='.') {
    if (!is_dir($dir))  return false;
    echo '<ul class="left-list">';
    listdiraux($dir);
    echo '</ul>';
}

function listdiraux($dir) {
    $handle = opendir($dir);
    while (($file = readdir($handle)) !== false) {
        if ($file == '.' || $file == '..')  continue;
        $filepath = $dir == '.' ? $file : $dir . '/' . $file;
        if (is_link($filepath)) continue;
        if (is_file($filepath)) {
            //chmod($filepath, 0777);
            // $s =split('.',$file);
            $name=iconv("BIG5", "UTF-8",$file);
            $s = split('\.', $name);
            echo '<li class="list-content" id="'.$name.'">'.$s[0].'</li>';
        }
        else if (is_dir($filepath)) {
            //chmod($filepath, 0777);

            $name=iconv("BIG5", "UTF-8",$file);
            echo '<li class="list-dir">'.$name;
            echo '<ol id="'.$name.'">';
            listdiraux($filepath);
            echo '</ol>';
            echo '</li>';
        }
    }
    closedir($handle);
}
//chmod('sub/9999.管理教學文件', 0755);
listdir('Sub');


?>