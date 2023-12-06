<!-- Doctors Info -->

<h2 class="purple-text h3 mt-4">Select your preferred doctor's</h2>

<?php
function generateDoctorCard($doctorName, $degree, $specialization, $experience, $location)
{
    ?>
    <div class="col-sm-6">
        <div class="card yh-card">
            <div class="card-body py-5 text-center">
                <figure><img src="<?= base_url('public/assets/img/doctor_pic.jpg') ?>" alt="" class="rounded-circle"></figure>
                <p class="h5 orange-text"><?= $doctorName ?></p>
                <p class="purple-text"><small><?= $degree ?></small></p>
                <p class="specialization"><?= $specialization ?></p>
                <div class="row gx-3 justify-content-center">
                    <div class="col-auto exp_location d-flex exp_location align-items-center justify-content-center">
                        <span class="material-symbols-outlined">medical_services </span> <?= $experience ?>
                    </div>

                    <div class="col-auto exp_location d-flex exp_location align-items-center justify-content-center">
                        <span class="material-symbols-outlined">add_location_alt</span> <?= $location ?>
                    </div>
                </div>
                <button type="submit" class="btn btn-lg btn-primary border-0 rounded-pill mt-4 px-4 default-btn">Book an Appointment</button>
            </div>
        </div>
    </div>
    <?php
}

?>

<div class="row mt-2 mb-4 docot-list g-4">
    <?php
    if (!empty($doctorInfo)) {
        foreach ($doctorInfo as $doctor) {
            generateDoctorCard(...$doctor);
        }
    } else {
        echo <<<EOD
            <div class="col-sm-6">
                <p>No Doctors Found</p>
            </div>
        EOD;
    }
    ?>
</div>

<!-- Doctors Info End -->
