<?php
header('content-type:text/html;charset=utf-8');
echo "<pre>";

echo <<<EOF

sort 的使用

把数组里面的值，从大到小，升序排列，
组成新的数组，数组的原先键值被舍弃，变为从0开始的新键值


EOF;


$arr = array('q'=>4, 'k'=>2, 'l'=>9);
sort($arr);

var_dump($arr);

echo "\n";

$twoArr = array('q'=>4, 'k'=>2, 'l'=>9,array('h'=>5, 'g'=>3, 'o'=>13));

echo <<<EOF

多维数组如何排序

先要明白多维数组的数组结构不同是没有办法排序的

$twoArr = array(
	array('id'=>9, 'name'=>'jeason', 'age'=>16),
	array('id'=>10, 'name'=>'jun', 'age'=>15),
	array('id'=>11, 'name'=>'kei', 'age'=>17)
);
EOF;

$twoArr = array(
	array('id'=>9, 'name'=>'jeason', 'age'=>16),
	array('id'=>10, 'name'=>'jun', 'age'=>15),
	array('id'=>11, 'name'=>'kei', 'age'=>17)
);

echo "\n";

$arr = array(12,1212,5,2,2345);

for($i=0;$i<count($arr);$i++)
{
	for($j=count($arr)-1;$j>$i;$j--)
	{
		if($arr[$j]>$arr[$j-1])
		{
			$tmp = $arr[$j-1];
			$arr[$j-1] = $arr[$j];
			$arr[$j] = $tmp;
		}
	}

}
var_export($arr);

$arr1 = array(46,46,464,15);
for($i=0; $i< count($arr1); $i++){
	for($j=0; $j<$i;$j++){
		if($arr1[$j]<$arr1[$j+1]){
			$tmp = $arr1[$j];
			$arr1[$j] = $arr1[$j+1];
			$arr1[$j+1] = $tmp;
		}
	}
}
var_dump($arr1);


