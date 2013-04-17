#logger


Provides simple access to Laravel log files and data. 

##Installation

TODO: Submit to the Laravel bundle library. Until then, create a _logger_ directory within the bundles directory and copy the files into it. Add the bundle to the bundles.php file:

```
'logger'  =>  array('auto'=>true)
```

##Usage
To get a list (array) of log files:

```
$files = Logger::get_files();
```

The file list is returned in newset to oldest order. The method can take a numeric parameter to limit the number of files returned. Otherwise, it uses the value specified in the *previous_logs* config value.


To open a specific log file, using the YYYY-MM-DD date format:

```
$log_data = Logger::get_log('2013-04-16');
```

If no parameter is used, it attempts to open the log file for the current date. Log data is returned in array format, ordered newest to oldest.
