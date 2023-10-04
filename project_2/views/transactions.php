<?php
function formatDollarAmount(float $amout):string
{
    $isNegative = $amout < 0;
    return  ($isNegative ? '-' : '') . '$' . number_format(abs($amout), 2);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Transactions</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            text-align: center;
        }

        table tr th, table tr td {
            padding: 5px;
            border: 1px #eee solid;
        }

        tfoot tr th, tfoot tr td {
            font-size: 20px;
        }

        tfoot tr th {
            text-align: right;
        }
    </style>
</head>
<body>
<table>
    <thead>
    <tr>
        <th>Date</th>
        <th>Check #</th>
        <th>Description</th>
        <th>Amount</th>
    </tr>
    </thead>
    <tbody>
        <?php foreach ($transactions as $transaction) : ?>
            <tr>
                <td><?= date('M j Y', strtotime($transaction['date'])) ?></td>
                <td><?= $transaction['check_data']?></td>
                <td><?= $transaction['description']?></td>
                <td><?= formatDollarAmount($transaction['amount'])?></td>
            </tr>
        <?php endforeach;?>
    <!-- TODO -->
    </tbody>
    <tfoot>
    <tr>
        <th colspan="3">Total Income:</th>
        <td><?= $total['totalIncome']?></td>
    </tr>
    <tr>
        <th colspan="3">Total Expense:</th>
        <td><?= $total['totalExpense']?></td>
    </tr>
    <tr>
        <th colspan="3">Net Total:</th>
        <td><?= $total['netTotal']?></td>
    </tr>
    </tfoot>
</table>
</body>
</html>
