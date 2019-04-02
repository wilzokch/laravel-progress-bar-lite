Fast Progress Bar for Laravel Command
=========================

This progress bar is use to improve laravel default progress bar

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
