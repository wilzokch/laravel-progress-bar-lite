Fast Progress Bar for Laravel Command
=========================
This is a package to provide a faster progress bar for Laravel 5.1 and above. 

Problem
--------
When using default laravel progress bar, it will slow down the proccessing time significantly when your data are too large.

Solution
--------
This progress bar allow you to configure the update frequency of progress bar (default update frequency is 100)

Installation via "composer require"
--------
```shell
    composer require wilzokch/laravel-progress-bar-lite
```

Example
--------
```php
// put in your command class or refer to sample/TestCommand.php
use LiteProgressBarTrait;
```
```php
// create progress bar using following function instead of $this->output->createProgressBar(count($data));
$bar = $this->createProgressBar(count($data));
```

Test result with my PC
--------

using Laravel Progress bar
```
 100000/100000 [============================] 100%
time taken: 79.0038s
```
	
using Progress bar lite
```
 100000/100000 [============================] 100%
time taken: 0.5265s
```