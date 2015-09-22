<?php

/**
 * 时间操作函数封装
 * 
 * @since 2015-9-22
 * @author jun
 * @access public
 * @package  time.php
 * @link  www.note.com/class/time.php
 */

if( !function_exists("getEachWeekDay") )
{
	/**
	 * 获取string格式日期的一周日期数组
	 *
	 * @since 2015-9-22
	 * @author jun
	 * @access public
	 * @param string $times 字符串格式时间
	 * @param boolean $prev default false  是否获取上一周
	 * @return array
	 */
	function getWeekDays($times, $prev=false)
	{
		$week = date('w', strtotime($times));
		$week > 0 || $week = 7;
		
		if($prev)
		{
			$monday = date('Y-m-d', strtotime($times)-($week+6)*24*3600);
		}
		else
		{
			$monday = date('Y-m-d', strtotime($times)-($week-1)*24*3600);
		}
		$date = [];
		for($i=0; $i<7; ++$i)
		{
			$date[$i+1] = date('Y-m-d', strtotime($monday)+$i*24*3600);
		}
		return $date;		

//$now_week = getWeekDays(date('Y-m-d',time()));
//$prev_week = getWeekDays(date('Y-m-d',time()), true);
//var_export($now_week);
//var_export($prev_week);
	}
}
