<link rel="stylesheet" href="assets/admin/plugins/summernote/summernote-bs4.css">
<link rel="stylesheet" href="assets/admin/plugins/multi-select-dropdown-list-with-checkbox-jquery/jquery.multiselect.css">
<link rel="stylesheet" href="assets/admin/plugins/bootstrap-toggle-master/css/bootstrap-toggle.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css">
<style>
    .custom-control-input:checked~.custom-control-label::before {
        background-color: #dc3545;
        /* danger color */
        border-color: #dc3545;
    }

    .custom-control-input:checked~.custom-control-label::after {
        background-color: #dc3545;
        /* danger color */
    }

    .custom-control-input:not(:checked)~.custom-control-label::before {
        background-color: #28a745;
        /* success color */
        border-color: #28a745;
    }

    .custom-control-input:not(:checked)~.custom-control-label::after {
        background-color: #28a745;
        /* success color */
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
                                User Lists
                            </div>
                            <span class="float-right">
                                <!-- <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#modal-lg"> <i class="fa fa-circle-thin"> <i class="fa fa-plus"></i> </i>Add Vehicle</button> -->
                            </span>

                            </script>
                        </div>
                        <div class="card-body">
                            <table id="table" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">UserName</th>
                                        <th scope="col">ContactNo</th>
                                        <th scope="col">Created On</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
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
        getAllUsers();

    });

    function getAllUsers() {
        var obj = new Object();
        obj.Module = "Vehicle";
        obj.Page_key = "getAllUsers";
        var json = new Object();
        obj.JSON = json;
        SilentTransportCall(obj);
    }


    function onSuccess(rc) {
        if (rc.return_code) {
            switch (rc.Page_key) {
                case "getAllUsers":
                    console.log(rc.return_data);
                    loaddata(rc.return_data);
                    break;
                case "changeActiveStatus":
                    notify("success", rc.return_data);
                    break;
                case "onUserResetPassword":
                    notify('success', rc.return_data);
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
        var status = 'off';
        var statustext = '';

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
                text += '<td>' + data[i].Name + '</small>';
                // text += '<td>' + data[i].VehicleRegistrationNo+ '<br> <i class="fa fa-phone" aria-hidden="true" style="font-size:9px;";></i> <small>' + data[i].MobileNo + '</small>';
                // text += '<br><small> LandLine : ' + data[i].TelephoneNo + '</small>';
                text += '</td>';
                text += '<td> ' + data[i].UserName + '</td>';
                text += '<td> ' + data[i].ContactNo + '</td>';
                text += '<td> ' + data[i].CreatedDateTime + '</td>';
                // text += '<td> ' + data[i].isActive + '</td>';
                // if (data[i].isActive == 1) {
                //     text += '<td><span class="badge badge-success">Active</span></td>';
                // } else if (data[i].isActive == 0) {
                //     text += '<td><span class="badge badge-danger">Inactive</span></td>';
                // }
                if (data[i].isActive == 0) {
                    status = "off";
                    statustext = ""
                    text += '<td>   <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success"> <input type="checkbox" ' + statustext + '  class="custom-control-input" id="activestatus' + i + '" onclick="changeactivestatus(this.id,' + data[i].UserID + ')" value="' + status + '">  <label class="custom-control-label" for="activestatus' + i + '"></label> </div> </td>';
                } else {
                    status = "on";
                    statustext = "checked"
                    text += '<td>   <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success"> <input type="checkbox" ' + statustext + '  class="custom-control-input" id="activestatus' + i + '" onclick="changeactivestatus(this.id,' + data[i].UserID + ')" value="' + status + '">  <label class="custom-control-label" for="activestatus' + i + '"></label> </div> </td>';
                }
                text += ' <td class="btn-group btn-group-sm">';
                text += ' <a class="btn btn-info btn-sm text-white" title="Reset Password" onclick="onUserResetPassword(' + data[i].UserID + ',\'' + data[i].UserName + '\')"> <i class="fas fa-undo"> </i> </a>';
                text += '</td>';
                // text += '<td class="btn-group btn-group-sm">';
                // text += '<a class="btn btn-info btn-sm text-white" onclick="Approved(\'' + escape(JSON.stringify(data[i])) + '\')"> <i class="fas fa-check"> </i> </a>';
                // text += '<a class="btn btn-danger btn-sm text-white" onclick="Rejected(\'' + escape(JSON.stringify(data[i])) + '\')"> <i class="fas fa-times"></i></a>';
                // text += '</td>';
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

    //change active status
    function changeactivestatus(id, UserID) {
        debugger;
        var status;
        if ($("#" + id).val() == "on") {
            $("#" + id).val('off');
            status = 0;
            $("#" + id).removeClass("custom-switch-off-success");
            $("#" + id).addClass("custom-switch-off-danger");
            $("#" + id).removeAttr("checked");
        } else {
            $("#" + id).val('on');
            status = 1;
            $("#" + id).removeClass("custom-switch-off-danger");
            $("#" + id).addClass("custom-switch-off-success");
            $("#" + id).attr("checked", "checked");

        }
        var obj = new Object();
        obj.Module = "Vehicle";
        obj.Page_key = "changeActiveStatus";
        var json = new Object();
        json.UserID = UserID;
        json.status = status;
        obj.JSON = json;
        TransportCall(obj);
    }

    function onUserResetPassword(id, u) {
        debugger;
        var obj = new Object();
        obj.Module = "Vehicle";
        obj.Page_key = "onUserResetPassword";
        var json = new Object();
        json.id = id;
        json.u = u;
        obj.JSON = json;
        TransportCall(obj);
    }
</script>