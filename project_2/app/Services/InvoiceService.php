<?php

declare(strict_types=1);

namespace Domain\Services;

use Domain\Interfaces\PaymentGatewayInterface;

class InvoiceService
{
    public function __construct(
        protected SalesTaxService $salesTaxService,
//        protected PaymentGatewayService $gatewayService,
        protected PaymentGatewayInterface $gatewayService,
        protected EmailService $emailService
    ) {
    }

    public function process(array $customer,float $amount): bool
    {
//        $salesTaxService = new SalesTaxService();
//        $gatewayService = new PaymentGatewayService();
//        $emailService = new EmailService();

        // 1 Calculate sales tax
        $tax = $this->salesTaxService->calculate($amount, $customer);

        // 2 process invoice
        if (!$this->gatewayService->charge($customer, $amount, $tax)){
            return false;
        }

        $this->emailService->send($customer, 'receipt');

        echo 'Invoice service has been processed </br>';

        return true;
    }
}

