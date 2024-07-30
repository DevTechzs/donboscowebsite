<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.3.0/raphael.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
<style>
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

    .camera-icon {
        position: absolute;
        bottom: 0;
        right: 0;
        background-color: #0D9276;
        border-radius: 50%;
        padding: 5px;
        display: flex;
        align-items: center;
        justify-content: center;
    }




    #fileInput {
        display: none;
        /* Hide the file input initially */
    }

    .camera-icon {
        cursor: pointer;
        /* Set cursor to pointer for the camera icon, indicating it's clickable */
    }


    .months {
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 20px;
        font-size: 16px;
        width: 160px;
        height: 43px;
        /* Adjust the width as needed */
        outline: none;
        /* Remove default outline */
        cursor: pointer;
        /* Show pointer cursor on hover */
        box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
        /* Add a subtle box shadow */

    }

    .custom-btn {
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 20px;
        font-size: 16px;
        width: 100px;
        height: 43px;
        /* Adjust the width as needed */
        outline: none;
        /* Remove default outline */
        cursor: pointer;
        /* Show pointer cursor on hover */
        box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
        /* Add a subtle box shadow */
        background-color: #3498db;
        /* Example color - adjust as per your design */
        color: #fff;
        /* Text color - white in this example */

    }



    .staffs:hover,
    .staffs:focus {
        border-color: #4CAF50;
        /* Change border color on hover or focus */
    }

    /* Add animation to icons */
    .icon-animation {
        animation: spin 2s infinite linear;
        /* You can replace 'spin' with your preferred animation */
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }

    /* Set font size for icons */
    .icon-size {
        font-size: 24px;
        /* You can adjust the value to change the size */
    }

    /* Set colors for icons */
    .icon-color {
        color: #3498db;
        /* You can replace '#3498db' with your preferred color code */
    }

    .card-title {
        margin-top: 10px;
        /* Adjust the value as needed */
    }

    /* CSS to set font-weight to normal for all labels */
    #leaveChart text {
        font-weight: normal;
    }

    .stylish-card {
        background: rgba(255, 255, 255, 0.8);
        /* White background with transparency */
        border: none;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        /* Soft shadow */
    }

    .stylish-card .main {
        padding: 20px;
    }

    .stylish-card .name {
        font-size: 18px;
        font-weight: bold;
        color: #333;
    }

    .stylish-card .account {
        font-size: 14px;
        color: #666;
    }

    .stylish-card .link {
        display: block;
        margin-top: 10px;
        font-weight: bold;
        color: #007bff;
    }

    .stylish-card .comment {
        display: block;
        margin-top: 10px;
        font-weight: bold;
        color: #28a745;
        /* Green color for approved */
    }

    .stylish-card p {
        margin-top: 10px;
        font-size: 14px;
        color: #666;
    }

    .stylish-card .icon img {
        width: 100px;
        /* Set width of the image */
        height: 100px;
        /* Set height of the image */
        border-radius: 50px;
        /* Apply rounded corners */

    }

    .stylish-card {
        display: flex;
        /* Use flexbox for layout */
        background: rgba(255, 255, 255, 0.8);
        /* White background with transparency */
        border: none;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        /* Soft shadow */
    }

    .stylish-card .main {
        display: flex;
        /* Use flexbox for layout within main */
        padding: 20px;
    }

    .stylish-card .left {
        flex: 1;
        /* Take up half of the available space */
    }

    .stylish-card .right {
        flex: 1;
        /* Take up half of the available space */
        /* Add styling for the content on the right side */
    }

    .custom-badge {
        padding: 5px 8px;
        line-height: 7px;
        border: 1px solid;
        font-weight: 300;
        font-size: 13px;
        border-radius: 20px;
    }

    .col-orange {
        color: #ff9800 !important;
    }

    .col-red {
        color: #EE4E4E !important;
    }

    .col-green {
        color: #4CCD99 !important;
    }

    #calendar {
        width: 100%;
        max-width: 1200px;
        background: #fff;
        padding: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th,
    td {
        padding: 10px;
        text-align: center;
        border: 1px solid #ddd;
        vertical-align: top;
    }

    th {
        background-color: #f4f4f4;
    }

    .leave {
        background-color: #ffcccc;
        color: #ff0000;
        position: relative;
    }

    .leave-type {
        font-size: 0.8em;
        color: #333;
        display: block;
        margin-top: 5px;
    }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">

    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="../index3.html" class="nav-link">Iewduh Techz </a>
        </li>

    </ul>

    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
                <i class="far fa-user"></i>

            </a>
            <div class="dropdown-menu dropdown-menu-xs dropdown-menu-right" style="left: inherit; right: 0px;">

                <div class="dropdown-divider"></div>
                <a href="changepassword" class="dropdown-item">
                    <i class="fas fa-key"> Change Password</i>
                </a>
                <div class="dropdown-divider"></div>
                <a data-target="#LogoutModal" data-toggle="modal" class="dropdown-item">
                    <i class="fas fa-sign-out-alt"> Logout</i>

                </a>

            </div>
        </li>


    </ul>
