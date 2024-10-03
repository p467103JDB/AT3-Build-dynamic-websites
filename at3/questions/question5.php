<!-- 
P467103
JACK DU BOULAY
07/09/2024
-->

<!-- PHP CODE -->
<!doctype html>
<html lang="en">
    <head>
        <title>Question 5</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
        <!-- Bootstrap CSS v5.2.1 -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="../mystyle.css">
    </head>

    <body class="text-center">
        <header class="sticky-top">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark py-3">
                <div class="container-fluid">
                    <button class="navbar-toggler active" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation"> 
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link active" href="../index.html">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="../contacts.html">Contacts</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdownMenu" role="button" data-bs-toggle="dropdown" aria-expanded="false">Content</a>
                                    <ul class="dropdown-menu active" aria-labelledby="navbarDropdownMenu">
                                    <li><a class="dropdown-item" href="question1.php">Question 1</a></li>
                                    <li><a class="dropdown-item" href="question2.php">Question 2</a></li>
                                    <li><a class="dropdown-item" href="question3.php">Question 3</a></li>
                                    <li><a class="dropdown-item" href="question4.php">Question 4</a></li>
                                    <li><a class="dropdown-item" href="question5.php">Question 5</a></li>
                                    <li><a class="dropdown-item" href="question6.php">Question 6</a></li>
                                    <li><a class="dropdown-item" href="question7.php">Question 7</a></li>
                                    <li><a class="dropdown-item" href="question8.php">Question 8</a></li>
                                    <li><a class="dropdown-item" href="question9.php">Question 9</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

        <main role="main" class="mainClass">
            <div class="container">
                <h1 class="mt-5">Questions and Answers</h1>
                <table class="table table-bordered mt-3">
                    <?php
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $dbname = "AT3_QUESTIONS_DB";
                        
                        try {
                            // Create connection using PDO
                            $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8mb4", $username, $password);
                            // Set the PDO error mode to exception
                            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            
                            // SELECT RESULT WITH THIS VAR
                            $question_id = 5;
                            
                            // SQL query to fetch the specific row - these are the columns to collect from and where Question_ID = :question_id 
                            $sql = "SELECT Question, Description, Answer FROM QUESTION WHERE Question_ID = :question_id";
                            $stmt = $conn->prepare($sql);
                            $stmt->bindParam(':question_id', $question_id, PDO::PARAM_INT);
                            $stmt->execute();
                            
                            // Fetch the specific row
                            $row = $stmt->fetch(PDO::FETCH_ASSOC);
                            
                            if ($row) {
                                echo '<div class="accordion-item">';
                                echo '<h2 class="accordion-header" id="heading1">';
                                echo '<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="true" aria-controls="collapse1">';
                                echo nl2br(htmlspecialchars_decode($row["Question"]));
                                echo '</button>';
                                echo '</h2>';
                                echo '<div id="collapse1" class="accordion-collapse collapse" aria-labelledby="heading1" data-bs-parent="#accordionExample">';
                                echo '<div class="accordion-body">'; 
                                echo '<strong>Description:</strong> ' . '<br>'. nl2br(htmlspecialchars_decode($row["Description"])) . '<br><br>';
                                echo '<strong>Answer:</strong> '. '<br>' . nl2br(htmlspecialchars_decode($row["Answer"]));
                                echo '</div>';
                                echo '</div>';
                                echo '</div>';
                            } else {
                                echo "<div class='alert alert-warning' role='alert'>Could not find result for question {$question_id}</div>"; // Could not find row at question_id
                            }
                        } catch(PDOException $e) { 
                            echo "Connection failed: " . $e->getMessage();
                        }
                        $conn = null;
                        ?>
                    </tbody>
                </table>
            </div>
        </main>

        <footer>
            <!-- place footer here -->
        </footer>

        <!-- Bootstrap JavaScript Libraries -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>
