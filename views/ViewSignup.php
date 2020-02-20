<?php

class ViewSignup extends View
{
  public function body()
  { ?>
    <div class="container container-settings">
      <form class="text-center p-5" action="#!" method="POST">

        <p class="h4 mb-4">Sign up</p>

        <div class="form-row mb-4">
          <div class="col">
            <!-- Username -->
            <input type="text" name="username" id="defaultRegisterFormFirstName" class="form-control" placeholder="Username">
          </div>
        </div>

        <!-- E-mail -->
        <input type="email" name="email" id="defaultRegisterFormEmail" class="form-control mb-4" placeholder="E-mail">

        <!-- Password -->
        <input type="password" name="password" id="defaultRegisterFormPassword" class="form-control" placeholder="Password" aria-describedby="defaultRegisterFormPasswordHelpBlock" minlength="8">
        <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
          At least 8 characters and 1 digit
        </small>

        <!-- Newsletter -->
        <div class="custom-control custom-checkbox">
          <input type="checkbox" name="newsletter" class="custom-control-input" id="defaultRegisterFormNewsletter">
          <label class="custom-control-label" for="defaultRegisterFormNewsletter">Subscribe to our newsletter</label>
        </div>

        <!-- Sign up button -->
        <button class="btn btn-info my-4 btn-block" type="submit">Sign in</button>

        <!-- Social register -->
        <!-- <p>or sign up with:</p>

        <a href="index.php?url=not-available" class="mx-2" role="button"><i class="fab fa-facebook-f light-blue-text"></i></a>
        <a href="index.php?url=not-available" class="mx-2" role="button"><i class="fab fa-twitter light-blue-text"></i></a>
        <a href="index.php?url=not-available" class="mx-2" role="button"><i class="fab fa-linkedin-in light-blue-text"></i></a>
        <a href="index.php?url=not-available" class="mx-2" role="button"><i class="fab fa-github light-blue-text"></i></a> -->

        <hr>

        <!-- Terms of service -->
        <p>By clicking
          <em>Sign up</em> you agree to our
          <a href="index.php?url=not-available" target="_blank">terms of service</a>

      </form>
    </div>
<?php
  }
}
