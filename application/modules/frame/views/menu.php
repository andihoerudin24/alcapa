<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php if(!isset($this->session->userdata['klick_admin']))
{
    redirect('login');
}
?>

<div class="container-fluid wrapper">
    <div class="row">
        <div class="col-2 p-0 bg-core menu-content">
        	<h6 class="pt-2 pb-3 text-uppercase mb-0 bg-second">
                <div class="row">
                    <div class="col-10 offset-1">
                        <div class="text-white">
                            <label class="fontsize-smaller mb-0 opacity-half fontsize-mini">Back Office</label>
                            <div>
                                <img src="<?php echo base_url(); ?>assets/logo-white.png" width="150">
                            </div>
                        </div>
                    </div>
                </div>
        	</h6>
        	<div class="menu-w color-style-transparent menu-position-side menu-side-left sub-menu-style-over sub-menu-color-bright menu-activated-on-hover menu-has-selected-link">
                <ul class="main-menu mt-4">
                    <li class="sub-header"><span>Sales Marketing</span></li>
                    <li class="<?php if($this->uri->segment(1) == 'transaction'): ?>activated <?php endif; ?> selected">
                        <a href="<?php echo site_url(); ?>transaction">
                            <div class="icon-w"><div class="os-icon os-icon-wallet-loaded"></div></div>
                            <span>Transaction</span>
                        </a>
                        
                     
<!--                         <div class="sub-menu-w">
                            <div class="sub-menu-header text-uppercase">Menu Orders</div>
                            <div class="sub-menu-icon"><i class="os-icon os-icon-wallet-loaded"></i></div>
                            <div class="sub-menu-i">
                                <ul class="sub-menu">
                                    <li><a href="<?php echo site_url(); ?>orders">Transaksi</a></li>
                                    <li><a href="<?php echo site_url(); ?>customer">Customer</a></li>
                                </ul>
                            </div>
                        </div> -->
                    </li>
                    <li class="<?php if($this->uri->segment(1) == 'product'): ?>activated <?php endif; ?> selected">
                        <a href="<?php echo site_url(); ?>product">
                            <div class="icon-w"><div class="os-icon os-icon-users"></div></div>
                            <span>Product</span>
                        </a>
                    </li>
                    <li class="<?php if($this->uri->segment(1) == 'banner'): ?>activated <?php endif; ?> selected">
                        <a href="<?php echo site_url(); ?>banner">
                            <div class="icon-w"><div class="os-icon os-icon-users"></div></div>
                            <span>Banner</span>
                        </a>
                    </li>
                    <li class="<?php if($this->uri->segment(1) == 'report'): ?>activated <?php endif; ?> selected">
                        <a href="<?php echo site_url(); ?>report">
                            <div class="icon-w"><div class="os-icon os-icon-users"></div></div>
                            <span>Report</span>
                        </a>
                    </li>
                    <li class="<?php if($this->uri->segment(1) == 'customer'): ?>activated <?php endif; ?> selected">
                        <a href="<?php echo site_url(); ?>customer">
                            <div class="icon-w"><div class="os-icon os-icon-users"></div></div>
                            <span>Customer</span>
                        </a>
                    </li>
                </ul>
            </div>
            <hr class="line-menu">
        </div>