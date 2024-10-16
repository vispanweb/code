<html>

<head>
    <script type="module" src="https://www.gstatic.com/firebasejs/9.12.1/firebase-app-compat.js"></script>
    <script type="module" src="https://www.gstatic.com/firebasejs/9.12.1/firebase-auth-compat.js"></script>
    <script type="module">
    // Import the functions you need from the SDKs you need
    // import {initializeApp} from "https://www.gstatic.com/firebasejs/9.17.1/firebase-app.js";
    // import {getAnalytics} from "https://www.gstatic.com/firebasejs/9.17.1/firebase-analytics.js";
    // TODO: Add SDKs for Firebase products that you want to use
    // https://firebase.google.com/docs/web/setup#available-libraries

    // Your web app's Firebase configuration
    // For Firebase JS SDK v7.20.0 and later, measurementId is optional
    const firebaseConfig = {
        apiKey: "AIzaSyDzsQGB5v5gjTWWfvw30L55-vs8ZJI3qCk",
        authDomain: "infoforwhenigo-eedaa.firebaseapp.com",
        projectId: "infoforwhenigo-eedaa",
        storageBucket: "infoforwhenigo-eedaa.appspot.com",
        messagingSenderId: "1055254881202",
        appId: "1:1055254881202:web:f03486d496e4f5f3e2baab",
        measurementId: "G-BD991F6M82"
    };

    // Initialize Firebase
    // const app = initializeApp(firebaseConfig);   
    // const analytics = getAnalytics(app);
    firebase.initializeApp(firebaseConfig);
    render();

    function render() {
        window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container');
        recaptchaVerifier.render();
    }
    </script>
    <script>
        function phoneAuth() {
        var number = document.getElementById('number').value;
        firebase.auth().signInWithPhoneNumber(number, window.recaptchaVerifier).then(function(confirmationResult) {
            window.confirmationResult = confirmationResult;
            coderesult = confirmationResult;
            console.log('OTP Sent');
        }).catch(function(error) {
            alert(error.message);
        });
    }

    // function for OTP verify
    function codeverify() {
        var code = document.getElementById('verificationcode').value;
        coderesult.confirm(code).then(function () {
            console.log('OTP Verified');
        }).catch(function () {
            console.log('OTP Not correct');
        })
    }
    </script>
</head>

<body>
    <div>

            <label class="form-label form-widget mobile" for="mobile">
                <span class="form-label-text">Mobile number:</span>
                <div class="form-element">
                    <input label="Mobile number:" name="mobile" placeholder="Mobile number" id="number" type="text" class="mobile" value="" required>
                    <div id="recaptcha-container"></div>
                    <input type="button" onclick="phoneAuth()" value="Verify">
                    <!-- <span class="email_verify core btn-success" onclick="phoneAuth()">Verify</span> -->
                    <div class="otp_submit"></div>
                    <div class="form-errors"></div>
                </div>
                <div class="form-element">
                    <input label="Mobile number otp:" name="mobile" placeholder="Mobile number" id="verificationcode" type="text" class="mobile" value="" required>
                    <input type="button" onclick="codeverify()" value="Verify OTP">
                    <!-- <span class="email_verify core btn-success" onclick="phoneAuth()">Verify</span> -->
                    <div class="otp_submit"></div>
                    <div class="form-errors"></div>
                </div>
            </label>
            <label class="form-label form-widget email" for="email">
                <span class="form-label-text">Email address:</span>
                <div class="form-element">
                    <input label="Email address:" id="form_email" name="email" placeholder="Email address" type="email" class="email" value="" required>
                    <div class="form-errors email_error_verify"></div>
                </div>
            </label>
            <label class="form-label form-widget" for="_">
                <span class="form-label-text"></span>
                <div class="form-element">
                    <button class="core btn-success" type="submit">Create account</button>
                    <span></span>
                </div>
            </label>
    </div>
</body>

</html>