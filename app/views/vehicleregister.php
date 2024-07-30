<!DOCTYPE html>
<html lang="en">
<?php include('basic/header.php'); ?>
<style>
    .custom-control-input:checked~.custom-control-label::before {
        background-color: #399918;
        /* danger color */
        border-color: #FF4C4C;
    }

    .custom-control-input:checked~.custom-control-label::after {
        background-color: #FF4C4C;
    }

    .custom-control-input:not(:checked)~.custom-control-label::before {
        background-color: #FF4C4C;
        /* success color */
        border-color: #FF4C4C;
    }

    .custom-control-input:not(:checked)~.custom-control-label::after {
        background-color: #ffffff;
    }

    .covid-image.full-rounded {
        border-radius: 50%;
        width: 200px;
        /* Adjust the size as needed */
        height: 200px;
        /* Adjust the size as needed */
        object-fit: cover;
        /* Ensures the image covers the area */
    }
</style>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<!-- Select2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css" rel="stylesheet" />

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<!-- Mirrored from designmodo.static.domains/bootstrap5form/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 15 Jul 2024 12:17:27 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->


<body>
    <!-- CONTAINER -->
    <div class="container d-flex align-items-center min-vh-100">
        <div class="row g-0 justify-content-center">
            <!-- TITLE -->
            <div class="col-lg-4 offset-lg-1 mx-0 px-0">
                <div id="title-container">
                    <img class="covid-image full-rounded" src="assets/img/taxi.png">
                    <!-- <h2>COVID-19</h2> -->
                    <h3 style="color:white;">Vehicle Registration </h3>
                    <p> Welcome to the MeghMyTrip vehicle registration portal ! To register your taxi or vehicle, please ensure you have the information ready.
                    </p>
                </div>
            </div>
            <!-- FORMS -->
            <div class="col-lg-7 mx-0 px-0">
                <div class="progress">
                    <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="50" class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" style="width: 0%"></div>
                </div>
                <div id="qbox-container">
                    <form class="needs-validation" id="form-wrapper" method="post" name="form-wrapper" novalidate="">
                        <div id="steps-container">
                            <div class="step">
                                <h4> Vehicle Registration</h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">RegistrationNo: <span class="text-danger">*</span></label>
                                        <input type="text" id="vehicle_registration_no" class="form-control" placeholder="Registration No" autocomplete="off" required>

                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Vehicle Type<span class="text-danger">*</span></label>
                                        <select class="form-control" id="vehicle_type_id"></select>
                                    </div>
                                </div>

                            </div>
                            <div class="step">
                                <!-- <h4>Are you experiencing a high fever, dry cough, tiredness and loss of taste or smell?</h4> -->
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="vehicle_made_id">Vehicle Made <span class="text-danger">*</span></label>
                                            <select class="form-control" id="vehicle_made_id"></select>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="vehicle_model_id">Vehicle Model <span class="text-danger">*</span></label>
                                            <select class="form-control" id="vehicle_model_id"></select>
                                        </div>
                                    </div>
                                    <div class="col-md-8" id="not_available_container" style="display: none;">
                                        <div class="form-group">
                                            <label for="not_available_model">Type Vehicle Model <span class="text-danger">*</span></label>
                                            <input type="text" id="not_available_model" class="form-control" placeholder="Vehicle Model Name" autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="step">
                                <!-- <h4>Are you having diarrhoea, stomach pain, conjunctivitis, vomiting and headache?</h4> -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="current_owner_name">Current Owner Name <span class="text-danger">*</span></label>
                                            <input type="text" id="current_owner_name" class="form-control" placeholder="Current Owner Name" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="owner_contact_no">Owner Contact No <span class="text-danger">*</span></label>
                                            <input type="text" id="owner_contact_no" class="form-control" maxlength="10" placeholder="Owner Contact No" autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="step">
                                <!-- <h4>Have you traveled to any of these countries with the highest number of COVID-19 cases in the world for the past 2 weeks?</h4> -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="driver_name">Driver Name <span class="text-danger">*</span></label>
                                            <input type="text" id="driver_name" class="form-control" placeholder="Driver Name" autocomplete="off">
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="driver_contact_no">Driver Contact No <span class="text-danger">*</span></label>
                                            <input type="text" id="driver_contact_no" class="form-control" placeholder="Driver Contact No" autocomplete="off" maxlength="10">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="step">
                                <!-- <h4>Are you experiencing any of these serious symptoms of COVID-19 below?</h4> -->
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="driver_licence_no">Driver Licence No</label>
                                            <input type="text" id="driver_licence_no" class="form-control" placeholder="Driver Licence No" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6" data-select2-id="58">
                                        <div class="form-group" data-select2-id="57">
                                            <label>Locations</label>
                                            <div class="select2-purple" data-select2-id="56">
                                                <select class="form-control select2-multiple" id="locations" multiple="multiple" data-placeholder="Select a Location">

                                                    <!-- <select id="locations" class="form-control select2-multiple"  data-placeholder="Select a Location" data-dropdown-css-class="select2-purple" style="width: 100%;" data-select2-id="15" tabindex="-1" aria-hidden="true"> -->

                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="isOwnerTheDriver">
                                        <label class="custom-control-label" for="isOwnerTheDriver">Is Owner also the Driver ?</label>
                                    </div>
                                </div>
                            </div>
                            <div class="step">
                                <h4>Registration Certificate & Licence Document<Data></Data></h4>
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 pr-4">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <label for="location_ids">Registration Certificate<span class="text-danger">*</span></label>

                                                <input type="file" id="rc" class="dropify" data-height="100" style="width: 2000px;" accept="pdf" data-allowed-file-extensions="pdf" />
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 pr-4">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <label for="location_ids">Licence<span class="text-danger">*</span></label>
                                                <input type="file" id="driver_licence_path" class="dropify" data-height="100" style="width: 2000px;" accept="pdf" data-allowed-file-extensions="pdf" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="step">
                                <div class="mt-1">
                                    <div class="closing-text">
                                        <h4>Final Submit </h4>
                                        <!-- <p>We will assess your information and will let you know soon if you need to get tested for COVID-19.</p> -->
                                        <p>Click on the submit button to continue.</p>
                                    </div>
                                </div>
                            </div>
                            <div id="successvehicleregister" style="display:none">
                                <div class="mt-5">
                                    <h4>Your Vehicle is Registered Successfully ! We'll get back to you ASAP!</h4>
                                    <p>Thank you for registering your vehicle with us. Our team will review your details and contact you shortly with the next steps.</p>
                                    <a class="back-link" href="vehicle-register">Go back from the beginning ➜</a>
                                </div>
                            </div>
                        </div>
                        <div id="q-box__buttons">
                            <button id="prev-btn" type="button">Previous</button>
                            <button id="next-btn" type="button">Next</button>
                            <button id="submit-btn" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div><!-- PRELOADER -->
    <div id="preloader-wrapper">
        <div id="preloader"></div>
        <div class="preloader-section section-left"></div>
        <div class="preloader-section section-right"></div>
    </div>

    <script src="assets/js2/script.js">
    </script>
    <!-- Static App Form Collection Script -->
    <script src="assets/js/static-forms.js" type="text/javascript"></script>
    <!-- Static App Form Collection Script -->
    <script src="../../static.app/js/static-forms.js" type="text/javascript"></script>
    <!-- Static App Form Collection Script -->
    <script src="#" type="text/javascript"></script>
    <!-- Static App Form Collection Script -->
    <script src="#" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.all.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <!-- Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="assets/js/core/popper.min.js" type="text/javascript"></script>
    <script src="assets/js/core/bootstrap.min.js" type="text/javascript"></script>
    <!-- Place this tag in your head or just before your close body tag. -->
    <script src="assets/js/md5.js"></script>
    <script src="assets/js/CallService.js"></script>
    <script src="assets/js/commonfunctions.js"></script>
    <script src="assets/js/loader/loadingoverlay.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(function() {
            getVehicleType();
            getVehicleManufacturer();
            getVehicleModel();
            getLocation();
        });

        $(document).ready(function() {
            $('.select2-multiple').select2();
        });


        function clearform() {
            $('#client_name').val('');
            $('#telephone_number').val('');
            $('#mobile_no').val('');
            $('#fax').val('');
            $('#contact_name').val('');
            $('#contact_number').val('');
            $('#person_designation').val('');
            $('#state').val('');
            $('#district').val('');
            $('#city_name').val('');
            $('#pincode').val('');
            $('#landmark').val('');
            $('#maxuser').val('');
            $('#logo').val('');
            code = null;
        }



        function getVehicleType() {
            debugger;
            var obj = new Object();
            obj.Module = "Vehicle";
            obj.Page_key = "getVehicleType";
            var json = new Object();
            obj.JSON = json;
            TransportCall(obj);
        }

        function getVehicleManufacturer() {
            var obj = new Object();
            obj.Module = "Vehicle";
            obj.Page_key = "getVehicleManufacturer";
            var json = new Object();
            obj.JSON = json;
            SilentTransportCall(obj);
        }

        function getVehicleModel() {
            var obj = new Object();
            obj.Module = "Vehicle";
            obj.Page_key = "getVehicleModel";
            var json = new Object();
            obj.JSON = json;
            SilentTransportCall(obj);
        }

        function getLocation() {
            var obj = new Object();
            obj.Module = "Vehicle";
            obj.Page_key = "getLocation";
            var json = new Object();
            obj.JSON = json;
            SilentTransportCall(obj);
        }

        function onError() {

        }

        $("#vehicle_made_id").change(function() {
            $("#vehicle_model_id").html("");
            var ModelID = $(this).val();    
            for (let i = 0; i < VehicleModel.length; i++) {
                if (ModelID === VehicleModel[i].VehicleMadeID) {
                    $("#vehicle_model_id").append('<option value="' + VehicleModel[i].VehicleModelID + '">' + VehicleModel[i].VehicleModelName + '</option>');
                }
            }
            $("#vehicle_model_id").append('<option value="-1">Not Available</option>');
        });

        $("#vehicle_model_id").change(function() {
            if ($(this).val() === "-1") {
                $("#not_available_container").show();
            } else {
                $("#not_available_container").hide();
            }
        });

        // Initially hide the input textbox container
        $("#not_available_container").hide();



        let VehicleModel;

        function onSuccess(rc) {
            if (rc.return_code) {
                switch (rc.Page_key) {
                    case "getVehicleType":
                        loadSelect("#vehicle_type_id", rc.return_data);
                        break;
                    case "getLocation":
                        loadSelect("#locations", rc.return_data);
                        break;

                    case "getVehicleManufacturer":
                        loadSelect("#vehicle_made_id", rc.return_data);
                        break;

                    case "getVehicleModel":
                        VehicleModel = rc.return_data;
                        //loadSelect("#vehicle_model_id", rc.return_data);
                        break;

                    case "addVehicle":
                        debugger;
                        //notify("success", rc.return_data);
                        $("#successvehicleregister").show();
                        //location.reload();
                        break;



                    default:
                        notify("error", rc.Page_key);
                }
            } else {
                notify("warning", rc.return_data);
            }
        }

        function loaddata(data) {
            debugger;
            var table = $("#table");

            try {
                if ($.fn.DataTable.isDataTable($(table))) {
                    $(table).DataTable().destroy();
                }
            } catch (ex) {}
            var text = ""
            if (data.length == 0) {
                text += "No Data Found";
            } else {
                for (let i = 0; i < data.length; i++) {
                    text += '<tr>';
                    text += '<td>' + data[i].VehicleRegistrationNo + '</small>';
                    // text += '<td>' + data[i].VehicleRegistrationNo+ '<br> <i class="fa fa-phone" aria-hidden="true" style="font-size:9px;";></i> <small>' + data[i].MobileNo + '</small>';
                    // text += '<br><small> LandLine : ' + data[i].TelephoneNo + '</small>';
                    text += '</td>';
                    text += '<td> ' + data[i].VehicleTypeName + '</td>';
                    text += '<td> ' + data[i].Vehicle_ManufactureBy + '</td>';
                    text += '<td> ' + data[i].CurrentOwnerName + '</td>';
                    text += '<td> ' + data[i].OwnerContactNo + '</td>';
                    text += '<td> ' + data[i].DriverName + '</td>';
                    text += '<td> ' + data[i].DriverContactNo + '</td>';
                    text += '<td> ' + data[i].DriverLicenceNo + '</td>';
                    text += '<td> ' + data[i].Locations + '</td>';
                    text += '</td>';

                    text += '<td class="btn-group btn-group-sm">';
                    text += '<a class="btn btn-info btn-sm text-white" onclick="Approved(\'' + escape(JSON.stringify(data[i])) + '\')"> <i class="fas fa-check"> </i> </a>';
                    text += '<a class="btn btn-danger btn-sm text-white" onclick="Rejected(' + data[i].ClientID + ')"> <i class="fas fa-times"></i></a>';
                    text += '</td>';


                    text += '</tr >';
                }
            }
            $("#table tbody").html("");
            $("#table tbody").append(text);

            $(table).DataTable({
                responsive: true,
                "order": [],
                dom: 'Bfrtip',
                "bInfo": true,
                exportOptions: {
                    columns: ':not(.hidden-col)'
                },
                "deferRender": true,
                "pageLength": 10,
                buttons: [{
                        exportOptions: {
                            columns: ':not(.hidden-col)'
                        },
                        extend: 'excel',
                        orientation: 'landscape',
                        pageSize: 'A4'
                    },
                    {
                        exportOptions: {
                            columns: ':not(.hidden-col)'
                        },
                        extend: 'pdfHtml5',
                        orientation: 'landscape',
                        pageSize: 'A4'
                    },
                    {
                        exportOptions: {
                            columns: ':not(.hidden-col)'
                        },
                        extend: 'print',
                        orientation: 'landscape',
                        pageSize: 'A4'
                    }
                ]
            });
        }



        $('#submit-btn').click(function() {
            debugger;
            var vehicleRegNo = $("#vehicle_registration_no").val();
            var currentOwnerName = $("#current_owner_name").val();
            var DriverContactNo = $("#driver_contact_no").val();
            var DriverLicenceNo = $("#driver_licence_no").val();
            var files = $('#rc').val();
            var LocationIDs = $("#locations").val();
            var licencefiles = $('#driver_licence_path').val();
            if (vehicleRegNo == '' || currentOwnerName == '' || files == '' || licencefiles == '' || DriverContactNo == '' || DriverLicenceNo == '' || LocationIDs == '') {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Important fields cannot be empty!',
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.reload(); // Reload the page after the alert is closed
                    }
                });
                return false;

            }

            addVehicle();
            return false;
        });

        $("#owner_contact_no").change(function() {
            var ownerContactNo = $("#owner_contact_no").val();
            var contactNoPattern = /^\d{10}$/;
            if (!contactNoPattern.test(ownerContactNo)) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Owner contact number must be exactly 10 digits!',
                });
                return false;
            }
        });



        $("#driver_contact_no").change(function() {
            var driverContactNo = $("#driver_contact_no").val();
            var contactNoPattern = /^\d{10}$/;
            if (!contactNoPattern.test(driverContactNo)) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Driver contact number must be exactly 10 digits!',
                });
                return false;
            }
        });




        async function addVehicle() {
            debugger;
            let obj = {};
            let json = {};
            var registrationCertificate = {};
            obj.Module = "Vehicle";
            obj.Page_key = "addVehicle";
            // $('#isOwnerTheDriver').change(function() {
            //     debugger;
            //     var ISOwnerTheDriver = $(this).prop('checked') ? 1 : 0; // Set JSON value based on toggle state
            // });
            // json.isOwnerTheDriver = ISOwnerTheDriver; //bit
            json.isOwnerTheDriver = $("#isOwnerTheDriver").prop('checked') ? 1 : 0; //bit
            json.VehicleRegistrationNo = $("#vehicle_registration_no").val();
            json.VehicleTypeID = $("#vehicle_type_id").val();
            json.VehicleMadeID = $("#vehicle_made_id").val();
            var VehicleModelID = $("#vehicle_model_id").val();
            if (VehicleModelID == -1) { //if Not Available Model Selected 
                json.VehicleModel = $("#not_available_model").val();
            } else { //if Available Model Selected
                json.VehicleModelID = $("#vehicle_model_id").val();

            }
            json.CurrentOwnerName = $("#current_owner_name").val();
            json.OwnerContactNo = $("#owner_contact_no").val();
            json.DriverName = $("#driver_name").val();
            json.DriverContactNo = $("#driver_contact_no").val();
            json.DriverLicenceNo = $("#driver_licence_no").val();
            json.LocationIDs = $("#locations").val();
            var files = $('#rc')[0].files;
            var licencefiles = $('#driver_licence_path')[0].files;
            // Get base64 data for the first file only
            if (files.length > 0) {
                var base64Data = await getBase64(files[0]);
                // Add base64 data to registrationCertificate
                registrationCertificate = {
                    registrationCertificate: base64Data,
                    filename: files[0].name
                };
            }
            if (licencefiles.length > 0) {
                var base64Data = await getBase64(licencefiles[0]);
                // Add base64 data to registrationCertificate
                driver_licence_path = {
                    driver_licence_path: base64Data,
                    filename: licencefiles[0].name
                }
            }

            // Add registrationCertificate to the JSON object
            json.RegistrationCertificateFile = registrationCertificate;
            json.DriverLicencePath = driver_licence_path;
            obj.JSON = json;
            TransportCall(obj);
        }


        function getBase64(file) {
            return new Promise((resolve, reject) => {
                let reader = new FileReader();
                reader.readAsDataURL(file);
                reader.onload = function() {
                    resolve(reader.result);
                };
                reader.onerror = function(error) {
                    reject(error);
                };
            });
        }


        var VehicleID;

        function Approved(data) {
            debugger;
            data = JSON.parse(unescape(data));
            VehicleID = data.VehicleID;
            $("#approved").modal("show");
        }

        function Rejected(data) {
            alert();
        }






        function onDelete(ClientID) {
            if (confirm("Are you sure you want to delete")) {
                let obj = {};
                obj.Module = "Client";
                let json = {};
                obj.Page_key = "deleteClient";
                json.ClientID = ClientID;
                obj.JSON = json;
                TransportCall(obj);
            }
        }
    </script>
</body>

<!-- Mirrored from designmodo.static.domains/bootstrap5form/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 15 Jul 2024 12:17:36 GMT -->

</html>