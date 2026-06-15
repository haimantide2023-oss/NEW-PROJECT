<?php

$conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "notesdb"
);

if(!$conn)
{
    die("Connection Failed");
}

$department = $_POST['department'];
$semester = $_POST['semester'];
$subject = $_POST['subject'];

$filename = $_FILES['pdf']['name'];
$tempname = $_FILES['pdf']['tmp_name'];

move_uploaded_file(
    $tempname,
    "uploads/".$filename
);

$sql = "INSERT INTO notes
(department, semester, subject, filename)
VALUES
('$department','$semester',
 '$subject','$filename')";

if(mysqli_query($conn,$sql))
{
    echo "Notes Uploaded Successfully";
}
else
{
    echo "Upload Failed";
}

?>