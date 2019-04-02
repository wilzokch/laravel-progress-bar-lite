<?php

namespace Wilzokch\ProgressBarLite\Classes;

use Illuminate\Console\OutputStyle;

/**
 * Class LiteProgressBar
 * @package App\Classes
 *
 * @property int $maxUpdate maximum update times for progress bar
 * @property int $minStep minimum step to update progress
 * @property int $count total step for progress bar
 * @property float $hiddenStep hidden step until next update
 * @property int $currentProgress current progress
 */
class LiteProgressBar {
    public $maxUpdate = 100;
    public $count;
    public $minStep = 0;
    public $currentProgress = 0;
    public $hiddenStep = 0;
    public $bar;

    /**
     * LiteProgressBar constructor.
     *
     * @param OutputStyle $output
     * @param int $count
     * @param int $maxUpdate
     */
    public function __construct($output, $count = 0, $maxUpdate = 100)
    {
        if($maxUpdate <= 0) $maxUpdate = 1;

        $this->minStep = $count / $maxUpdate;
        $this->count = $count;
        $this->maxUpdate = $maxUpdate;

        $this->bar = $output->createProgressBar($count);
    }

    /**
     * Advances the progress output X steps.
     *
     * @param int $step Number of steps to advance
     */
    public function advance($step = 1) {
        $this->hiddenStep += $step;

        if($this->hiddenStep > $this->minStep
            || $this->currentProgress + $this->hiddenStep >= $this->count) {

            $this->updateProgress(floor($this->hiddenStep));

            $this->hiddenStep = round(fmod($this->hiddenStep, $this->minStep), 2);
        }
    }

    protected function updateProgress($step) {
        // do not update progress when already completed
        if($this->currentProgress > $this->count) return;

        $newProgress = $step + $this->currentProgress;

        if($newProgress > $this->count) {
            $diff = $newProgress - $this->count;
            $step -= $diff;
        }

        $this->currentProgress += $step;

        $this->bar->advance($step);

        if($this->currentProgress >= $this->count) {
            $this->bar->finish();
        }
    }
}