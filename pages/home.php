<?php
if($_SESSION["logged"] === "true"){
    require_once 'dbsystem/dbc.php'; 
    $connection = DBC::getConnection(); 

    $query = "SELECT name, email FROM users WHERE email != ?;";

    $statement = $connection->prepare($query);
    $statement->bind_param("s", $_SESSION["email"]);
    $statement->execute();

    $result = $statement->get_result();

    $users = $result->fetch_all(MYSQLI_ASSOC);

    $statement->close();
    $connection->close();
}
?>

<main class="text-center">
            <?php
                if (isset($_SESSION['error'])) {
                    $errorMessage = $_SESSION['error'];
                    unset($_SESSION['error']);
                    echo "<p class='my-5 fs-1 text-danger'>" . $errorMessage . "</p>";
                }
                if (isset($_SESSION['report'])) {
                    $reportMessage = $_SESSION['report'];
                    unset($_SESSION['report']);
                    echo "<p class='mb-5 fs-1 text-success'>" . $reportMessage . "</p>";
                }
            ?>
    <div class="main-bg text-white p-5 text-container-3">
        <h1 class="display-4">Welcome to WATeamWork website</h1>
        <p class="lead">Developers: Erik Boháč, Dominik Husák, Maksym Kintor</p>
    </div>
    <div class="container my-5 pb-2 d-<?= $_SESSION['logged'] === 'true' ? 'block' : 'none' ?>">
        <h2>Users</h2>
        <div class="row g-2">
            
            <?php foreach ($users as $user): ?>
            <div class="col-xl-3 col-md-4 col-sm-6" style="border-radius: 8px;">
                <div class="card shadow-lg" >
                    <div class="card-body" style="background-color: rgba(0, 0, 0, 0.6); border-radius: 8px; color: white;">
                        <h3 class="card-text"><?= $user['name'] ?></h3>
                        <p class="card-text"><?= $user['email'] ?></p>
                        <?php if ($_SESSION['is_admin'] == '1'): ?>
                            <form action="../dbsystem/delete_account.php" method="POST">
                                <input type="text" readonly class="form-control-plaintext d-none" name="email" value="<?=$user['email']?>">
                                <button type="submit"class="btn btn-danger">Delete user</button>
                            </form>                   
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</main>