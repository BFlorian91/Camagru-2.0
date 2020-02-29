<?php

class ViewSignin extends View
{
  public function body()
  { ?>
    <div class="container container-settings">
      <form class="text-center p-5" method="POST">

        <p class="h4 mb-4">Sign in</p>

        <!-- Username -->
        <input name="username" type="text" id="defaultLoginFormEmail" class="form-control mb-4" placeholder="Username">

        <!-- Password -->
        <input name="password" type="password" id="defaultLoginFormPassword" class="form-control mb-4" placeholder="Password">

        <div class="d-flex justify-content-between">
          <div>
            <!-- Remember me -->
            <div class="custom-control custom-checkbox">
              <!-- <input type="checkbox" class="custom-control-input" id="defaultLoginFormRemember">
              <label class="custom-control-label" for="defaultLoginFormRemember">Remember me</label> -->
            </div>
          </div>
          <div>
            <!-- Forgot password -->
            <a href="index.php?url=not-available">Forgot password?</a>
          </div>
        </div>

        <!-- Sign in button -->
        <button class="btn btn-info btn-block my-4" type="submit">Sign in</button>

        <!-- Register -->
        <p>Not a member?
          <a href="signup">Register</a>
        </p>
      </form>
    </div>
<?php
  }
}
