<link rel="stylesheet" href="assets/admin/plugins/summernote/summernote-bs4.css">
<link rel="stylesheet" href="assets/admin/plugins/multi-select-dropdown-list-with-checkbox-jquery/jquery.multiselect.css">
<link rel="stylesheet" href="assets/admin/plugins/bootstrap-toggle-master/css/bootstrap-toggle.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css">
<style>
    .custom-control-input:checked ~ .custom-control-label::before {
      background-color: #dc3545; /* danger color */
      border-color: #dc3545;
    }
    .custom-control-input:checked ~ .custom-control-label::after {
      background-color: #dc3545; /* danger color */
    }
    .custom-control-input:not(:checked) ~ .custom-control-label::before {
      background-color: #28a745; /* success color */
      border-color: #28a745;
    }
    .custom-control-input:not(:checked) ~ .custom-control-label::after {
      background-color: #28a745; /* success color */
    }
  </style>
<div class="content-wrapper" id="maincontent">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 mt-3">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">
                               Vehicle Info
                            </div>
                            <span class="float-right">
                                <!-- <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#modal-lg"> <i class="fa fa-circle-thin"> <i class="fa fa-plus"></i> </i>Add Vehicle</button> -->
                            </span>
                            <div class="modal fade" id="modal-lg">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <form method="post">
                                            <div class="modal-header">
                                                <h4 class="modal-title"> Add Vehicle</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
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
                                                            <input type="text" id="owner_contact_no" class="form-control" onkeypress="javascript:return isNum(event)" placeholder="Owner Contact No" autocomplete="off">
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
                                                            <input type="text" id="driver_contact_no" class="form-control" onkeypress="javascript:return isNum(event)" placeholder="Driver Contact No" autocomplete="off">
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
                                                                <select id="locations" class="select2 select2-hidden-accessible" multiple="" data-placeholder="Select a Location" data-dropdown-css-class="select2-purple" style="width: 100%;" data-select2-id="15" tabindex="-1" aria-hidden="true">

                                                                </select>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="col-md-5">
                                                        <!-- <label>IsOwnerTheDriver</label> &nbsp; -->
                                                        <input type="checkbox" class="custom-control-input" id="isOwnerTheDriver">
                                                        <label class="custom-control-label" for="customSwitch1">Toggle this custom switch element with custom colors danger/success</label>
                                                        <!-- <input class="bootstrapToggle" type="checkbox" id="isOwnerTheDriver" data-toggle="toggle" data-on="Y" data-off="N" data-onstyle="success" data-offstyle="light" data-width="30%" data-height="10%"> -->
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
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary" id="btn-addVehicle">Save </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            </script>
                        </div>
                        <div class="card-body">
                            <table id="table" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Registration No</th>
                                        <th scope="col">Type</th>
                                        <th scope="col">Made</th>
                                        <th scope="col">Current Owner Name</th>
                                        <th scope="col">Owner Contact No </th>
                                        <th scope="col">DriverName</th>
                                        <th scope="col">Driver Contact No </th>
                                        <th scope="col">Driver Licence No</th>
                                        <th scope="col">Locations</th>
                                        <th scope="col">Driver Licence</th>
                                        <th scope="col">Registration Certificate</th>
                                        <!-- <th scope="col">Action</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    function isNum(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            return false;
        } else {
            return true;
        }
    }
</script>

