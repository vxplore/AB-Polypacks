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

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-list-task"></i><span>Product</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a class="collapsed" href="product-category.html">
          <i class="bi bi-circle"></i><span>Product Category</span>
        </a>
      </li>
      <li>
        <a href="product-list.html">
          <i class="bi bi-circle"></i><span>Product List</span>
        </a>
      </li>
      
    </ul>
  </li><!-- End Product Nav -->

  <li class="nav-item">
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
  </li><!-- End Blog Nav -->

   <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#pages-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-list-check"></i><span>Pages</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="pages-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="home.html">
          <i class="bi bi-circle"></i><span>Home</span>
        </a>
      </li>
      <li>
        <a href="about-us.html">
          <i class="bi bi-circle"></i><span>About Us</span>
        </a>
      </li>
      <li>
        <a href="products.html">
          <i class="bi bi-circle"></i><span>Products</span>
        </a>
      </li>
      <li>
        <a href="infrastructure.html">
          <i class="bi bi-circle"></i><span>Infrastructure</span>
        </a>
      </li>
      <li>
        <a href="quality.html">
          <i class="bi bi-circle"></i><span>Quality</span>
        </a>
      </li>
      <li>
        <a href="career.html">
          <i class="bi bi-circle"></i><span>Career</span>
        </a>
      </li>
      <li>
        <a href="client.html">
          <i class="bi bi-circle"></i><span>Client</span>
        </a>
      </li>
      <li>
        <a href="blogs.html">
          <i class="bi bi-circle"></i><span>Blogs</span>
        </a>
      </li>
      <li>
        <a href="contact-us.html">
          <i class="bi bi-circle"></i><span>Contact Us</span>
        </a>
      </li>
 
      
    </ul>
  </li><!-- End Pages Nav -->



  <li class="nav-item">
    <a class="nav-link collapsed" href="our-clients.html">
      <i class="bi bi-people"></i>
      <span>Our Clients</span>
    </a>
  </li><!-- End Clients Page Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="testimonials.html">
      <i class="bi bi-asterisk"></i>
      <span>Testimonials</span>
    </a>
  </li><!-- End F.A.Q Page Nav -->
  <li class="nav-item">
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
  </li><!-- End Contact Page Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="newsletter.html">
      <i class="bi bi-card-list"></i>
      <span>Newsletter</span>
    </a>
  </li><!-- End Newsletter Page Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="users.html">
     <i class="bi bi-person-plus"></i>
      <span>Users</span>
    </a>
  </li><!-- End Login Page Nav -->
</ul>

</aside><!-- End Sidebar-->