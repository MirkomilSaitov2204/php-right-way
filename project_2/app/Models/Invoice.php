<?php

namespace Domain\Models;

class Invoice
{
    public function __construct(protected SalesTaxCalculator $salesTaxCalculator)
    {
    }


    public function create(array $liteItems)
    {
        $liteItesmTotal = $this->calculateLineItemsTotal($liteItems);

        $salesTax = $this->salesTaxCalculator->calculate($liteItesmTotal);

        $total = $liteItesmTotal + $salesTax;

        echo "SUB TOTAL $ $liteItesmTotal" . PHP_EOL
            . "SALES TAX $ $salesTax" . PHP_EOL
            . "TOTAL $ $total";
    }

    public function calculateLineItemsTotal(array $items): float|int
    {
        return array_sum(
            array_map(
                fn($item) => $item['unitPrice'] * $item['quantity'], $items)
        );
    }


}