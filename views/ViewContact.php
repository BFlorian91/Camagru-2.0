<?php

  class ViewContact extends View
  {
    public function body()
    { ?>
          <div class="modal-dialog" role="document">
            <div class="modal-content bg-dark">
              <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold text-white">Write to us</h4>
              </div>
              <div class="modal-body mx-3">
                <div class="md-form mb-5">
                  <i class="fas fa-user prefix grey-text"></i>
                  <input type="text" id="form34" class="form-control validate font-weight-light" placeholder="Your name">
                </div>

                <div class="md-form mb-5">
                  <i class="fas fa-envelope prefix grey-text"></i>
                  <input type="email" id="form29" class="form-control validate font-weight-light" placeholder="Your email">
                </div>

                <div class="md-form mb-5">
                  <i class="fas fa-tag prefix grey-text"></i>
                  <input type="text" id="form32" class="form-control validate font-weight-light" placeholder="Subject">
                </div>

                <div class="md-form">
                  <i class="fas fa-pencil prefix grey-text"></i>
                  <textarea type="text" id="form8" class="md-textarea form-control font-weight-light" placeholder="Your message" rows="4"></textarea>
                </div>

              </div>
              <div class="modal-footer d-flex justify-content-center">
                <button class="btn btn-info rounded w-50">Send</button>
              </div>
            </div>
          </div>
        </div>
      </div>

        <!-- <div class="text-center">
          <a href="" class="btn btn-default btn-rounded mb-4" data-toggle="modal" data-target="#modalContactForm">Launch
            Modal Contact Form</a>
        </div> -->
      <?php
    }
  }