</nav>
<!-- /.navbar -->


<div class="content-wrapper" style="min-height: 504px;">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <span> Staff Dashboard
                        <h1 class="m-0"></h1>
                    </span>
                </div>

            </div>
        </div>
    </div>
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-widget widget-user stylish-card">
                    <div class="main">
                        <div>
                            <div class="icon" id="userImageContainer">
                                <img id="userImage" class="img" alt="User Image">
                            </div>

                            <span class="name" id="StaffName">John Doe</span> - <span id="Designation">UI/UX Designer</span>
                            <p>Phone : <span id="ContactNo"> </span></p>
                            <p>Email ID : <span id="EmailID"></span></p>
                            <p> Address : <span id="Address"> </span></p>

                            <!-- <span class="link text">TOTAL LEAVES : <span id="totalStaffLeaves"></span></span>
                    <span class="comment text">TOTAL HALFDAY : <span id="totalStaffHalfDays"> </span></span> -->
                            <i class="fa fa-clock"> &nbsp;</i><span>Check In : <span id="EntryDateTime"> </span> , <span id="StaffINTime"></span></span>
                            <!-- <span >Check In <p ></p></span> -->
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Leave </h3> &nbsp;
                        <div id="leaveChart" style="height: 200px;"></div>

                        <!-- Legend container -->
                        <div id="legendContainer"></div>

                    </div>



                </div>


            </div>
        </div>




        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">For The Month of : </h3> &nbsp;
                        <select class="months" id="getMonths">
                        </select>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>

                    <div class="card-body p-0">
                        <ul class="products-list product-list-in-card pl-2 pr-2">
                            <li class="item">
                                <div class="product-img">
                                    <i class="fas icon-size icon-color fa-user-check"></i>
                                </div>

                                <div class="product-info">
                                    <a href="javascript:void(0)" class="product-title">Present
                                        <span class="badge badge-success float-right" id="TotalPresents"></span></a>
                                </div>
                            </li>

                            <li class="item">
                                <div class="product-img">
                                    <i class="fas  icon-size icon-color fa-times-circle"></i>
                                </div>

                                <div class="product-info">
                                    <a href="javascript:void(0)" class="product-title">Absent
                                        <span class="badge badge-danger float-right" id="TotalAbsents">0</span></a>
                                </div>
                            </li>

                        </ul>
                    </div>

                </div>


            </div>



            <!-- <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <p class="card-title">Leave Types Overview</p>
                        <div id="leaveChart">
                        </div>


                    </div>
                </div>


            </div> -->
            <div class="col-md-6">

                <div class="card direct-chat direct-chat-warning">
                    <div class="card-header">
                        <h3 class="card-title">Warning</h3>

                    </div>

                    <div class="card-body">
                        <div class="direct-chat-messages">
                            <!-- Staff warning messages will be dynamically inserted here -->
                        </div>
                    </div>

                </div>

            </div>

            <div class="col-md-12">

                <div class="card direct-chat direct-chat-warning">
                    <div class="card-header">
                        <h3 class="card-title"> Leave Report</h3>

                    </div>

                    <div class="card-body">
                        <div id="calendar">

                        </div>
                    </div>

                </div>

            </div>

            <div class="col-md-12">

                <div class="card direct-chat direct-chat-warning">
                    <div class="card-header">
                        <h3 class="card-title" id="CurrentMonth"></h3>

                    </div>

                    <div class="card-body">
                        <div class="card-body table-responsive p-0" style="height: 200px;">
                            <table class="table table-head-fixed text-nowrap" id="loadStaffAttendance">
                                <thead>
                                    <tr>
                                        <th>SL No</th>
                                        <th>Date/Intime<span id="inTimeForSTaff" style="font-size:10px;"></span></th>
                                        <th>Late</th>
                                        <th>OutTime<span id="outTimeForSTaff" style="font-size:10px;"></span></th>
                                        <th>OverWork</th>
                                        <th>Status</th>
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
</div>

