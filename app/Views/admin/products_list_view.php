<style>

    .collapsable-section {
        border-radius: 5px;
    }

    .collapsable-section-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        cursor: pointer;
    }

    .collapsable-section-header-data {
        display: flex;
        justify-content: flex-start; 
        align-items: center;
    }

    .collapsable-section-header-data img {
        height: 50px;
        margin-right: 18px;
        border: 1px solid #e7e7e7;
        border-radius: 5px;
    }

    .collapsable-section-header-data h4 {
        margin-bottom: 0;
        color: #525252;
        font-weight: 600;
    }

    .big-icon {
        font-size: 25px;
    }

    .collapsable-section-body {
        width: 100%;
        min-height: 300px;
    }

</style>
<main id="main" class="main">

  <div class="pagetitle d-flex align-items-center justify-content-between">
      <div> <h1>Products List</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?=base_url('admin')?>">Home</a></li>
          <li class="breadcrumb-item">Product</li>
          <li class="breadcrumb-item active">List</li>
        </ol>
      </nav></div>
      <!-- <div><a href="javascript:add_new_product_category()" type="button" class="btn btn-success text-uppercase py-2 rounded-1"><i class="bi bi-plus"></i> Add New Product Category</a></div> -->
  </div>
  <!-- End Page Title -->


  <section class="section">
    <?php if (!empty($categories_and_products_list)) {
    foreach ($categories_and_products_list as $i => $category_details) {
    $collapsable_section_id =  "collapsableSection".round($i+1);
    $collapsable_showing_status = ($i == 0) ? 'show' : '';?>
        <div class="collapsable-section card">
            <div class="card-header p-2">
                <div class="collapsable-section-header" onclick="toggleCollapsable('<?=$collapsable_section_id?>')">
                    <div class="collapsable-section-header-data">
                        <img src="<?=base_url($category_details['image'])?>" alt="" class="shadow-sm">
                        <h4><?=$category_details['name']?> Products</h4>
                    </div>
                    <div class="collapsable-section-header-controls">
                        <a class="px-2" onclick="add_new_product(event, '<?=$category_details['category_id']?>')"><i class="big-icon bi bi-plus-circle-fill text-success bg-white"></i></a>
                    </div>
                </div>
            </div>

            <div id="<?=$collapsable_section_id?>" class="collapse <?=$collapsable_showing_status?>">
                <div class="card-body p-2">
                    <div class="collapsable-section-body" data-category-id="<?=$category_details['category_id']?>">
                        <?php if (!empty($category_details['products_list'])) { ?>
                            <div class="table-responsive min-height-300px">
                            <table class="products-listing-table table table-hover table-bordered" data-category-id="<?=$category_details['category_id']?>">
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
                                <?php foreach ($category_details['products_list'] as $j => $product_details) { ?>
                                    <tr data-product-id="<?=$product_details->product_id?>">
                                    <th scope="row">
                                        <div class="drag-handle"><i class="bi bi-list"></i></div>
                                    </th>
                                    <td scope="row" class="font-weight-600">
                                        <?=(!empty($product_details->appearing_order)) ? $product_details->appearing_order : $i+1;?>
                                    </td>
                                    <td scope="row" data-column="name">
                                        <?=$product_details->name?>
                                    </td>
                                    <td scope="row" data-column="image" align="center">
                                        <img src="<?=base_url($product_details->image)?>" alt="" height="50px">
                                    </td>
                                    <td scope="row">
                                        <?php $status_toggler_id = "statusToggler".mt_rand(111, 999);
                                        $product_id = (!empty($product_details->product_id)) ? $product_details->product_id : '';
                                        if (!empty($product_details) && $product_details->status == "ACTIVE") {
                                        $checked_status = "checked";
                                        } else {
                                        $checked_status = "";
                                        }?>
                                        <div class="toggle-switch">
                                        <input type="checkbox" id="<?=$status_toggler_id?>" data-product-id="<?=$product_id?>" <?=$checked_status?> onchange="change_product_status(this)">
                                        <label for="<?=$status_toggler_id?>"></label>
                                        </div>
                                    </td>
                                    <td scope="row">
                                        <div class="d-flex align-items-center">
                                            <a class="editbtn bgedit" href="javascript:edit_product('<?=$category_details['category_id']?>', '<?=$product_details->product_id?>')"><i class="bi bi-pencil"></i></a>
                                            <a class="deletebtn bgdelete ms-2" href="javascript:delete_product('<?=$product_details->product_id?>')"><i class="bi bi-trash3"></i></a>
                                        </div>
                                    </td>
                                    </tr>
                                <?php }?>
                                </tbody>
                            </table>
                            </div>
                        <?php } else { ?>
                            <div class="empty-container">
                                <h5 class="empty-container-note">No Products Available!</h5>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    <?php }} ?>
  </section>


  <!-- ============================ -->
  <!-- Add/Edit Product Modal Start -->
  <!-- ============================ -->
  <div id="product_modal" class="custommodal modal fade" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header py-2">
          <h5 id="product_modal_title" class="modal-title text-white">Add New Product</h5>
          <button type="button" class="btn-close" onclick="close_product_modal()"></button>
        </div>
        <div class="modal-body">
          <form id="product_details_form">
            <input type="hidden" name="product_id" id="editable_product_id">
            <div class="row">
                <div class="col-md-12">
                  <div class="form-floating mb-3">
                    <select name="product_category_id" id="product_categories_list" class="form-select" required>
                      <?php if (!empty($categories_and_products_list)) {
                      foreach ($categories_and_products_list as $i => $details) {
                        echo "<option value='".$details["category_id"]."'>".$details["name"]."</option>";
                      }} else {
                        echo "<option value=''>No Product Categories Found!</option>";
                      } ?>
                    </select>
                    <label for="product_categories_list">Select Product Category</label>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-floating mb-3">
                    <input type="text" name="name" id="product_name" class="form-control" placeholder="Enter Product Name Here..." required>
                    <label for="product_name">Product Name</label>
                  </div>
                </div>
                <div class="col-md-12">
                  <label for="product_image" id="product_image_label" class="image-preview-container mb-3" style="height:200px;">
                      <div id="text_preview_container" class="text-preview-container">
                          <span class="text-preview">Upload Product Image</span>
                      </div>
                      <img src="" id="image_preview" class="image-preview hide">
                      <input type="file" accept="image/jpg image/jpeg image/png" name="image" id="product_image" class="hidden-image-input" onchange="previewImage(this)">
                  </label>
                </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button form="product_details_form" id="product_details_form_submit_button" class="btn btn-dark" style="width:60.64px; height:38px;">Add</button>
        </div>
      </div>
    </div>
  </div>
  <!-- ========================== -->
  <!-- Add/Edit Product Modal End -->
  <!-- ========================== -->


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
          <p class="pb-0 mb-0">Do you really want to delete this product ?</p>
          <form id="product_delete_form">
            <input type="hidden" name="product_id" id="deletable_product_id">
          </form>
        </div>
        <div class="modal-footer justify-content-center border-0">
          <button type="button" class="btn btn-secondary" onclick="close_delete_confirmation_modal()">Cancel</button>
          <button form="product_delete_form" id="product_delete_form_submit_button" class="btn btn-danger">Delete</button>
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
  let baseURL = `<?=base_url()?>`;

  function toggleCollapsable(collapsableSectionId) {
    $("#"+collapsableSectionId).collapse("toggle");
  }

  $("table tbody").dragsort({
    dragSelector:"tr .drag-handle",
    placeHolderTemplate:"<tr></tr>",
    dragEnd: function() {
      let currentRow = $(this);
      change_product_appearing_order(currentRow);
    }
  });

  function add_new_product(e, categoryId) {
    e.stopPropagation();
    let productCategory = $(`#product_categories_list option[value='${categoryId}']`);
    productCategory.attr("selected", "selected");
    let productCategoryName = productCategory.text().trim();

    render_product_modal();
    $("#product_modal_title").text("Add New "+productCategoryName+" Product");
    $("#product_details_form_submit_button").text("Add");
    $("#product_modal").modal("show");
  }

  function edit_product(categoryId, productId) {
    let row = $(`.products-listing-table[data-category-id="${categoryId}"] tbody tr[data-product-id="${productId}"]`);
    let productName = row.find("td[data-column='name']").text().trim();
    let productImage = row.find("td[data-column='image']").children("img").attr("src");
    let data = {
      id: productId,
      name: productName,
      image: productImage
    };
    render_product_modal(data);
    let productCategory = $(`#product_categories_list option[value='${categoryId}']`);
    productCategory.attr("selected", "selected");
    let productCategoryName = productCategory.text().trim();
    $("#product_modal_title").text("Edit "+productCategoryName+" Product");
    $("#product_details_form_submit_button").text("Save");
    $("#product_modal").modal("show");
  }

  function render_product_modal(data) {
    $("#product_details_form")[0].reset();
    if (typeof data == "object" && data != null) {
      $("#editable_product_id").val(data.id);
      $("#product_details_form input[name='name']").val(data.name);
      
      $("#product_image_label .text-preview-container").addClass("hide");
      $("#product_image_label .image-preview").attr("src", data.image);
      $("#product_image_label .image-preview").removeClass("hide");
    }
    else {
      $("#product_image_label .image-preview").addClass("hide");
      $("#product_image_label .image-preview").attr("src", "");
      $("#product_image_label .text-preview-container").removeClass("hide");
    }
  }

  $("#product_details_form").submit(function(e) {
    e.preventDefault();
    let formData = new FormData(this);
    let productCategoryId = formData.get("product_category_id");

    let submitButton = $("#product_details_form_submit_button");
    let submitButtonHTML = submitButton.html();
    let editableProductId = $("#editable_product_id").val();

    if (editableProductId) {
      var URL = "<?=base_url('admin/product/edit-product-details')?>";
      var validationErrorMessage = "Please Choose an Image to Edit Product...";
      var errorMessage = "Something went wrong! Failed to edit product details.";
    }
    else {
      var URL = "<?=base_url('admin/product/add-new-product')?>";
      var validationErrorMessage = "Please Choose an Image to Add Product...";
      var errorMessage = "Something went wrong! Failed to add new product.";
    }

    let uploadedImageCount = document.getElementById("product_image").files.length;
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
            if (response.data.hasOwnProperty("products_list")) {
              render_products_listing_table(productCategoryId, response.data.products_list);
            }
            close_product_modal();
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
    else {
      toast(validationErrorMessage, 1800);
    }
  });

  function close_product_modal() {
    $("#product_modal").modal("hide");
  }

  function render_products_listing_table(productCategoryId, productsList) {
    let tableContainer = $(`.collapsable-section-body[data-category-id="${productCategoryId}"]`);
    let productListingTable = $(`.products-listing-table[data-category-id="${productCategoryId}"]`);
    
    if (tableContainer.length > 0) {
      if (productListingTable.length > 0) {
        let tableRowsHTML = get_products_listing_table_HTML(productCategoryId, productsList, "tbody");
        productListingTable.children("tbody").html(tableRowsHTML);
      }
      else {
        let listingTableHTML = get_products_listing_table_HTML(productCategoryId, productsList, "table");
        tableContainer.html(listingTableHTML);
      }
    }
    else {
     toast("Failed to render products listing changes! Please reload to see the changes.", 4500); 
    }
  }

  function get_products_listing_table_HTML(productCategoryId, productsList, HTMLType) {
    let products_listing_table_HTML = "";
    let tableRowsHTML = "";
    if (productsList.length > 0) {
      productsList.forEach((productDetails, i) => {
        let statusTogglerId = "statusToggler"+Math.floor((Math.random() * 100) + 1);
        let productId = productDetails.product_id;
        let checkedStatus = (productDetails.status == "ACTIVE") ? "checked" : "";
        let row = `<tr data-product-id="${productDetails.product_id}">
          <th scope="row">
              <div class="drag-handle"><i class="bi bi-list"></i></div>
          </th>
          <td scope="row" class="font-weight-600">
              ${(productDetails.appearing_order) ? productDetails.appearing_order : i+1}
          </td>
          <td scope="row" data-column="name">
              ${productDetails.name}
          </td>
          <td scope="row" data-column="image" align="center">
              <img src="${baseURL+productDetails.image}" alt="" height="50px">
          </td>
          <td scope="row">
              <div class="toggle-switch">
              <input type="checkbox" id="${statusTogglerId}" data-product-id="${productId}" ${checkedStatus} onchange="change_product_status(this)">
              <label for="${statusTogglerId}"></label>
              </div>
          </td>
          <td scope="row">
              <div class="d-flex align-items-center">
                  <a class="editbtn bgedit" href="javascript:edit_product('${productCategoryId}', '${productId}')"><i class="bi bi-pencil"></i></a>
                  <a class="deletebtn bgdelete ms-2" href="javascript:delete_product('${productId}')"><i class="bi bi-trash3"></i></a>
              </div>
          </td>
        </tr>`;
        tableRowsHTML += row;
      }); 
    }
    else {
      tableRowsHTML = `<tr><td colspan="6" align="center">No Products Available!</td></tr>`
    }

    if (HTMLType == "table") {
      products_listing_table_HTML = `<div class="table-responsive min-height-300px">
        <table class="products-listing-table table table-hover table-bordered" data-category-id="${productCategoryId}">
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
            <tbody>${tableRowsHTML}</tbody>
        </table>
      </div>`;
    }
    else {
      products_listing_table_HTML = tableRowsHTML;
    }

    return products_listing_table_HTML;
  }

  function change_product_appearing_order(currentRow) {
    let productsListingTable = currentRow.parents("table");
    let productCategoryId = productsListingTable.data("category-id");

    let rows = productsListingTable.find("tbody tr");
    let product_appearing_orders = [];
    for (let i=0; i<rows.length; i++) {
      let row = rows[i];
      let appearing_order_details = {
        product_id: row.dataset.productId,
        product_category_id: productCategoryId,
        appearing_order: parseInt(i+1)
      };
      product_appearing_orders.push(appearing_order_details);
    }

    $.ajax({
      url: "<?=base_url('admin/product/change-product-appearing-order')?>",
      type: "POST",
      data: JSON.stringify(product_appearing_orders),
      contentType: "application/json",
      error: function(a, b, c) {
        toast("Something went wrong! Failed to change product appearing order.", 3000);
        console.log(a);
        console.log(b);
        console.log(c);
      },
      success: function(response) {
        if (response.status == true) {
          toast(response.message, 1500);
          render_product_appearing_order(product_appearing_orders);
        }
        else if (response.status == false) {
          toast(response.message, 3000);
          console.log(response);
        }
        else {
          toast("Something went wrong! Failed to change product appearing order.", 3000);
          console.log(response);
        }
      }
    });
  }

  function render_product_appearing_order(product_appearing_orders) {
    product_appearing_orders.forEach((details, i) => {
      let row = $(`.products-listing-table[data-category-id="${details.product_category_id}"] tbody tr[data-product-id="${details.product_id}"]`);
      row.children("td:first").text(details.appearing_order);
    });
  }

  function change_product_status(checkbox) {
    let productId = checkbox.dataset.productId;
    let checkedStatus = checkbox.checked;
    if (checkedStatus == true) {
      var postData = {
        product_id: productId,
        status: "ACTIVE"
      };
    }
    else {
      var postData = {
        product_id: productId,
        status: "INACTIVE"
      };
    }

    $.ajax({
      url: "<?=base_url('admin/product/change-product-status')?>",
      type: "POST",
      data: postData,
      error: function(a, b, c) {
          toast("Something went wrong! Failed to change product status.", 3000);
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

  function delete_product(productId) {
    $("#deletable_product_id").val(productId);
    $("#delete_confirmation_modal").modal("show");
  }

  $("#product_delete_form").submit(function(e) {
    e.preventDefault();
    let productId = $("#deletable_product_id").val();

    $.ajax({
      url: "<?=base_url('admin/product/delete/')?>"+productId,
      type: "GET",
      error: function(a, b, c) {
        toast("Something went wrong! Failed to delete product.", 3000);
        console.log(a);
        console.log(b);
        console.log(c);
      },
      success: function(response) {
        if (response.status == true) {
          $(`.products-listing-table tbody tr[data-product-id="${productId}"]`).remove();
          close_delete_confirmation_modal();
          toast(response.message, 1200);
        }
        else if (response.status == false) {
          toast(response.message, 3000);
          console.log(response);
        }
        else {
          toast("Something went wrong! Failed to delete product.", 3000);
          console.log(response);
        }
      }
    });
  });

  function close_delete_confirmation_modal() {
    $("#delete_confirmation_modal").modal("hide");
    $("#product_delete_form")[0].reset();
  }

</script>