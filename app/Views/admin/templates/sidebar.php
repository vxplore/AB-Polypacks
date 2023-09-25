<?php
  $URL_path = uri_string();
  $URL_segment = explode("/", $URL_path);
?>
<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">
  <li class="nav-item">
    <a class="nav-link <?=($URL_segment[1] == "dashboard") ? '' : 'collapsed'?>" 
    href="<?=base_url('admin/dashboard')?>">
      <i class="bi bi-grid"></i>
      <span>Dashboard</span>
    </a>
  </li><!-- End Dashboard Nav -->

  <li class="nav-item">
    <a class="nav-link <?=($URL_segment[1] == "SEO") ? '' : 'collapsed'?>" 
    href="<?=base_url("admin/SEO")?>">
      <i class="bi bi-megaphone"></i>
      <span>SEO</span>
    </a>
  </li><!-- End SEO Page Nav -->

  <?php if ($URL_segment[1] == "pages") {
    $pages_item_active_status = "";
    $pages_list_showing_status = "show";
  } else {
    $pages_item_active_status = "collapsed";
    $pages_list_showing_status = "";
  }?>
  <li class="nav-item">
    <a class="nav-link <?=$pages_item_active_status?>" data-bs-target="#pages-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-list-check"></i><span>Pages</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <?php if (!empty($pages)) { ?>
      <ul id="pages-nav" class="nav-content collapse <?=$pages_list_showing_status?>" data-bs-parent="#sidebar-nav">
        <?php $end_URL_segment = end($URL_segment);
        foreach ($pages as $i => $page_details) { 
          if ($end_URL_segment == $page_details->page_id) {
            $page_link_active_status = "active";
          } else {
            $page_link_active_status = "";
          }?>
          <li>
            <a class="<?=$page_link_active_status?>" href="<?=base_url('admin/pages/edit-content/'.$page_details->page_id)?>" target="_blank">
              <i class="bi bi-circle"></i><span><?=$page_details->name?></span>
            </a>
          </li>
        <?php } ?>
      </ul>
    <?php } ?>
  </li>

  <li class="nav-item">
    <a class="nav-link <?=($URL_segment[1] == "banners") ? '' : 'collapsed'?>" href="<?=base_url('admin/banners')?>">
    <i class="bi bi-images"></i>
      <span>Banners</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link <?=($URL_segment[1] == "clients") ? '' : 'collapsed'?>" href="<?=base_url('admin/clients')?>">
      <i class="bi bi-people"></i>
      <span>Clients</span>
    </a>
  </li>

  <?php if ($URL_segment[1] == "product") {
    $product_dropdown_active_status = "";
    $product_nav_items_showing_status = "show";
  } else {
    $product_dropdown_active_status = "collapsed";
    $product_nav_items_showing_status = "";
  }
  $end_URL_segment = end($URL_segment); ?>
  <li class="nav-item">
    <a class="nav-link <?=$product_dropdown_active_status?>" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-list-task"></i><span>Product</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="components-nav" class="nav-content collapse <?=$product_nav_items_showing_status?>" data-bs-parent="#sidebar-nav">
      <li>
        <a class="<?=(!empty($end_URL_segment) && $end_URL_segment == 'categories') ? 'active' : ''?>" href="<?=base_url('admin/product/categories')?>">
          <i class="bi bi-circle"></i><span>Product Category</span>
        </a>
      </li>
      <li>
        <a class="<?=(!empty($end_URL_segment) && $end_URL_segment == 'list') ? 'active' : ''?>" href="<?=base_url('admin/product/list')?>">
          <i class="bi bi-circle"></i><span>Product List</span>
        </a>
      </li>
      
    </ul>
  </li><!-- End Product Nav -->

  <!-- <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-star"></i><span>Blogs</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="blog-category.html">
          <i class="bi bi-circle"></i><span>Blog Category</span>
        </a>
      </li>
      <li>
        <a href="blog-list.html">
          <i class="bi bi-circle"></i><span>Blog List</span>
        </a>
      </li>
    </ul>
  </li> -->

  <li class="nav-item">
    <a class="nav-link <?=($URL_segment[1] == "testimonials") ? '' : 'collapsed'?>" href="<?=base_url('admin/testimonials')?>">
      <i class="bi bi-person-heart"></i>
      <span>Testimonials</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link <?=($URL_segment[1] == "contact-details") ? '' : 'collapsed'?>" href="<?=base_url('admin/contact-details')?>">
      <i class="bi bi-telephone"></i>
      <span>Contact Details</span>
    </a>
  </li>

  <!-- <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#Contact-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-journal-text"></i><span>Contact Us</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="Contact-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="contact-details.html">
          <i class="bi bi-circle"></i><span>Contact Details</span>
        </a>
      </li>
      <li>
        <a href="get-in-touch-form.html">
          <i class="bi bi-circle"></i><span>Get In Touch Form</span>
        </a>
      </li>
    </ul>
  </li> -->

  <!-- <li class="nav-item">
    <a class="nav-link collapsed" href="newsletter.html">
      <i class="bi bi-card-list"></i>
      <span>Newsletter</span>
    </a>
  </li> -->

  <!-- <li class="nav-item">
    <a class="nav-link collapsed" href="users.html">
     <i class="bi bi-person-plus"></i>
      <span>Users</span>
    </a>
  </li> -->
</ul>

</aside>