<?php include('basic/header.php'); ?>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<!-- Select2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css" rel="stylesheet" />

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<style>
    .select2-container--default .select2-selection--multiple .select2-selection__choice {
        background-color: #6f42c1;
        /* Custom background color */
        border: 1px solid #6f42c1;
        /* Custom border color */
        color: white;
        /* Text color */
    }

    .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
        color: white;
        /* Text color for the remove icon */
    }
</style>

<body class="register-page">
    <noscript>
        Please enable javascript support
    </noscript>
    <div class="wrapper">
        <div class="page-header bg-default">
            <div class="page-header-image" style="background-image: url('assets/img/ill/register_bg.png');"></div>
            <div class="container" id="container">
                <div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="vehicle_registration_no">Vehicle Registration No <span class="text-danger">*</span></label>
                                <input type="text" id="vehicle_registration_no" class="form-control" placeholder="Vehicle Registration No" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="vehicle_type_id">Vehicle Type <span class="text-danger">*</span></label>
                                <select class="form-control" id="vehicle_type_id"></select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="vehicle_made_id">Vehicle Made <span class="text-danger">*</span></label>
                                <select class="form-control" id="vehicle_made_id"></select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="vehicle_model_id">Vehicle Model <span class="text-danger">*</span></label>
                                <select class="form-control" id="vehicle_model_id"></select>
                            </div>
                        </div>
                    </div>

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
                                <input type="text" id="owner_contact_no" class="form-control"  maxlength="10" placeholder="Owner Contact No" autocomplete="off">
                            </div>
                        </div>
                    </div>

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
                                <input type="text" id="driver_contact_no" class="form-control" placeholder="Driver Contact No" autocomplete="off"  maxlength="10">
                            </div>
                        </div>
                    </div>

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
                        <div class="col-md-5">
                            <label>IsOwnerTheDriver</label> &nbsp;
                            <input class="bootstrapToggle" type="checkbox" id="isOwnerTheDriver" data-toggle="toggle" data-on="Y" data-off="N" data-onstyle="success" data-offstyle="light" data-width="30%" data-height="10%">
                        </div>
                    </div>
                    <br>
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
                                    <label for="location_ids">Licence</label>

                                    <input type="file" id="driver_licence_path" class="dropify" data-height="100" style="width: 2000px;" accept="pdf" data-allowed-file-extensions="pdf" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="modal-footer ">
                    <button type="button" class="btn btn-primary btn-xs" id="btn-addVehicle">Regsiter </button>
                </div>
                </form>


            </div>
        </div>

        <footer class="footer">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-6">
                        <div class="copyright">
                            &copy; <?php echo date("Y"); ?> <a href="https://techz.in/" target="_blank">Iewduh Techz Private Limited</a>.
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.all.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <!-- Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="assets/js/core/popper.min.js" type="text/javascript"></script>
    <script src="assets/js/core/bootstrap.min.js" type="text/javascript"></script>
    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="//buttons.github.io/buttons.js"></script>
    <script src="assets/js/argon-design-system.min.js?v=1.0.2" type="text/javascript"></script>
    <script src="assets/js/md5.js"></script>
    <script src="assets/js/CallService.js"></script>
    <script src="assets/js/commonfunctions.js"></script>
    <script src="assets/js/loader/loadingoverlay.js"></script>
    <script src="assets/admin/plugins/summernote/summernote-bs4.min.js"></script>
    <script src="assets/admin/plugins/bootstrap-toggle-master/js/bootstrap-toggle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>

</body>

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
                    notify("success", rc.return_data);
                    location.reload();
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



    $('#btn-addVehicle').click(function() {
        debugger;
        var vehicleRegNo = $("#vehicle_registration_no").val();
        var currentOwnerName = $("#current_owner_name").val();
        var ownerContactNo = $("#owner_contact_no").val();
        var driverContactNo = $("#driver_contact_no").val();

        var contactNoPattern = /^\d{10}$/;

        if (vehicleRegNo == '' || currentOwnerName == '') {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Important fields cannot be empty!',
            });
            return false;
        }

        if (!contactNoPattern.test(ownerContactNo)) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Owner contact number must be exactly 10 digits!',
            });
            return false;
        }

        if (!contactNoPattern.test(driverContactNo)) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Driver contact number must be exactly 10 digits!',
            });
            return false;
        }

        addVehicle();
        return false;
    });



    // function addVehicle() {
    //             // Your code to add vehicle goes here
    //             Swal.fire({
    //                 icon: 'success',
    //                 title: 'Vehicle added successfully!',
    //             });
    //         }


    async function addVehicle() {
        debugger;
        let obj = {};
        let json = {};
        var registrationCertificate = {};
        obj.Module = "Vehicle";
        obj.Page_key = "addVehicle";
        json.VehicleRegistrationNo = $("#vehicle_registration_no").val();
        json.VehicleTypeID = $("#vehicle_type_id").val();
        json.VehicleMadeID = $("#vehicle_made_id").val();
        json.VehicleModelID = $("#vehicle_model_id").val();
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
        json.isOwnerTheDriver = $("#isOwnerTheDriver").prop('checked') ? 1 : 0; //bit
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



    $("#vehicle_made_id").change(function() {
        $("#vehicle_model_id").html("");
        var ModelID = $(this).val();
        for (let i = 0; i < VehicleModel.length; i++) {
            if (ModelID === VehicleModel[i].Vehicle_MadeID) { // Use the id variable here
                $("#vehicle_model_id").append('<option value="' + VehicleModel[i].Vehicle_ModelID + '">' + VehicleModel[i].Vehicle_ModelName + '</option>');
            }
        }
    });


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

</html>