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

<main class="text-center container middle d-flex justify-content-around">
    
  
  <div class="row g-2">
      <div class="col-xl-4 col-md-6 col-sm-12 shadow-lg" style="border-radius: 8px;">
          <div class="card" style="background-image: url('/img/Noodles.jpg'); background-size: cover; background-position: center; color: white; border: none; border-radius: 8px;">
            <div class="card-body" style="background-color: rgba(0, 0, 0, 0.6); border-radius: 8px;">
              <h4 class="card-title">Japanese Noodles</h4>
              <p class="card-text">A noodle dish that is a breath of Asian cuisine and brings a unique taste explosion.</p>
              <a href="#" class="btn btn-primary">Order for 6$</a>
            </div>
          </div>
      </div>
  
      <div class="col-xl-4 col-md-6 col-sm-12 shadow-lg" style="border-radius: 8px;">
          <div class="card" style="background-image: url('/img/SushiBox.jpg'); background-size: cover; background-position: center; color: white; border: none; border-radius: 8px;">
            <div class="card-body" style="background-color: rgba(0, 0, 0, 0.6); border-radius: 8px;">
              <h4 class="card-title">Sushi Box</h4>
              <p class="card-text">Order our exclusive Sushi Box containing different types of fresh sushi.</p>
              <a href="#" class="btn btn-primary">Order for 5$</a>
            </div>
          </div>
      </div>
  
      <div class="col-xl-4 col-md-6 col-sm-12 shadow-lg" style="border-radius: 8px;">
          <div class="card" style="background-image: url('/img/NikuUdon.jpg'); background-size: cover; background-position: center; color: white; border: none; border-radius: 8px;">
            <div class="card-body" style="background-color: rgba(0, 0, 0, 0.6); border-radius: 8px;">
              <h4 class="card-title">Japanese Noodles</h4>
              <p class="card-text">Savor the flavors of tender beef slices and savory broth in this authentic Japanese dish.</p>
              <a href="#" class="btn btn-primary">Order for 4$</a>
            </div>
          </div>
      </div>
    </div>
</main>

