<?php
    include 'header.php';
?>

<!-- partial -->
<div class="container">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="text-center"><span style="color:#FF4A23;">User Policies</span> Section</h4>
                        <form class="forms-sample" id="adduser" method="post">
                            <div class="form-group">
                                <label for="group">Policy No</label>
                                <input type="text" name="policy_no" class="form-control" id="group"
                                    placeholder="Policy Number" required>
                            </div>
                            <div class="form-group">
                                <label for="group">Select Policy Holder</label>
                                <select id="holder_select" name="holder" class="form-control">
                                </select>
                            </div>
                           
                            <div class="form-group">
                                <label for="group">Select Product Name</label>
                                <select id="product_select" name="product" class="form-control">
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="group">Insurance Date</label>
                                <input type="date" name="insurance_date" class="form-control" id="group"
                                    placeholder="Insurance Date" required>
                            </div>
                            <div class="form-group">
                                <label for="group">Due Date</label>
                                <input type="date" name="due_date" class="form-control" id="group"
                                    placeholder="Due Date" required>
                            </div>
                            <div class="form-group">
                                <label for="group">Select Category</label>
                                <select id="category_select" name="category" class="form-control">
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="group">Select Plans</label>
                                <select id="plans_select" name="plansName" class="form-control">
                                </select>
                            </div>
                            <button type="button" id="submituser" class="btn btn-primary me-2">Submit</button>
                            <button class="btn btn-dark">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">User Policies Details</h4>
                        </p>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Policy No</th>
                                        <th>Policy Holder</th>
                                        <th>Product Name</th>
                                        <th>Insurance Date</th>
                                        <th>Due Date</th>
                                        <th>Plans Id</th>
                                        <th>Policy Category</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="tuser">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Update Model -->
        <form action="" method="POST" class="users-update-record-model form-horizontal">
            <div id="update-modal" data-backdrop="static" data-keyboard="false" class="modal fade" tabindex="-1"
                role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" style="width:55%;">
                    <div class="modal-content" style="overflow: hidden;">
                        <div class="modal-header">
                            <h4 class="modal-title" id="custom-width-modalLabel">Update</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×
                            </button>
                        </div>
                        <div class="modal-body" id="updateBody">

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-dismiss="modal">Close
                            </button>
                            <button type="button" class="btn btn-info updateUser">Update
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- Delete Model -->
        <form action="" method="POST" class="users-remove-record-model">
            <div id="remove-modal" data-backdrop="static" data-keyboard="false" class="modal fade" tabindex="-1"
                role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-dialog-centered" style="width:55%;">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="custom-width-modalLabel">Delete</h4>
                            <button type="button" class="close remove-data-from-delete-form" data-dismiss="modal"
                                aria-hidden="true">×
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Do you want to delete this record?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light waves-effect remove-data-from-delete-form"
                                data-dismiss="modal">Close
                            </button>
                            <button type="button" class="btn btn-danger waves-effect waves-light deleteRecord">Delete
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!--delete model end-->
    </div>
    <!-- The core Firebase JS SDK is always required and must be listed first -->
    <script src="https://www.gstatic.com/firebasejs/7.14.6/firebase-app.js"></script>

    <!-- TODO: Add SDKs for Firebase products that you want to use
     https://firebase.google.com/docs/web/setup#available-libraries -->
    <script src="https://www.gstatic.com/firebasejs/7.14.6/firebase-analytics.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.14.6/firebase-database.js"></script>

    <script type="module">
    // Import the functions you need from the SDKs you need
    import {
        initializeApp
    } from "https://www.gstatic.com/firebasejs/9.12.1/firebase-app.js";
    import {
        getAnalytics
    } from "https://www.gstatic.com/firebasejs/9.12.1/firebase-analytics.js";
    // TODO: Add SDKs for Firebase products that you want to use
    // https://firebase.google.com/docs/web/setup#available-libraries

    // Your web app's Firebase configuration
    // For Firebase JS SDK v7.20.0 and later, measurementId is optional
    const firebaseConfig = {
        apiKey: "AIzaSyBeoskdiaetXY31ramy8aYZ3hMnOQkvVxk",
        authDomain: "projectinsurance-7ce36.firebaseapp.com",
        databaseURL: "https://projectinsurance-7ce36-default-rtdb.firebaseio.com",
        projectId: "projectinsurance-7ce36",
        storageBucket: "projectinsurance-7ce36.appspot.com",
        messagingSenderId: "582422992300",
        appId: "1:582422992300:web:81f908cde2a4bb46355609",
        measurementId: "G-5DSW2LH9QL"
    };

    // Initialize Firebase
    const app = firebase.initializeApp(firebaseConfig);
    //   const analytics = getAnalytics(app);
    // firebase.initializeApp(config);
    //firebase.analytics();
    var database = firebase.database();



    var lastIndex = 0;
    // Get Data
    firebase.database().ref('Users/').on('value', function(snapshot) {
        var value = snapshot.val();
        var htmls = [];
        $.each(value, function(index, value) {
            if (value) {
                htmls.push(`<option value='${value.userID}'>${value.name}</option>`);
            }
            lastIndex = index;
        });
        $('#holder_select').html(htmls);
        $("#submituser").removeClass('desabled');
    });

    var lastIndex = 0;
    // Get Data
    firebase.database().ref('Plans/').on('value', function(snapshot) {
        var value = snapshot.val();
        var htmls = [];
        $.each(value, function(index, value) {
            if (value) {
                htmls.push('<option>' + value.plans_id + '</option>');
            }
            lastIndex = index;
        });
        $('#plans_select').html(htmls);
        $("#submituser").removeClass('desabled');
    });

    var lastIndex = 0;
    // Get Data
    firebase.database().ref('Product/').on('value', function(snapshot) {
        var value = snapshot.val();
        var htmls = [];
        $.each(value, function(index, value) {
            if (value) {
                htmls.push('<option>' + value.product_name + '\<option>');
            }
            lastIndex = index;
        });
        $('#product_select').html(htmls);
        $("#submituser").removeClass('desabled');
    });

    var lastIndex = 0;
    // Get Data
    firebase.database().ref('Types Of Policy/').on('value', function(snapshot) {
        var value = snapshot.val();
        var htmls = [];
        $.each(value, function(index, value) {
            if (value) {
                htmls.push('<option>' + value.name + '\<option>');
            }
            lastIndex = index;
        });
        $('#category_select').html(htmls);
        $("#submituser").removeClass('desabled');
    });

    var lastIndex = 0;
    // Get Data
    firebase.database().ref('User Policies/').on('value', function(snapshot) {
        var value = snapshot.val();
        var htmls = [];
        $.each(value, function(index, value) {
            if (value) {
                htmls.push('<tr>\
                <td>' + value.policy_no + '</td>\
                <td>' + value.holderName + '</td>\
                <td>' + value.product + '</td>\
                <td>' + value.insurance_date + '</td>\
                <td>' + value.due_date + '</td>\
                <td>' + value.plans_id + '</td>\
                <td>' + value.category +
                    '</td>\
                <td><button data-toggle="modal" data-target="#update-modal" class="btn btn-info updateData" data-id="' +
                    index + '">Update</button>\
                <button data-toggle="modal" data-target="#remove-modal" class="btn btn-danger removeData" data-id="' +
                    index + '">Delete</button></td>\
            </tr>');
            }
            lastIndex = index;
        });
        $('#tuser').html(htmls);
        $("#submituser").removeClass('desabled');
    });

    // Add Data
    $('#submituser').on('click', function() {
        var values = $("#adduser").serializeArray();
        console.log(values);
        var policy_no = values[0].value;
        var holderID = values[1].value;
        var holderName = $("#holder_select").find('option:selected').text();
        var product = values[2].value;
        var insurance_date = values[3].value;
        var due_date = values[4].value;
        var category = values[5].value;
        var plansName = values[6].value;
        var plans_id = $("#plans_select").find('option:selected').text();


        var userID = lastIndex + 1;

        console.log(values);

        firebase.database().ref('User Policies/' + userID).set({
            policy_no: policy_no,
            holderID: holderID,
            holderName: holderName,
            product: product,
            insurance_date: insurance_date,
            due_date: due_date,
            category: category,
            policy_id:userID,
            plans_id: plans_id,
        });

        // Reassign lastID value
        lastIndex = userID;
        $("#adduser input").val("");
    });

    // Update Data
    var updateID = 0;
    $('body').on('click', '.updateData', function() {
        updateID = $(this).attr('data-id');
        firebase.database().ref('User Policies/' + updateID).on('value', function(snapshot) {
            var values = snapshot.val();
            var updateData = '<div class="form-group">\
                <label for="first_name" class="col-md-12 col-form-label">Policy No</label>\
                <div class="col-md-12">\
                    <input id="first_name" type="text" class="form-control" name="name" value="' + values.policy_no + '" required autofocus>\
                </div>\
            </div>\
            <div class="form-group">\
                <label for="last_name" class="col-md-12 col-form-label">Policy Holder</label>\
                <div class="col-md-12">\
                    <input id="last_name" type="text" class="form-control" name="email" value="' + values.holder + '" required autofocus>\
                </div>\
            </div>\
            <div class="form-group">\
                <label for="last_name" class="col-md-12 col-form-label">Product Name</label>\
                <div class="col-md-12">\
                    <input id="last_name" type="text" class="form-control" name="email" value="' + values.product + '" required autofocus>\
                </div>\
            </div>\
            <div class="form-group">\
                <label for="last_name" class="col-md-12 col-form-label">Insurance Date</label>\
                <div class="col-md-12">\
                    <input id="last_name" type="text" class="form-control" name="email" value="' + values
                .insurance_date + '" required autofocus>\
                </div>\
            </div>\
            <div class="form-group">\
                <label for="last_name" class="col-md-12 col-form-label">Due Date</label>\
                <div class="col-md-12">\
                    <input id="last_name" type="text" class="form-control" name="email" value="' + values.due_date + '" required autofocus>\
                </div>\
            </div>\
            <div class="form-group">\
                <label for="last_name" class="col-md-12 col-form-label">Policy Category</label>\
                <div class="col-md-12">\
                    <input id="last_name" type="text" class="form-control" name="email" value="' + values.category + '" required autofocus>\
                </div>\
            </div>';

            $('#updateBody').html(updateData);
        });
    });

    $('.updateUser').on('click', function() {
        var values = $(".users-update-record-model").serializeArray();
        var postData = {
            policy_no: values[0].value,
            holder: values[1].value,
            product: values[2].value,
            insurance_date: values[3].value,
            due_date: values[4].value,
            category: values[5].value,

        };

        var updates = {};
        updates['/User Policies/' + updateID] = postData;

        firebase.database().ref().update(updates);

        $("#update-modal").modal('hide');
    });

    // Remove Data
    $("body").on('click', '.removeData', function() {
        var id = $(this).attr('data-id');
        $('body').find('.users-remove-record-model').append('<input name="id" type="hidden" value="' + id +
            '">');
    });

    $('.deleteRecord').on('click', function() {
        var values = $(".users-remove-record-model").serializeArray();
        var id = values[0].value;
        firebase.database().ref('User Policies/' + id).remove();
        $('body').find('.users-remove-record-model').find("input").remove();
        $("#remove-modal").modal('hide');
    });
    $('.remove-data-from-delete-form').click(function() {
        $('body').find('.users-remove-record-model').find("input").remove();
    });
    </script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <?php
include 'footer.php';
?>