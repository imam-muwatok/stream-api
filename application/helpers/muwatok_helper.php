<?php
// defined('BASEPATH') OR exit('No direct script access allowed');

function folderExist() {
    $dir = 'storage';
    if(is_dir($dir) == false) {
        makeDir($dir);
    }

}

function readFolder($dir) {
    $allFiles = scandir($dir); // Or any other directory
    $files = array_diff($allFiles, array('.', '..'));
    return $files;
}

function makeDir($path)
{
    $ret = mkdir($path, 0777, true); // use @mkdir if you want to suppress warnings/errors
    return $ret === true || is_dir($path);
}

function viewRoot() {
    $datas= readFolder('application/storage/demo');
    
    foreach ($datas as $data) {
        $ext = pathinfo($data, PATHINFO_EXTENSION);
        if (is_dir('./storage/'.$data)) {
            echo '<div class="folder p-1">
                        <img src="'. base_url('system-assets').'/img/file_icon/icon_file/folder.png" alt=""  width="38px">
                        <P class="text-center">'.$data.'</P>
                </div>';
            } else {
            echo '<div class="folder p-1">
                    <img src="'. base_url('system-assets').'/img/file_icon/icon_file/'.$ext.'.png" alt="" width="38px">
                        <P class="text-center">'.$data.'</P>
                    </div>';
            }
        }

}

function viewImage() {
    $datas= folderRoot('./storage/demo/image');

    foreach ($datas as $data) {
        $ext = pathinfo($data, PATHINFO_EXTENSION);
        if (is_dir('./storage/'.$data)) {
            echo '<div class="folder p-1">
                        <img src="'. base_url('system-assets').'/img/file_icon/icon_file/folder.png" alt=""  width="38px">
                        <P class="text-center">'.$data.'</P>
                </div>';
            } else {
            echo '<div class="folder p-1">
                    <img src="'. base_url('system-assets').'/img/file_icon/icon_file/'.$ext.'.png" alt="" width="38px">
                        <P class="text-center">'.$data.'</P>
                    </div>';
            }
        }

}