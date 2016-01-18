function goURL() {
  location.href="http://example.com"  // change url to your's
}

<!DOCTYPE html>
<html>
    <head>
        <title>Facebook Login JavaScript Example</title>
        <meta charset="UTF-8">
        <script src="hello.js"></script>
    </head>
<body>


  Below we include the Login Button social plugin. This button uses
  the JavaScript SDK to present a graphical Login button that triggers
  the FB.login() function when clicked.
-->

<fb:login-button scope="public_profile,email" onlogin="checkLoginState();">
</fb:login-button>

<div id="status">
</div>

</body>
</html>

        <button id="animate">Start Animation</button>
        <!--<button id=butt>The time is?</button>-->

