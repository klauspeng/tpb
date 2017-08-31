<?php

/**
 * 无限极分类
 *
 * @param        $list
 * @param string $pk
 * @param string $pid
 * @param string $child
 * @param int    $root
 *
 * @return array
 */
function make_tree($list, $pk = 'id', $pid = 'pid', $child = '_child', $root = 0)
{
    $tree = array();
    foreach ($list as $key => $val)
    {

        if ($val[$pid] == $root)
        {
            //获取当前$pid所有子类
            unset($list[$key]);
            if (!empty($list))
            {
                $child = make_tree($list, $pk, $pid, $child, $val[$pk]);
                if (!empty($child))
                {
                    $val['_child'] = $child;
                }
            }
            $tree[] = $val;
        }
    }
    return $tree;
}

/**
 * 判断是否是移动端
 * @return bool
 */
function isMobile() {
    $mobile = array();
    static $mobilebrowser_list ='Mobile|iPhone|Android|WAP|NetFront|JAVA|OperasMini|UCWEB|WindowssCE|Symbian|Series|webOS|SonyEricsson|Sony|BlackBerry|Cellphone|dopod|Nokia|samsung|PalmSource|Xphone|Xda|Smartphone|PIEPlus|MEIZU|MIDP|CLDC';
    //note 获取手机浏览器
    if(preg_match("/$mobilebrowser_list/i", $_SERVER['HTTP_USER_AGENT'], $mobile)) {
        return true;
    }else{
        if(preg_match('/(mozilla|chrome|safari|opera|m3gate|winwap|openwave)/i', $_SERVER['HTTP_USER_AGENT'])) {
            return false;
        }else{
            if($_GET['mobile'] === 'yes') {
                return true;
            }else{
                return false;
            }
        }
    }
}