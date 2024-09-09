<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Dashboard</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="callout callout-custom">
                <h5><?php echo $greeting; ?>!</h5>
                <hr>
                <p>Hello. <?=
                            $this->session->userdata('nama');
                            ?>
                </p>

            </div>
        </div>
    </section>

    <div>
        <br>
    </div>
</div>