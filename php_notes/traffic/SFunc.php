class SFunc
{
	//SQL ADDSLASHES
	public static function saddslashes($string, $type = '')
	{
	    if(is_array($string)){
	        $string = array_map(array('SFunc', 'saddslashes'), $string);
	    }else{
	        $string = addslashes(htmlspecialchars(trim($string)));
	        if($type == 'like'){//防止like查询时全站搜索
	            $string = str_replace('%', '\%', $string);
	            $string = str_replace('_', '\_', $string);
	        }
	    }
	    return $string;
	}

	//获取文件名后缀
	public static function fileext($filename) {
		return strtolower(trim(substr(strrchr($filename, '.'), 1)));
	}
	
	//取消HTML代码
	public static function shtmlspecialchars($string)
	{
		if (is_array($string)) {
            foreach($string as $key=>$val) {
                $string[$key] = self::shtmlspecialchars($val);
            }
        } else {
            $string = preg_replace('/&amp;((#(\d{3,5}|x[a-fA-F0-9]{4})|[a-zA-Z][a-z0-9]{2,5});)/','&\\1',str_replace(array(
                '&',
                '"',
                '<',
                '>'
            ),array(
                '&amp;',
                '&quot;',
                '&lt;',
                '&gt;'
            ),$string));
        }
        return $string;
	}

}