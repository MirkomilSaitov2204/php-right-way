<?php

namespace Tests\Unit\Services;

use Domain\Services\EmailService;
use Domain\Services\InvoiceService;
use Domain\Services\PaymentGatewayService;
use Domain\Services\SalesTaxService;
use PHPUnit\Framework\TestCase;

class InvoiceServiceTest extends TestCase
{
    /** @test */
    public function it_processes_invoice(): void
    {
        $salesTaxServiceMock = $this->createMock(SalesTaxService::class) ;
        $gatewayServiceMock = $this->createMock(PaymentGatewayService::class) ;
        $emailServiceMock = $this->createMock(EmailService::class) ;

        $gatewayServiceMock->method('charge')->willReturn(true);

        // given invoice service
        $invoiceService = new InvoiceService(
            $salesTaxServiceMock,
            $gatewayServiceMock,
            $emailServiceMock
        );

        $customer = ['name' => 'Gio'];
        $amount = 150;

        // when process is called
        $result = $invoiceService->process($customer, $amount);

        //then assert invoice is processed successfully
        $this->assertTrue($result);
    }


    /** @test */
    public function it_sends_receipt_email_when_invoice_is_processed(): void
    {
        $salesTaxServiceMock = $this->createMock(SalesTaxService::class) ;
        $gatewayServiceMock = $this->createMock(PaymentGatewayService::class) ;
        $emailServiceMock = $this->createMock(EmailService::class) ;

        $gatewayServiceMock->method('charge')->willReturn(true);

        $emailServiceMock
            ->expects($this->once())
            ->method('send')
            ->with(['name' =>'Gio'],  'receipt');


        // given invoice service
        $invoiceService = new InvoiceService(
            $salesTaxServiceMock,
            $gatewayServiceMock,
            $emailServiceMock
        );

        $customer = ['name' => 'Gio'];
        $amount = 150;

        // when process is called
        $result = $invoiceService->process($customer, $amount);

        //then assert invoice is processed successfully
        $this->assertTrue($result);
    }
}