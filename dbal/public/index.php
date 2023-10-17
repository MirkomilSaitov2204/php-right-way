<?php

declare(strict_types=1);

use Doctrine\ORM\EntityManager;

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = \Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$connectionParams = [
    'dbname'    => $_ENV['DB_DATABASE'],
    'user'      => $_ENV['DB_USER'],
    'password' => $_ENV['DB_PASS'],
    'host' => $_ENV['DB_HOST'],
    'driver' => $_ENV['DB_DRIVER'] ?? 'pdo_mysql',
];

$conn = \Doctrine\DBAL\DriverManager::getConnection($connectionParams);

//$stmt = $conn->prepare('SELECT id, created_at FROM invoices where created_at BETWEEN :from AND :to');
//
//$from = new DateTime('2023-10-17 10:48:10');
//$to  = new DateTime('2023-10-17 10:48:50');
//
//$stmt->bindValue(':from', $from, 'datetime');
//$stmt->bindValue(':to', $to, 'datetime');
//
//$result = $stmt->executeQuery();

//$conn->transactional(function(){
//
//});


//$ids = [1,2];
//$result = $conn->fetchAllAssociative('select id, created_at from invoices
//                      where id in (?)', [$ids], [\Doctrine\DBAL\Connection::PARAM_INT_ARRAY]);


//var_dump($result);



//$builder = $conn->createQueryBuilder();
//
//$invoices = $builder->select('id', 'created_at')->from('invoices')
//    ->where('id > ?')
//    ->setParameter(0,3)->fetchAllAssociative();

//var_dump($invoices);




//$params = [
//    'dbname'    => $_ENV['DB_DATABASE'],
//    'user'      => $_ENV['DB_USER'],
//    'password' => $_ENV['DB_PASS'],
//    'host' => $_ENV['DB_HOST'],
//    'driver' => $_ENV['DB_DRIVER'] ?? 'pdo_mysql',
//];
//
//$entityManager = EntityManager::create($params, \Doctrine\ORM\Tools\Setup::createAttributeMetadataConfiguration([__DIR__.'/core/Entity']));
//
//
//
//$items = [['Item 1', 1, 15], ['Item 2', 2, 7.5], ['Item 3', 4, 3.75]];
//
//$invoice = (new \Core\Entity\Invoice())
//    ->setAmount(45)
//    ->setInvoiceNumber('1')
//    ->setStatus(\Core\Status\InvoiceStatus::PENDING)
//    ->setCreatedAt(new DateTime());
//
//foreach ($items as [$description, $quantity, $unitPrice]) {
//    $item = (new \Core\Entity\InvoiceItem())
//        ->setDescription($description)
//        ->setQuantity($quantity)
//        ->setUnitPrice($unitPrice);
//
//    $invoice->addItem($item);
//}
//
//$entityManager->persist($invoice);
//$entityManager->flush();



$queryBuilder = $conn->createQueryBuilder();

$query = $queryBuilder
    ->select('i.createdAt', 'i.amount')
    ->from(\Core\Entity\Invoice::class, 'i')
    ->where('i.amount > :amount')
    ->setParameter('amount', 100)
    ->orderBy('i.createdAt', 'desc')
    ->getFirstResult();
