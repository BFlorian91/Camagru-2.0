<?php

class ViewAccountEdit extends View
{

  function body()
  { ?>
    <div class="container container-settings">
      <div class="row justify-content-center mb-4">
        <button class="rounded font-poppins main-color text-white w-25" onclick="toggleDiv('editName'); checkUsername()">Edit Profile</button>
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
        <div class="md-form">
          <input type="text" id="editUsername" class="form-control rounded" placeholder="username">
          <button type="submit" id="btnSubmit" class="rounded w-100 main-color text-white">Submit</button>
        </div>
      </div>

      <!-- password -->
      <div class="mb-4 mt-4" id="editPass" style="display:none">
      <hr class="blue-light">
        <div class="md-form">
          <input type="password" id="actualPassword" class="form-control rounded" placeholder="old password">
        </div>
        <div class="md-form">
          <input type="password" id="newPassword" class="form-control rounded" placeholder="new password">
        </div>
        <div class="md-form">
          <input type="password" id="confirmPassword" class="form-control rounded" placeholder="confirm password">
        </div>
        <button type="submit" onclick="toggleDiv('editPass')" class="rounded w-100 main-color text-white">Submit</button>
      </div>

      <!-- email -->
      <div class="mb-4" id="editMail" style="display: none;">
      <hr class="blue-light">
        <div class="md-form">
          <input type="email" id="editMail" class="form-control" placeholder="email">
          <button type="submit" onclick="toggleDiv('editMail')" class="rounded w-100 main-color text-white">Submit</button>
        </div>
      </div>
      <script src="/lib/javascript/toggle.js"></script>
      <script src="/lib/javascript/main.js"></script>
    </div>
<?php
  }
}
