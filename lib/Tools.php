<?php

  class Tools
  {
    public function success($message)
    {?>
      <div style="text-align: center; margin-top: 130px; font-size: 20px;">
        <span style="color: green; font-weight: bold;">Success: </span> <?= $message ?>
      </div>
      <?php
    }

    public function error($message)
    {?>
      <div style="text-align: center; margin-top: 130px; font-size: 20px">
        <span style="color: red; font-weight: bold;">Error: </span> <?= $message ?>
      </div>
      <?php
    }
  }