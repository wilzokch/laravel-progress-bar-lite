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
<pre>
    composer require wilzokch/laravel-progress-bar-lite
</pre>

Example
--------
<pre><code>
    // put in your command class or refer to sample/TestCommand.php
    use LiteProgressBarTrait;
</code></pre>
<pre><code>
    // create progress bar using following function instead of $this->output->createProgressBar(count($data));
    $bar = $this->createProgressBar(count($data));
</code></pre>

Test result with my PC
--------

using Laravel Progress bar
<pre><code>
 100000/100000 [============================] 100%
time taken: 79.0038s
</code></pre>
	
using Progress bar lite
<pre><code>
 100000/100000 [============================] 100%
time taken: 0.5265s
</code></pre>