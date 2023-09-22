<?php 

  function render_rating_HTML($rating) {
    $rating_HTML = "";
    $full_star = "<i class='bi bi-star-fill text-warning'></i>";
    $half_star = "<i class='bi bi-star-half text-warning'></i>";

    $rating_array = explode(".", $rating);
    $value = $rating_array[0];
    $rem = (!empty($rating_array[1])) ? $rating_array[1] : 0;
    for ($i=1; $i<=$value; $i++) {
      $rating_HTML .= $full_star;
    }
    if ($rem > 0) {
      $rating_HTML .= $half_star;
    }

    return $rating_HTML;
  }

?>

<link rel="stylesheet" href="<?=base_url('assets/admin/css/5-star-rating-style.css')?>">
<main id="main" class="main">

  <div class="pagetitle d-flex align-items-center justify-content-between">
      <div> <h1>Testimonials</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?=base_url('admin')?>">Home</a></li>
          <li class="breadcrumb-item active">Testimonials</li>
        </ol>
      </nav></div>
      <div><a href="javascript:add_new_testimonial()" type="button" class="btn btn-success text-uppercase py-2 rounded-1"><i class="bi bi-plus"></i> Add New Testimonial</a></div>
  </div>

  <section class="section">
    <div class="card">
        <div class="card-body">
          <h5 class="card-title">Testimonials List</h5>
          <?php if (!empty($list_of_testimonials)) { ?>
            <div class="table-responsive min-height-300px" style="overflow-y:auto;">
              <table id="testimonials_listing_table" class="table table-hover table-bordered">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">No. </th>
                    <th scope="col">Name</th>
                    <th scope="col">Image</th>
                    <th scope="col" style="width:15%;">Rating</th>
                    <th scope="col" style="width:40%;">Testimonial</th>
                    <th scope="col">Status</th>
                    <th scope="col">Options</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($list_of_testimonials as $i => $testimonial_details) { ?>
                    <tr data-testimonial-id="<?=$testimonial_details->testimonial_id?>">
                      <th scope="row">
                        <div class="drag-handle"><i class="bi bi-list"></i></div>
                      </th>
                      <td scope="row" class="font-weight-600">
                        <?=(!empty($testimonial_details->appearing_order)) ? $testimonial_details->appearing_order : $i+1;?>
                      </td>
                      <td scope="row" data-column="customer_name">
                        <?=$testimonial_details->customer_name?>
                      </td>
                      <td scope="row" data-column="customer_image" align="center">
                          <img src="<?=base_url($testimonial_details->customer_image)?>" alt="" height="50px">
                      </td>
                      <td scope="row" data-column="rating" style="width:15%;">
                        <?php $rating = $testimonial_details->rating;
                        $ratingHTML = render_rating_HTML($rating); ?>
                        <input type="hidden" class="rating-value" value="<?=$testimonial_details->rating?>"/>
                        <div><?=$ratingHTML?></div>
                      </td>
                      <td scope="row" data-column="testimonial" style="width:40%;">
                        <p><?=$testimonial_details->testimonial?></p>
                      </td>
                      <td scope="row">
                        <?php $testimonial_id = (!empty($testimonial_details->testimonial_id)) ? $testimonial_details->testimonial_id : '';
                        if (!empty($testimonial_details) && $testimonial_details->status == "ACTIVE") {
                          $checked_status = "checked";
                        } else {
                          $checked_status = "";
                        }?>
                        <div class="toggle-switch">
                          <input type="checkbox" id="status_toggler_<?=$i+1?>" data-testimonial-id="<?=$testimonial_id?>" <?=$checked_status?> onchange="change_testimonial_status(this)">
                          <label for="status_toggler_<?=$i+1?>"></label>
                        </div>
                      </td>
                      <td scope="row">
                        <div class="d-flex align-items-center">
                            <a class="editbtn bgedit" href="javascript:edit_testimonial('<?=$testimonial_details->testimonial_id?>')"><i class="bi bi-pencil"></i></a>
                            <a class="deletebtn bgdelete ms-2" href="javascript:delete_testimonial('<?=$testimonial_details->testimonial_id?>')"><i class="bi bi-trash3"></i></a>
                        </div>
                      </td>
                    </tr>
                  <?php }?>
                </tbody>
              </table>
            </div>
          <?php } else { ?>
            <div class="empty-container">
              <h5 class="empty-container-note">No Testimonials Found!</h5>
            </div>
          <?php } ?>
        </div>
    </div>
  </section>


  <!-- ================================ -->
  <!-- Add/Edit Testimonial Modal Start -->
  <!-- ================================ -->
  <div id="testimonial_modal" class="custommodal modal fade" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header py-2">
          <h5 id="testimonial_modal_title" class="modal-title text-white">Add New Testimonial</h5>
          <button type="button" class="btn-close" onclick="close_testimonial_modal()"></button>
        </div>
        <div class="modal-body">
          <form id="testimonial_details_form">
            <input type="hidden" name="testimonial_id" id="editable_testimonial_id">
            <div class="row">
                <div class="col-md-12 d-flex justify-content-center">
                  <label for="customer_image" id="customer_image_label" class="image-preview-container mb-3" style="width:100px;height:100px;">
                      <div id="text_preview_container" class="text-preview-container">
                          <span class="text-preview" style="font-size:16px; text-align:center;">Upload Image</span>
                      </div>
                      <img src="" id="image_preview" class="image-preview hide">
                      <input type="file" accept="image/jpg image/jpeg image/png" name="customer_image" id="customer_image" class="hidden-image-input" onchange="previewImage(this)">
                  </label>
                </div>
                <div class="col-md-12 mb-2">
                  <label for="customer_name" class="mb-1">Customer Name</label>
                  <input type="text" name="customer_name" id="customer_name" class="form-control" required>
                </div>

                <label>Rating</label>
                <div class="col-md-12 mb-1">
                  <fieldset id="rating" class="rating">
                        <input type="radio" id="star5" name="rating" value="5" classe="fa">
                        <label class = "full" for="star5" title="Awesome - 5 stars"></label>
                        <input type="radio" id="star4half" name="rating" value="4.5" classe="fa">
                        <label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
                        <input type="radio" id="star4" name="rating" value="4" classe="fa">
                        <label class = "full" for="star4" title="Pretty good - 4 stars"></label>
                        <input type="radio" id="star3half" name="rating" value="3.5" classe="fa">
                        <label class="half" for="star3half" title="Meh - 3.5 stars"></label>
                        <input type="radio" id="star3" name="rating" value="3" classe="fa">
                        <label class = "full" for="star3" title="Meh - 3 stars"></label>
                        <input type="radio" id="star2half" name="rating" value="2.5" classe="fa">
                        <label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
                        <input type="radio" id="star2" name="rating" value="2" classe="fa">
                        <label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
                        <input type="radio" id="star1half" name="rating" value="1.5" classe="fa">
                        <label class="half" for="star1half" title="Meh - 1.5 stars"></label>
                        <input type="radio" id="star1" name="rating" value="1" classe="fa">
                        <label class = "full" for="star1" title="Sucks big time - 1 star"></label>
                        <input type="radio" id="starhalf" name="rating" value="0.5" classe="fa">
                        <label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
                    </fieldset>
                </div>

                <div class="col-md-12 mb-1">
                  <label for="testimonial" class="mb-1">Write your Testimonial</label>
                  <textarea name="testimonial" id="testimonial" class="form-control" required style="height:200px;"></textarea>
                </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button form="testimonial_details_form" id="testimonial_details_form_submit_button" class="btn btn-dark" style="width:60.64px; height:38px;">Add</button>
        </div>
      </div>
    </div>
  </div>
  <!-- ============================== -->
  <!-- Add/Edit Testimonial Modal End -->
  <!-- ============================== -->


  <!-- =============================== -->
  <!-- Delete Confirmation Modal Start -->
  <!-- =============================== -->
  <div id="delete_confirmation_modal" class="custommodal modal fade" tabindex="-1">
    <div class="modal-dialog modal-sm modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-body text-center">
          <div class="mb-3">
            <svg height="50" viewBox="0 0 512 512" width="50" ><path d="m256 0c-141.164062 0-256 114.835938-256 256s114.835938 256 256 256 256-114.835938 256-256-114.835938-256-256-256zm0 0" fill="#f44336"/><path d="m350.273438 320.105469c8.339843 8.34375 8.339843 21.824219 0 30.167969-4.160157 4.160156-9.621094 6.25-15.085938 6.25-5.460938 0-10.921875-2.089844-15.082031-6.25l-64.105469-64.109376-64.105469 64.109376c-4.160156 4.160156-9.621093 6.25-15.082031 6.25-5.464844 0-10.925781-2.089844-15.085938-6.25-8.339843-8.34375-8.339843-21.824219 0-30.167969l64.109376-64.105469-64.109376-64.105469c-8.339843-8.34375-8.339843-21.824219 0-30.167969 8.34375-8.339843 21.824219-8.339843 30.167969 0l64.105469 64.109376 64.105469-64.109376c8.34375-8.339843 21.824219-8.339843 30.167969 0 8.339843 8.34375 8.339843 21.824219 0 30.167969l-64.109376 64.105469zm0 0" fill="#fafafa"/></svg>
          </div>
          <h4>Are you sure ?</h4>
          <p class="pb-0 mb-0">Do you really want to delete this product category ?</p>
          <form id="product_category_delete_form">
            <input type="hidden" name="category_id" id="deletable_category_id">
          </form>
        </div>
        <div class="modal-footer justify-content-center border-0">
          <button type="button" class="btn btn-secondary" onclick="close_delete_confirmation_modal()">Cancel</button>
          <button form="product_category_delete_form" id="product_category_delete_form_submit_button" class="btn btn-danger">Delete</button>
        </div>
      </div>
    </div>
  </div>
  <!-- ============================= -->
  <!-- Delete Confirmation Modal End -->
  <!-- ============================= -->

