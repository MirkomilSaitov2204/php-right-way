<?php

declare(strict_types=1);

namespace Domain;

use Domain\Exceptions\FileNotFoundException;
use Domain\Exceptions\RouteNotFoundException;
use Domain\Interfaces\PaymentGatewayInterface;
use Domain\Services\EmailService;
use Domain\Services\InvoiceService;
use Domain\Services\PaddlePayment;
use Domain\Services\PaymentGatewayService;
use Domain\Services\SalesTaxService;
use Dotenv\Dotenv;
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mailer\MailerInterface;

class App
{
    /** @var DB  */
    private static DB $db;

    private Config $config;

    /** @var Container  */
//    public static Container $container;

    /**
     * @param Container $container
     * @param Router|null $router
     * @param array $request
     * @param Config $config
     */
    public function __construct(
        protected Container $container,
        protected ?Router $router = null,
        protected array $request = [],
    ) {


//        static::$container = new Container();
//        static::$container->set(InvoiceService::class, function(Container $c){
//            return new InvoiceService(
//                $c->get(SalesTaxService::class),
//                $c->get(PaymentGatewayService::class),
//                $c->get(EmailService::class));
//        });
//
//        static::$container->set(SalesTaxService::class, fn() => new SalesTaxService());
//        static::$container->set(PaymentGatewayService::class, fn() => new PaymentGatewayService());
//        static::$container->set(EmailService::class, fn() => new EmailService());

    }

    public function boot(): static
    {
        $dotenv = Dotenv::createImmutable(dirname(__DIR__));
        $dotenv->load();

        $this->config = new Config($_ENV);

        static::$db = new DB($this->config->db ?? []);


        $this->container->set(PaymentGatewayInterface::class, PaddlePayment::class);
        $this->container->set(MailerInterface::class, fn() => new CustomMailer($this->config->mailer['dsn']));

        return $this;
    }

    /**
     * @return DB
     */
    public static function db(): DB
    {
        return  static::$db;
    }

    /**
     * @return void
     */
    public function run()
    {
        try {
            echo $this->router->resolve($this->request['uri'], strtolower($this->request['method']));
        }catch (RouteNotFoundException){
            http_response_code(404);
            echo View::make('error/404');
        }
    }


    public static function getTransactionFile(string $dirPath): array
    {
        $files = [];

        foreach (scandir($dirPath) as $file){
            if(is_dir($file))
                continue;
            $files[] = $dirPath . $file;
        }
        return  $files;
    }

    public static function getTransactions(string $fileName): array
    {
        if (!file_exists($fileName))
            throw new FileNotFoundException();

        $file = fopen($fileName, 'r');

        fgetcsv($file);

        $transactions = [];

        while (($transaction = fgetcsv($file)) !== false) {
//            if ($transactionHandler !== null) {
                $transactions[] = self::extractTransaction($transaction);
//            }
        }
        return $transactions;
    }

    public static function extractTransaction(array $transactionRow): array
    {
        [$date, $checkNumber, $description, $amount] = $transactionRow;

        $amount = (float)str_replace(['$', ','], '', $amount);
        return [
            'date' => $date,
            'checkNumber' => $checkNumber,
            'description' => $description,
            'amount' => $amount,
        ];
    }
}