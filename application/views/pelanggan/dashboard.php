<div class="container-fluid p-6">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-12">
            <!-- Page header -->

            <div class="border-bottom pb-4 mb-4 ">

                <h3 class="mb-0 fw-bold">Dashboard</h3>


            </div>
        </div>
    </div>
    <div class="row align-items-center">
        <div class="col-xl-12 col-md-12 col-12 mb-1">
            <div class="bg-primary rounded-3">
                <div class="row mb-5 ">
                    <div class="col-lg-12 col-md-12 col-12">
                        <div class="p-6 d-lg-flex justify-content-between align-items-center ">
                            <div class="d-md-flex align-items-center">
                                <?php if (!empty($foto)) : ?>
                                    <!-- <img src="<?php echo base_url('path/to/uploads/') . $foto; ?>" alt="Image" class="rounded-circle avatar avatar-xl"> -->
                                    <img src="<?= base_url() ?>public/backend/assets/images/avatar/avatar-3.jpg" alt="Image" class="rounded-circle avatar avatar-xl">
                                <?php else : ?>
                                    <div class="avatar-initial text-white">
                                        <?php echo $inisial; ?>
                                    </div>
                                <?php endif; ?>
                                <div class="ms-md-4 mt-3 mt-md-0 lh-1">
                                    <h3 class="text-white mb-0"><?php echo $greeting; ?>, <?=
                                                                                            $this->session->userdata('nama');
                                                                                            ?></h3>
                                    <small class="text-white"> Here is what’s happening with your projects today:</small>
                                </div>
                            </div>
                            <div class="d-none d-lg-block">
                                <a href="#!" class="btn btn-white">What’s New!</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>