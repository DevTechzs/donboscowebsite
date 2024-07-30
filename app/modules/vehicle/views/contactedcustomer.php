<!-- summernote -->
<link rel="stylesheet" href="assets/admin/plugins/summernote/summernote-bs4.css">
<style>
    .input-validation-error~.select2 {
        border: 1px solid red;
        border-radius: 5px;
    }

    @keyframes slideIn {
        from {
            opacity: 0;
            transform: translateY(-50px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .slide-in {
        animation: slideIn 0.5s ease-in-out;
    }

    .custom-dropdown {
        min-width: 1;
        border: none;
    }

    .completed-task {
        text-decoration: line-through;
        color: #888;
    }

    .customtext {
        height: 40%;
        position: absolute;
        top: 20%;
        right: 35px;
        font-size: 12px;
    }

    .oval-select {
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;
        background-color: #f0f0f0;
        border: 1px solid #ccc;
        padding: 10px;
        border-radius: 20px;
        /* Adjust this value for a more oval shape */
        width: 150px;
        height: 30px;
        /* Set a width for the select box */
        outline: none;
        cursor: pointer;
        font-size: 14px;
        /* Adjust the font size */
        color: #555;
        /* Text color */

    }

    .staffs {
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 20px;
        font-size: 16px;
        width: 200px;
        height: 45px;
        /* Adjust the width as needed */
        outline: none;
        /* Remove default outline */
        cursor: pointer;
        /* Show pointer cursor on hover */
    }

    .staffs:hover,
    .staffs:focus {
        border-color: #4CAF50;
        /* Change border color on hover or focus */
    }
</style>

<div class="content-wrapper" id="maincontent">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 mt-3">
                    <div class="card direct-chat direct-chat-primary" style="position: relative; left: 0px; top: 0px;">
                        <div class="card-header ui-sortable-handle" style="cursor: move;">
                            <span>Contacted Date:</span>
                            <input type="date" class="staffs" id="ContactedDateTime" value="<?php echo date("Y-m-d"); ?>">&nbsp;&nbsp;&nbsp;

                        </div>
                        <table id="CustomerData" class="table table-striped" style="display:none;">
                            <thead>
                                <tr>
                                    <!-- <th>Task ID#</th> -->
                                    <th>Contacted By</th>
                                    <th>Contact No</th>
                                    <th>Vehicle Current OwnerName</th>
                                    <th>DriverName</th>
                                    <th>VehicleManufacturer</th>
                                    <th>VehicleRegistrationNo</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Summernote -->
<script src="assets/admin/plugins/summernote/summernote-bs4.min.js"></script>
<script>
    // Change event for the fromdate input
    $('#ContactedDateTime').on('change', function() {
        var ContactedDateTime = $('#ContactedDateTime').val();
        getContactedCustomerByDate(ContactedDateTime);
        $("#CustomerData").show();
    });

    // Function to load staff tasks
    function getContactedCustomerByDate(ContactedDateTime) {
        let obj = {};
        obj.Module = "Vehicle";
        obj.Page_key = "getContactedCustomerByDate";
        obj.JSON = {};
        obj.JSON.ContactedDateTime = ContactedDateTime;
        SilentTransportCall(obj);
    }


    $(function() {
        // getStaff();
    });










    function onSuccess(rc) {
        if (rc.return_code) {
            switch (rc.Page_key) {


                case "getStaff":
                    loadSelect("#staffs", rc.return_data);
                    break;

                case "getContactedCustomerByDate":
                    console.log(rc.return_data);
                    loadCustomerData(rc.return_data);
                    break;

                default:
                    notify('warning', rc.Page_key);
            }
        } else {
            toastr.error(rc.return_data);
        }
    }



    function loadCustomerData(data) {
        // Clear the existing table content
        $("#CustomerData tbody").html("");

        var text = "";
        var statusid = "";

        if (data.length == 0) {
            text += "<tr><td colspan='4'>No Data Found</td></tr>";
        } else {
            for (let i = 0; i < data.length; i++) {
                text += "<tr";
                text += ">";
                text += "<td style='display:none;'> " + data[i].Id + "</td>";
                text += "<td> " + data[i].ContactedBy + "</td>";
                text += "<td><span class='badge badge-success'>" + data[i].ContactNo + "</span></td>";
                text += "<td> " + data[i].CurrentOwnerName + "</td>";
                text += "<td> " + data[i].DriverName + "</td>";
                text += "<td> " + data[i].VehicleManufactureBy + "</td>";
                text += "<td> " + data[i].VehicleRegistrationNo + "</td>";
                text += "</tr>";
            }
        }

        // Append the table content to the tbody
        $("#CustomerData tbody").append(text);
    }
</script>