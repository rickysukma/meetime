  <aside class="profile-nav col-lg-3">
      <section class="panel">
          <div class="user-heading round">
              <a href="#">
                  <img src="<?php echo site_url()?>assets/images/admin/admin2.jpg" alt="">
              </a>
              <h1><?php echo $this->session->userdata('name')?></h1>
              <p><?php echo $this->session->userdata('email')?></p>
          </div>
          <ul class="nav nav-pills nav-stacked">
              <li class="<?php if ($active=="home"):?>active<?php endif?>"><a href="<?php echo site_url()?>admin/user"> <i class="icon-user"></i> Profile</a></li>
              <li class="<?php if ($active=="edit"):?>active<?php endif?>"><a href="<?php echo site_url()?>admin/user/edit"> <i class="icon-edit"></i> Ubah profile</a></li>
              <li class="<?php if ($active=="passwd"):?>active<?php endif?>"><a href="<?php echo site_url()?>admin/user/password"> <i class="icon-key"></i> Ubah Password</a></li>
          </ul>
      </section>
  </aside>