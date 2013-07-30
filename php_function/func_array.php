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

array_fill(5, 3, 'banana')
//5、填充数组
/*
	Array
	(	
	   [5]  => banana
	   [6]  => banana
	   [7]  => banana
	)
*/

array_filter($arr, "funName") 
//6、依次将 input 数组中的每个值传递到 callback 函数。如果 callback 函数返回 TRUE，
//则 input 数组的当前值会被包含在返回的结果数组中。数组的键名保留不变。
/*-----------------*/
function odd($var) {
   return($var % 2 == 1);
}
function even($var) {
   return($var % 2 == 0);
}
$array1 = array("a"=>1, "b"=>2, "c"=>3, "d"=>4, "e"=>5);
$array2 = array(6, 7, 8, 9, 10, 11, 12);
echo "Odd :\n";
print_r(array_filter($array1, "odd"));
echo "Even:\n";
print_r(array_filter($array2, "even"));
/*
	Odd :
	Array
	(
	   [a] => 1
	   [c] => 3
	   [e] => 5
	)
	Even:
	Array
	(
	   [0] => 6
	   [2] => 8
	   [4] => 10
	   [6] => 12
	) 
*/

array_flip($arr)
//7、键和值反转,同一个值出现多次，则最后一个键名作为它的值
/*----------*/
$trans = array("a" => 1, "b" => 1, "c" => 2);
$trans = array_flip($trans);
print_r($trans);
/*
	Array
	(
	   [1] => b
	   [2] => c
	)
*/

array_key_exists('keyName', $arr) 
//8、在给定的 key 存在于数组中时返回 TRUE else 返回false。key 可以是任何能作为数组索引的值。
/*--------array_key_exists()与isset()的区别------*/
$search_array = array('first' => null, 'second' => 4);

// returns false
isset($search_array['first']);

// returns true
array_key_exists('first', $search_array);

array_keys($arr, $val)
//9、返回 $arr 数组中的数字或者字符串的键名，指定了可选参数 $val，则只返回该值的键名。
//否则 input 数组中的所有键名都会被返回,自 PHP 5 起，可以用 strict (第三个参数，true or false;)参数来进行全等比较（===）。 
$array = array(0 => 100, "colour" => "red");
print_r(array_keys($array));

$array = array("blue", "red", "green", "blue", "blue");
print_r(array_keys($array, "blue"));

$array = array("colour" => array("blue", "red", "green"),
              "size"  => array("small", "medium", "large"));
print_r(array_keys($array));
/*
	Array
	(
	   [0] => 0
	   [1] => colour
	)
	Array
	(
	   [0] => 0
	   [1] => 3
	   [2] => 4
	)
	Array
	(
	   [0] => colour
	   [1] => size
	)
*/

array_map("funcName", arg1, arg2,....)
//10、返回一个数组，该数组包含了 arr1 中的所有单元经过 callback 作用过之后的单元。callback 接受的参数数目应该和传递给 array_map() 函数的数组数目一致。 
/*--------array_map() - 使用更多的数组-------*/
function show_Spanish($n, $m) {
   return("The number $n is called $m in Spanish");
}

function map_Spanish($n, $m) {
   return(array($n => $m));
}

$a = array(1, 2, 3, 4, 5);
$b = array("uno", "dos", "tres", "cuatro", "cinco");

$c = array_map("show_Spanish", $a, $b);
print_r($c);

$d = array_map("map_Spanish", $a , $b);
print_r($d);
/*
	// printout of $c
	Array
	(
	   [0] => The number 1 is called uno in Spanish
	   [1] => The number 2 is called dos in Spanish
	   [2] => The number 3 is called tres in Spanish
	   [3] => The number 4 is called cuatro in Spanish
	   [4] => The number 5 is called cinco in Spanish
	)
	// printout of $d
	Array
	(
	   [0] => Array
		   (
			   [1] => uno
		   )

	   [1] => Array
		   (
			   [2] => dos
		   )

	   [2] => Array
		   (
			   [3] => tres
		   )

	   [3] => Array
		   (
			   [4] => cuatro
		   )

	   [4] => Array
		   (
			   [5] => cinco
		   )

	)
*/

/*------建立一个数组的数组-----*/
$a = array(1, 2, 3, 4, 5);
$b = array("one", "two", "three", "four", "five");
$c = array("uno", "dos", "tres", "cuatro", "cinco");

$d = array_map(null, $a, $b, $c);
print_r($d);
/*
	Array
	(
	   [0] => Array
		   (
			   [0] => 1
			   [1] => one
			   [2] => uno
		   )

	   [1] => Array
		   (
			   [0] => 2
			   [1] => two
			   [2] => dos
		   )

	   [2] => Array
		   (
			   [0] => 3
			   [1] => three
			   [2] => tres
		   )

	   [3] => Array
		   (
			   [0] => 4
			   [1] => four
			   [2] => cuatro
		   )

	   [4] => Array
		   (
			   [0] => 5
			   [1] => five
			   [2] => cinco
		   )

	)
*/

array_merge($arr1, $arr2, ....)
//11、将一个或多个数组的单元合并(并集)起来，一个数组中的值附加在前一个数组的后面。返回作为结果的数组。 
//如果输入的数组中有相同的字符串键名，则该键名后面的值将覆盖前一个值。然而，如果数组包含数字键名，后面的值将不会覆盖原来的值，而是附加到后面。 
//如果只给了一个数组并且该数组是数字索引的，则键名会以连续方式重新索引。
/*-----------*/
$array1 = array("colour" => "red", 2, 4);
$array2 = array("a", "b", "colour" => "green", "shape" => "trapezoid", 4);
$result = array_merge($array1, $array2);
print_r($result);
/*
	Array
	(
	   [color] => green
	   [0] => 2
	   [1] => 4
	   [2] => a
	   [3] => b
	   [shape] => trapezoid
	   [4] => 4
	)
*/
/*-----别忘了数字键名将会被重新编号！-----*/
$array1 = array();
$array2 = array(1 => "data");
$result = array_merge($array1, $array2);
/*
	Array
	(
	   [0] => data
	)
*/
/*----如果你想完全保留原有数组并只想新的数组附加到后面，用 + 运算符:数字键名将被保留从而原来的关联保持不变。---*/
$array1 = array();
$array2 = array(1 => "data");
$result = $array1 + $array2;
/*
	Array
	(
	   [1] => data
	)
*/
/*array_merge()的行为在PHP5中被修改了。和PHP4不同，array_merge()现在只接受array类型的参数。不过可以用强制转换来合并其它类型。*/
$beginning = 'full';
$end = array(1 => 'bar');
$result = array_merge((array)$beginning, (array)$end);
print_r($result);
/*
	Array
	(
	   [0] => full
	   [1] => bar
	)
*/	

array_merge_recursive()
//12、如果输入的数组中有相同的字符串键名，则这些值会被合并到一个数组中去，这将递归下去，因此如果一个值本身是一个数组，
//本函数将按照相应的条目把它合并为另一个数组。然而，如果数组具有相同的数组键名，后一个值将不会覆盖原来的值，而是附加到后面。
$ar1 = array("color" => array("favorite" => "red"), 5);
$ar2 = array(10, "color" => array("favorite" => "green", "blue"));
$result = array_merge_recursive($ar1, $ar2);
/*
Array
(
   [color] => Array
       (
           [favorite] => Array
               (
                   [0] => red
                   [1] => green
               )

           [0] => blue
       )

   [0] => 5
   [1] => 10
) 
*/

array_pad(array input, int pad_size, mixed pad_value )
//13、