<!-- Summernote -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="assets/admin/plugins/multi-select-dropdown-list-with-checkbox-jquery/jquery.multiselect.js"></script>
<script>
    $(function() {
        getVehicleType();
        getVehicleManufacturer();
        getVehicleModel();
        getLocation();
        getVehicleInfo();
        // getState();
        // getAllDistrict();
        // getDesignation();
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

    $(document).ready(function() {
        $('.dropify').dropify();
    });

    function getVehicleInfo() {
        var obj = new Object();
        obj.Module = "Vehicle";
        obj.Page_key = "getVehicleInfo";
        var json = new Object();
        obj.JSON = json;
        SilentTransportCall(obj);
    }




    function getVehicleType() {
        var obj = new Object();
        obj.Module = "Vehicle";
        obj.Page_key = "getVehicleType";
        var json = new Object();
        obj.JSON = json;
        SilentTransportCall(obj);
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


                case "approvedVehicleRegistration":
                    notify("success", rc.return_data);
                    $("#approved").modal("hide");
                    break;
                case "rejectedVehicleRequest":
                    notify("success", rc.return_data);
                    $("#rejected").modal("hide");
                    break;

                case "getVehicleInfo":
                    loaddata(rc.return_data);
                    break;



                default:
                    notify("warning", rc.Page_key);
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
                text += '<td> ' + data[i].VehicleManufactureBy + '</td>';
                text += '<td> ' + data[i].CurrentOwnerName + '</td>';
                text += '<td> ' + data[i].OwnerContactNo + '</td>';
                text += '<td> ' + data[i].DriverName + '</td>';
                text += '<td> ' + data[i].DriverContactNo + '</td>';
                text += '<td> ' + data[i].DriverLicenceNo + '</td>';
                text += '<td> ' + data[i].Locations + '</td>';
                text += '<td><a href=file?type=driverlicence&name=' + data[i].DriverLicencePath + ' target="_blank" title="VIEW DOCUMENT" class="link-black text-sm mr-4"><i class="fas fa-file-pdf text-danger"></i></a></i>';
                text += '<td><a href=file?type=rc&name=' + data[i].RegistrationCertificatePath + ' target="_blank" title="VIEW DOCUMENT" class="link-black text-sm mr-4"><i class="fas fa-file-pdf text-danger"></i></a></i>';
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
        addVehicle();
        return false;
    });

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

    var vehicleID, vehicleRegistrationNo, driverName, currentOwnerName, driverContactNo, driverLicenceNo, driverLicencePath, locationIDs, locations, ownerContactNo, registrationCertificatePath,
        vehicleMadeID, vehicleModelID, vehicleTypeID, isOwnerTheDriver;

    function Approved(data) {
        data = JSON.parse(unescape(data));
        vehicleID = data.VehicleID;
        vehicleRegistrationNo = data.VehicleRegistrationNo;
        driverName = data.DriverName;
        currentOwnerName = data.CurrentOwnerName;
        driverContactNo = data.DriverContactNo;
        driverLicenceNo = data.DriverLicenceNo;
        driverLicencePath = data.DriverLicencePath;
        locationIDs = data.LocationIDs;
        locations = data.Locations;
        ownerContactNo = data.OwnerContactNo;
        registrationCertificatePath = data.RegistrationCertificatePath;
        vehicleMadeID = data.VehicleMadeID;
        vehicleModelID = data.VehicleModelID;
        vehicleTypeID = data.VehicleTypeID;
        isOwnerTheDriver = data.isOwnerTheDriver;
        $("#approved").modal("show");
    }
    var VehicleID, VehicleRegistrationNo;

    function Rejected(data) {
        debugger
        data = JSON.parse(unescape(data));
        VehicleID = data.VehicleID;
        VehicleRegistrationNo = data.VehicleRegistrationNo;
        $("#rejected").modal("show");
    }

    $("#btn-approvedvehicle").click(function() {
        debugger;
        let obj = {};
        let json = {};
        obj.Module = "Vehicle";
        obj.Page_key = "approvedVehicleRegistration";
        json.VehicleRegistrationNo = vehicleRegistrationNo;
        json.VehicleID = vehicleID;
        json.DriverName = driverName;
        json.CurrentOwnerName = currentOwnerName;
        json.DriverContactNo = driverContactNo;
        json.DriverLicenceNo = driverLicenceNo;
        json.DriverLicencePath = driverLicencePath;
        json.LocationIDs = locationIDs;
        json.OwnerContactNo = ownerContactNo;
        json.RegistrationCertificatePath = registrationCertificatePath;
        json.VehicleMadeID = vehicleMadeID;
        json.VehicleModelID = vehicleModelID;
        json.VehicleTypeID = vehicleTypeID;
        json.isOwnerTheDriver = isOwnerTheDriver;
        json.Remarks = $("#remarks").val();
        obj.JSON = json;
        TransportCall(obj);
    });




    $("#btn-rejectedvehicle").click(function() {
        debugger;
        let obj = {};
        let json = {};
        obj.Module = "Vehicle";
        obj.Page_key = "rejectedVehicleRequest";
        json.VehicleRegistrationNo = VehicleRegistrationNo;
        json.VehicleID = VehicleID;
        json.Remarks = $("#rejectedremarks").val();
        obj.JSON = json;
        TransportCall(obj);
    });



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