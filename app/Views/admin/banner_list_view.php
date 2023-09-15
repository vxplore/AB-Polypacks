<link rel="stylesheet" href="<?=base_url('assets/admin/css/banner_list_view_style.css')?>">
<main id="main" class="main">

  <div class="pagetitle d-flex align-items-center justify-content-between">
      <div> <h1>Banners</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?=base_url('admin')?>">Home</a></li>
          <li class="breadcrumb-item active">Banners</li>
        </ol>
      </nav></div>
      <div><a href="<?=base_url('admin/banners/add')?>" type="button" class="btn btn-success text-uppercase py-2 rounded-1"><i class="bi bi-plus"></i> Add New Banner</a></div>
  </div>
  <!-- End Page Title -->

  <section class="section">
    <div class="card">
        <div class="card-body">
          <h5 class="card-title">Banners List</h5>
            <div class="table-responsive">
                  <!-- Table with stripped rows -->
            <table id="banners_listing_table" class="table table-hover table-bordered">
              <thead class="thead-light">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">No. </th>
                  <th scope="col">Title</th>
                  <th scope="col">Description</th>
                  <th scope="col">Image</th>
                  <th scope="col">Link</th>
                  <th scope="col">Status</th>
                  <th scope="col">Options</th>
                </tr>
              </thead>
              <tbody>
                <?php if (!empty($list_of_banners)) {
                foreach ($list_of_banners as $i => $banner_details) { ?>
                  <tr>
                    <th scope="row">
                      <div class="drag-handle"><i class="bi bi-list"></i></div>
                    </th>
                    <th scope="row">
                      <?=(!empty($banner_details->appearing_order)) ? $banner_details->appearing_order : $i+1;?>
                    </th>
                    <td scope="row">
                      <?=$banner_details->title?>
                    </td>
                    <td scope="row">
                      <?php if (!empty($banner_details->description)) {
                        echo $banner_details->description; 
                      } else {
                        echo "<span style='font-weight:600; color:#CCC;'>N/A</span>"; 
                      }?>
                    </td>
                    <td scope="row" align="center">
                        <img src="<?=base_url($banner_details->image)?>" alt="" height="50px">
                    </td>
                    <td scope="row">
                      <?php if (!empty($banner_details->link)) {
                        echo "<a href='".$banner_details->link."' target='_blank'>".$banner_details->link."</a>"; 
                      } else {
                        echo "<span style='font-weight:600; color:#CCC;'>N/A</span>"; 
                      }?>
                    </td>
                    <td scope="row">
                      <?php $banner_id = (!empty($banner_details->banner_id)) ? $banner_details->banner_id : '';
                      if (!empty($banner_details) && $banner_details->status == "ACTIVE") {
                        $checked_status = "checked";
                      } else {
                        $checked_status = "";
                      }?>
                      <div class="toggle-switch">
                        <input type="checkbox" id="status_toggler_<?=$i+1?>" data-banner-id="<?=$banner_id?>" <?=$checked_status?> onchange="change_banner_status(this)">
                        <label for="status_toggler_<?=$i+1?>"></label>
                      </div>
                    </td>
                    <td scope="row">
                      <div class="d-flex align-items-center">
                          <a class="editbtn bgedit" href="<?=base_url('admin/banners/edit/'.$banner_details->banner_id)?>"><i class="bi bi-pencil"></i></a>
                      </div>
                    </td>
                  </tr>
                <?php }} ?>
              </tbody>
            </table>
            <!-- End Table with stripped rows -->
            </div>
        </div>
    </div>
  </section>

</main><!-- End #main -->

<script src="<?=base_url('assets/admin/js/jquery.dragsort.js')?>"></script>
<script>

  // let banners_listing_table = new DataTable("#banners_listing_table", {
  //   "order": [[0,"DESC"]],
  //   "language": {
  //     "emptyTable": "No Banners Found!"
  //   }
  // });

  $("#banners_listing_table tbody").dragsort({
    dragSelector:"tr .drag-handle",
    placeHolderTemplate:"<tr></tr>",
    dragEnd: function() {
      console.log(this);
    }
  });


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

</script>