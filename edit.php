


<?php
include "db.php";
if (isset($_GET["id"])) {
    $id=$_GET["id"];
    $sql=$conn->prepare("select * from emp4 where id=?");
    $sql->bind_param("i",$id);
    $sql->execute();
    $user=$sql->get_result()->fetch_assoc();
    if ($_SERVER["REQUEST_METHOD"]==="POST") {
        $name=$_POST["name"];
        $sal=$_POST["salary"];
        $desi=$_POST["designation"];
        $email=$_POST["email"];
        $year=$_POST["year"];
        $sql=$conn->prepare("update emp4 set name=?,salary=?,designation=?,email=?,year=? where id=?");
        $sql->bind_param("sdssii",$name,$sal,$desi,$email,$year,$id);
        if ($sql->execute()) {
            header("Location:home.php");
        }

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
                value="<?= $user["name"]; ?>"
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
                value="<?= $user["salary"]; ?>"
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
                value="<?= $user["designation"]; ?>"
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
                value="<?= $user["email"]; ?>"
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
                value="<?= $user["year"]; ?>"
            />
            
        </div>
        
        <button type="submit">Submit</button>
    </form>
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