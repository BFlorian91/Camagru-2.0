<?php

class ViewAccountEdit extends View
{

  function body()
  { ?>
    <div class="container container-settings">
      <div class="row justify-content-center mb-4">
        <button class="rounded font-poppins main-color text-white w-25" onclick="toggleDiv('editName')">Edit Profile</button>
      </div>
      <div class="row justify-content-center mb-4">
        <button class="rounded font-poppins main-color text-white w-25" onclick="toggleDiv('editPass')">Edit Password</button>
      </div>
      <div class="row justify-content-center mb-4">
        <button class="rounded font-poppins main-color text-white w-25" onclick="toggleDiv('editMail')">Edit Email</button>
      </div>

      <!-- username -->
      <div id="editName" class="mb-4" style="display: none;">
      <hr class="blue-light">
      <form action="#" onsubmit="return checkUsername()" method="post">
        <div class="md-form">
          <input type="text" id="editUsername" class="form-control rounded" placeholder="username">
          <button type="submit" id="btnUser" class="rounded w-100 main-color" style="color: white;">Submit</button>
        </div>
      </form>
      </div>

      <!-- password -->
      <div class="mb-4 mt-4" id="editPass" style="display:none">
        <hr class="blue-light">
        <form action="#" onsubmit="return checkPassword()" method="post">
          <div class="md-form">
            <input type="password" id="oldPassword" class="form-control rounded" placeholder="old password">
          </div>
          <div class="md-form">
            <input type="password" id="newPassword" class="form-control rounded" placeholder="new password">
          </div>
          <div class="md-form">
            <input type="password" id="confirmPassword" class="form-control rounded" placeholder="confirm password">
          </div>
          <button type="submit" id="btnPass" class="rounded w-100 main-color" style="color: white;">Submit</button>
        </form>
      </div>

      <!-- email -->
      <div class="mb-4" id="editMail" style="display: none;">
        <hr class="blue-light">
        <form action="#" method="post">
          <div class="md-form">
            <input type="email" id="editEmail" class="form-control" placeholder="email">
            <button type="submit" class="rounded w-100 main-color text-white">Submit</button>
          </div>
        </form>
      </div>
      <script src="/lib/javascript/toggle.js"></script>
      <script src="/lib/javascript/main.js"></script>
    </div>
<?php
  }
}
