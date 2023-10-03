<?php

//declare(strict_types=1);

//require 'Transaction.php';
//require 'Customer.php';
//require 'PaymentProfile.php';


//
//spl_autoload_register(function ($class) {
//    $path = __DIR__ . '/' . lcfirst(str_replace('\\', '/', $class) . '.php');
//
//    if (file_exists($path))
//        require $path;
//});


//$transaction = new Transaction(12, "Transaction-1");

//$amount1 = $transaction->addTax(8)->applyDiscount(10)->getAmount();

//echo $transaction->getCustomer()?->getPaymentProfile()?->id;

//var_dump($amount1);

//$arr = [1,2,3];
//$obj = (object) $arr;
//var_dump($obj);


//file("file.pph");
//use App\PaymentGateway\Paddle\Transaction;
//use \App\PaymentGateway\Stripe\Transaction as STransaction;
use App\MyInterface;

require_once __DIR__ . '/vendor/autoload.php';
session_start();

define('STORAGE_PATH', __DIR__ . './storage');
define('VIEW_PATH', __DIR__ . './views');

//
//$transaction = new Transaction();
//
//var_dump($transaction);
//
//$id = new \Ramsey\Uuid\UuidFactory();
//
//echo $id->uuid4();


//$transaction = new Transaction();
//$transaction = $transaction->setStatus(\App\Enums\Status::STATUS_PAID);
//
//
//$transaction_stripe = new STransaction(25,"hello");
//
//var_dump($transaction_stripe::getCount());
//
//
//\App\DB::getInstance([]);
//echo  $transaction::STATUS_PAID;

//$transaction = new \App\PaymentGateway\Payme\Transaction(25);
//
//echo $transaction->getAmount();
//
//$transaction->process();

//
//$click = new \App\PaymentGateway\Payme\Click(123);
//
//$click->call();


// is a // has a

//$invoice = new App\Invoice();

//$invoice->amount = 15;
//
//var_dump(isset($invoice->amount));
//
//unset($invoice->amount);
//
//var_dump(isset($invoice->amount));

//$invoice->process(1, "Some description");

//var_dump($invoice instanceof Stringable);
//echo  $invoice;

//$invoice();

//\App\ClassA::getName();
//$a = new \App\ClassB(); $a->getName1();
//
//$ref = new ReflectionProperty(\App\ClassA::class, 'gg1');
//
//$ref->setAccessible(true);
//
//$ref->setValue($a, 'gg2');
//
//var_dump($ref->getValue($a));


//$obj = new class(1,2,3) implements MyInterface{
//  public function __construct(public int $x, public int $y,public int $z)
//  {
//
//  }
//};
//foo($obj);
//
//function foo(MyInterface $obj)
//{
//    var_dump($obj);
//}

//$obj = new \App\ClassA(1,2);
//var_dump($obj->bar());
//
//$c = new \App\ClassC(1, "Class C");
//$d = new \App\ClassC(1, "Class C");
//
//
//
//$f = $c;
//
//$f->amount = 500;
//
//var_dump($c , $f);


/**
 * Docblock
 *
 */

//$invoice = new \App\Invoice();

//echo serialize(true) . PHP_EOL;
//echo serialize(1) . PHP_EOL;
//echo serialize(2.3) . PHP_EOL;
//echo serialize('hello world') . PHP_EOL;
//echo serialize([1,2,3]) . PHP_EOL;
//echo serialize(['a' => 1, 'n' => 2]) . PHP_EOL;
//
//$str = serialize($invoice);
//
//var_dump(unserialize(serialize($invoice)));
//
//var_dump(process());
//function process(){
//    $invoice = new \App\Invoice(new \App\Customer(['foo' => 'bar']));
//
//
//    try {
//        $invoice->process(-5);
//
//        return true;
//    }catch (\App\MissingBillingException|InvalidArgumentException|Exception|Throwable $e) {
//        echo $e->getMessage() . PHP_EOL;
//        return  false;
//
//    } finally {
//        echo "Finally block" . PHP_EOL;
//
//        return  -1;
//    }
//}

// Two Type of exceptions Regular exception and error exception

//set_exception_handler(function(Exception $e){
//    var_dump($e->getMessage());
//});
//
//echo array_rand([], 1);

//echo "<pre>";
//print_r($_SERVER);
//echo "<pre>";
try {

    $router = new App\Router();

    $router
        ->get('/', [App\Controller\HomeController::class, 'index'])
        ->get('/download', [App\Controller\HomeController::class, 'download'])
        ->post('/upload', [App\Controller\HomeController::class, 'upload'])
        ->get('/invoice', [App\Controller\InvoiceController::class, 'index'])
        ->get('/invoice/create', [App\Controller\InvoiceController::class, 'create'])
        ->post('/invoice/create', [App\Controller\InvoiceController::class, 'store']);


    echo $router->resolve($_SERVER['REQUEST_URI'], strtolower($_SERVER['REQUEST_METHOD']));

}catch (\App\Exceptions\RouteNotFoundException $e){
//    header('HTTP/1.1 404 Not Found');
    http_response_code(404);
    echo $e->getMessage();
}

