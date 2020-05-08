<!-- <form class="shake" data-toggle="validator" id=
  "registerForm" name="registerForm" role="form">
    <div class="col-md-12">
      <div class="form-group">
        <input class="form-control" data-error=
        "Please enter your name" id="name" placeholder=
        "Your Name" required="" type="text">
        <div class="help-block with-errors"></div>
      </div>
      <div class="form-group">
        <input class="form-control" data-error=
        "Please enter your email" id="email"
        placeholder="Your Email" required="" type=
        "email">
        <div class="help-block with-errors"></div>
      </div>
      <div class="form-group">
        <input class="form-control" data-error=
        "Please enter your password" id=
        "password" placeholder="Password" required=""
        type="password">
        <div class="help-block with-errors"></div>
      </div>
    </div>
    <div class="col-md-12">
      <p>
        <a href="login.php">Login</a>
      </p>
    </div>
    <div class="col-md-12">
      <button class="btn btn-common btn-sn" id="submit"
      type="submit">Register</button>
      <div class="h3 text-center hidden" id="msgSubmit">
      </div>
      <div class="clearfix"></div>
    </div>
</form> -->


<!-- <div class="row">
  <div class="col-mb-3"> -->
    <div class="card">
      <div class="card-body">
        <div class="e-profile">
          <div class="row">
            <div class="d-flex justify-content-between col-md-6 ol-sm-auto mb-3">
              <div class="mx-auto">
                <div class="d-flex justify-content-center align-items-center rounded"
                  style="height: 140px; background-color: rgb(233, 236, 239);">
                </div>
              </div>
            </div>
            <div class="d-flex flex-column flex-sm-row justify-content-between col-md-6">
              <div class="text-center mb-10 mb-sm-0">
                <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap"><?= $user->name ?></h4>
                <p class="mb-0">@<?= $user->login ?></p>
                <div class="mt-2">
                  <button class="btn btn-primary" type="button">
                    <i class="fa fa-fw fa-camera"></i>
                    <span>Change Photo</span>
                  </button>
                </div>
              </div>
              <div class="text-center text-sm-right">
                <div class="text-muted"><small>Joined <?= date_format(new DateTime($user->createdAt),  'Y M d') ?></small></div>
              </div>
            </div>
          </div>
          <ul class="nav nav-tabs" style="margin-bottom: 20px;">
            <li class="nav-item"><a href="user-info.php" class="active nav-link">Settings</a></li>
          </ul>
          <div class="tab-content pt-3">
            <div class="tab-pane active">
              <form class="form" novalidate="">
                <div class="row">
                  <div class="col">
                    <div class="row">
                      <div class="col">
                        <div class="form-group">
                          <label>Full Name</label>
                          <input class="form-control" type="text" name="name" placeholder="<?= $user->name ?>"
                            value="<?= $user->name ?>">
                        </div>
                      </div>
                      <div class="col">
                        <div class="form-group">
                          <label>Username</label>
                          <input class="form-control" type="text" name="username" placeholder="johnny.s"
                            value="johnny.s">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col">
                        <div class="form-group">
                          <label>Email</label>
                          <input class="form-control" type="text" placeholder="<?= $user->email ?>"
                            value="<?= $user->email ?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col mb-3">
                        <div class="form-group">
                          <label>About</label>
                          <textarea class="form-control" rows="5" placeholder="<?= $user->bio ?>"><?= $user->bio ?></textarea>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12 col-sm-6 mb-3">
                    <div class="mb-2"><b>Change Password</b></div>
                    <div class="row">
                      <div class="col">
                        <div class="form-group">
                          <label>Current Password</label>
                          <input class="form-control" type="password" placeholder="••••••">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col">
                        <div class="form-group">
                          <label>New Password</label>
                          <input class="form-control" type="password" placeholder="••••••">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col">
                        <div class="form-group">
                          <label>Confirm <span class="d-none d-xl-inline">Password</span></label>
                          <input class="form-control" type="password" placeholder="••••••"></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col d-flex justify-content-end">
                    <button class="btn btn-primary" type="submit">Save Changes</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  <!-- </div>
</div> -->