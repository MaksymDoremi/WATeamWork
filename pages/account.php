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
        <h1 class="display-4">Welcome, <i><?=$_SESSION["username"]?></i></h1>
    
    </div>
    <div class="my-5 container justify-content-center d-flex pt-5" id="fade">
        <form class="text-container-6 mx-5 w-75 mb-5" action="../dbsystem/change_password.php" method="POST">
            
            <div class="mb-5">
                <label for="oldPass" class="form-label fs-1">Old Password</label>
                <input type="password" class="form-control border-0 border-bottom border-secondary border-2 rounded-0 fs-2 text-center fst-italic" name="oldPass" maxlength="20" minlength="2" required>
            </div>
            <div class="mb-5">
                <label for="newPass" class="form-label fs-1">New Password</label>
                <input type="password" class="form-control border-0 border-bottom border-secondary border-2 rounded-0 fs-2 text-center fst-italic" name="newPass" maxlength="20" minlength="2" required>
            </div>
            <div class="row justify-content-center align-items-center my-5">       
                <button type="submit" class="btn btn-primary fs-3 col-lg-3 mt-4 col-sm-6 col-12">Submit new password</button>
            </div>
        </form>
    </div>
    <div class="my-5 container justify-content-center d-flex pt-5" id="fade">
        <form class="text-container-6 mx-5 w-75 mb-5" action="../dbsystem/change_accountInfo.php" method="POST">
            <div class="mb-3 row">
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="name" name="name" value="<?=$_SESSION["username"]?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                  <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?=$_SESSION["email"]?>">
                </div>
            </div>
            <div class="row justify-content-center align-items-center my-5">       
                <button type="submit" class="btn btn-primary fs-3 col-lg-3 mt-4 col-sm-6 col-12">Submit account changes</button>
            </div>     
        </form>
    </div>
    
</main>