<!-- 
P467103
JACK DU BOULAY
07/09/2024
-->

<!-- PHP CODE -->










<!doctype html>
<html lang="en">
    <head>
        <title>Question Set</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
        <!-- Bootstrap CSS v5.2.1 -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="mystyle.css">
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
                                    <li><a class="dropdown-item" href="content1.html">Content Questions (group 1)</a></li>
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
                            
                            // SQL query to fetch data
                            $sql = "SELECT q.Question, d.Description, a.Answer 
                                    FROM QUESTION q
                                    JOIN Q_DESCRIPTION d ON q.Description_ID = d.Description_ID
                                    JOIN Q_ANSWER a ON q.Answer_ID = a.Answer_ID";
                            $stmt = $conn->prepare($sql);
                            $stmt->execute();
                            
                            // Fetch all the rows in an associative array
                            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            
                            if (count($result) > 0) {
                                $i = 0;
                                foreach ($result as $row) {
                                    $i++;
                                    echo '<div class="accordion-item">';
                                    echo '<h2 class="accordion-header" id="heading' . $i . '">';
                                    echo '<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse' . $i . '" aria-expanded="true" aria-controls="collapse' . $i . '">';
                                    echo nl2br(htmlspecialchars_decode($row["Question"]));
                                    echo '</button>';
                                    echo '</h2>';
                                    echo '<div id="collapse' . $i . '" class="accordion-collapse collapse" aria-labelledby="heading' . $i . '" data-bs-parent="#accordionExample">';
                                    echo '<div class="accordion-body" style="text-align: left;">'; // I can't figure out how to fix this without inline styles.
                                    echo '<strong>Description:</strong> ' . '<br>'. nl2br(htmlspecialchars_decode($row["Description"])) . '<br>';
                                    echo '<strong>Answer:</strong> '. '<br>' . nl2br(htmlspecialchars_decode($row["Answer"]));
                                    echo '</div>';
                                    echo '</div>';
                                    echo '</div>';
                                }
                            } else {
                                echo '<div class="alert alert-warning" role="alert">0 results</div>';
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
