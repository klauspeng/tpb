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