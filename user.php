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
                         <h4 class="text-center"><span style="color:#FF4A23;">USER</span> Section</h4>
                         <form>
                             <div class="container">
                                 <h1>Register</h1>
                                 <p>Please fill in this form to create an account.</p>
                                 <hr>
                                 <label for="email"><b>Name</b></label>
                                 <input type="text" placeholder="Enter name" name="name" id="name" required>

                                 <label for="email"><b>Email</b></label>
                                 <input type="text" placeholder="Enter Email" name="email" id="email" required>

                                 <label><b>Password</b></label>
                                 <input type="password" placeholder="Password" name="psw" id="psw" required>

                                 <hr>
                                 <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>

                                 <button type="button" id="submitData" name="submitData"
                                     class="registerbtn">Register</button>
                             </div>

                             <div class="container signin">
                                 <p>Already have an account? <a href="#">Sign in</a>.</p>
                             </div>
                         </form>

                     </div>
                 </div>
             </div>
             <div class="col-lg-12 grid-margin stretch-card">
                 <div class="card">
                     <div class="card-body">
                         <h4 class="card-title">User Details</h4>
                         </p>
                         <div class="table-responsive">
                             <table class="table table-bordered">
                                 <thead>
                                     <tr>
                                         <th>Name</th>
                                         <th>Email</th>
                                         <th>Contact Number</th>
                                         <th>CNIC</th>
                                         <th>Password</th>
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
} from "https://www.gstatic.com/firebasejs/9.6.10/firebase-app.js";
import {
    getAuth,
    createUserWithEmailAndPassword,
    signInWithEmailAndPassword,
    signOut
} from "https://www.gstatic.com/firebasejs/9.6.10/firebase-auth.js";
import {
    getDatabase,
    set,
    ref,
    update
} from "https://www.gstatic.com/firebasejs/9.6.10/firebase-database.js";


// TODO: Add SDKs for Firebase products that you want to use
// https://firebase.google.com/docs/web/setup#available-libraries

// Your web app's Firebase configuration
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
const app = initializeApp(firebaseConfig);
const auth = getAuth();
const database = getDatabase(app);

submitData.addEventListener('click', (e) => {

    var name = document.getElementById('name').value;
    var email = document.getElementById('email').value;
    var password = document.getElementById('psw').value;



    //sign up user
    createUserWithEmailAndPassword(auth, email, password)
        .then((userCredential) => {
            // Signed in
            const user = userCredential.user;
            // ... user.uid
            set(ref(database, 'Users/' + user.uid), {

                    name: name,
                    email: email,
                    password: password,
                    userID:user.uid,
                })
                .then(() => {
                    // Data saved successfully!
                    alert('user created successfully');

                })
                .catch((error) => {
                    // The write failed...
                    alert(error);
                });
        })
        .catch((error) => {
            const errorCode = error.code;
            const errorMessage = error.message;
            // ..
            alert(errorMessage);
        });

    // log in user
    signInWithEmailAndPassword(auth, email, password)
        .then((userCredential) => {
            // Signed in
            const user = userCredential.user;
            // ...

            // save log in details into real time database
            var lgDate = new Date();
            update(ref(database, 'Users/' + user.uid), {
                    last_login: lgDate,
                })
                .then(() => {
                    // Data saved successfully!
                    alert('user logged in successfully');

                })
                .catch((error) => {
                    // The write failed...
                    alert(error);
                });
        })
        .catch((error) => {
            const errorCode = error.code;
            const errorMessage = error.message;
            alert(errorMessage);
        });

    // sign out user
    signOut(auth).then(() => {
        // Sign-out successful.
    }).catch((error) => {
        // An error happened.
    });
});
</script>

     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>


     <?php

    include 'footer.php';
?>