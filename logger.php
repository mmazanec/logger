<?php
/**
 * Part of the Logger bundle for Laravel v3
 *
 * The MIT License (MIT)
 * Copyright (c) 2013 Mike Mazanec <https://github.com/mmazanec>
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy of 
 * this software and associated documentation files (the "Software"), to deal in the
 * Software without restriction, including without limitation the rights to use, copy,
 * modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, 
 * and to permit persons to whom the Software is furnished to do so, subject to the 
 * following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all copies 
 * or substantial portions of the Software.
 *  
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, 
 * INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A 
 * PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT 
 * HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF 
 * CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE 
 * OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 *
 * @package    Logger
 * @version    1.0
 * @author     Mike Mazanec
 * @license    MIT
 * @copyright  (c) 2013 Mike Mazanec
 */

class Logger {

	public $log_dir = null;

	/**
	 * Get a list of log files
	 */
	public static function get_logs($max_logs = false)
	{
		if(!$max_logs) $max_logs = Config::get('logger::logger.previous_logs');

		$log_dir = Config::get('logger::logger.log_dir');
		$files = scandir($log_dir);
		$file_list = array();
		foreach ($files as $file)
		{
			if ($file !== '.' && $file !== '..' && $file !== '.gitignore' && !is_dir($file))
			{
				$file_list[] = $file;
			}
		}

		return array_slice(array_reverse($file_list), 0, $max_logs);
	}

	/**
	 * Open an parse a specific log file
	 *
	 * @param strong $date
	 * @return array
	 */
	public static function get_log($date = false)
	{
		$log_dir = Config::get('logger::logger.log_dir');
		if(!$date) $date = date('Y-m-d');

		if(!is_file($log_dir.$date.'.log'))
		{
			return false;
		}
		else
		{
			$file = File::get($log_dir.$date.'.log');
			return array_reverse(explode("\n", $file));
		}
	}
}
