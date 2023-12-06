<link rel="stylesheet" href="<?= base_url('public/lib/intl-tel-input/build/css/intlTelInput.css')?>">
<style>
    .hide {
        display: none;
    }

    .valid-msg {
        color: #2ecc71;
    }

    .btn-primary {
        --bs-btn-disabled-bg: #a0a4a9;
    }
    .iti {
        width: 100%;
        display: block;
    }
    .iti--separate-dial-code .iti__selected-flag {
        background-color: transparent;
    }

    #error-msg, #valid-msg {
        position: absolute;
        bottom: -25px;
        right: 12px;
    }
    #error-msg {
        color: #dd4421;
    }
    #valid-msg {
        color: #2ecc71;
    }
    .verificationcode_resend {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .resendotp_timer {
        flex: 1;
    }
    .resendotp_link {
        flex: 1;
        text-align: right;
        padding-right: 34px;
    }
</style>
<div class="container">
    <?php $this->load->view('include/header-logo'); ?>

    <section>
        <div class="container">
            <?php $this->load->view('include/header-stepper'); ?>
            <!-- Step 01 -->
            <!-- First screen -->
            <div class="row mt-4 mobile-reg enteryourmobile_activescrn">
                <div class="col-md-8 offset-md-2">
                    <div class="card yh-card mb-5">
                        <div class="card-body p-5">
                            <img src="<?= site_url('public/assets/img/mobile.png') ?>" alt="mobile">
                            <p class="h5 my-3 purple-text">Enter your mobile number</p>
                            <div class="mt-5">
                                <form method="post" id="reg-from" autocomplete="off">
                                    <div class="row mb-3">
                                        <div class="col lined-input w-100">
                                            <input type="text" id="phone_number" placeholder="Mobile Number" class="col form-control w-100"
                                                   autocomplete="nope" name="mobile_number" autofocus style="width: 100%"
                                                   oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" >
                                            <span id="valid-msg" class="hide valid-msg">✓ Valid</span>
                                            <span id="error-msg" class="hide error-msg"></span>
                                        </div>
                                    </div>
                                    <button type="submit"
                                            class="btn btn-lg btn-primary border-0 rounded-pill my-3 px-4 default-btn requestotp_btn"
                                            name="requestOtp" id="request-otp" value="Request OTP" disabled="disabled" onclick="sendOtp(event)"
                                    >Request OTP
                                    </button>
                                </form>

                                <p class="mt-3 fs-7 gray-text">
                                    <small>
                                        By clicking on Request OTP Button, you accept to receive communication from
                                        Yashoda Hospitals on email, SMS, call and Whatsapp.
                                    </small>
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <!-- Second screen -->
            <div class="row mt-4 mobile-otp enteryourmobile_entercode" style="display:none">
                <div class="col-md-8 offset-md-2">
                    <div class="card yh-card mb-5">
                        <div class="card-body p-5">
                            <img src="<?= base_url('public/assets/img/otp-icon.png')?>" alt="mobile">
                            <p class="h5 my-3 purple-text">Enter OTP</p>
                            <p>We have sent you an SMS on +<b class="hashedNumber"></b><br> with a 5-digit verification code (OTP)</p>
                            <div class="mt-5 verificationcode_sec digit-group">
                                <form method="post" autocomplete="off">
                                    <div class="row mb-3 gx-5 lined-input pe-md-5 verificationcode_sec digit-group">
                                        <div class="col">
                                            <input type="tel" id="otp-1" class="input_digit form-control text-center" maxlength="1" data-next="otp-2" onkeypress="otpEntry()" autocomplete="off" />
                                        </div>
                                        <div class="col">
                                            <input type="tel" id="otp-2" class="input_digit form-control text-center" maxlength="1" data-next="otp-3" data-previous="otp-1" autocomplete="off" />
                                        </div>
                                        <div class="col">
                                            <input type="tel" id="otp-3" class="input_digit form-control text-center" maxlength="1" data-next="otp-4" data-previous="otp-2" autocomplete="off" />
                                        </div>
                                        <div class="col">
                                            <input type="tel" id="otp-4" class="input_digit form-control text-center" maxlength="1" data-next="otp-5" data-previous="otp-3" autocomplete="off" />
                                        </div>
                                        <div class="col">
                                            <input type="tel" id="otp-5" class="input_digit form-control text-center" maxlength="1" data-previous="otp-4" autocomplete="off" />
                                        </div>
                                    </div>
                                    <div class="verificationcode_resend">
                                        <span class="resendotp_timer" id="timer"></span>
                                        <div class="resendotp_link">
                                            <button type="button" id="resend-otp" class="btn btn-link" disabled="disabled" onclick="resendOtp(event)">Resend OTP</button>
                                        </div>
                                        <span id="errOtp" class="errOtp"></span>
                                    </div>
                                    <div class="editmobilenumber_link">
                                        <div class="loading_icon_slots" id="loading_icon_slots_otp_verify" style="display: none; text-align: center;">
                                            <img src="<?= base_url('/public/assets/img/loading.gif')?>" width="40">
                                        </div>
                                        <a class="edit-mobile-number" href="javascript:void(0);">Edit mobile number</a>
                                    </div>
                                    <button type="submit" class="verificationcode_submit btn btn-lg btn-primary border-0 rounded-pill my-3 px-4 default-btn" disabled="disabled" onclick="verifyOtp()">Verify OTP</button>
                                </form>
                                <p class="mt-3 fs-7 gray-text"><small>(By clicking on Verify OTP, you accept to terms and conditions of online payment process and accept to receive communication from Yashoda Hospitals on email, sms and Whatsapp.)</small></p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

</div>


<script src="<?= base_url('public/lib/intl-tel-input/build/js/intlTelInput.js')?>"></script>
<script>

    var input = document.querySelector("#phone_number");

    var intl = window.intlTelInput(input, {
        utilsScript: "<?= base_url('public/lib/intl-tel-input/build/js/utils.js')?>",
        initialCountry: "auto",
        separateDialCode: true,
        allowDropdown: true,
        autoHideDialCode: false,
        //onlyCountries: ['in'],
        geoIpLookup: function (success, failure) {
            $.get("https://ipinfo.io", function () { }, "jsonp").always(function (resp) {
                var countryCode = (resp && resp.country) ? resp.country : "IN";
                success(countryCode);
            });
        },
    });

    input.addEventListener("countrychange", function () {
        $("#phone_number").val('');
        reset();
        document.querySelector('#request-otp').disabled = true;
    });
    setTimeout(function () { $('#phone_number').focus(); }, 100);
    setTimeout(function () { $('#otp-1').focus(); }, 100);

    errorMsg = document.querySelector("#error-msg");
    validMsg = document.querySelector("#valid-msg");

    // Error messages based on the code returned from getValidationError
    var errorMap = ["Invalid number", "Invalid country code", "Too short", "Too long", "Invalid number"];

    var reset = function () {
        input.classList.remove("error");
        errorMsg.innerHTML = "";
        errorMsg.classList.add("hide");
        validMsg.classList.add("hide");
    };

    // Validate on blur event
    input.addEventListener('keyup', function (e) {
        reset();
        if (input.value.trim()) {
            var phoneNumber = input.value;
            if (intl.isValidNumber() && phoneNumber.charAt(0) != 0) {
                validMsg.classList.remove("hide");
                document.querySelector('#request-otp').disabled = false;
                // $("#phone_number").on('keyup', function (e) {
                if (e.key === 'Enter' || e.keyCode === 13) {
                    sendOtp();
                }
                // });
            } else {
                input.classList.add("error");
                var errorCode = intl.getValidationError();
                errorMsg.innerHTML = errorMap[errorCode];
                errorMsg.classList.remove("hide");
                document.querySelector('#request-otp').disabled = true;
            }
        }
    });
</script>

<script>
    //timer code starts here
    var timerOn = false;

    function timer(remaining) {
        var m = Math.floor(remaining / 60);
        var s = remaining % 60;

        m = m < 10 ? '0' + m : m;
        s = s < 10 ? '0' + s : s;
        document.getElementById('timer').innerHTML = m + ':' + s;
        remaining -= 1;
        if (remaining >= 0 && timerOn) {
            setTimeout(function() {
                timer(remaining);
            }, 1000);
            return;
        }

        if (!timerOn) {
            // Do validate stuff here
            return;
        }

        document.getElementById("resend-otp").disabled = false;
        $(".resendotp_timer").css("display", "none");
    }

    //Edit mobile number
    $(".edit-mobile-number").on("click", function () {
        document.getElementById("request-otp").disabled = false;
        $('.otp_alert').css("display", "none");
        /* For saving data into database when user search doctor and clicks on book appointment button */
        $.ajax({
            url: $(location).attr('href'),
            type: "POST",
            data: {
                status: "edit_mobile_number"
            },
        });
        timerOn = false;
        $("#otp-1").val("");
        $("#otp-2").val("");
        $("#otp-3").val("");
        $("#otp-4").val("");
        $("#otp-5").val("");
        $(".enteryourmobile_activescrn").css("display", "block");
        $(".enteryourmobile_entercode").css("display", "none");
    });

    function sendOtp(e) {
        e.preventDefault();
        grecaptcha.ready(function () {
            grecaptcha.execute('<?= v3_G_RECAP_SITE_KEY ?>', {action: 'submit'}).then(function (token) {
                $('.otp_alert').css("display", "block");
                document.getElementById("request-otp").disabled = true;
                const $_URL = $('#base_url').attr('href') + 'appointment/send-otp';
                $("#errOtp").html("");
                var mobile = $("#phone_number").val();
                var country_code = intl.activeItem.dataset.dialCode;
                var valid_number = $('#valid-msg').attr('class');
                var invalid_number = $('#error-msg').attr('class');

                if (valid_number == "hide" && invalid_number == "") {
                    document.getElementById("resend-otp").disabled = true;
                    return false;
                }
                document.getElementById("resend-otp").disabled = false;

                $.ajax({
                    url: $_URL,
                    type: "POST",
                    dataType: "json",
                    data: {
                        mobile: mobile,
                        status: "otp_send",
                        country_code: country_code,
                        token: token
                    },
                    success: function (data, status) {
                        var response = data;
                        console.log(response);
                        if (response.message) {
                            timerOn = true;
                            document.getElementById("resend-otp").disabled = true;
                            $(".hashedNumber").html("");
                            $(".hashedNumber").html(response['country_code']);
                            $(".resendotp_timer").css("display", "block");
                            timer(60);
                            $(".enteryourmobile_activescrn").css("display", "none");
                            $(".enteryourmobile_entercode").css("display", "block");
                        }
                        $("#otp-1").focus();
                    }
                });
            });
        });
    }

    function resendOtp(e) {
        e.preventDefault();
        grecaptcha.ready(function () {
            grecaptcha.execute('<?= v3_G_RECAP_SITE_KEY ?>', {action: 'submit'}).then(function (token) {
                $("#otp-1").val("");
                $("#otp-2").val("");
                $("#otp-3").val("");
                $("#otp-4").val("");
                $("#otp-5").val("");
                const mobile = $("#phone_number").val();
                const country_code = intl.activeItem.dataset.dialCode;
                const $_URL = $('#base_url').attr('href') + 'appointment/send-otp';
                $.ajax({
                    url: $_URL,
                    type: "POST",
                    dataType: "json",
                    data: {
                        mobile: mobile,
                        country_code: country_code,
                        status: "otp_send",
                        token: token
                    },
                    success: function (data, status) {
                        if (data.message) {
                            document.getElementById("resend-otp").disabled = true;
                            $(".resendotp_timer").css("display", "block");
                            timer(60);
                        }
                    }
                });
            });
        });
    }

    $("#otp-5").on('keyup', function (e) {
        if (e.key === 'Enter' || e.keyCode === 13) {
            verifyOtp();
        }
    });

    function otpEntry() {
        var otp_1 = $("#otp-1").val();
        if (!isNaN(otp_1)) {
            $("#errOtp").html("");
        }
    }

    const inputOTPDigit = $(".input_digit");

    inputOTPDigit.on('input', function(event) {
        const maxLength = $(this).attr('maxlength');
        const nextId = $(this).data('next');
        const previousId = $(this).data('previous');

        const isBackspaceOrDelete = event.keyCode === 8 || event.keyCode === 46;

        if ($(this).val().length >= maxLength) {
            const nextInput = $("#" + nextId);
            if (nextInput.length) {
                nextInput.focus();
            }
        } else if (previousId && $(this).val().length === 0) {
            const previousInput = $("#" + previousId);
            if (previousInput.length) {
                previousInput.focus();
            }
        }

        $(".verificationcode_submit").prop('disabled', isBackspaceOrDelete);

        const allInputsFilled = $(".input_digit").toArray().every(function(input) {
            return $(input).val().trim() !== "";
        });

        $(".verificationcode_submit").prop('disabled', !allInputsFilled);
    });

    //verify otp
    function verifyOtp() {
        $("#otp-1, #otp-2, #otp-3, #otp-4, #otp-5").prop('disabled', true);
        const otp = Array.from({ length: 5 }, (_, index) => $(`#otp-${index + 1}`).val()).join('');
        const country_code = intl.activeItem.dataset.dialCode;

        if (otp === "") {
            $("#errOtp").html("Please enter OTP.");
            return false;
        }

        $(".verificationcode_submit").prop('disabled', true);
        jQuery('#loading_icon_slots_otp_verify').show();

        const $_URL = $('#base_url').attr('href') + 'appointment/verify-otp';

        $.ajax({
            url: $_URL,
            type: "POST",
            dataType: "json",
            data: {
                otp: otp,
                status: "verify"
            },
            success: function (data, status) {
                console.log(data);
                handleOtpVerificationResponse(data, country_code);
            }
        });
    }

    const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun",
        "Jul", "Aug", "Sept", "Oct", "Nov", "Dec"
    ];

    const getOrdinalNum = (number) => {
        let selector;

        if (number <= 0) {
            selector = 4;
        } else if ((number > 3 && number < 21) || number % 10 > 3) {
            selector = 0;
        } else {
            selector = number % 10;
        }

        return number + ['th', 'st', 'nd', 'rd', ''][selector];
    };
    function handleOtpVerificationResponse(data, country_code) {
        if (data === "FAILED") {
            $(".enteryourmobile_entercode").css("display", "none");
            $('.payment_failure').css("display", "block");
        } else {
            jQuery('#loading_icon_slots_otp_verify').hide();
            var response = data.data;

            if (response.hasOwnProperty('upcoming_appt')) {
                handleUpcomingAppointments(response.upcoming_appt);
            }

            if (response.hasOwnProperty('past_appt')) {
                handlePastAppointments(response.past_appt);
            }

            console.log('response', response);
            if (response.otp === 'true') {
                handleOtpStatus(response, country_code);
            }
        }
    }

    function handleUpcomingAppointments(upcomingAppt) {
        var upcoming_html_code = "<ul>";

        if (upcomingAppt) {
            $.each(upcomingAppt, function () {
                var date = new Date(this.APTDATE);
                var d = getOrdinalNum(date.getDate());
                var m = monthNames[date.getMonth()];
                var y = date.getFullYear().toString().substr(-2);
                var loc = this.loccd;
                var loc_name = getLocationName(loc);

                upcoming_html_code += buildAppointmentListItem(this, d, m, y, loc_name);
            });

            var total_upcoming_html_code = upcoming_html_code + '</ul>';
            $('#patientinnformation_1').html(total_upcoming_html_code);
        } else {
            var no_text_msg = '<span class="no_data_found">No upcoming appointments</span>';
            $('#patientinnformation_1').html(no_text_msg);
        }
    }

    function handlePastAppointments(pastAppt) {
        var past_html_code = "<ul>";
        console.log("pastAppt", pastAppt);
        if (pastAppt != '') {
            $.each(pastAppt, function (index) {
                if (index < 10) {
                    var date = new Date(this.APTDATE);
                    var d = getOrdinalNum(date.getDate());
                    var m = date.toLocaleString('default', { month: 'short' });
                    var y = date.getFullYear().toString().slice(-2);
                    var loc = this.loccd;
                    var loc_name = getLocationName(loc);

                    past_html_code += buildAppointmentListItem(this, d, m, y, loc_name, true);
                }
            });

            var total_past_html_code = past_html_code + '</ul>';
            $('#patientinnformation_2').html(total_past_html_code);
        } else {
            var no_text_msg = '<span class="no_data_found">No previous appointments</span>';
            $('#patientinnformation_2').html(no_text_msg);
        }
    }

    function buildAppointmentListItem(appointment, day, month, year, location, isPast = false) {
        const statusClass = isPast ? 'cancelled_btn' : 'cancel_btn';
        const statusText = isPast ? 'Cancelled' : 'Cancel';

        const {
            APTREFNO,
            DOCNAME,
            slotseqno,
            loccd,
            PATID,
            PATIENTNAME,
            APTDATE,
            SLOT,
            MOBILENO
        } = appointment;

        location = getLocationName(loccd);

        const listItem = `
            <li class="list-${APTREFNO}">
                <dd><b>${day}</b>${month} ${year}</dd>
                <dd>${DOCNAME} - ${location}</dd>
                <dd>${PATIENTNAME}</dd>
                <dd><span class="button ${statusClass}"
                    data-id="${APTREFNO}"
                    data-doccd="${appointment.doccd}"
                    data-docname="${DOCNAME}"
                    data-slotseqno="${slotseqno}"
                    data-loc="${loccd}"
                    data-patid="${PATID}"
                    data-patname="${PATIENTNAME}"
                    data-aptdate="${APTDATE}"
                    data-slot="${SLOT}"
                    data-mobile="${MOBILENO}">
                    ${statusText}
                </span></dd>
            </li>`;

        return listItem;
    }

    function getLocationName(loc) {
        let loc_name;

        switch (loc) {
            case 1:
            case 2:
                loc_name = "Secunderabad";
                break;
            case 3:
                loc_name = "Malakpet";
                break;
            case 5:
                loc_name = "Somajiguda";
                break;
            case 9:
                loc_name = "Hitec City";
                break;
            default:
                loc_name = "Unknown Location";
                break;
        }

        return loc_name;
    }

    function handleOtpStatus(response, country_code) {
        $('#errOtp').text(response.message);

        if (response.otp === "true") {
            $('#errOtp').css('color', "green");

            if (response.existing_pts.length > 0) {
                handleExistingPatients(response, country_code);
            } else {
                handleNewPatients(country_code);
            }
        } else {
            $("#otp-1, #otp-2, #otp-3, #otp-4, #otp-5").prop('disabled', false);
            $(".verificationcode_submit").prop('disabled', false);
            $('#errOtp').css('color', "red");
        }
    }

    function handleExistingPatients(response, country_code) {
        console.log('existing patients', response.existing_pts);
        window.location.href = '<?= site_url('appointment/user-home') ?>';
        return;
        var total_html_code = buildExistingPatientsList(response.existing_pts) +
            '<div class="ex_continue_submit_link text-center"><input type="submit" id="ex-continue" value="Continue" disabled="true" class="continue_submit" onclick="existingContinueBtn()"></div>';

        if (response['otp']) {
            $('#errOtp').text(response.message);

            if (response.otp === "true") {
                $('#errOtp').css('color', "green");

                if (country_code == 91) {
                    $(".patientinnformation_checklist").html("");
                    $(".patientinnformation_checklist").html(total_html_code);
                    $(".enteryourmobile_step01").css("display", "none");
                    $(".enteryourmobile_entercode").css("display", "none");
                    $(".enteryourmobile_step02").css("display", "block");
                    $(".patientinnformation_sec").css("display", "block");
                } else {
                    $(".enteryourmobile_step01").css("display", "none");
                    $(".enteryourmobile_entercode").css("display", "none");
                    $(".enteryourmobile_step02").css("display", "block");
                    $(".enteryourmobile_step02 .progressbar_wp").css("display", "none");
                    $(".addnewpatient_sec_bangladesh").css("display", "block");
                }
            } else {
                $("#otp-1, #otp-2, #otp-3, #otp-4, #otp-5").prop('disabled', false);
                $(".verificationcode_submit").prop('disabled', false);
                $('#errOtp').css('color', "red");
            }
        }
    }

    function handleNewPatients(country_code) {
        console.log(country_code);
        $(".enteryourmobile_step01").css("display", "none");
        $(".enteryourmobile_entercode").css("display", "none");
        $(".enteryourmobile_step02").css("display", "block");
        $(".addnewpatient_sec").css("display", "block");
        window.location.href = '<?= site_url('appointment/add-patient') ?>';
    }

    function buildExistingPatientsList(existingPts) {
        var html_code = "<ul>";

        $.each(existingPts, function () {
            html_code += '<li><div class="pt_radio_list"><label>' +
                this.fullname + ' - ' + (this.YHNo ? this.YHNo : this.patid) +
                '<span><input type="radio" name="ExistingPatient" id="p1"' +
                ' data-id="' + this.YHNo + '"' +
                ' data-name="' + this.fullname + '"' +
                ' data-age="' + this.age + '"' +
                ' data-gender="' + this.gender + '"' +
                ' data-email="' + this.email + '"' +
                ' data-patid="' + this.patid + '"' +
                '></span></label></div></li>';
        });

        return html_code + '</ul>';
    }


</script>
