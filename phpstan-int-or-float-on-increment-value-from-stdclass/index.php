<?php
declare(strict_types=1);

class Counter
{
    private int $value;

    public function increment(): void
    {
        $step = (new stdClass())->step;
        $this->value = $step; // no problem

        $step++; // Property Counter::$value (int) does not accept float|int.
        $this->value = $step;
    }
}