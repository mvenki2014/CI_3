<div class="container">
    <?php $this->load->view('include/header-logo'); ?>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2 text-center">
                    <h1 class="h2 orange-text">Appointment Triage System</h1>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                </div>
            </div>
            <div class="row mt-4 text-center">
                <div class="col-sm-4">
                    <div class="card yh-card">
                        <div class="card-body py-5">
                            <a href="<?= base_url('appointment/mobile-verification')?>" class="stretched-link text-decoration-none">
                                <img src="<?= site_url('public/assets/img/calander.png') ?>" alt="" width="180">
                                <p class="h4 mt-4 purple-text">Book an <br>Appointment</p>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="card yh-card">
                        <div class="card-body py-5">
                            <a href="#" class="stretched-link text-decoration-none">
                                <img src="<?= site_url('public/assets/img/calander.png') ?>" alt="" width="180">
                                <p class="h4 mt-4 purple-text">Already have <br>an Appointment?</p>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="card yh-card">
                        <div class="card-body py-5">
                            <a href="#" class="stretched-link text-decoration-none">
                                <img src="<?= site_url('public/assets/img/calander.png') ?>" alt="" width="180">
                                <p class="h4 mt-4 purple-text">Generate <br>YH Number</p>
                            </a>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>

</div>
