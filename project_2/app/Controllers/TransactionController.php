<?php

namespace Domain\Controllers;

use Domain\App;
use Domain\Exceptions\FileNotFoundException;
use Domain\Models\Transaction;
use Domain\View;

class TransactionController
{
    /**
     * @return View
     */
    public function index(): View
    {
        $transactions = new Transaction();

        $transactions = $transactions->get();

        $totals = ['netTotal' => 0, 'totalIncome' => 0, 'totalExpense' => 0];

        foreach ($transactions as $transaction) {
            $totals['netTotal'] += $transaction['amount'];

            if ($transaction['amount'] >= 0)
                $totals['totalIncome'] += $transaction['amount'];
            else
                $totals['totalExpense'] += $transaction['amount'];
        }

        return View::make('transactions', ['transactions' => $transactions, 'total' => $totals]);
    }

    public function create()
    {
        return View::make('create');
    }

    /**
     * @throws FileNotFoundException
     */
    public function store()
    {
        $filePath = STORAGE_PATH . '/' . $_FILES['file']['name'];

        move_uploaded_file($_FILES['file']['tmp_name'], $filePath);

        $files = App::getTransactionFile(FILE_PATH);

        $transactions = [];

        foreach ($files as $item)
            $transactions = array_merge($transactions, App::getTransactions($item));

        $transaction = new Transaction();

        $id = null;
        if ($transactions)
            $id = $transaction->insert($transactions);


        if ($id != null){
            header('Location: /transactions');
            exit;
        }else
            throw new \Exception("Error Occured");

    }


}