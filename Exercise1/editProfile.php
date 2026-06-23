<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>

    <style>
    table {
        border-collapse: collapse;
    }

    table,
    th,
    td {
        border: 1px solid black;
    }
    </style>

</head>

<body>
    <button><a class="link" href="../week1/booklist.php">Back</a></button>
    <button><a href=""><input type="submit" value="Logout"></a></button>


    
    <table>
        <tr>
            <th>Password</th>
            <th>Confirm Password</th>
            <th>Name</th>
            <th>Year Joined</th>
        </tr>
        <tr>
                <form action="updateProfile.php" method="POST">
                <td><input type="text" name="password" ></td>
                <td><input type="text" name="confirm_password" ></td>
                <td><input type="text" name="name" ></td>
                <td><input type="text" name="year_joined" ></td>
                <td><input type="submit" value="Submit"></td>
        </tr>
    </table>
</body>

</html>