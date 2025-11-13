<?php include('db.php'); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Expense Tracker</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>💰 Expense Tracker</h1>

    <form action="add.php" method="POST">
        <input type="text" name="title" placeholder="Title" required>
        <input type="number" step="0.01" name="amount" placeholder="Amount" required>
        <select name="type">
            <option value="income">Income</option>
            <option value="expense">Expense</option>
        </select>
        <button type="submit">Add</button>
    </form>

    <hr>

    <?php
    $result = $conn->query("SELECT * FROM expenses ORDER BY created_at DESC");

    $total_income = 0;
    $total_expense = 0;

    echo "<table><tr><th>Title</th><th>Amount</th><th>Type</th><th>Action</th></tr>";
    while($row = $result->fetch_assoc()) {
        if ($row['type'] == 'income') $total_income += $row['amount'];
        else $total_expense += $row['amount'];

        echo "<tr>
                <td>{$row['title']}</td>
                <td>{$row['amount']}</td>
                <td>{$row['type']}</td>
                <td><a href='delete.php?id={$row['id']}'>🗑️ Delete</a></td>
              </tr>";
    }
    echo "</table>";

    $balance = $total_income - $total_expense;

    echo "<h3>Total Income: $total_income</h3>";
    echo "<h3>Total Expense: $total_expense</h3>";
    echo "<h2>Balance: $balance</h2>";
    ?>
</body>
</html>
