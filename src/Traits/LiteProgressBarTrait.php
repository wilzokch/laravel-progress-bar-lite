<?php

namespace Wilzokch\ProgressBarLite\Traits;

use Wilzokch\ProgressBarLite\Classes\LiteProgressBar;

/**
 * This trait use to provide progress bar for console which do not update frequently when record is too big
 *
 * Trait LiteProgressBarTrait
 * @package App\Traits
 *
 * @property \Illuminate\Console\OutputStyle $output
 */
trait LiteProgressBarTrait
{
    public function createProgressBar($count, $maxUpdate = 100) {
        return new LiteProgressBar($this->output, $count, $maxUpdate);
    }
}