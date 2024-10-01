<?php
$servername = "localhost";
$username = "root";
$password = ""; // Leave blank for no password
$dbname = "at3_questions_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully";

//  READ - SQL query to fetch data
$sql = "SELECT q.Question, d.Description, a.Answer 
        FROM QUESTION q
        JOIN Q_DESCRIPTION d ON q.Description_ID = d.Description_ID 
        JOIN Q_ANSWER a ON q.Answer_ID = a.Answer_ID";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) 
    {
        echo "<br><br>";
        echo "Question: <br>" . $row["Question"] . "<br><br>Description: <br>" . $row["Description"] . "<br><br>Answer: <br>" . $row["Answer"] . "<br>";
    }
} 
else 
{
    echo "0 results";
}

// UPDATE - 




// DELETE -


$conn->close();
?>