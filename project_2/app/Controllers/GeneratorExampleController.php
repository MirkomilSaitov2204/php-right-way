<?php

declare(strict_types=1);

namespace Domain\Controllers;

use Domain\App;
use Domain\Container;
use Domain\Models\Ticket;
use Domain\Services\InvoiceService;
use Domain\View;

class GeneratorExampleController
{
    public function __construct(private Ticket $ticket)
    {

    }

    public function index()
    {
//        $numbers = $this->lazyRange(1, 10);
//
////        echo "<pre>";
////        print_r($numbers);
////        echo "</pre>";
//
////        echo $numbers->current();
////
////        $numbers->next();
////        echo $numbers->current();
////
////        $numbers->next();
////        echo $numbers->current();
//
//        foreach ($numbers as $item)
//        {
//            echo "$item <br>";
//        }

        $ticket = $this->ticket->all();
        foreach ($ticket as $item){
            echo $item['id']. " => " . $item['amount'] . "<br />";
        }

    }


//    public function lazyRange(int $start, int $end): \Generator
//    {
//        for ($i = $start; $i<=$end; $i++){
//            yield $i;
//        }
//    }
}