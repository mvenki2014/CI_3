<style>
    .form-control:focus {
        border-color: #ef8d1d !important;
    }
</style>
<div class="container">
    <?php $this->load->view('include/header-logo'); ?>
    <section>
        <div class="container">
            <?php $this->load->view('include/header-stepper'); ?>
            
            <div class="row mt-4">
                <div class="col-md-10 offset-md-1">
                    <div class="card yh-card mb-5">
                        <div class="card-body p-5">
                            <img src="<?= base_url('public/assets/img/user-icon.png')?>" alt="user">
                            <p class="h5 my-3 purple-text">Welcome <?= $session['existing_patients'][0]['fullname'] ?></p>


                            <div class="row">
                                <div class="col">
                                    <!-- Tabs navs -->
                                    <div class="mt-2">
                                        <ul class="nav nav-tabs yh-appointment-tabs mb-4 text-center" id="myTabs">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="tab1" data-bs-toggle="tab" href="#upcoming-appointments">Upcoming Appointments</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="tab2" data-bs-toggle="tab" href="#prev-appointments">Previous Appointments</a>
                                            </li>
                                        </ul>

                                        <div class="tab-content mt-2">
                                            <div class="tab-pane fade show active" id="upcoming-appointments">
                                                <div class="row">
                                                    <div class="col">
                                                        <!-- Upcoming Appointment Section -->
                                                        <?php
                                                        if (empty($session['upcoming_appt'])) {
                                                            renderNoAppointments('upcoming');
                                                        } else {
                                                            foreach ($session['upcoming_appt'] as $upcomingAppt) {
                                                                generateAppointmentCard($upcomingAppt, 'upcoming');
                                                            }
                                                        } ?>
                                                        <!-- Upcoming Appointment Section End -->
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="prev-appointments">
                                                <!-- Past Appointment Section -->
                                                <?php
                                                if (empty($session['past_appt'])) {
                                                    renderNoAppointments('previous');
                                                } else {
                                                    foreach ($session['past_appt'] as $pastAppt) {
                                                        generateAppointmentCard($pastAppt, 'past');
                                                    }
                                                } ?>
                                                <!-- Past Appointment Section End -->
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Tabs content -->
                                </div>
                            </div>
                            <h2 class="h5 purple-text">Book New Appointment</h2>


                            <p>Please choose a patient name from the list below to book a new appointment</p>
                            <div class="mt-4">
                                <form method="post" action="<?= base_url('Appointment/selectPatientAction') ?>">
                                <div class="patient_list">
                                        <ul>
                                            <?php foreach ($session['existing_patients'] as $patient) { ?>
                                            <li class="pt-radio">
                                                <input type="radio" name="ExistingPatient" value="<?= $patient['patid'] ?>" id="<?= $patient['patid'] ?>">
                                                <label for="<?= $patient['patid'] ?>"><?= $patient['fullname'] ?> </label>
                                            </li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                    <button type="submit" class="btn btn-lg btn-primary border-0 rounded-pill my-3 px-4 default-btn">Continue</button>
                                </form>
                                <p class="mt-3 fs-7 gray-text">
                                    <small>
                                        If you wish to make changes to the above information, please write to us at
                                        <a href="mailto:<?= YH_INFO_EMAIL ?>"><?= YH_INFO_EMAIL ?></a>
                                    </small>
                                </p>
                                <p>OR</p>
                                <h2 class="h5 purple-text">Register a New Patient?</h2>
                                <a role="button" href="<?= base_url('appointment/add-patient')?>" class="btn btn-lg btn-primary border-0 rounded-pill my-3 px-4 default-btn">+ Add New Patient</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
</div>

<?php

/**
 * Generates an appointment card based on the provided appointment data.
 *
 * @param array $appointment The appointment data.
 * @param string $appointmentType The type of appointment ('past' or 'upcoming').
 *
 * @return void
 */
function generateAppointmentCard($appointment, $appointmentType = 'past')
{
    // Extract appointment data for easier access
    $id = 'pat-' . $appointment['PATID'];
    $patientName = $appointment['PATIENTNAME'];
    $dateTime = printDateTime($appointment['APTDATE'] . ' ' . $appointment['SLOT']);
    $doctorInfo = $appointment['DOCNAME'] . ', ' . getLocationByBranchId($appointment['loccd']);
    $referenceNumber = $appointment['APTREFNO'];

    $conf_row = $appointmentType == 'past' ? 'col-md-12' : 'col-md-8';
    $conf_col1 = $appointmentType == 'past' ? 'col-sm-6' : 'col-sm-7';
    $conf_col2 = $appointmentType == 'past' ? 'col-sm-6' : 'col-sm-5';
    $conf_render_buttons = $appointmentType == 'past' ? '' : renderButtons($appointmentType);
    // Use heredoc syntax for better HTML readability
    echo <<<HTML
        <div class="card yh-card mb-3" id="$id">
            <div class="card-body">
                <div class="row">
                    <div class="$conf_row">
                        <div class="row gy-3">
                             <div class="$conf_col1">
                                <span class="fs-6 d-block"><small class="text-muted">Patient Name</small></span>
                                <span>$patientName</span>
                            </div>
                            <div class="$conf_col2">
                                <span class="fs-6 d-block"><small class="text-muted">Date &amp; Time</small></span>
                                <span>$dateTime</span>
                            </div>
                            <div class="$conf_col1">
                                <span class="fs-6 d-block"><small class="text-muted">Doctor Name &amp; Location</small></span>
                                <span>$doctorInfo</span>
                            </div>
                            <div class="$conf_col2">
                                <span class="fs-6 d-block"><small class="text-muted">Reference Number</small></span>
                                <span>$referenceNumber</span>
                            </div>
                        </div>
                    </div>
                    $conf_render_buttons
                </div>
            </div>
        </div>
    HTML;
}

function renderButtons($appointmentType)
{
    if ($appointmentType == 'upcoming') {
        return <<<HTML
            <div class="col-md-4 text-center">
                <div class="d-grid gap-2 mx-auto">
                    <a href="#" class="btn btn-primary btn-md text-white rounded-pill default-btn border-0 py-25 text-uppercase">Generate YH Number</a>
                    <a href="#" class="btn btn-primary btn-md text-white rounded-pill default-btn border-0 py-25 text-uppercase purple-bg">Pay Now</a>
                </div>
            </div>
        HTML;
    }
}

function renderNoAppointments($appointmentType)
{
    echo <<<HTML
    <div class="card yh-card mb-3">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12 text-center py-4">
                    There are no $appointmentType appointments.
                </div>
            </div>
        </div>
    </div>
    HTML;
}

?>
