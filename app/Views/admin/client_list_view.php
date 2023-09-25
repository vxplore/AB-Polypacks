<main id="main" class="main">

  <div class="pagetitle d-flex align-items-center justify-content-between">
      <div> <h1>Clients</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?=base_url('admin')?>">Home</a></li>
          <li class="breadcrumb-item active">Clients</li>
        </ol>
      </nav></div>
      <div><a href="javascript:add_new_client()" type="button" class="btn btn-success text-uppercase py-2 rounded-1"><i class="bi bi-plus"></i> Add New Client</a></div>
  </div>
  <!-- End Page Title -->

  <section class="section">
    <div class="card">
        <div class="card-body">
          <h5 class="card-title">Clients List</h5>
          <?php if (!empty($list_of_clients)) { ?>
            <div class="table-responsive min-height-300px">
              <table id="clients_listing_table" class="table table-hover table-bordered">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">No. </th>
                    <th scope="col">Name</th>
                    <th scope="col">Image</th>
                    <th scope="col">Options</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($list_of_clients as $i => $client_details) { ?>
                    <tr data-client-id="<?=$client_details->client_id?>">
                      <th scope="row">
                        <div class="drag-handle"><i class="bi bi-list"></i></div>
                      </th>
                      <td scope="row" class="font-weight-600">
                        <?=(!empty($client_details->appearing_order)) ? $client_details->appearing_order : $i+1;?>
                      </td>
                      <td scope="row" data-column="name">
                        <?=$client_details->name?>
                      </td>
                      <td scope="row" data-column="image" align="center">
                          <img src="<?=base_url($client_details->image)?>" alt="" height="50px">
                      </td>
                      <td scope="row">
                        <div class="d-flex align-items-center">
                            <a class="editbtn bgedit" href="javascript:edit_client('<?=$client_details->client_id?>')"><i class="bi bi-pencil"></i></a>
                            <a class="deletebtn bgdelete ms-2" href="javascript:delete_client('<?=$client_details->client_id?>')"><i class="bi bi-trash3"></i></a>
                        </div>
                      </td>
                    </tr>
                  <?php }?>
                </tbody>
              </table>
            </div>
          <?php } else { ?>
            <div class="empty-container">
              <h5 class="empty-container-note">No Clients Found!</h5>
            </div>
          <?php } ?>
        </div>
    </div>
  </section>


  <!-- =========================== -->
  <!-- Add/Edit Client Modal Start -->
  <!-- =========================== -->
  <div id="client_modal" class="custommodal modal fade" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header py-2">
          <h5 id="client_modal_title" class="modal-title text-white">Add New Client</h5>
          <button type="button" class="btn-close" onclick="close_client_modal()"></button>
        </div>
        <div class="modal-body">
          <form id="client_details_form">
            <input type="hidden" name="client_id" id="editable_client_id">
            <div class="row">
                <div class="col-md-12">
                  <div class="form-floating mb-3">
                    <input type="text" name="name" id="client_name" class="form-control" placeholder="Enter Client Name Here..." required>
                    <label for="client_name">Client Name</label>
                  </div>
                </div>
                <div class="col-md-12">
                  <label for="client_image" id="client_image_label" class="image-preview-container mb-3" style="height:200px;">
                      <div id="text_preview_container" class="text-preview-container">
                          <span class="text-preview">Upload Client Image</span>
                      </div>
                      <img src="" id="image_preview" class="image-preview hide">
                      <input type="file" accept="image/jpg image/jpeg image/png" name="image" id="client_image" class="hidden-image-input" onchange="previewImage(this)">
                  </label>
                </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button form="client_details_form" id="client_details_form_submit_button" class="btn btn-dark" style="width:60.64px; height:38px;">Add</button>
        </div>
      </div>
    </div>
  </div>
  <!-- ========================= -->
  <!-- Add/Edit Client Modal End -->
  <!-- ========================= -->


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
          <p class="pb-0 mb-0">Do you really want to delete this client ?</p>
          <form id="client_delete_form">
            <input type="hidden" name="client_id" id="deletable_client_id">
          </form>
        </div>
        <div class="modal-footer justify-content-center border-0">
          <button type="button" class="btn btn-secondary" onclick="close_delete_confirmation_modal()">Cancel</button>
          <button form="client_delete_form" id="client_delete_form_submit_button" class="btn btn-danger">Delete</button>
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

  $("#clients_listing_table tbody").dragsort({
    dragSelector:"tr .drag-handle",
    placeHolderTemplate:"<tr></tr>",
    dragEnd: function() {
      change_client_appearing_order();
    }
  });

  function add_new_client() {
    render_client_modal();
    $("#client_modal").modal("show");
  }

  function edit_client(client_id) {
    let row = $(`#clients_listing_table tbody tr[data-client-id="${client_id}"]`);
    let client_name = row.find("td[data-column='name']").text().trim();
    let client_image = row.find("td[data-column='image']").children("img").attr("src");
    let data = {
      id: client_id,
      name: client_name,
      image: client_image
    };
    render_client_modal(data);
    $("#client_modal").modal("show");
  }

  $("#client_details_form").submit(function(e) {
    e.preventDefault();
    let formData = new FormData(this);
    let submitButton = $("#client_details_form_submit_button");
    let submitButtonHTML = submitButton.html();
    let editableClientId = $("#editable_client_id").val();

    if (editableClientId) {
      var URL = "<?=base_url('admin/clients/edit-client-details')?>";
      var validationErrorMessage = "Please Choose an Client Image to Edit Client...";
      var errorMessage = "Something went wrong! Failed to edit client details.";
      var APICallType = "edit";
    }
    else {
      var URL = "<?=base_url('admin/clients/add-new-client')?>";
      var validationErrorMessage = "Please Choose an Client Image to Add Client...";
      var errorMessage = "Something went wrong! Failed to add new client.";
      var APICallType = "add";
    }

    let uploadedClientImageCount = document.getElementById("client_image").files.length;
    if (APICallType == "add" && uploadedClientImageCount == 0) {
      toast(validationErrorMessage, 1800);
    }
    else {
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
            close_client_modal();
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
  });

  function render_client_modal(data = null) {
    $("#client_details_form")[0].reset();
    if (typeof data == "object" && data != null) {
      $("#editable_client_id").val(data.id);
      $("#client_details_form input[name='name']").val(data.name);
      
      $("#client_image_label .text-preview-container").addClass("hide");
      $("#client_image_label .image-preview").attr("src", data.image);
      $("#client_image_label .image-preview").removeClass("hide");
      
      $("#client_modal_title").text("Edit Client Details");
      $("#client_details_form_submit_button").text("Save");
    }
    else {
      $("#client_image_label .image-preview").addClass("hide");
      $("#client_image_label .image-preview").attr("src", "");
      $("#client_image_label .text-preview-container").removeClass("hide");
      
      $("#client_modal_title").text("Add New Client");
      $("#client_details_form_submit_button").text("Add");
    }
  }

  function close_client_modal() {
    $("#client_modal").modal("hide");
  }

  function change_client_appearing_order() {
    let rows = $("#clients_listing_table tbody tr");
    let client_appearing_orders = [];
    for (let i=0; i<rows.length; i++) {
      let row = rows[i];
      let appearing_order_details = {
        client_id: row.dataset.clientId,
        appearing_order: parseInt(i+1)
      };
      client_appearing_orders.push(appearing_order_details);
    }

    $.ajax({
      url: "<?=base_url('admin/clients/change-client-appearing-order')?>",
      type: "POST",
      data: JSON.stringify(client_appearing_orders),
      contentType: "application/json",
      error: function(a, b, c) {
        toast("Something went wrong! Failed to change client appearing order.", 3000);
        console.log(a);
        console.log(b);
        console.log(c);
      },
      success: function(response) {
        if (response.status == true) {
          toast(response.message, 1500);
          render_client_appearing_order(client_appearing_orders);
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

  function render_client_appearing_order(client_appearing_orders) {
    client_appearing_orders.forEach((details, i) => {
      let row = $(`#clients_listing_table tbody tr[data-client-id="${details.client_id}"]`);
      row.children("td:first").text(details.appearing_order);
    });
  }

  function delete_client(client_id) {
    $("#deletable_client_id").val(client_id);
    $("#delete_confirmation_modal").modal("show");
  }

  $("#client_delete_form").submit(function(e) {
    e.preventDefault();
    let client_id = $("#deletable_client_id").val();

    $.ajax({
      url: "<?=base_url('admin/clients/delete/')?>"+client_id,
      type: "GET",
      error: function(a, b, c) {
        toast("Something went wrong! Failed to delete client.", 3000);
        console.log(a);
        console.log(b);
        console.log(c);
      },
      success: function(response) {
        if (response.status == true) {
          $(`#clients_listing_table tbody tr[data-client-id="${client_id}"]`).remove();
          close_delete_confirmation_modal();
          toast(response.message, 1200);
        }
        else if (response.status == false) {
          toast(response.message, 3000);
          console.log(response);
        }
        else {
          toast("Something went wrong! Failed to delete banner.", 3000);
          console.log(response);
        }
      }
    });
  });

  function close_delete_confirmation_modal() {
    $("#delete_confirmation_modal").modal("hide");
    $("#banner_delete_form")[0].reset();
  }

</script>