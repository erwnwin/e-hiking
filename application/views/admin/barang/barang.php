<!-- Container fluid -->
<!-- <div class="bg-primary pt-10 pb-21"></div> -->
<div class="container-fluid p-6">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-12">
            <!-- Page header -->

            <div class="border-bottom pb-4 mb-4 ">

                <h3 class="mb-0 fw-bold">Data Barang</h3>


            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-12">
            <div class="card h-100">
                <!-- card header  -->

                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">List Barang</h4>
                    <div class="dropdown">
                        <a class="btn btn-primary btn-sm " href="<?= base_url('barang/create') ?>">Create</a>


                    </div>
                </div>
                <!-- table  -->
                <div class="table-responsive">
                    <table class="table text-nowrap">
                        <thead class="table-light">
                            <tr>
                                <th>Name</th>
                                <th>Role</th>
                                <th>Last Activity</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="align-middle">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <img src="<?= base_url() ?>public/backend/assets/images/avatar/avatar-2.jpg" alt="" class="avatar-md avatar rounded-circle">
                                        </div>
                                        <div class="ms-3 lh-1">
                                            <h5 class=" mb-1">Anita Parmar</h5>
                                            <p class="mb-0">anita@example.com</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="align-middle">Front End Developer</td>
                                <td class="align-middle">3 May, 2023</td>
                                <td class="align-middle">
                                    <div class="dropdown dropstart">
                                        <a class="text-muted text-primary-hover" href="#" role="button" id="dropdownTeamOne" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="icon-xxs" data-feather="more-vertical"></i>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownTeamOne">
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <a class="dropdown-item" href="#">Something else
                                                here</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- card -->


    </div>

</div>