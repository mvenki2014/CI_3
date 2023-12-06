<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<script src="//code.jquery.com/jquery-3.6.0.js"></script>
<script src="//code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<style>
    .addnewpatient_form .form-row em.error, .addnewpatient_form .form-row label.error {
        position: absolute;
        bottom: -20px;
        color: #f00;
        font-size: 11px;
        padding-left: 15px;
        left: 0;
        font-style: normal;
        background: transparent;
    }
    em.error{
        bottom: -20px;
        color: #f00;
        font-size: 11px;
        padding-left: 0px;
        left: 0;
        font-style: normal;
        background: transparent;
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
                        <div class="card-body p-5 addnewpatient_form">
                            <img src="<?= base_url('public/assets/img/addnewpatient-icon.png')?>" alt="user">
                            <p class="h5 my-3 purple-text">Add New Patient</p>
                            <p>Please fill in the patient details below</p>
                            <div class="mt-4">
                                <form id="add_newpatient_form" autocomplete="on">
                                    <div class="row mb-5">
                                        <div class="col-sm-2 lined-input form-row">
                                            <select class="form-control valid" style="appearance: auto" id="title" name="title" aria-invalid="false" title="select your title">
                                                <option value="Mr" selected>Mr</option>
                                                <option value="Mrs">Mrs</option>
                                                <option value="Miss">Miss</option>
                                                <option value="Dr">Dr</option>
                                                <option value="Ms">Ms</option>
                                                <option value="Prof">Prof</option>
                                            </select>
                                        </div>
                                        <div class="col lined-input form-row">
                                            <input type="text" id="fname" name="fname" placeholder=" " class="col form-control" value="venki">
                                            <label for="fname">First Name*</label>
                                        </div>
                                        <div class="col lined-input form-row">
                                            <input type="text" id="mname" name="mname" placeholder=" " class="col form-control" value="midd nm">
                                            <label for="mname">Middle Name</label>
                                        </div>
                                        <div class="col lined-input form-row">
                                            <input type="text" id="lname" name="lname" placeholder=" " class="col form-control" value="medi">
                                            <label for="lname">Last Name*</label>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-sm-6 gender-input">
                                            <label for="gender">Gender *</label>
                                            <div class="d-flex mt-2">
                                                <div class="form-check form-row pe-md-3">
                                                    <input class="form-check-input" type="radio" name="gender" value="male" id="Male" checked>
                                                    <label class="form-check-label" for="Male">Male</label>
                                                </div>
                                                <div class="form-check form-row">
                                                    <input class="form-check-input" type="radio" name="gender" value="female" id="Female">
                                                    <label class="form-check-label" for="Female">Female</label>
                                                </div>
                                            </div>
                                            <em class="error" id="gender-error" style="display: none"></em>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="row mb-5">
                                                <div class="col-sm-8 lined-input form-row">
                                                    <input type="text" id="dob" name="dob" placeholder=" " class="col form-control">
                                                    <label for="dob">DD / MM / YYYY *</label>
                                                </div>
                                                <div class="col lined-input form-row">
                                                    <input type="text" id="age" name="age" placeholder=" " class="col form-control">
                                                    <label for="age">Age</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-5">
                                        <div class="col-sm-12 lined-input form-row">
                                            <input type="text" id="email_address" name="email_address" placeholder=" " class="col form-control" value="mvenki2014@gmzil.com">
                                            <label for="email_address">Email Address *</label>
                                        </div>
                                    </div>

                                    <div class="row mb-5">
                                        <div class="col-sm-6 lined-input form-row">
                                            <input type="text" id="address" name="address" placeholder=" " class="col form-control" value="kkd">
                                            <label for="address">Address</label>
                                        </div>
                                        <div class="col-sm-6 lined-input form-row">
                                            <input type="text" id="mandal" name="mandal" placeholder=" " class="col form-control" value="mand">
                                            <label for="mandal">Mandal / Area</label>
                                        </div>
                                    </div>

                                    <div class="row mb-5">
                                        <div class="col-sm-6 lined-input form-row">
                                            <input type="text" id="location" name="location" placeholder=" " class="col form-control" value="locaa">
                                            <label for="location">Location </label>
                                        </div>
                                        <div class="col-sm-6 lined-input form-row">
                                            <input type="text" id="city" name="city" placeholder=" " class="col form-control" value="city va">
                                            <label for="city">City </label>
                                        </div>
                                    </div>

                                    <div class="row mb-5">
                                        <div class="col-sm-6 lined-input form-row">
                                            <input type="text" id="state" name="state" placeholder=" " class="col form-control" value="ap">
                                            <label for="state">State </label>
                                        </div>
                                        <div class="col-sm-6 lined-input form-row">
                                            <input type="text" id="country" name="country" placeholder=" " class="col form-control" value="india">
                                            <label for="country">Country </label>
                                        </div>
                                    </div>

                                    <div class="row mb-5">
                                        <div class="col-sm-6 lined-input form-row">
                                            <input type="text" id="zipcode" name="zipcode" placeholder=" " class="col form-control" value="500050">
                                            <label for="zipcode">Zip code / Postal Code *</label>
                                        </div>
                                        <div class="col-sm-6 lined-input form-row">
                                            <input type="text" id="Referred-Doctor" name="Referred-Doctor" placeholder="" class="col form-control" value="555">
                                            <label for="Referred-Doctor">Referred by Doctor (Optional)</label>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-lg btn-primary border-0 rounded-pill my-3 px-4 default-btn">Continue</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<script>
    $(function() {
        $.validator.addMethod("alpha", function (value, element) {
            return this.optional(element) || /^[^-\s.'?/><,@!#$~`%&*()_+":;][a-zA-Z.\s-,()'"\&\[\]]+$/i.test(value);
        }, "Please enter valid input");
        $.validator.addMethod("validate_email", function(value, element) {
            if (/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(value)) {
                return true;
            } else {
                return false;
            }
        }, "Please enter a valid Email.");

        $("#add_newpatient_form").submit(function(e) {
            e.preventDefault();
        }).validate({
            rules: {
                fname: "required alpha",
                lname: "required alpha",
                gender: "required",
                dob: "required",
                email_address: {
                    validate_email: true,
                    required: true,
                    email: true,
                },
                zipcode: "required",
            },
            messages: {
                fname: {
                    required: "Enter first name",
                    alpha: "Special/Numeric Characters not allowed"
                },
                lname: {
                    required: "Enter last name",
                    alpha: "Special/Numeric Characters not allowed"
                },
                gender: {
                    required: "Select your gender"
                },
                dob: {
                    required: "Enter date of birth"
                },
                email_address: {
                    email: "Invalid email",
                    required: "Enter Email Id"
                },
                zipcode: {
                    required: "Enter your zipcode"
                },
            },
            errorElement: 'em',
            errorPlacement: function (error, element) {
                if (element.attr('name') === "gender") {
                    error.insertAfter($('#gender-error'));
                } else {
                    error.appendTo(element.parent('div'));
                }
            },
            submitHandler: function(e) {
                continueBtn();
                /* Enter event action to continue to the next screen on add new patient screen */
                $("#doctor_referral").on('keyup', function(e) {
                    if (e.key === 'Enter' || e.keyCode === 13) {
                        continueBtn();
                    }
                });
                return false;
            }
        });
    });


    <?php

    $_SESSION['location'] = $thumbnail_url =  $doc_title = $doc_experience = $doc_designation = $doc_qualification = $doc_department = $doc_location =  '';

    ?>
    //add new patient continue event
    function continueBtn() {
        var age = $("#age").val();
        var gender = $("input[name=gender]:checked").val();

        const $_URL = $('#base_url').attr('href') + 'Appointment/addPatientAction';
        const formData = $('#add_newpatient_form').serializeArray();
        console.log(formData);
        $.ajax({
            url: $_URL,
            type: "POST",
            data: {
                new_patient_data: formData,
                status: "add_new_patient"
            },
            success: function(data, status) {
                console.log(`data`, data);
                var response = JSON.parse(data);
                var doc_id = response['doc_id'];
                var loc = response['location'];
                var appt_date = response['appt_date'];
                var patient_full_name = response['pat_full_name'];
                //remove yh number when existing patient is selected
                var yhno = $('.pt_radio_list.active').find('input').attr('data-id');
                if (yhno) {
                    $('.pt_radio_list.active').find('input').attr('data-id', '');
                }
                if (response['add_new_patient'] == "true" && doc_id != null) {
                    $(".enteryourmobile_step02").css("display", "none");
                    $(".addnewpatient_sec").css("display", "none");
                    $(".enteryourmobile_step03").css("display", "block");
                    $(".selectdateselecttime_sec").css("display", "block");
                    var position = $(".enteryourmobile_step03").offset().top - 150;
                    $("body, html").animate({scrollTop: position}, 1000);
                    $(".patient_name").html("");
                    $(".patient_age").html("");
                    $(".patient_name").html(patient_full_name);
                    $(".patient_age").html(age + " " + gender);

                    imgsrc = "<?php echo $thumbnail_url ?>";
                    doc_name = "<?php echo $doc_title ?>";
                    docexp = "<?php echo $doc_experience ?>"
                    docdesig = "<?php echo $doc_designation ?>"
                    doc_qualification = "<?php echo $doc_qualification ?>"
                    speciality = "<?php echo $doc_department ?>";
                    doc_location_name = "<?php echo "Location: " . $doc_location ?>"
                    if (docexp) {
                        var doctor_details = '<div class="selectyourpreferreddoctors_img"><img src="' + imgsrc + '" alt="' + doc_name + '" /></div><div class="selectyourpreferreddoctors_cnt"><h4>' + doc_name + '<span>' + doc_qualification + '</span></h4><h6>' + docexp + '</h6><p>' + docdesig + '</p><p>' + doc_location_name + '</p></div>';
                    } else {
                        var doctor_details = '<div class="selectyourpreferreddoctors_img"><img src="' + imgsrc + '" alt="' + doc_name + '" /></div><div class="selectyourpreferreddoctors_cnt"><h4>' + doc_name + '<span>' + doc_qualification + '</span></h4><p>' + docdesig + '</p><p>' + doc_location_name + '</p></div>';
                    }
                    $(".selectyourpreferreddoctors_lft").html("");
                    $(".selectyourpreferreddoctors_lft").html(doctor_details);
                    $('#doctor_speciality').val(speciality);
                    $('#doctor_id').val(doc_id);
                    /* Doctor multiple locations */
                    doctor_locations = "<?php echo $_SESSION['location'] ?>";
                    doctor_locations = doctor_locations.split(',');

                    if (doctor_locations.length > 1) {
                        var viewprofiledoctor_data = '<ul class="locations_slots_2"><li class="active" ';
                        for (var i = 0; i < doctor_locations.length; i++) {
                            if (i == 0)
                                viewprofiledoctor_data = viewprofiledoctor_data + 'id="' + doctor_locations[i] + '_sec" data-id="' + doctor_locations[i] + '">' + doctor_locations[i] + '</li>';
                            else
                                viewprofiledoctor_data = viewprofiledoctor_data + '<li id="' + doctor_locations[i] + '_sec" data-id="' + doctor_locations[i] + '">' + doctor_locations[i] + '</li>';
                        }
                        viewprofiledoctor_data = viewprofiledoctor_data + '</ul>';
                        loc = doctor_locations[0];
                        $('.doctor_app_locations_tabs').html("");
                        $('.doctor_app_locations_tabs').html(viewprofiledoctor_data);
                    }

                    $('#doctor_location_id').val(loc);
                    getDoctorSlotsFirsttime(doc_id, appt_date, loc);

                    $(document).on('click', '.pref_doct_viewprofile_btn', function() {
                        doc_name = $(this).parents(".selectyourpreferreddoctors_col").find(".selectyourpreferreddoctors_cnt h4").clone().children().remove().end().text();
                        /* For saving data into database when user clicks on view profile button */
                        $.ajax({
                            url: $(location).attr('href'),
                            type: "POST",
                            data: {
                                status: "doctor_view_profile"
                            },
                        });
                    });
                    $(document).on('click', '.bookanappoinment_btn', function() {
                        imgsrc = $(this).parents(".selectyourpreferreddoctors_col").find(".selectyourpreferreddoctors_img img").attr("src");
                        docname = $(this).parents(".selectyourpreferreddoctors_col").find(".selectyourpreferreddoctors_cnt h4").html();
                        doc_name = $(this).parents(".selectyourpreferreddoctors_col").find(".selectyourpreferreddoctors_cnt h4").clone().children().remove().end().text();
                        docexp = $(this).parents(".selectyourpreferreddoctors_col").find(".selectyourpreferreddoctors_cnt h6").html();
                        docdesig = $(this).parents(".selectyourpreferreddoctors_col").find(".selectyourpreferreddoctors_cnt p").html();
                        var loc_name = $(this).parents(".selectyourpreferreddoctors_col").find(".selectyourpreferreddoctors_cnt p:nth-of-type(2)").html();
                        if (docexp) {
                            var doctor_details = '<div class="selectyourpreferreddoctors_img"><img src="' + imgsrc + '" alt="' + docname + '" /></div><div class="selectyourpreferreddoctors_cnt"><h4>' + docname + '</h4><h6>' + docexp + '</h6><p>' + docdesig + '</p><p>' + loc_name + '</p></div>';
                        } else {
                            var doctor_details = '<div class="selectyourpreferreddoctors_img"><img src="' + imgsrc + '" alt="' + docname + '" /></div><div class="selectyourpreferreddoctors_cnt"><h4>' + docname + '</h4><p>' + docdesig + '</p><p>' + loc_name + '</p></div>';
                        }
                        $(".selectyourpreferreddoctors_lft").html("");
                        $(".selectyourpreferreddoctors_lft").html(doctor_details);
                        $(".doctorselection_sec").css("display", "none");
                        $(".selectyourpreferreddoctors_wp").css("display", "none");
                        $(".selectdateselecttime_sec").css("display", "block");
                        $(".patient_name").html("");
                        $(".patient_age").html("");
                        $(".patient_name").html(patient_full_name);
                        $(".patient_age").html(age + " " + gender);
                        doc_id = $(this).attr('data-id');
                        loc = $(this).attr('data-doctor-locations');
                        speciality = $(this).attr('data-speciality');

                        /* Doctor multiple locations */
                        doctor_locations = loc.split(',');

                        if (doctor_locations.length > 1) {
                            var viewprofiledoctor_data = '<ul class="locations_slots_2"><li class="active" ';
                            for (var i = 0; i < doctor_locations.length; i++) {
                                if (i == 0)
                                    viewprofiledoctor_data = viewprofiledoctor_data + 'id="' + doctor_locations[i] + '_sec" data-id="' + doctor_locations[i] + '">' + doctor_locations[i] + '</li>';
                                else
                                    viewprofiledoctor_data = viewprofiledoctor_data + '<li id="' + doctor_locations[i] + '_sec" data-id="' + doctor_locations[i] + '">' + doctor_locations[i] + '</li>';
                            }
                            viewprofiledoctor_data = viewprofiledoctor_data + '</ul>';
                            loc = doctor_locations[0];
                            $('.doctor_app_locations_tabs').html("");
                            $('.doctor_app_locations_tabs').html(viewprofiledoctor_data);
                        }
                        $('#doctor_id').val(doc_id);
                        $('#doctor_location_id').val(loc);
                        $('#doctor_speciality').val(speciality);
                        getDoctorSlotsFirsttime(doc_id, appt_date, loc);
                    });
                }
                else if (response['add_new_patient'] == "true" && doc_id == null) {
                    $(".enteryourmobile_step02").css("display", "none");
                    $(".addnewpatient_sec").css("display", "none");
                    $(".enteryourmobile_step03").css("display", "block");
                    $(".doctorselection_sec").css("display", "block");
                    $(".selectyourpreferreddoctors_wp").css("display", "block");
                    var position=$(".enteryourmobile_step03").offset().top-150;$("body, html").animate({scrollTop:position},1000);
                    $(document).on('click', '.pref_doct_viewprofile_btn', function() {
                        /* For saving data into database when user clicks on view profile button */
                        $.ajax({
                            url: $(location).attr('href'),
                            type: "POST",
                            data: {
                                status: "doctor_view_profile"
                            },
                        });
                    });
                    $(document).on('click', '.bookanappoinment_btn', function() {
                        /* For saving data into database when user search doctor and clicks on book appointment button */
                        $.ajax({
                            url: $(location).attr('href'),
                            type: "POST",
                            data: {
                                status: "search_doctor"
                            },
                        });

                        imgsrc = $(this).parents(".selectyourpreferreddoctors_col").find(".selectyourpreferreddoctors_img img").attr("src");
                        docname = $(this).parents(".selectyourpreferreddoctors_col").find(".selectyourpreferreddoctors_cnt h4").html();
                        doc_name = $(this).parents(".selectyourpreferreddoctors_col").find(".selectyourpreferreddoctors_cnt h4").clone().children().remove().end().text();
                        docexp = $(this).parents(".selectyourpreferreddoctors_col").find(".selectyourpreferreddoctors_cnt h6").html();
                        docdesig = $(this).parents(".selectyourpreferreddoctors_col").find(".selectyourpreferreddoctors_cnt p").html();
                        var loc_name = $(this).parents(".selectyourpreferreddoctors_col").find(".selectyourpreferreddoctors_cnt p:nth-of-type(2)").html();
                        if (docexp) {
                            var doctor_details = '<div class="selectyourpreferreddoctors_img"><img src="' + imgsrc + '" alt="' + docname + '" /></div><div class="selectyourpreferreddoctors_cnt"><h4>' + docname + '</h4><h6>' + docexp + '</h6><p>' + docdesig + '</p><p>' + loc_name + '</p></div>';
                        } else {
                            var doctor_details = '<div class="selectyourpreferreddoctors_img"><img src="' + imgsrc + '" alt="' + docname + '" /></div><div class="selectyourpreferreddoctors_cnt"><h4>' + docname + '</h4><p>' + docdesig + '</p><p>' + loc_name + '</p></div>';
                        }
                        $(".selectyourpreferreddoctors_lft").html("");
                        $(".selectyourpreferreddoctors_lft").html(doctor_details);
                        $(".doctorselection_sec").css("display", "none");
                        $(".selectyourpreferreddoctors_wp").css("display", "none");
                        $(".selectdateselecttime_sec").css("display", "block");
                        $(".patient_name").html("");
                        $(".patient_age").html("");
                        $(".patient_name").html(patient_full_name);
                        $(".patient_age").html(age + " " + gender);
                        doc_id = $(this).attr('data-id');
                        loc = $(this).attr('data-doctor-locations');

                        /* Doctor multiple locations */
                        doctor_locations = loc.split(',');

                        if (doctor_locations.length > 1) {
                            var viewprofiledoctor_data = '<ul class="locations_slots_2"><li class="active" ';
                            for (var i = 0; i < doctor_locations.length; i++) {
                                if (i == 0)
                                    viewprofiledoctor_data = viewprofiledoctor_data + 'id="' + doctor_locations[i] + '_sec" data-id="' + doctor_locations[i] + '">' + doctor_locations[i] + '</li>';
                                else
                                    viewprofiledoctor_data = viewprofiledoctor_data + '<li id="' + doctor_locations[i] + '_sec" data-id="' + doctor_locations[i] + '">' + doctor_locations[i] + '</li>';
                            }
                            viewprofiledoctor_data = viewprofiledoctor_data + '</ul>';
                            loc = doctor_locations[0];
                            $('.doctor_app_locations_tabs').html("");
                            $('.doctor_app_locations_tabs').html(viewprofiledoctor_data);
                        }

                        speciality = $(this).attr('data-speciality');
                        $('#doctor_id').val(doc_id);
                        $('#doctor_location_id').val(loc);
                        $('#doctor_speciality').val(speciality);
                        getDoctorSlotsFirsttime(doc_id, appt_date, loc);
                    });
                }
            }
        });
    }

    $(document).ready(function () {
        $('.datepicker').datepicker({
            altFormat: 'dd-mm-yy',
            dateFormat: 'dd-mm-yy',
            changeMonth: true,
            minDate: new Date()
        });

        var age = "";
        $('#dob').datepicker({
            onSelect: function (value, ui) {
                $('#dob-error').html("");
                var today = new Date();
                age = today.getFullYear() - ui.selectedYear;
                $('#age').val(age);
            },
            maxDate: new Date(),
            defaultDate: new Date(1980, 0, 1),
            dateFormat: 'dd-mm-yy',
            changeMonth: true,
            changeYear: true,
            yearRange: "-100:+0"
        });

    });

    jQuery(function () {
        $(this).attr('maxlength', 1);
        $(this).on('keyup', function (e) {
            // alert(e.keyCode);
            if ($(this).val() == "" && e.keyCode != 8) {
                return false;
            }
            var parent = $($(this).parent());

            if (e.keyCode === 8 || e.keyCode === 37) {
                var prev = parent.find('input#' + $(this).data('previous'));

                if (prev.length) {
                    $(prev).select();
                }
            } else if ((e.keyCode >= 48 && e.keyCode <= 57) || (e.keyCode >= 65 && e.keyCode <= 90) || (e.keyCode >= 96 && e.keyCode <= 105) || e.keyCode === 39) {
                var next = parent.find('input#' + $(this).data('next'));

                if (next.length) {
                    $(next).select();
                } else {
                    if (parent.data('autosubmit')) {
                        parent.submit();
                    }
                }
            }
        });
    });
</script>
