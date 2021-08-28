<div class="col-10">

<div class="row px-3">
    <div class="col-6 mt-4">
        <?php if($this->uri->segment(2) == 'form' || $this->uri->segment(2) == 'detail'): ?>
        <span class="fontsize-small">
            <a class="text-decoration-none text-light opacity-half hover hover-opacity" href="<?php echo site_url().$url; ?>">
                <i class="os-icon os-icon-arrow-left7 mr-2"></i><?php echo $title; ?>
            </a>
        </span>
        <?php else: ?>
    	<h6 class="mb-4 text-uppercase fontsize-smaller text-light breadcrumb-title">
            <?php if($title == ''): ?>
                <i class="os-icon os-icon-wallet-loaded mr-2 rounded-circle p-2 text-light"></i> <?php echo $subtitle; ?>
            <?php else: ?>
    		  <i class="os-icon os-icon-wallet-loaded mr-2 rounded-circle p-2 text-light"></i> <span class="opacity-half"><?php echo $status; ?></span> | <?php echo $title; ?>
            <?php endif; ?>
    	</h6>
        <?php endif; ?>
    </div>
    <div class="col-6">
        <div class="position-relative text-right py-2">
            <div class="logged-user-i">
                <div class="avatar-w">
                	<img src="<?php echo base_url(); ?>assets/user/avatar1.jpg" />
                </div>
                <div class="text-left pl-3 mt-2 text-light">
                    <h6 class="mb-0 fontsize-smaller height-space-small"><?php echo admin_login()->user_fullname; ?></h6>
                    <span class="text-uppercase fontsize-miniest letter-spacing">Owner</span>
                </div>
                <div class="logged-user-menu color-style-bright">
                    <div class="logged-user-avatar-info p-3">
                        <div class="avatar-w"><img alt="" src="<?php echo base_url(); ?>assets/user/avatar1.jpg" /></div>
                        <div class="text-light text-left pl-3">
                            <h6 class="mb-0 fontsize-smaller height-space-small">
                                <?php echo admin_login()->user_fullname; ?>
                            </h6>
                            <span class="text-uppercase letter-spacing fontsize-miniest">Owner</span>
                        </div>
                    </div>
                    <div class="bg-icon"><i class="os-icon os-icon-settings"></i></div>
                    <ul class="fontsize-smaller px-2">
                        <!-- <li><a href="apps_email.html">Lihat Profil</a></li> -->
                        <li><a href="<?php echo site_url(); ?>logout">Keluar</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>