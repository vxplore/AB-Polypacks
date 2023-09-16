<link rel="stylesheet" href="<?=base_url('assets/admin/css/banner_list_view_style.css')?>">
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
                    <th scope="col">Status</th>
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
                      <td scope="row">
                        <?=$client_details->name?>
                      </td>
                      <td scope="row" align="center">
                          <img src="<?=base_url($client_details->image)?>" alt="" height="50px">
                      </td>
                      <td scope="row">
                        <?php $client_id = (!empty($client_details->client_id)) ? $client_details->client_id : '';
                        if (!empty($client_details) && $client_details->status == "ACTIVE") {
                          $checked_status = "checked";
                        } else {
                          $checked_status = "";
                        }?>
                        <div class="toggle-switch">
                          <input type="checkbox" id="status_toggler_<?=$i+1?>" data-client-id="<?=$client_id?>" <?=$checked_status?> onchange="change_client_status(this)">
                          <label for="status_toggler_<?=$i+1?>"></label>
                        </div>
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
          <button form="banner_delete_form" id="banner_delete_form_submit_button" class="btn btn-danger">Delete</button>
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

  // let banners_listing_table = new DataTable("#banners_listing_table", {
  //   "order": [[0,"DESC"]],
  //   "language": {
  //     "emptyTable": "No Banners Found!"
  //   }
  // });

  $("#clients_listing_table tbody").dragsort({
    dragSelector:"tr .drag-handle",
    placeHolderTemplate:"<tr></tr>",
    dragEnd: function() {
      change_client_appearing_order();
    }
  });

  function change_client_appearing_order() {
    let rows = $("#clients_listing_table tbody tr");
    let client_appearing_orders = [];
    for (let i=0; i<rows.length; i++) {
      let row = rows[i];
      let appearing_order_details = {
        client_id: row.dataset.clientId,
        appearing_order: parseInt(i+1)
      };
      client_appearing_orders.push(appearing_client_details);
    }

    $.ajax({
      url: "<?=base_url('admin/banners/change-client-appearing-order')?>",
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
          render_banner_appearing_order(banner_appearing_orders);
        }
        else if (response.status == false) {
          toast(response.message, 3000);
          console.log(response);
        }
        else {
          toast("Something went wrong! Failed to change banner appearing order.", 3000);
          console.log(response);
        }
      }
    });
  }

  function render_banner_appearing_order(banner_appearing_orders) {
    banner_appearing_orders.forEach((details, i) => {
      let row = $(`#banners_listing_table tbody tr[data-banner-id="${details.banner_id}"]`);
      row.children("td:first").text(details.appearing_order);
    });
  }

  function change_banner_status(checkbox) {
    let bannerId = checkbox.dataset.bannerId;
    let checkedStatus = checkbox.checked;
    if (checkedStatus == true) {
      var postData = {
        banner_id: bannerId,
        status: "ACTIVE"
      };
    }
    else {
      var postData = {
        banner_id: bannerId,
        status: "INACTIVE"
      };
    }

    $.ajax({
      url: "<?=base_url('admin/banners/change-banner-status')?>",
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

  function delete_banner(banner_id) {
    $("#deletable_banner_id").val(banner_id);
    $("#delete_confirmation_modal").modal("show");
  }

  $("#banner_delete_form").submit(function(e) {
    e.preventDefault();
    let banner_id = $("#deletable_banner_id").val();

    $.ajax({
      url: "<?=base_url('admin/banners/delete/')?>"+banner_id,
      type: "GET",
      error: function(a, b, c) {
        toast("Something went wrong! Failed to delete banner.", 3000);
        console.log(a);
        console.log(b);
        console.log(c);
      },
      success: function(response) {
        if (response.status == true) {
          $(`#banners_listing_table tbody tr[data-banner-id="${banner_id}"]`).remove();
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

  function reset_banner_delete_form() {
    $("#banner_delete_form")[0].reset();
  }

  function close_delete_confirmation_modal() {
    $("#delete_confirmation_modal").modal("hide");
    reset_banner_delete_form();
  }

</script>