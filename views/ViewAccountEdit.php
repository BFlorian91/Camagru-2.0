<?php

class ViewAccountEdit extends View
{

  function body()
  { ?>
    <div class="container container-settings">
      <div class="row justify-content-center mb-4">
        <button class="col-6 col-md-3 rounded font-poppins main-color text-white" onclick="toggleDiv('editName')">Edit Profile</button>
      </div>
      <div class="row justify-content-center mb-4">
        <button class="col-6 col-md-3 rounded font-poppins main-color text-white w-25" onclick="toggleDiv('editPass')">Edit Password</button>
      </div>
      <div class="row justify-content-center mb-4">
        <button class="col-6 col-md-3 rounded font-poppins main-color text-white w-25" onclick="toggleDiv('editMail')">Edit Email</button>
      </div>
      <div class="row justify-content-center mb-4">
        <button class="col-6 col-md-3 rounded font-poppins w-25 main-color text-white" onclick="toggleDiv('mailNotif')">Mail notification</button>
      </div>

      <!-- username -->
      <div id="editName" class="mb-4" style="display: none;">
      <hr class="blue-light">
      <form action="#" onsubmit="return checkUsername()" method="post">
        <div class="md-form">
          <input name="editUsername" type="text" id="editUsername" class="form-control rounded" placeholder="username">
          <button type="submit" id="btnUser" class="rounded w-100 main-color" style="color: white;">Submit</button>
        </div>
      </form>
      </div>

      <!-- password -->
      <div class="mb-4 mt-4" id="editPass" style="display:none">
        <hr class="blue-light">
        <form onsubmit="return checkPassword()" method="post">
          <div class="md-form">
            <input name="oldPassword" type="password" id="oldPassword" class="form-control rounded" placeholder="old password">
          </div>
          <div class="md-form">
            <input name="newPassword" type="password" id="newPassword" class="form-control rounded" placeholder="new password">
          </div>
          <div class="md-form">
            <input name="confirmPassword" type="password" id="confirmPassword" class="form-control rounded" placeholder="confirm password">
          </div>
          <button type="submit" id="btnPass" class="rounded w-100 main-color" style="color: white;">Submit</button>
        </form>
      </div>

      <!-- email -->
      <div class="mb-4" id="editMail" style="display: none;">
        <hr class="blue-light">
        <form method="post">
          <div class="md-form">
            <input name="editEmail" type="email" id="editEmail" class="form-control" placeholder="email">
            <button type="submit" class="rounded w-100 main-color text-white">Submit</button>
          </div>
        </form>
      </div>

      <!-- mailNotification -->
      <div class="mb-4" id="mailNotif" style="display: none;">
      <?php
        $notif = new ModelEditAccount();
        $notif->checkStatusMailNotification();
      ?>
        <hr class="blue-light">
        <form method="post">
          <div class="custom-control custom-switch">
            <div class=" row justify-content-center">
              <input name="toggle" value="1" type="checkbox" class="custom-control-input" id="customSwitches" <?= $_SESSION['mailNotif'] == 1 ? 'checked' : ''?>>
              <label class="custom-control-label mb-4" for="customSwitches">Mail notification</label> 
            </div>
            <div class="row col">
              <button name="mailNotifSub" type="submit" class="rounded w-100 main-color text-white">Submit</button>
            </div>
          </div>
        </form>
      </div>
      <script src="/lib/javascript/toggle.js"></script>
      <script src="/lib/javascript/main.js"></script>
    </div>
<?php
  }
}
