<?php
    include 'header.php';
?>


<div class="container" style="margin-top: 50px;">

    <div class="card card-default">
        <h4 class="text-center" style="padding-top:45px;"><span style="color:#FF4A23;">DURATION</span> Section</h4><br>
        <h5 style="padding-left:45px;">Add Duration</h5>
        <div class="card-body">
            <form id="addUser" class="form-inline" method="POST" action="">
                <div class="form-group mx-sm-3 mb-2">
                    <label for="name"class="sr-only" >Duration</label>
                    <input id="name" type="text" class="form-control" name="name" placeholder="Duration" required autofocus>
                </div>
                <button id="submitUser" type="button" style="background-color:#FF4A23;" class="btn btn-primary mb-2">Add Duration</button>
            </form>
        </div>
    </div>
    <br>
    <h5>Duration List </h5>
    <table class="table table-bordered">
        <tr>
            <th>Duration</th>
            <th width="180" class="text-center">Action</th>
        </tr>
        <tbody id="tbody">
        </tbody>
    </table>
</div>

 <!-- Update Model -->
 <form action="" method="POST" class="users-update-record-model form-horizontal">
        <div id="update-modal" data-backdrop="static" data-keyboard="false" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" style="width:55%;">
                <div class="modal-content" style="overflow: hidden;">
                    <div class="modal-header">
                        <h4 class="modal-title" id="custom-width-modalLabel">Update</h4>
                        <button type="button" class="close" data-dismiss="modal"
                                aria-hidden="true">×
                        </button>
                    </div>
                    <div class="modal-body" id="updateBody">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light"
                                data-dismiss="modal">Close
                        </button>
                        <button type="button" class="btn btn-success updateUser">Update
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- Delete Model -->
    <form action="" method="POST" class="users-remove-record-model">
        <div id="remove-modal" data-backdrop="static" data-keyboard="false" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel"
             aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-dialog-centered" style="width:55%;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="custom-width-modalLabel">Delete</h4>
                        <button type="button" class="close remove-data-from-delete-form" data-dismiss="modal" aria-hidden="true">×
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Do you want to delete this record?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default waves-effect remove-data-from-delete-form"
                                data-dismiss="modal">Close
                        </button>
                        <button type="button" class="btn btn-danger waves-effect waves-light deleteRecord">Delete
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>

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
firebase.database().ref('Duration/').on('value', function(snapshot) {
    var value = snapshot.val();
    var htmls = [];
    $.each(value, function(index, value) {
        if (value) {
            htmls.push('<tr>\
                <td>' + value.name + '</td>\
                <td><button data-toggle="modal" data-target="#update-modal" class="btn btn-info updateData" data-id="' +
                index + '">Edit</button>\
                <button data-toggle="modal" data-target="#remove-modal" class="btn btn-danger removeData" data-id="' +
                index + '">Delete</button></td>\
            </tr>');
        }
        lastIndex = index;
    });
    $('#tbody').html(htmls);
    $("#submitUser").removeClass('desabled');
});

// Add Data
$('#submitUser').on('click', function() {
    var values = $("#addUser").serializeArray();
    var name = values[0].value;
    // var email = values[1].value;
    var categoryID = lastIndex + 1;

    console.log(values);

    firebase.database().ref('Duration/' + categoryID).set({
        name: name,
        // email: email,
    });

    // Reassign lastID value
    lastIndex = categoryID;
    $("#addUser input").val("");
});

// Update Data
var updateID = 0;
$('body').on('click', '.updateData', function() {
    updateID = $(this).attr('data-id');
    firebase.database().ref('Duration/' + updateID).on('value', function(snapshot) {
        var values = snapshot.val();
        var updateData = '<div class="form-group">\
                <label for="first_name" class="col-md-12 col-form-label">Name</label>\
                <div class="col-md-12">\
                    <input id="first_name" type="text" class="form-control" name="name" value="' + values.name + '" required autofocus>\
                </div>\
            </div>';
        $('#updateBody').html(updateData);
    });
});

$('.updateUser').on('click', function() {
    var values = $(".users-update-record-model").serializeArray();
    var postData = {
        name: values[0].value,
        // email: values[1].value,
    };

    var updates = {};
    updates['/Duration/' + updateID] = postData;

    firebase.database().ref().update(updates);

    $("#update-modal").modal('hide');
});

// Remove Data
$("body").on('click', '.removeData', function() {
    var id = $(this).attr('data-id');
    $('body').find('.users-remove-record-model').append('<input name="id" type="hidden" value="' + id + '">');
});

$('.deleteRecord').on('click', function() {
    var values = $(".users-remove-record-model").serializeArray();
    var id = values[0].value;
    firebase.database().ref('Duration/' + id).remove();
    $('body').find('.users-remove-record-model').find("input").remove();
    $("#remove-modal").modal('hide');
});
$('.remove-data-from-delete-form').click(function() {
    $('body').find('.users-remove-record-model').find("input").remove();
});
</script>

<?php

    include 'footer.php';
?>