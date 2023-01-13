<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>How to create Firebase login and register?</title>
</head>

<body>

    <div class="navbar navbar-default">
        <div class="navbar-header">
            <a class="navbar-brand" href="https://www.shinerweb.com">Mohmand Technologies</a>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse"
                aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#" id="logout" style="display: none;">Log Out</a></li>
            </ul>
        </div>
    </div>
    <br>
    <div class="container">
        <form name="registration_form" id="registration_form" method="post" action="#" enctype="multipart/form-data">
            <div class="row">

                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" class="form-control" placeholder="Enter your email">
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control"
                            placeholder="Enter your password">
                    </div>
                    <button type="button" id="register" name="register" class="btn btn-success">Register Now</button>
                </div><!-- end col -->
        </form>
        <div class="col-sm-4">
            <img src="./img/logos/fire.png">
        </div>
        <form name="login_form" id="login_form" method="post" action="#" enctype="multipart/form-data">
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="login_email" id="login_email" class="form-control"
                        placeholder="Enter your email">
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="login_password" id="login_password" class="form-control"
                        placeholder="Enter your password">
                </div>
                <button type="button" id="login" name="login" class="btn btn-success">Login</button>
            </div><!-- end col -->

    </div><!--  end row -->
    </form>
    </div>
    <br>
    <center>Developed by <a href="#">Kamran</a></center>
</body>

<!-- 
<script type="module">
// Import the functions you need from the SDKs you need
import {
    initializeApp
} from "https://www.gstatic.com/firebasejs/9.15.0/firebase-app.js";
import {
    getAnalytics
} from "https://www.gstatic.com/firebasejs/9.15.0/firebase-analytics.js";
// TODO: Add SDKs for Firebase products that you want to use
// https://firebase.google.com/docs/web/setup#available-libraries
<script src = "https://www.gstatic.com/firebasejs/7.14.6/firebase-database.js" ></script>

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
const app = initializeApp(firebaseConfig);
const analytics = getAnalytics(app);
const auth = getAuth();
console.log(app);

//----- New Registration code start	  
document.getElementById("register").addEventListener("click", function() {
		  var email =  document.getElementById("email").value;
		  var password = document.getElementById("password").value;
		  //For new registration
		  createUserWithEmailAndPassword(auth, email, password)
		  .then((userCredential) => {
		    // Signed in 
		    const user = userCredential.user;
		    console.log(user);
		    alert("Registration successfully!!");
		    // ...
		  })
		  .catch((error) => {
		    const errorCode = error.code;
		    const errorMessage = error.message;
		    // ..
		    console.log(errorMessage);
		    alert(error);
		  });		  		  
	  });
	  //----- End

	  //----- Login code start	  
	  document.getElementById("login").addEventListener("click", function() {
		  var email =  document.getElementById("login_email").value;
		  var password = document.getElementById("login_password").value;

		  signInWithEmailAndPassword(auth, email, password)
		  .then((userCredential) => {
		    // Signed in 
		    const user = userCredential.user;
		    console.log(user);
		    alert(user.email+" Login successfully!!!");
		    document.getElementById('logout').style.display = 'block';
		    // ...
		  })
		  .catch((error) => {
		    const errorCode = error.code;
		    const errorMessage = error.message;
		    console.log(errorMessage);
		    alert(errorMessage);
		  });		  		  
	  });
	  //----- End

	  //----- Logout code start	  
	  document.getElementById("logout").addEventListener("click", function() {
		  signOut(auth).then(() => {
			  // Sign-out successful.
			  console.log('Sign-out successful.');
			  alert('Sign-out successful.');
			  document.getElementById('logout').style.display = 'none';
			}).catch((error) => {
			  // An error happened.
			  console.log('An error happened.');
			});		  		  
	  });
	  //----- End


</script> -->

<!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/7.14.6/firebase-app.js"></script>

<!-- TODO: Add SDKs for Firebase products that you want to use
         https://firebase.google.com/docs/web/setup#available-libraries -->
<script src="https://www.gstatic.com/firebasejs/7.14.6/firebase-analytics.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.14.6/firebase-database.js"></script>

<script src="https://www.gstatic.com/firebasejs/6.3.3/firebase-auth.js"></script>
<script type="module">
// Import the functions you need from the SDKs you need
import {
    initializeApp
} from "https://www.gstatic.com/firebasejs/9.15.0/firebase-app.js";
import {
    getAnalytics
} from "https://www.gstatic.com/firebasejs/9.15.0/firebase-analytics.js";
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
const app = initializeApp(firebaseConfig);
const analytics = getAnalytics(app);
const auth = firebase.auth();
var database = firebase.database();
// console.log(app);



//----- New Registration code start	  
document.getElementById("register").addEventListener("click", function() {
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    //For new registration
    createUserWithEmailAndPassword(auth, email, password)
        .then((userCredential) => {
            // Signed in 
            const user = userCredential.user;
            console.log("My data " + user.uid);
            firebase.database().ref('Users/').child(user.uid).set({
                email: email,
                password: password,
            });
            alert("Registration successfully!!");
            // ...
        })
        .catch((error) => {
            const errorCode = error.code;
            const errorMessage = error.message;
            // ..
            console.log(errorMessage);
            alert(error);
        });
});
//----- End

//----- Login code start	  
document.getElementById("login").addEventListener("click", function() {
    var email = document.getElementById("login_email").value;
    var password = document.getElementById("login_password").value;

    signInWithEmailAndPassword(auth, email, password)
        .then((userCredential) => {
            // Signed in 
            const user = userCredential.user;
            console.log(user);
            alert(user.email + " Login successfully!!!");
            document.getElementById('logout').style.display = 'block';
            // ...
        })
        .catch((error) => {
            const errorCode = error.code;
            const errorMessage = error.message;
            console.log(errorMessage);
            alert(errorMessage);
        });
});
//----- End

//----- Logout code start	  
document.getElementById("logout").addEventListener("click", function() {
    signOut(auth).then(() => {
        // Sign-out successful.
        console.log('Sign-out successful.');
        alert('Sign-out successful.');
        document.getElementById('logout').style.display = 'none';
    }).catch((error) => {
        // An error happened.
        console.log('An error happened.');
    });
});
//----- End
</script>

</html>