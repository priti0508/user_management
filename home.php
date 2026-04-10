<?php

include "db.php";
$result=$conn->query("select * from emp4");
if ($_SERVER["REQUEST_METHOD"]==="POST") {
    $name=$_POST["name"];
    $sal=$_POST["salary"];
    $desi=$_POST["designation"];
    $email=$_POST["email"];
    $year=$_POST["year"];
    $sql=$conn->prepare("insert into emp4(name,salary,designation,email, year)values(?,?,?,?,?)");
    $sql->bind_param("sdsss",$name,$sal,$desi,$email,$year);
    if ($sql->execute()) {
        header("Location:home.php");
    }
}


?>
<!doctype html>
<html lang="en">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
    </head>

    <body>
        <header>
           <nav
            class="navbar navbar-expand-sm navbar-light bg-light"
           >
            <div class="container">
               
            <h5>Hello <?php echo $_SESSION["name"] ?></h5>
                <button
                    class="navbar-toggler d-lg-none"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#collapsibleNavId"
                    aria-controls="collapsibleNavId"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                >
                    <span class="navbar-toggler-icon"></span>
                </button>
                <form action="logout.php" method="POST">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
        Logout
    </button>
</form>
            </div>
           </nav>
           
        </header>
        <main>
            <h3 class="text-center">Employee Data</h3>
<div
    class="container my-4 p-4 rounded shadow col-4"
>
    <form action="" method="POST">
        <div class="mb-3">
            <label for="" class="form-label">Name</label>
            <input
                type="text"
                class="form-control"
                name="name"
                id=""
                aria-describedby="helpId"
                placeholder=""
            />
            
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Salary</label>
            <input
                type="text"
                class="form-control"
                name="salary"
                id=""
                aria-describedby="helpId"
                placeholder=""
            />
           
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Designation</label>
            <input
                type="text"
                class="form-control"
                name="designation"
                id=""
                aria-describedby="helpId"
                placeholder=""
            />
            
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Email</label>
            <input
                type="text"
                class="form-control"
                name="email"
                id=""
                aria-describedby="helpId"
                placeholder=""
            />
            
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Year Of Exp</label>
            <input
                type="text"
                class="form-control"
                name="year"
                id=""
                aria-describedby="helpId"
                placeholder=""
            />
            
        </div>
        
        <button type="submit">Submit</button>
    </form>
</div>
    <div
        class="container"
    >
        <div
        class="table-responsive "
    >
        <table
            class="table table-primary"
        >
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                     <th scope="col"> Salary</th>
                      <th scope="col"> Designation</th>
                      <th scope="col"> Email</th>
                      <th scope="col"> Years Of Exp</th>
                       <th scope="col"> Action</th>
                        <th scope="col"> Action</th>
                </tr>
            </thead>
            <?php while ($row=$result->fetch_assoc()) {?>
                
            
            
                <tr class="">
                    <td scope="row"><?=$row["id"];?></td>
                    <td><?=$row["name"];?></td>
                    <td><?=$row["salary"];?></td>
                    <td><?=$row["designation"];?></td>
                    <td><?=$row["email"];?></td>
                    <td><?=$row["year"];?></td>
                
                    <td><a
                        name=""
                        id=""
                        class="btn btn-primary"
                        href="edit.php?id=<?= $row["id"]; ?>"
                        role="button"
                        >Edit</a
                    >
                    </td>
                     <td><a
                        name=""
                        id=""
                        class="btn btn-primary"
                        href="delete.php?id=<?= $row["id"]; ?>"
                        role="button"
                        >Delete</a
                     >
                     </td>
                   
                     <td><a href="delete.php">delete</a>
</td>
                     <?php } ?>
                </tr>
                
        </table>
    </div>
    

    </div>

    
    </main>
        <footer>
            <!-- place footer here -->
        </footer>
        <!-- Bootstrap JavaScript Libraries -->
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
    </body>
</html>