<main id="main" class="main">

    <div class="pagetitle d-flex align-items-center justify-content-between">
       <div> <h1>SEO</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?=base_url('admin')?>">Home</a></li>
            <li class="breadcrumb-item active">SEO</li>
          </ol>
        </nav></div>
       <!-- <div><a href="<?=base_url('admin/SEO/add-content')?>" type="button" class="btn btn-danger text-uppercase py-2 rounded-1"><i class="bi bi-plus"></i> Add SEO Content</a></div> -->
    </div>
    <!-- End Page Title -->

    <section class="section">
      <div class="card">
          <div class="card-body">
            <h5 class="card-title">SEO Data List</h5>
              <div class="table-responsive">
                    <!-- Table with stripped rows -->
              <table id="SEO_data_listing_table" class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th scope="col">No. </th>
                    <th scope="col">Name</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Meta Title</th>
                    <th scope="col">Meta Description</th>
                    <th scope="col">Meta Keywords</th>
                    <th scope="col">Options</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if (!empty($list_of_pages)) {
                  foreach ($list_of_pages as $i => $page_details) { ?>
                    <tr>
                      <th scope="row"><?=$i+1?></th>
                      <td scope="row"><?=$page_details->name?></td>
                      <td scope="row"><?=$page_details->slug?></td>
                      <td scope="row"><?=$page_details->meta_title?></td>
                      <td scope="row"><?=$page_details->meta_description?></td>
                      <td scope="row"><?=$page_details->meta_keywords?></td>
                      <td scope="row">
                        <div class="d-flex align-items-center">
                            <a class="editbtn bgedit" href="<?=base_url('admin/SEO/edit-content/'.$page_details->page_id)?>"><i class="bi bi-pencil"></i></a>
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

  <script>

    let SEO_data_listing_table = new DataTable("#SEO_data_listing_table", {
      "order": [[0,"DESC"]],
      "language": {
        "emptyTable": "No SEO Data Found!"
      }
    });

  </script>