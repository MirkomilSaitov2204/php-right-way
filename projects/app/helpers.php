<?php

declare(strict_types=1);

function formatDollarAmount(float $amout):string
{
    $isNegative = $amout < 0;
    return  ($isNegative ? '-' : '') . '$' . number_format(abs($amout), 2);
}

function formatDate(string $date): string
{
    return date('M j Y', strtotime($date));
}