</main><!-- End #main -->

<script src="<?=base_url('assets/admin/js/jquery.dragsort.js')?>"></script>
<script>

  $("#product_categories_listing_table tbody").dragsort({
    dragSelector:"tr .drag-handle",
    placeHolderTemplate:"<tr></tr>",
    dragEnd: function() {
      change_category_appearing_order();
    }
  });

  function add_new_testimonial() {
    render_testimonial_modal();
    $("#testimonial_modal").modal("show");
  }

  function edit_testimonial(testimonial_id) {
    let row = $(`#testimonials_listing_table tbody tr[data-testimonial-id="${testimonial_id}"]`);
    let category_name = row.find("td[data-column='customer_name']").text().trim();
    let category_image = row.find("td[data-column='customer_image']").children("img").attr("src");
    let rating = row.find("td[data-column='rating']").children("input.rating-value").val();
    let testimonial = row.find("td[data-column='testimonial']").children("p").text().trim();
    let data = {
      id: testimonial_id,
      customer_name: category_name,
      customer_image: category_image,
      rating: rating,
      testimonial: testimonial
    };
    render_testimonial_modal(data);
    $("#testimonial_modal").modal("show");
  }

  function render_testimonial_modal(data = null) {
    $("#testimonial_details_form")[0].reset();
    $("#testimonial_details_form textarea[name='testimonial']").val("");
    if (typeof data == "object" && data != null) {
      $("#editable_testimonial_id").val(data.id);
      $("#testimonial_details_form input[name='customer_name']").val(data.customer_name);
      $(`#testimonial_details_form input[name="rating"][value="${data.rating}"]`).prop("checked", true);
      $("#testimonial_details_form textarea[name='testimonial']").val(data.testimonial);
      
      $("#customer_image_label .text-preview-container").addClass("hide");
      $("#customer_image_label .image-preview").attr("src", data.customer_image);
      $("#customer_image_label .image-preview").removeClass("hide");
      
      $("#testimonial_modal_title").text("Edit Testimonial Details");
      $("#testimonial_details_form_submit_button").text("Save");
    }
    else {
      $("#customer_image_label .image-preview").addClass("hide");
      $("#customer_image_label .image-preview").attr("src", "");
      $("#customer_image_label .text-preview-container").removeClass("hide");
      
      $("#testimonial_modal_title").text("Add New Testimonial");
      $("#testimonial_details_form_submit_button").text("Add");
    }
  }

  $("#testimonial_details_form").submit(function(e) {
    e.preventDefault();
    let formData = new FormData(this);
    let submitButton = $("#testimonial_details_form_submit_button");
    let submitButtonHTML = submitButton.html();
    let editableTestimonialId = $("#editable_testimonial_id").val();

    if (editableTestimonialId) {
      var URL = "<?=base_url('admin/testimonials/edit-testimonial-details')?>";
      var validationErrorMessage = "Please Choose an Customer Image to Edit Testimonial...";
      var errorMessage = "Something went wrong! Failed to edit testimonial details.";
    }
    else {
      var URL = "<?=base_url('admin/testimonials/add-new-testimonial')?>";
      var validationErrorMessage = "Please Choose an Customer Image to Add Testimonial...";
      var errorMessage = "Something went wrong! Failed to add new testimonial.";
    }

    let uploadedImageCount = document.getElementById("customer_image").files.length;
    if (uploadedImageCount > 0) {
      $.ajax({
        url: URL,
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        beforeSend: function() {
          submitButton.prop("disabled", true);
          submitButton.html(btnLoader);
        },
        complete: function() {
          submitButton.html(submitButtonHTML);
          submitButton.prop("disabled", false);
        },
        error: function(a, b, c) {
          toast(errorMessage, 3000);
          console.log(a);
          console.log(b);
          console.log(c);
        },
        success: function(response) {
          if (response.status == true) {
            close_testimonial_modal();
            toast(response.message, 1200);
            setTimeout(() => {
              location.reload();
            }, 800);
          }
          else if (response.status == false) {
            toast(response.message, 3000);
            console.log(response);
          }
          else {
            toast(errorMessage, 3000);
            console.log(response);
          }
        }
      });
    }
    else {
      toast(validationErrorMessage, 1800);
    }
  });

  function close_testimonial_modal() {
    $("#testimonial_modal").modal("hide");
  }

  function edit_product_category(category_id) {
    let row = $(`#product_categories_listing_table tbody tr[data-category-id="${category_id}"]`);
    let category_name = row.find("td[data-column='name']").text().trim();
    let category_image = row.find("td[data-column='image']").children("img").attr("src");
    let data = {
      id: category_id,
      name: category_name,
      image: category_image
    };
    render_product_category_modal(data);
    $("#product_category_modal").modal("show");
  }

  function change_category_appearing_order() {
    let rows = $("#product_categories_listing_table tbody tr");
    let category_appearing_orders = [];
    for (let i=0; i<rows.length; i++) {
      let row = rows[i];
      let appearing_order_details = {
        category_id: row.dataset.categoryId,
        appearing_order: parseInt(i+1)
      };
      category_appearing_orders.push(appearing_order_details);
    }

    $.ajax({
      url: "<?=base_url('admin/product/categories/change-category-appearing-order')?>",
      type: "POST",
      data: JSON.stringify(category_appearing_orders),
      contentType: "application/json",
      error: function(a, b, c) {
        toast("Something went wrong! Failed to change product category appearing order.", 3000);
        console.log(a);
        console.log(b);
        console.log(c);
      },
      success: function(response) {
        if (response.status == true) {
          toast(response.message, 1500);
          render_category_appearing_order(category_appearing_orders);
        }
        else if (response.status == false) {
          toast(response.message, 3000);
          console.log(response);
        }
        else {
          toast("Something went wrong! Failed to change client appearing order.", 3000);
          console.log(response);
        }
      }
    });
  }

  function render_category_appearing_order(category_appearing_orders) {
    category_appearing_orders.forEach((details, i) => {
      let row = $(`#product_categories_listing_table tbody tr[data-category-id="${details.category_id}"]`);
      row.children("td:first").text(details.appearing_order);
    });
  }

  function change_product_category_status(checkbox) {
    let categoryId = checkbox.dataset.categoryId;
    let checkedStatus = checkbox.checked;
    if (checkedStatus == true) {
      var postData = {
        category_id: categoryId,
        status: "ACTIVE"
      };
    }
    else {
      var postData = {
        category_id: categoryId,
        status: "INACTIVE"
      };
    }

    $.ajax({
      url: "<?=base_url('admin/product/categories/change-category-status')?>",
      type: "POST",
      data: postData,
      error: function(a, b, c) {
          toast("Something went wrong! Failed to change banner status.", 3000);
          console.log(a);
          console.log(b);
          console.log(c);
      },
      success: function(response) {
          if (response.status == true) {
            toast(response.message, 1200);
          }
          else if (response.status == false) {
            toast(response.message, 3000);
            console.log(response);
          }
          else {
            toast(errorMessage, 3000);
            console.log(response);
          }
      }
    });
  }

  function delete_product_category(category_id) {
    $("#deletable_category_id").val(category_id);
    $("#delete_confirmation_modal").modal("show");
  }

  $("#product_category_delete_form").submit(function(e) {
    e.preventDefault();
    let category_id = $("#deletable_category_id").val();

    $.ajax({
      url: "<?=base_url('admin/product/categories/delete/')?>"+category_id,
      type: "GET",
      error: function(a, b, c) {
        toast("Something went wrong! Failed to delete product category.", 3000);
        console.log(a);
        console.log(b);
        console.log(c);
      },
      success: function(response) {
        if (response.status == true) {
          $(`#product_categories_listing_table tbody tr[data-category-id="${category_id}"]`).remove();
          close_delete_confirmation_modal();
          toast(response.message, 1200);
        }
        else if (response.status == false) {
          toast(response.message, 3000);
          console.log(response);
        }
        else {
          toast("Something went wrong! Failed to delete product category.", 3000);
          console.log(response);
        }
      }
    });
  });

  function close_delete_confirmation_modal() {
    $("#delete_confirmation_modal").modal("hide");
    $("#product_category_delete_form")[0].reset();
  }

</script>