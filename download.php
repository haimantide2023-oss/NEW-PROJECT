<?php
$conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "notes_db"
);

if(!$conn)
{
    die("Connection Failed");
}

$sql = "SELECT * FROM notes ORDER BY upload_date DESC";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Download Notes</title>
</head>
<body>

<h2>Available Notes</h2>

<table border="1" cellpadding="10">
    <tr>
        <th>Title</th>
        <th>Subject</th>
        <th>Semester</th>
        <th>Department</th>
        <th>Download</th>
    </tr>

<?php
while($row = mysqli_fetch_assoc($result))
{
?>
    <tr>
        <td><?php echo $row['title']; ?></td>
        <td><?php echo $row['subject']; ?></td>
        <td><?php echo $row['semester']; ?></td>
        <td><?php echo $row['department']; ?></td>
        <td>
            <a href="<?php echo $row['file_path']; ?>" download>
                Download
            </a>
        </td>
    </tr>
<?php
}
?>

</table>

</body>
</html>