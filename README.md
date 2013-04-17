#logger


Provides simple access to Laravel log files and data. 

##Installation

```
php artisan bundle:install logger
```

Then add the bundle to the bundles.php file:

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

##License
```
The MIT License (MIT)
Copyright (c) 2013 Mike Mazanec <https://github.com/mmazanec>

Permission is hereby granted, free of charge, to any person obtaining a copy of 
this software and associated documentation files (the "Software"), to deal in the
Software without restriction, including without limitation the rights to use, copy,
modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, 
and to permit persons to whom the Software is furnished to do so, subject to the 
following conditions:

The above copyright notice and this permission notice shall be included in all copies 
or substantial portions of the Software.
  
THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, 
INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A 
PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT 
HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF 
CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE 
OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.

```
