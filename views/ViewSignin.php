<?php

class ViewSignin extends View
{
  public function body()
  { ?>
    <div class="container">
      <form class="text-center p-5" action="#!">

        <p class="h4 mb-4">Sign in</p>

        <!-- Email -->
        <input type="email" id="defaultLoginFormEmail" class="form-control mb-4" placeholder="E-mail">

        <!-- Password -->
        <input type="password" id="defaultLoginFormPassword" class="form-control mb-4" placeholder="Password">

        <div class="d-flex justify-content-between">
          <div>
            <!-- Remember me -->
            <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" id="defaultLoginFormRemember">
              <label class="custom-control-label" for="defaultLoginFormRemember">Remember me</label>
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
          <a href="index.php?url=signup">Register</a>
        </p>

        <!-- Social login -->
        <p>or sign in with:</p>

        <a href="index.php?url=not-available" class="mx-2" role="button"><i class="fab fa-facebook-f light-blue-text"></i></a>
        <a href="index.php?url=not-available" class="mx-2" role="button"><i class="fab fa-twitter light-blue-text"></i></a>
        <a href="index.php?url=not-available" class="mx-2" role="button"><i class="fab fa-linkedin-in light-blue-text"></i></a>
        <a href="index.php?url=not-available" class="mx-2" role="button"><i class="fab fa-github light-blue-text"></i></a>

      </form>
    </div>
<?php
  }
}
