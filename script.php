<?php

include_once 'db.php';

if (move_uploaded_file($_FILES['filename']['tmp_name'], $_FILES['filename']['name'])) {
    $db = new DataBase();
    $con = $db->getConnection();
    $fileName = $_FILES['filename']['name'];

    addDataToDB($fileName, $con);
    showDataFromDB($con);
} else {
    echo 'Error';
}


function addDataToDB($fileName, $con)
{
    $file = fopen($fileName, "r");
    fgetcsv($file, 0, ';');

    $data = [];
    while (($row = fgetcsv($file, 0, ';')) !== false) {
        $sql = "INSERT INTO products (code, product, level_1, level_2, level_3, price, price_sp, amount, properties, 
                      joint_purchase, unit, image, show_on_main_page, description) 
                VALUES ('$row[0]', '$row[1]', '$row[2]', '$row[3]', '$row[4]', '$row[5]', '$row[6]', '$row[7]', '$row[8]',
                        '$row[9]', '$row[10]', '$row[11]', '$row[12]', '$row[13]')";

        mysqli_query($con, $sql);
    }
    echo "Your data successfully imported to database!";
}

function showDataFromDB($con)
{
    $sql = "SELECT * FROM products";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) > 0) {
        echo "<div><table>
             <thead><tr><th>Code</th>
                          <th>Product</th>
                          <th>Level_1</th>
                          <th>Level_2</th>
                          <th>Level_3</th>
                          <th>Price</th>
                          <th>Price_sp</th>
                          <th>Amount</th>
                          <th>Properties</th>
                          <th>Joint_purchase</th>
                          <th>Unit</th>
                          <th>Image</th>
                          <th>Show_on_main_page</th>
                          <th>Description</th>
                        </tr></thead><tbody>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td>" . $row['code'] . "</td>
                   <td>" . $row['product'] . "</td>
                   <td>" . $row['level_1'] . "</td>
                   <td>" . $row['level_2'] . "</td>
                   <td>" . $row['level_3'] . "</td>
                   <td>" . $row['price'] . "</td>
                   <td>" . $row['price_sp'] . "</td>
                   <td>" . $row['amount'] . "</td>
                   <td>" . $row['properties'] . "</td>
                   <td>" . $row['joint_purchase'] . "</td>
                   <td>" . $row['unit'] . "</td>
                   <td>" . $row['image'] . "</td>
                   <td>" . $row['show_on_main_page'] . "</td>
                   <td>" . $row['description'] . "</td>
                   </tr>";
        }

        echo "</tbody></table></div>";

    } else {
        echo "you have no records";
    }
}