<!-- Profile Modal -->


<!-- End Here -->


<!-- logout Modal -->

<div class="modal fade" id="LogoutModal">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header border-0">
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="text-center" id="output"></p>
                <p class="text-center">Click Yes If You Are Sure.</p>
            </div>
            <div class="modal-footer justify-content-between border-0">
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                <a href="logout" type="button" class="btn btn-info btn-sm">Yes</a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- End Here -->


<script>
    $(function() {
        getUserInfo();
        populateMonthsDropdown();
        getUserAllLeaveOverview();
        getStaffWarnings();
        getStaffAttendanceOverview();
        getUserLeaveOnDate();

    });

    $("#chartLoad").click(function() {
        debugger;
        $("#LeaveMorrisChart").show();

    });
    var Flag = 2;

    function getUserLeaveOnDate() {
        debugger;
        let obj = {};
        obj.Module = "Staff";
        obj.Page_key = "getUserLeaveOnDate";
        obj.JSON = {};
        obj.JSON.Flag = Flag;
        SilentTransportCall(obj);
    }

    function generateCalendar(year, month) {
        const daysInMonth = new Date(year, month + 1, 0).getDate();
        const firstDay = new Date(year, month, 1).getDay();
        const calendar = $('#calendar');
        calendar.empty();

        let table = $('<table></table>');
        let headerRow = $('<tr></tr>');
        const daysOfWeek = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];

        daysOfWeek.forEach(day => {
            headerRow.append('<th>' + day + '</th>');
        });

        table.append(headerRow);

        let date = 1;
        for (let i = 0; i < 6; i++) {
            let row = $('<tr></tr>');
            for (let j = 0; j < 7; j++) {
                if (i === 0 && j < firstDay) {
                    row.append('<td></td>');
                } else if (date > daysInMonth) {
                    break;
                } else {
                    let cell = $('<td></td>');
                    let formattedMonth = (month + 1).toString().padStart(2, '0');
                    let formattedDate = date.toString().padStart(2, '0');
                    let cellDate = year + '-' + formattedMonth + '-' + formattedDate;
                    cell.text(date);
                    cell.attr('data-date', cellDate);
                    row.append(cell);
                    date++;
                }
            }
            table.append(row);
        }

        calendar.append(table);
    }

    function markLeaveDates(leaveDates) {
        debugger;
        leaveDates.forEach(leave => {
            const startDate = new Date(leave.RequestedDateFrom);
            const endDate = new Date(leave.RequestedDateTo);

            for (let d = startDate; d <= endDate; d.setDate(d.getDate() + 1)) {
                const year = d.getFullYear();
                const month = (d.getMonth() + 1).toString().padStart(2, '0');
                const day = d.getDate().toString().padStart(2, '0');
                const cellDate = year + '-' + month + '-' + day;

                const cell = $('td[data-date="' + cellDate + '"]');
                if (cell.length) {
                    cell.addClass('leave');
                    if (!cell.find('.leave-type').length) {
                        cell.append('<span class="leave-type">' + leave.LeaveType + '</span>');
                    }
                }
            }
        });
    }



    const today = new Date();
    generateCalendar(today.getFullYear(), today.getMonth());
    

    // Function to handle the click event on the camera icon label
    function handleFileInputClick() {

        document.getElementById('fileInput').click();
    }

    // Function to handle the change event when a file is selected
    function handleFileInputChange() {
        // Handle the file input change here if needed
        // For example, you can retrieve the selected file information
        var selectedFile = document.getElementById('fileInput').files[0];
    }


    function getUserInfo() {
        var obj = new Object();
        obj.Module = "Staff";
        obj.Page_key = "getUserInfo";
        var json = new Object();
        obj.JSON = json;
        SilentTransportCall(obj);
    }

    function getUserAllLeaveOverview() {
        var obj = new Object();
        obj.Module = "Staff";
        obj.Page_key = "getUserAllLeaveOverview";
        var json = new Object();
        obj.JSON = json;
        SilentTransportCall(obj);
    }


    var flag = 1;

    function getStaffWarnings() {

        var obj = new Object();
        obj.Module = "Staff";
        obj.Page_key = "getStaffWarnings";
        var json = new Object();
        json.flag = flag;
        obj.JSON = json;
        SilentTransportCall(obj);
    }

    function getStaffAttendanceOverview() {
        var obj = new Object();
        obj.Module = "Staff";
        obj.Page_key = "getStaffAttendanceOverview";
        var json = new Object();
        obj.JSON = json;
        SilentTransportCall(obj);
    }



    var monthsData = [{
            id: 1,
            name: 'January'
        },
        {
            id: 2,
            name: 'February'
        },
        {
            id: 3,
            name: 'March'
        },
        {
            id: 4,
            name: 'April'
        },
        {
            id: 5,
            name: 'May'
        },
        {
            id: 6,
            name: 'June'
        },
        {
            id: 7,
            name: 'July'
        },
        {
            id: 8,
            name: 'August'
        },
        {
            id: 9,
            name: 'September'
        },
        {
            id: 10,
            name: 'October'
        },
        {
            id: 11,
            name: 'November'
        },
        {
            id: 12,
            name: 'December'
        }
    ]

    // Function to populate the select element
    function populateMonthsDropdown() {
        var selectElement = $('#getMonths');

        // Clear existing options
        selectElement.empty();

        // Add default option
        selectElement.append('<option value="" disabled selected>Select a month</option>');

        // Set default value to the current month
        var currentMonth = new Date().getMonth() + 1;
        var date = new Date();
        var currentMonthName = monthsData[date.getMonth()];
        var currentYear = date.getFullYear();
        $('#CurrentMonth').html(currentMonthName.name + '&nbsp;' + currentYear + ',' + 'ATTENDANCE');
        $.each(monthsData, function(index, month) {
            // Disable months greater than the current month
            var option = $('<option value="' + month.id + '">' + month.name + '</option>');
            //alert( month.name);

            if (month.id > currentMonth) {
                option.prop('disabled', true);
            }
            selectElement.append(option);
        });

        selectElement.val(currentMonth);
        getAttendanceOverViewForApp(currentMonth);
    }

    function getAttendanceOverViewForApp(selectedMonth) {
        var obj = new Object();
        obj.Module = "Staff";
        obj.Page_key = "getAttendanceOverViewForApp";
        var json = new Object();
        json.MonthID = selectedMonth;
        obj.JSON = json;
        SilentTransportCall(obj);
    }




    // Event listener for changes in the selected month
    $('#getMonths').on('change', function() {

        // When the month changes, load data for the selected month
        var selectedMonth = $(this).val();
        getAttendanceOverViewForApp(selectedMonth);
    });



    function onSuccess(rc) {
        if (rc.return_code) {
            switch (rc.Page_key) {
                case "getUserInfo":
                    loadUserProfile(rc.return_data);
                    break;

                case "getAttendanceOverViewForApp":
                    loadAttendanceReport(rc.return_data);
                    break;

                case "getUserAllLeaveOverview":
                    loadStaffLeaveOverview(rc.return_data);
                    loadUserLeavesOverview(rc.return_data);
                    break;

                case "getStaffWarnings":
                    loadStaffWarnings(rc.return_data);
                    break;

                case "getStaffAttendanceOverview":
                    loadStaffAttendanceOverview(rc.return_data);
                    break;

                case "getUserLeaveOnDate":
                    console.log(rc.return_data);
                    markLeaveDates(rc.return_data);
                    break;
                default:
                    notify("warning", rc.Page_key);
            }
        } else {
            notify("error", rc.return_data);

        }

    }




    function loadStaffAttendanceOverview(data) {
        // Set office in and out times in the UI
        $("#inTimeForSTaff").text("(" + data[0].OfficeTimIN + " am )");
        $("#outTimeForSTaff").text("(" + data[0].OfficeTimeOut + " pm)");

        // Function to calculate the difference between two times
        function calculateTimeDifference(startTime, endTime) {
            var start = new Date("1970-01-01T" + startTime + "Z");
            var end = new Date("1970-01-01T" + endTime + "Z");
            var diff = new Date(end - start);
            return {
                hours: diff.getUTCHours(),
                minutes: diff.getUTCMinutes(),
                seconds: diff.getUTCSeconds()
            };
        }

        // Iterate over each record in the data
        $.each(data, function(index, record) {
            var officeInTime = record.OfficeTimIN;
            var officeOutTime = record.OfficeTimeOut;

            // Determine the status text based on the record's status
            var statusText = record.Status == '1' ? '<span class="custom-badge col-green">Present</span>' :
                (record.Status == '0' ? '<span class="custom-badge col-red">Absent</span>' : 'On Leave');

            var lateTimeText = '';
            var overWorkText = '';

            // Calculate late time and overwork time if the status is 'Present'
            if (record.Status == '1') {
                // Check if StaffIn is after OfficeTimIN to determine if the staff is late
                if (record.StaffIn > officeInTime) {
                    var lateTime = calculateTimeDifference(officeInTime, record.StaffIn);
                    lateTimeText = (lateTime.hours * 60 + lateTime.minutes) + ' mins';
                } else {
                    lateTimeText = '<span class="custom-badge col-green">Not Late</span>';
                }

                if (record.StaffOut) {
                    // If StaffOut is before OfficeTimeOut, calculate the working hours instead of overwork
                    if (record.StaffOut < officeOutTime) {
                        var workingTime = calculateTimeDifference(record.StaffIn, record.StaffOut);
                        overWorkText = workingTime.hours + 'h ' + workingTime.minutes + 'm';
                    } else {
                        var overWork = calculateTimeDifference(officeOutTime, record.StaffOut);
                        overWorkText = overWork.hours + 'h ' + overWork.minutes + 'm';
                    }
                } else {
                    overWorkText = '--';
                }
            } else {
                lateTimeText = '-';
                overWorkText = '-';
            }

            // Create a table row with the record's details
            var row = '<tr>' +
                '<td>' + (index + 1) + '</td>' +
                '<td>' + record.AttendanceDate + ' / ' + (record.StaffIn ? record.StaffIn : '-') + '</td>' +
                '<td style="color:#f33155;">' + lateTimeText + '</td>' +
                '<td>' + (record.StaffOut ? record.StaffOut : '-') + '</td>' +
                '<td>' + overWorkText + '</td>' +
                '<td>' + statusText + '</td>' +
                '</tr>';

            // Append the row to the table body
            $('#loadStaffAttendance tbody').append(row);
        });
    }




    function loadStaffLeaveOverview(data) {

        //TotalHalfDay  TotalLeave
        $('#totalStaffLeaves').text(data.TotalLeave || 0); // Use '0' as a default if TotalLeave is null
        $('#totalStaffHalfDays').text(data.TotalHalfDay || 0); // Use '0' as a default if TotalHalfDay is null

    }

    function loadStaffWarnings(data) {

        // Select the direct-chat-messages container
        var directChatMessages = $(".direct-chat-messages");

        // Clear any existing content inside direct-chat-messages
        directChatMessages.empty();

        // Iterate over the data array
        $.each(data, function(index, item) {
            // Construct HTML for each staff warning message
            var staffWarningMessage = `
            <div class="direct-chat-msg">
                <div class="direct-chat-infos clearfix">
                    <span class="direct-chat-name"><span>Warned By: </>${item.WarnedByName}</span>
                   <span class="direct-chat-timestamp float-right">${item.WarningDate}</span>
                </div>
                <div class="direct-chat-text">${item.Remarks}</div>
            </div>
        `;
            // Append the staff warning message to direct-chat-messages
            directChatMessages.append(staffWarningMessage);
        });
    }



    function loaddata(data) {
        var table = $("#MarketingData");
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
                text += '<td> &nbsp; <b>' + data[i].ClientName + '</b> <br> &nbsp; <b>' + (data[i].MobileNos ? '<i class="fa fa-phone"></i> &nbsp; ' + data[i].MobileNos : '') + ' </b> <br>   <b>' + (data[i].EmailIDs == "-" ? '' : '<i class="fa fa-envelope"></i>  &nbsp; ' + data[i].EmailIDs + '') + '</b> </td> ';
                //address
                text += '<td>';
                text += '<b> ' + data[i].Address + ' </b> <br>';
                text += '<b> ' + data[i].NationalityName + ' </b><br>';
                text += '<b> ' + data[i].StateName + ', ' + data[i].CityName + ',Pin- ' + data[i].Pincode + ' </b><br>';
                text += 'LandMark : <b> ' + data[i].LandMark + ' </b>';
                text += '</td>';
                text += '<td>  <b>' + data[i].ContactPersons + ' (' + data[i].ContactPersonDesignation + ')</b> <br> <i class="fa fa-phone"></i> &nbsp; <b>' + data[i].ContactPersonNumber + ' </b><br> </td>';
                text += '<td> Service : <b>' + data[i].productName + '. </b><br>' + data[i].Description + ' </td>';
                text += '<td><a href="https://www.google.com/maps/search/<?php echo $school['Latitude'] ?>,<?php echo $school['Longitude'] ?>/" target="_blank"> <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAFwAAABcCAMAAADUMSJqAAABKVBMVEX///80qFL6uwRChfTqQzUac+j/vAD6tgD6uAA+g/QufPMqpUsfo0UAaecRceg0f/TpOCgVoT9CguqtxfUAbedTjvTE1vvwh4AzqkGn1LB4wIhCg/nvenLqPS7+79LpOTf7wwDg8OT7xUkSp1bN2/l5pPFbkOxxn/CcufPz9/6nwvrm7f0hePPf6P2Rs/dpme65ZY7vNBPSTV/2t7PkRD5Eb9n97u10Z72cYKDyPx+9VXsnlZm33LrXSFVCmLlVbNA+j9LM5tE/iuGnWpHvJwDtyMs4pW384d/0nHU8oYnwcBX/++XznpnsWSn80F5PsWf94af3pRj1mBzyhSPvcSsulKZiuHb80HS+29eKx5f957xfqT36vy+Fqy6csDW/tjDeuSH81YZLqEbZKG0ZAAADcklEQVRoge2YaVfaQBSGk0wghCSEsIkiRqlikVhKtYtdbGmrrbUuXW3Rrv//RzQ7mQXJTeKXHp6v5Dze8847M4kcN2fOnP+A9epGt16pVLqbtxu9LMW9alfTtFrJo6Zpla1+Rur+hqaVchFKOaRbg/UM1L1NrZYjQDZysbud1l2tUWrX7ervpHMP8EBcZBSg11NE39fpsSNuZ/jEyfdz9Ng5HSHM3kjoZkRCuG2sZLPftSh1KUe6ESomKc3y8B49OO1GMoK7d4Ziefc+EYzMkCN9A+p+UBZFsV1+aM1028FAF3XBkYvi8JE1043kOnDwoeix9zhaFFlm/YHWk6ewwdtiYH8WtF3X64NBXS6S/tZ+kwcNXhZD2rvPbXuphqruMd5rdHF960WTV0cA+U5EbgdvL6u2Nfm1EQ1HfqnyvLIEkC+3o3Jx75WG7cM+Cu0y4l0AcpHg9QH+ey88BeRDxXEba7Hdb4a4u/yWfKJR9NzWUdMdXF2MLccjF813x9QjddkroeeGhP4ek5snp/QjVd0voc9ZbPkCvp7SOf3IdtErYUhsOV4WqbDCeKbolTBATSQ3PwgSUy6jMyWl3Py4ypZbrcOIGyCfZG5+WhWEAiPzvnUUCcWuS2x52Bbzs+0WBEZbtr40eYzY8qDn5ongUqB7vo+7la+x5Qd7/uSCL78gn/hm4HMr32PLg6tC8uWCNCaeUHE3rwKui12/hCF41Y95hZADDi63Lk4JJ0R36fiSdIOOXHtF3RJGKFz5+nHnxy1SDbosuLJfQkwvCZ3OlST9pNywa45bOCHVAflftBuUin1dSNPcvxluwFXhclqY4maMDdj7HitTRme5oYNz3AVr9PwlSw5L3IUhz9MltDFAVfEYU8HkGSWEdjyAXFN2CZOE4hCjhMlCccAak2cWhVfjn7UE51H7X5YbcElQTPqYv8wycI9O4boS8irgGGdwXQkTL2aAu6hTSph8MQPsvTSlhMl2D84fiV3CdIsZcMosYdrFDGC6Ddi351TWDNqdfjEDFim7Ev9LYiZL5IuKkk3gHsTrW1aBe4ywYNIcVyywYDINxSH6cQW+7WexGLFn7Y5spbRnIYtw9AwrPsFfUshHRHz8wkBfDOPhdT2LU5yFelPL6eDmYtyMmxtB/1UGwv5CvKlU7FtDMTLf+XPmzLmGf+vpVcp1B8AMAAAAAElFTkSuQmCC" style="width:10px" /></a> </td>';
                text += '<td >';
                text += '<a class="badge badge-info badge-sm text-white"  title="Edit" onclick="onEdit(\'' + escape(JSON.stringify(data[i])) + '\')"> <i class="fas fa-pencil-alt"> </i> </a>';
                text += '  &nbsp; <a class=" badge badge-info badge-sm text-white" title="View more" target="_blank" onclick="onviewResponse(' + data[i].ClientID + ')"> More.. </a>';
                text += '</td>';
                text += '</tr>';
            }
        }

        $("#MarketingData tbody").html("");
        $("#MarketingData tbody").append(text);

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

    function onviewResponse(ClientID) {
        window.location = "marketings-status?client=" + btoa(ClientID);
    }

    function onEdit(data) {
        $("#btnAddClient").hide();
        data = JSON.parse(unescape(data));
        MarketingClientID = data.ClientID;
        $("#Name").val(data.ClientName);
        $("#phoneNumbers").val(data.MobileNos);
        $("#EmailIDs").val(data.EmailIDs);
        $("#LandlineNo").val(data.LandLineNo);
        $("#Address").val(data.Address);
        $("#CountryID").val(data.countryid);
        $("#stateID").val(data.StateID);
        $("#city").val(data.CityID);
        $("#Landmark").val(data.LandMark);
        $("#pincode").val(data.Pincode);
        $("#enrollment").val(data.Enrollments);
        $("#website").val(data.Website);
        $("#ContactpersonName").val(data.ContactPersons);
        $("#ContactPersonDesignation").val(data.ContactPersonDesignation);
        $("#ContactPersonNumber").val(data.ContactPersonNumber);
        $("#InterestedProductIDs").val(data.InterestedProjectIDs);
        $("#lat").val(data.Lat);
        $("#long").val(data.Longitute);
        $("#discussion").val(data.Description);
        $("#AddnewClient").modal('show');
    }

    var StaffName;

    function loadUserProfile(data) {

        // StaffName = data.StaffName;
        $("#StaffName").text(data.StaffName);
        $("#ContactNo").text(data.ContactNo);
        $("#EmailID").text(data.EmailID);
        $("#Address").text(data.Address);
        $("#Designation").text(data.DesignationName);
        $("#EntryDateTime").text(data.AttendanceDate);
        $("#StaffINTime").text(data.StaffIn);
        var staffInternNameValue = data.StaffName;
        // Check if Photo is null
        if (data.Photo == null) {
            // If Photo is null, set a default image URL
            var imgUrl = 'https://itplapp.techz.in/file?type=passportphoto&name=student.png';
        } else {
            // If Photo is not null, use the provided image URL
            var imgUrl = 'https://itplapp.techz.in/file?type=passportphoto&name=' + data.Photo;
        }

        // Update the src attribute of the <img> tag inside the div with class "icon"
        $('.icon img').attr('src', imgUrl);

        // Print the Ready message with Name
        var outputElement = document.getElementById("output");
        outputElement.innerHTML = "Hi " + staffInternNameValue + " Are  Ready to Leave?";

    }

    function loadAttendanceReport(data) {
        $('#TotalPresents').text(data.TotalPresent || 0); // Use '0' as a default if TotalPresent is null
        $('#TotalAbsents').text(data.TotalAbsent || 0); // Use '0' as a default if TotalAbsent is null
        $('#TotalLeaves').text(data.TotalLeave || 0); // Use '0' as a default if TotalLeave is null
        $('#TotalHalfDays').text(data.TotalHalfDay || 0); // Use '0' as a default if TotalHalfDay is null

    }


    // Function to generate random colorful colors
    function getRandomColor() {

        var letters = '0123456789ABCDEF';
        var color = '#';
        for (var i = 0; i < 6; i++) {
            color += letters[Math.floor(Math.random() * 16)];
        }
        return color;
    }

    function loadUserLeavesOverview(data) {

        debugger;
        var colors = [];
        var leaveData = [];



        // Iterate over each type in the data object
        for (var type in data) {
            if (data.hasOwnProperty(type)) {
                colors.push(getRandomColor());
                var formattedLabel = type.replace(/([a-z])([A-Z])/g, '$1 $2');
                var days = data[type] !== null ? parseInt(data[type]) : 0; // Convert to integer or default to 0 if null
                leaveData.push({
                    label: formattedLabel,
                    value: days
                });
            }
        }

        // Morris.js Donut Pie Chart
        new Morris.Donut({
            element: 'leaveChart',
            data: leaveData,
            colors: colors,
            resize: true,
            labelTextSize: '10px',
            labelFont: 'normal 400 10px Arial' // Set font-weight to normal
        });

        // Generate legend HTML
        var legend = '<ul>';
        for (var i = 0; i < leaveData.length; i++) {
            legend += '<li style="color:' + colors[i] + ';">' + leaveData[i].label + '</li>';
        }
        legend += '</ul>';

        // Append legend to a container element
        document.getElementById('legendContainer').innerHTML = legend;
    }




    // Modal Animation for Profile Modal
    $('#profileModal').on('show.bs.modal', function() {
        $(this).find('.modal-dialog').addClass('slide-in');
    });

    $('#profileModal').on('hidden.bs.modal', function() {
        // Reset the modal animation class when the modal is hidden
        $(this).find('.modal-dialog').removeClass('slide-in');
    });

    // Modal Animation For Log out  Modal
    $('#LogoutModal').on('show.bs.modal', function() {
        $(this).find('.modal-dialog').addClass('slide-in');
    });

    $('#LogoutModal').on('hidden.bs.modal', function() {
        // Reset the modal animation class when the modal is hidden
        $(this).find('.modal-dialog').removeClass('slide-in');
    });
</script>