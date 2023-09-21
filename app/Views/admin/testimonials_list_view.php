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
          <?php if (!empty($list_of_product_categories)) { ?>
            <div class="table-responsive min-height-300px">
              <table id="product_categories_listing_table" class="table table-hover table-bordered">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">No. </th>
                    <th scope="col">Name</th>
                    <th scope="col">Image</th>
                    <th scope="col">Status</th>
                    <th scope="col">Options</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($list_of_product_categories as $i => $category_details) { ?>
                    <tr data-category-id="<?=$category_details->category_id?>">
                      <th scope="row">
                        <div class="drag-handle"><i class="bi bi-list"></i></div>
                      </th>
                      <td scope="row" class="font-weight-600">
                        <?=(!empty($category_details->appearing_order)) ? $category_details->appearing_order : $i+1;?>
                      </td>
                      <td scope="row" data-column="name">
                        <?=$category_details->name?>
                      </td>
                      <td scope="row" data-column="image" align="center">
                          <img src="<?=base_url($category_details->image)?>" alt="" height="50px">
                      </td>
                      <td scope="row">
                        <?php $category_id = (!empty($category_details->category_id)) ? $category_details->category_id : '';
                        if (!empty($category_details) && $category_details->status == "ACTIVE") {
                          $checked_status = "checked";
                        } else {
                          $checked_status = "";
                        }?>
                        <div class="toggle-switch">
                          <input type="checkbox" id="status_toggler_<?=$i+1?>" data-category-id="<?=$category_id?>" <?=$checked_status?> onchange="change_product_category_status(this)">
                          <label for="status_toggler_<?=$i+1?>"></label>
                        </div>
                      </td>
                      <td scope="row">
                        <div class="d-flex align-items-center">
                            <a class="editbtn bgedit" href="javascript:edit_product_category('<?=$category_details->category_id?>')"><i class="bi bi-pencil"></i></a>
                            <a class="deletebtn bgdelete ms-2" href="javascript:delete_product_category('<?=$category_details->category_id?>')"><i class="bi bi-trash3"></i></a>
                        </div>
                      </td>
                    </tr>
                  <?php }?>
                </tbody>
              </table>
            </div>
          <?php } else { ?>
            <div class="empty-container">
              <h5 class="empty-container-note">No Product Categories Found!</h5>
            </div>
          <?php } ?>
        </div>
    </div>
  </section>


  <!-- ===================================== -->
  <!-- Add/Edit Product Category Modal Start -->
  <!-- ===================================== -->
  <div id="product_category_modal" class="custommodal modal fade" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header py-2">
          <h5 id="product_category_modal_title" class="modal-title text-white">Add New Product Category</h5>
          <button type="button" class="btn-close" onclick="close_product_category_modal()"></button>
        </div>
        <div class="modal-body">
          <form id="product_category_details_form">
            <input type="hidden" name="category_id" id="editable_category_id">
            <div class="row">
                <div class="col-md-12">
                  <div class="form-floating mb-3">
                    <input type="text" name="name" id="product_category_name" class="form-control" placeholder="Enter Category Name Here..." required>
                    <label for="product_category_name">Product Category Name</label>
                  </div>
                </div>
                <div class="col-md-12">
                  <label for="product_category_image" id="product_category_image_label" class="image-preview-container mb-3" style="height:200px;">
                      <div id="text_preview_container" class="text-preview-container">
                          <span class="text-preview">Upload Product Category Image</span>
                      </div>
                      <img src="" id="image_preview" class="image-preview hide">
                      <input type="file" accept="image/jpg image/jpeg image/png" name="image" id="product_category_image" class="hidden-image-input" onchange="previewImage(this)">
                  </label>
                </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button form="product_category_details_form" id="product_category_details_form_submit_button" class="btn btn-dark" style="width:60.64px; height:38px;">Add</button>
        </div>
      </div>
    </div>
  </div>
  <!-- =================================== -->
  <!-- Add/Edit Product Category Modal End -->
  <!-- =================================== -->


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

  function add_new_product_category() {
    render_product_category_modal();
    $("#product_category_modal").modal("show");
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

  $("#product_category_details_form").submit(function(e) {
    e.preventDefault();
    let formData = new FormData(this);
    let submitButton = $("#product_category_details_form_submit_button");
    let submitButtonHTML = submitButton.html();
    let editableCategoryId = $("#editable_category_id").val();

    if (editableCategoryId) {
      var URL = "<?=base_url('admin/product/categories/edit-category-details')?>";
      var validationErrorMessage = "Please Choose an Image to Edit Product Category...";
      var errorMessage = "Something went wrong! Failed to edit client details.";
    }
    else {
      var URL = "<?=base_url('admin/product/categories/add-new-category')?>";
      var validationErrorMessage = "Please Choose an Image to Add Product Category...";
      var errorMessage = "Something went wrong! Failed to add new product category.";
    }

    let uploadedImageCount = document.getElementById("product_category_image").files.length;
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
            close_product_category_modal();
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

  function render_product_category_modal(data = null) {
    $("#product_category_details_form")[0].reset();
    if (typeof data == "object" && data != null) {
      $("#editable_category_id").val(data.id);
      $("#product_category_details_form input[name='name']").val(data.name);
      
      $("#product_category_image_label .text-preview-container").addClass("hide");
      $("#product_category_image_label .image-preview").attr("src", data.image);
      $("#product_category_image_label .image-preview").removeClass("hide");
      
      $("#product_category_modal_title").text("Edit Product Category Details");
      $("#product_category_details_form_submit_button").text("Save");
    }
    else {
      $("#product_category_image_label .image-preview").addClass("hide");
      $("#product_category_image_label .image-preview").attr("src", "");
      $("#product_category_image_label .text-preview-container").removeClass("hide");
      
      $("#product_category_modal_title").text("Add New Product Category");
      $("#product_category_details_form_submit_button").text("Add");
    }
  }

  function close_product_category_modal() {
    $("#product_category_modal").modal("hide");
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