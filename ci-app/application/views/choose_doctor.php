<div class="container">
    <?php $this->load->view('include/header-logo'); ?>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <?php $this->load->view('include/header-stepper'); ?>

                    <!-- Box Info Start -->
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <div class="card yh-card mb-2">
                                <div class="card-body p-5">
                                    <img src="<?= base_url('public/assets/img/find-doctor.png')?>" alt="Search Doctor">
                                    <p class="h5 my-3 purple-text">Find and select your preferred doctor</p>
                                    <p>Search by preferred doctors name</p>
                                    <div class="mt-4">
                                        <form method="post" action="">
                                            <div class="row mb-4">
                                                <div class="col lined-input">
                                                    <input type="text" id="search_doctor" name="search_doctor" placeholder=" " class="col form-control">
                                                    <label for="search_doctor">Search by Doctor</label>
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col lined-input">
                                                    <p>Not sure which doctor to consult? Use the filters below</p>
                                                    <select name="_sft_doctor-department[]" class="form-control sf-input-select" title="">
                                                        <option class="sf-level-0 sf-item-0 sf-option-active" selected="selected" data-sf-count="0"
                                                                data-sf-depth="0" value="">Choose Speciality
                                                        </option>
                                                        <?php
                                                        $options = [
                                                            'Arthroscopy & Sports Medicine',
                                                            'Bariatric Surgery',
                                                            'Cardiology',
                                                            'Critical Care',
                                                            'CT Surgery',
                                                            'Dermatology',
                                                            'Emergency Medicine',
                                                            'Endocrinology',
                                                            'ENT',
                                                            'Gastroenterology',
                                                            'General Medicine',
                                                            'General Surgery',
                                                            'Gynaecology & Obstetrics',
                                                            'Head & Neck Cancer',
                                                            'Heart & Lung Transplant',
                                                            'Hematology & BMT',
                                                            'Infectious Diseases',
                                                            'Interventional Radiology',
                                                            'Liver Diseases & Transplant Surgery',
                                                            'Lung Transplant',
                                                            'Medical Oncology',
                                                            'Nephrology',
                                                            'Neuro Surgery',
                                                            'Neurology',
                                                            'Nuclear Medicine',
                                                            'Ophthalmology',
                                                            'Orthopaedics',
                                                            'Pain Medicine',
                                                            'Pediatric Surgery',
                                                            'Pediatrics',
                                                            'Plastic Surgery',
                                                            'Psychiatry',
                                                            'Psychology',
                                                            'Pulmonology',
                                                            'Radiation Oncology',
                                                            'Radiology',
                                                            'Rheumatology',
                                                            'Robotic Sciences',
                                                            'Sleep medicine',
                                                            'Spine Surgery',
                                                            'Surgical Gastroenterology',
                                                            'Surgical Oncology',
                                                            'Thoracic Surgery',
                                                            'Urology',
                                                            'Vascular Surgery',
                                                        ];
                                                        foreach ($options as $index => $option) {
                                                            $class = sprintf('sf-level-0 sf-item-%d', $index + 1);
                                                            $value = strtolower(str_replace(' ', '-', $option));
                                                            echo sprintf(
                                                                '<option class="%s" data-sf-count="%d" data-sf-depth="0" value="%s">%s</option>',
                                                                $class,
                                                                $index + 1,
                                                                $value,
                                                                $option
                                                            );
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <button type="submit" class="btn btn-lg btn-primary border-0 rounded-pill mt-3 px-4 default-btn">
                                                Continue
                                            </button>

                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- Box Info End -->
                    <div id="searchResults"></div>
                </div>
            </div>

        </div>
    </section>
</div>

<script>
    $(document).ready(function () {
        $('#search_doctor').on('input', function () {
            const searchValue = $(this).val();
            getDoctorsList(searchValue);
        });

        function getDoctorsList(searchValue) {
            const $_URL = $('#base_url').attr('href') + 'appointment/get-doctors-list';
            $.ajax({
                url: $_URL,
                type: 'POST',
                data: {
                    searchTerm: searchValue
                },
                dataType: 'html',
                success: function (response) {
                    $('#searchResults').html(response);
                },
                error: function (error) {
                    console.error('Error:', error);
                }
            });
        }
    });
</script>
