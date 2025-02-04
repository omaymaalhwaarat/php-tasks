<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Calculator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 20px;
        }
        .calculator {
            display: inline-block;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            background-color: #f9f9f9;
        }
        .result {
            margin-top: 20px;
            font-size: 18px;
            color: #333;
        }
        input[type="number"], button {
            margin: 5px;
            padding: 10px;
            font-size: 16px;
        }
        button {
            cursor: pointer;
            border: 1px solid #007bff;
            background-color: #007bff;
            color: white;
            border-radius: 5px;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>PHP Calculator</h1>
    <div class="calculator">
        <form method="post" action="">
            <div>
                <input type="number" name="Operand1" placeholder="Enter first number" step="any" required>
            </div>
            <div>
                <input type="number" name="Operand2" placeholder="Enter second number" step="any" required>
            </div>
            <div>
                <button type="submit" name="operation" value="+">+</button>
                <button type="submit" name="operation" value="-">-</button>
                <button type="submit" name="operation" value="*">*</button>
                <button type="submit" name="operation" value="/">/</button>
            </div>
        </form>
    </div>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $Operand1 = $_POST['Operand1'];
        $Operand2 = $_POST['Operand2'];
        $operation = $_POST['operation'];
        $Result = "";

        // Validation and calculation
        if (!is_numeric($Operand1) || !is_numeric($Operand2)) {
            $Result = "Please enter valid numbers.";
        } elseif ($operation == "/" && $Operand2 == 0) {
            $Result = "Error: Division by zero is not allowed.";
        } else {
            switch ($operation) {
                case "+":
                    $Result = $Operand1 + $Operand2;
                    break;
                case "-":
                    $Result = $Operand1 - $Operand2;
                    break;
                case "*":
                    $Result = $Operand1 * $Operand2;
                    break;
                case "/":
                    $Result = $Operand1 / $Operand2;
                    break;
                default:
                    $Result = "Invalid operation.";
            }
        }

        // Display result
        echo '<div class="result">';
        echo "<strong>Result:</strong> $Result";
        echo '</div>';
    }
    ?>
</body>
</html>
