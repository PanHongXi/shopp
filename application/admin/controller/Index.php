<?php
namespace app\admin\controller;

class Index extends Base
{
    public function index()
    {
        return view('index');
    }

    //清空缓存
    public function clearCache()
    {
        if (cache(null)) {
            return alert('清理缓存成功！', 'index', 6, 3);
        } else {
            return alert('清理缓存失败!', 'index', 5, 3);
        }
    }
}
