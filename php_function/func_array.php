<?php
/*
	array数组函数
*/
array_change_key_case($input_arr, CASE_UPPER) 
//1、默认为CASE_LOWER，如果是数字索引则不改变。

array_chunk($input_arr, 2, $arg)
//2、第三个参数可选 true(表示按原索引) 默认为 false(按数字索引，从0开始)。

array_combine($a, $b)
/*----*/
$a = array("red", "yellow");
$b = array("apple", "banana");
array_combine($a, $b);
/*
	返回如下，如数组单元不同或者为空则返回false
	array (
		[red] => apple
		[yellow] => banana
	)
*/ 
//3、组合数组

array_count_values($array)
//4、统计数组中相同的元素


