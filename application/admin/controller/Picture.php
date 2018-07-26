<?php

namespace app\admin\controller;

use think\Controller;

class Picture extends Base
{

    /**
     * 编辑器上传的图片管理
     */
    public function pictureList()
    {
        $picture = my_scandir();
        $files = array();
        foreach ($picture as $k => $v) {
            if (is_array($v)) {
                foreach ($v as $k1 => $v1) {
                    $v1 = str_replace(PICTURE, HTTP_PICTURE, $v1);
                    $files[] = $v1;
                }
            } else {
                $v = str_replace(PICTURE, HTTP_PICTURE, $v);
                $files[] = $v;
            }
        }

        $this->assign([
            'files' => $files,
        ]);
        return view('pictureList');
    }

    /**
     * 图片删除
     */
    public function delimg()
    {
        $imgsrc = input('post.imgsrc');
        $imgsrcs = DEL_PICTURE . $imgsrc;

        if (file_exists($imgsrcs)) {
            if (@unlink($imgsrcs)) {
                echo 1;
            } else {
                echo 2;
            }
        } else {
            echo 3;
        }
    }
}