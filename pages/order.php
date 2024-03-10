<?php
if($_SESSION["logged"] === "true"){
  require_once 'dbsystem/dbc.php'; 
  $connection = DBC::getConnection(); 

  $query = "SELECT uo.id, uo.message, u.name, u.email from user_order uo join users u on u.id = uo.user_id where uo.is_canceled = 0;";

  $statement = $connection->prepare($query);
  $statement->execute();

  $result = $statement->get_result();

  $orders = $result->fetch_all(MYSQLI_ASSOC);

  $statement->close();
  $connection->close();
}

?>


<div class="main-bg text-white p-5 text-container-3 ">
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
        <h1 class="display-4 text-center">Welcome, <i><?=$_SESSION["username"]?> to orders</i></h1>  
</div>
<div class="my-5 container justify-content-center d-flex pt-5" id="fade">
        
        <form class="text-container-6 mx-5 w-75 mb-5" action="../dbsystem/create_order.php" method="POST">
            <div class="mb-3 row">
                <label for="message" class="col-sm-2 col-form-label">Message</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="message" name="message" required>
                </div>
            </div>
            <div class="mb-3 row">
              
              <div class="col-sm-10">
                  <input class="form-check-input" type="checkbox" id="visibility" name="visibility" value="1">
                  <label class="form-check-label" for="visibility">Visible to others</label>
              </div>
            </div>
            <div class="row justify-content-center align-items-center my-5">       
                <button type="submit" class="btn btn-primary fs-3 col-lg-3 mt-4 col-sm-6 col-12">Create order</button>
            </div>     
        </form>
    </div>

    <h2 class="text-center">Orders</h2>
<main class="text-center container middle d-flex justify-content-center">
  
  <div class="container">
    <div class="row g-2">
      <?php foreach ($orders as $order): ?>
        <div class="col-xl-3 col-md-4 col-sm-6" style="border-radius: 8px;">
          <div class="card shadow-lg" >
            <div class="card-body" style="background-color: rgba(0, 0, 0, 0.6); border-radius: 8px; color: white;">
              <h3 class="card-text"><?= $order['message'] ?></h3>
              <p class="card-text"><?= $order['email'] ?> <?= $order['name'] ?></p>
              <?php if ($_SESSION['is_admin'] == '1' or $_SESSION["email"] == $order["email"]): ?>
                            <form action="../dbsystem/cancel_order.php" method="POST">
                                <input type="text" readonly class="form-control-plaintext d-none" name="id" value="<?=$order['id']?>">
                                <button type="submit"class="btn btn-danger">Cancel order</button>
                            </form>                   
                        <?php endif; ?>
            </div>
          </div>
        </div>
      <?php endforeach; ?>            

      </div>
  </div>
  
</main>

