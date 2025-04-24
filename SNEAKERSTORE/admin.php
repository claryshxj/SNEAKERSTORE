<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Management</title>
    <link rel="stylesheet" href="admin.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: url('./img/catbg.avif') no-repeat center center fixed;
            background-size: cover;
            margin: 0;
            padding: 40px;
            color: #333;
        }

        .back-button {
            background-color: #333;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            text-decoration: none;
            font-size: 14px;
            cursor: pointer;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
            transition: background-color 0.3s ease;
        }

        .back-button:hover {
            background-color: #555;
        }

        h2 {
            text-align: center;
            color: #222;
            font-size: 32px;
            margin: 20px 0 40px;
            letter-spacing: 1px;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: rgba(255, 255, 255, 0.95);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            overflow: hidden;
        }

        th, td {
            padding: 16px 20px;
            text-align: left;
        }

        th {
            background-color: #ff69b4;
            color: white;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        tr:nth-child(even) {
            background-color: #f7f7f7;
        }

        tr:hover {
            background-color: #ffe6f0;
            transition: background-color 0.3s ease;
        }

        td {
            border-bottom: 1px solid #ddd;
        }

        @media (max-width: 768px) {
            table, thead, tbody, th, td, tr {
                display: block;
            }

            tr {
                margin-bottom: 20px;
                box-shadow: 0 2px 10px rgba(0,0,0,0.1);
                border-radius: 8px;
                overflow: hidden;
            }

            th {
                display: none;
            }

            td {
                display: flex;
                justify-content: space-between;
                padding: 12px 16px;
                border: none;
                border-bottom: 1px solid #eee;
            }

            td::before {
                content: attr(data-label);
                font-weight: bold;
                color: #999;
            }
        }
    </style>
</head>
<body>

    <button class="back-button" onclick="history.back()">← Back</button>

    <h2>Payments</h2>
    <table>
        <tr>
            <th>No.</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Address</th> 
            <th>Card Number</th>
            <th>Expiry Date</th>
            <th>Expiry Year</th>
            <th>CVV</th>
        </tr>   
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "sneakerstore";

        $conn = new mysqli($servername, $username, $password, $database);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT name, phone, address, card_number, expiry_month, expiry_year, cvv FROM payments";
        $result = $conn->query($sql);

        if (!$result) {
            die("Query failed: " . $conn->error);
        }

        $serialNumber = 1;

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $serialNumber . "</td>";
                echo "<td>" . $row["name"] . "</td>";
                echo "<td>" . $row["phone"] . "</td>";
                echo "<td>" . $row["address"] . "</td>";
                echo "<td>" . $row["card_number"] . "</td>";
                echo "<td>" . $row["expiry_month"] . "</td>";
                echo "<td>" . $row["expiry_year"] . "</td>";
                echo "<td>" . $row["cvv"] . "</td>";
                echo "</tr>";
                $serialNumber++;
            }
        } else {
            echo "<tr><td colspan='8'>No payments found</td></tr>";
        }

        $conn->close();
        ?>
    </table>
</body>
</html>
