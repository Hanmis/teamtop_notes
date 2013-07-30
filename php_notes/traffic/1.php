<?php

//1、php解释不了 "<?=$list?>", 需要打开 php.ini 设置 short_open_tag = On

//2、PHP 的注释符号
/*
	目前PHP支持三种注释符号，分别如下：
	1.C++风格的单行注释：//
	2.C风格的多行注释：/*……*/
	3.shell风格的注释：#
*/

//3、一种简单的写法
e && echo 'hello';

//4、如果知道拆开的个数，此种方法简单
list($ip1,$ip2) = explode("-",$v);
