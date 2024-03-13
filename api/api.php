<?php
header("Content-Type: application/json");

require '../dbcon.php';

function createStudent($data)
{
    global $con;

    $name = mysqli_real_escape_string($con, $data['name']);
    $email = mysqli_real_escape_string($con, $data['email']);
    $phone = mysqli_real_escape_string($con, $data['phone']);
    $course = mysqli_real_escape_string($con, $data['course']);

    $query = "INSERT INTO students (name, email, phone, course) VALUES ('$name', '$email', '$phone', '$course')";

    if (mysqli_query($con, $query)) {
        return json_encode(array("message" => "Student created successfully"));
    } else {
        return json_encode(array("error" => "Error creating student: " . mysqli_error($con)));
    }
}

function getStudents()
{
    global $con;

    $query = "SELECT name, email, phone, course FROM students";
    $result = mysqli_query($con, $query);

    $students = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $students[] = $row;
    }

    return json_encode($students);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);

    echo createStudent($data);
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
    echo getStudents();
} else {
    echo json_encode(array("error" => "Invalid request method"));
}
?>
