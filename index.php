<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales Data Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .form-container {
            max-width: 400px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        h2 {
            text-align: center;
        }
        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }
        input, select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .total-sales {
            margin-top: 20px;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Sales Data Form</h2>
    <form id="salesForm" action="process_sales.php" method="POST">
        <label for="name">Manager's Name:</label>
        <input type="text" id="name" name="manager_name" placeholder="Enter your name" required>

        <label for="month">Month:</label>
        <select id="month" name="sales_month" required>
            <option value="">Select month</option>
            <option value="January">January</option>
            <option value="February">February</option>
            <option value="March">March</option>
            <option value="April">April</option>
            <option value="May">May</option>
            <option value="June">June</option>
            <option value="July">July</option>
            <option value="August">August</option>
            <option value="September">September</option>
            <option value="October">October</option>
            <option value="November">November</option>
            <option value="December">December</option>
        </select>

        <label for="sales_amount">Sales Amount:</label>
        <input type="number" id="sales_amount" name="sales_amount" placeholder="Enter sales amount" min="0" max="1000000" required>

        <input type="submit" value="Submit">
    </form>

    <div class="total-sales">
        Total Sales: <span id="totalSales">0</span>
    </div>
</div>

<script>
    // JavaScript to calculate total sales (if needed)
    let totalSales = 0;

    document.getElementById('salesForm').addEventListener('submit', function(event) {
        const salesAmount = parseFloat(document.getElementById('sales_amount').value);
        
        // Add it to the total sales (if you want to keep track of it)
        totalSales += salesAmount;
        
        // Update the displayed total sales
        document.getElementById('totalSales').textContent = totalSales;
    });
</script>

</body>
</html>
