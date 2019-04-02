<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Foundation\Inspiring;
use Wilzokch\ProgressBarLite\Traits\LiteProgressBarTrait;

class TestCommand extends Command
{
    use LiteProgressBarTrait;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test-command {default? : 1 = use default progress bar}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test command for progress bar';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $data = range(1,100000);
        $now = microtime(true);
        
        if($this->argument('default')) {
            $bar = $this->output->createProgressBar(count($data));
        } else {
            $bar = $this->createProgressBar(count($data));
        }
        
        foreach($data as $key) {
            $bar->advance();
        }
        $diff = microtime(true) - $now;
$this->line('');
        $this->info('time taken: '. number_format($diff, 4) . 's');
    }
}
