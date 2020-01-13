<?php

class ViewSignup extends View
{
  public function body()
  { ?>
    <div class="container">
      <form class="text-center p-5" action="#!">

        <p class="h4 mb-4">Sign up</p>

        <div class="form-row mb-4">
          <div class="col">
            <!-- First name -->
            <input type="text" name="firstName" id="defaultRegisterFormFirstName" class="form-control" placeholder="First name">
          </div>
          <div class="col">
            <!-- Last name -->
            <input type="text" name="lastName" id="defaultRegisterFormLastName" class="form-control" placeholder="Last name">
          </div>
        </div>

        <!-- E-mail -->
        <input type="email" name="email" id="defaultRegisterFormEmail" class="form-control mb-4" placeholder="E-mail">

        <!-- Password -->
        <input type="password" name="password" id="defaultRegisterFormPassword" class="form-control" placeholder="Password" aria-describedby="defaultRegisterFormPasswordHelpBlock">
        <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
          At least 8 characters and 1 digit
        </small>

        <!-- Phone number -->
        <input type="text" name="phoneNumber" id="defaultRegisterPhonePassword" class="form-control" placeholder="Phone number" aria-describedby="defaultRegisterFormPhoneHelpBlock">
        <small id="defaultRegisterFormPhoneHelpBlock" class="form-text text-muted mb-4">
          Optional - for two step authentication
        </small>

        <!-- Newsletter -->
        <div class="custom-control custom-checkbox">
          <input type="checkbox" name="newsletter" class="custom-control-input" id="defaultRegisterFormNewsletter">
          <label class="custom-control-label" for="defaultRegisterFormNewsletter">Subscribe to our newsletter</label>
        </div>

        <!-- Sign up button -->
        <button class="btn btn-info my-4 btn-block" type="submit">Sign in</button>

        <!-- Social register -->
        <p>or sign up with:</p>

        <a href="index.php?url=not-available" class="mx-2" role="button"><i class="fab fa-facebook-f light-blue-text"></i></a>
        <a href="index.php?url=not-available" class="mx-2" role="button"><i class="fab fa-twitter light-blue-text"></i></a>
        <a href="index.php?url=not-available" class="mx-2" role="button"><i class="fab fa-linkedin-in light-blue-text"></i></a>
        <a href="index.php?url=not-available" class="mx-2" role="button"><i class="fab fa-github light-blue-text"></i></a>

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
