<html>
  <head>
    <script src='https://cdn.firebase.com/js/client/2.2.1/firebase.js'></script>
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js'></script>
    <script src= "//ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
    <!--var name = <?php echo($_SESSION["username"]) ?>;-->
  </head>
  <body>
    
    <h1>Post A Public Message!</h1>
    <font color = "gray">
        <input type='text' id='nameInput' placeholder='Name'>
    </font>
    
    <font color = "gray">
        <input type='text' id='messageInput' placeholder='Message'>
    </font>
    
    <div id='messagesDiv'></div>

    <script>
        var myDataRef = new Firebase('https://luminous-inferno-7725.firebaseio.com/');
            $('#messageInput').keypress(function (e) {
                if (e.keyCode == 13) {
                    var name = $('#nameInput').val();
                    var text = $('#messageInput').val();
                    myDataRef.push({name: name, text: text});
                    $('#messageInput').val('');
                }
        });
        myDataRef.on('child_added', function(snapshot) {
            var message = snapshot.val();
            displayChatMessage(message.name, message.text);
        });
        function displayChatMessage(name, text) {
            $('<div/>').text(text).prepend($('<em/>').text(name+': ')).appendTo($('#messagesDiv'));
            $('#messagesDiv')[0].scrollTop = $('#messagesDiv')[0].scrollHeight;
        };
    </script>
    
    <!--<h1>Or...Search!</h1>-->
    <!--<br>-->
    <!--<input type="text" ng-model="test">-->

    <!--<script>-->
    <!--    var myDataRef = new Firebase('https://luminous-inferno-7725.firebaseio.com/');-->
    <!--    <ul>-->
    <!--        <li ng-repeat="x in myDataRef | filter:test">-->
    <!--            {{ x.name + ', ' + x.text }}-->
    <!--        </li>-->
    <!--    </ul>-->
    <!--</script>-->


    
    <!--<input type="text" ng-model="search" />-->
    <!--<ul ng-repeat="(key, value) in myDataRef | orderByPriority | filter:search">  -->
    <!--    <li><a href="{{ key }}">{{ value.name }}</a></li>-->
    <!--</ul>-->
    
    
    
    <!--<input type='text' id='searchName' placeholder='Search by Name'>-->
    <!--<input type='text' id='searchMessage' placeholder='Search by Message'>-->
    <!--<script>-->
    <!--    $('#messageInput').keypress(function (e) {-->
    <!--            if (e.keyCode == 13) {-->
    <!--                var text = $('#messageInput').val();-->
    <!--                $('#messageInput').val('');-->
    <!--            }-->
    <!--    });-->
    <!--</script>-->
  </body>
</html>