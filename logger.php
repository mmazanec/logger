<?php
/**
 * Part of the Logger bundle for Laravel v3
 *
 * NOTICE OF LICENSE
 *
 * Licensed under the 3-clause BSD License.
 *
 * This source file is subject to the 3-clause BSD License that is
 * bundled with this package in the LICENSE file.  It is also available at
 * the following URL: http://www.opensource.org/licenses/BSD-3-Clause
 *
 * @package    Logger
 * @version    1.0
 * @author     Mike Mazanec
 * @license    BSD License (3-clause)
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
