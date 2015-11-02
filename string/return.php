<?php

/**
 * 比较数组中id的大小，返回大的值
 *
 * @since 2015-10-21
 * @author jun
 * @param array $x
 * @param array $y
 * @return array
 *
 */
function parent_sort($x, $y)
{
	return ($x['parent_id'] > $y['parent_id']);
}

$list1 = array('parent_id'=>2);
$list2 = array('parent_id'=>6);
echo parent_sort($list1, $list2);

echo "\n";

echo parent_sort($list2, $list1);
