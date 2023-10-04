<?php

declare(strict_types=1);

namespace App\Controller;

use App\App;
use App\Models\Invoice;
use App\Models\User;
use App\View;

class HomeController
{
    public function index(): View
    {
        $db = App::db();


//            $email = $_GET['email'];

//            $query = 'SELECT * FROM users where email = "' . $email . '"';


//            foreach ($db->query($query) as $user){
//                echo "<pre>";
//                var_dump($user);
//                echo "</pre>";
//            }

//            $query = 'SELECT * FROM users WHERE email = ?';
//            $stmt = $db->prepare($query);
//            $stmt->execute([$email]);
//
//            foreach ($stmt->fetchAll()  as $user){
//                echo "<pre>";
//                var_dump($user);
//                echo "</pre>";
//            }

        $email = 'jane3@doe.com';
        $full_name = 'Jane 3 Doe';
        $isActive = 1;
        $createdAt = date('Y-m-d H:s:i', strtotime('04/10/2023 9:00PM'));

//        $query = 'INSERT INTO users (email, full_name, is_active, created_at)
//                        values (:email, :name, :active, :date)
//';
//        $smtm =  $db->prepare($query);
////            $smtm->execute([
////                'name' => $full_name,
////                'email' => $email,
////                'active' => $isActive,
////                'date' => $createdAt
////            ]);
//
//        $smtm->bindValue(':name', $full_name);
//        $smtm->bindValue(':email', $email);
//        $smtm->bindParam(':active', $isActive);
//        $smtm->bindValue(':date', $createdAt);
//
//        $isActive = 0;
//
//        $smtm->execute();
//        $id = (int) $db->lastInsertId();
//
//        $user = $db->query('SELECT * FROM users where id = ' .$id);
//
//        echo "<pre>";
//        var_dump($user);
//        echo "</pre>";
        $email = 'jane9@doe.com';
        $full_name = 'Jane 9 Doe';
        $isActive = 1;
        $createdAt = date('Y-m-d H:s:i', strtotime('04/10/2023 9:00PM'));
        $amount = 111;

        $userModel = new User();
        $invoiceModel = new Invoice();

        try {
            $db->beginTransaction();

            $userId = $userModel->create($full_name, $email, true, $createdAt );

            $invoiceId = $invoiceModel->create($amount, $userId);

            $invoice = $invoiceModel->find($invoiceId);

            $db->commit();
        } catch (\Throwable $exception) {
            if ($db->inTransaction()) {
                $db->rollBack();
            }
            echo $exception->getMessage();
        }

        return View::make('index', ['invoice' => $invoice]);
    }

    public function download()
    {
        header('Content-Type: application/jpg');
        header('Content-Disposition: attachment;filename="myfile.jpg"');

        readfile(STORAGE_PATH . '/IMG_1625.jpg');
    }


    public function upload()
    {
        $filePath = STORAGE_PATH . '/' . $_FILES['receipt']['name'];

        move_uploaded_file($_FILES['receipt']['tmp_name'], $filePath);

        header('Location: /');
        exit;
    }
}