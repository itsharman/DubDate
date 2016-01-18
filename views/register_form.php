<script src= "//ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
        <!--<div ng-app="">-->
 
        <!--<p>Name : <input type="text" ng-model="name" placeholder="Enter name here"></p>-->
        <!--<h1>Hello {{username}}</h1>-->
        
        <!--</div>-->
        
<!--<script type="text/javascript" src="/js/jquery.complexify.js"></script>-->
<!--<script type="text/javascript">-->
<!--  $("#password").complexify({}, callback(valid, complexity){-->
<!--    alert("Password complexity: " + complexity);-->
<!--  });-->
<!--</script>-->
        
<form action="register.php" method="post">
    <fieldset>
        <div class="form-group" ng-app="">
            <input ng-model="username" autocomplete="off" autofocus class="form-control" name="username" placeholder="Couple Name" type="text"/>
            <h1>Hello {{username}}!</h1>
        </div>
        <div class="form-group">
            <input class="form-control" name="name1" placeholder="Name of first person" type="name"/>
        </div>
        <div class="form-group">
            <input class="form-control" name="name2" placeholder="Name of second person" type="name"/>
        </div>
        <div class="form-group">
            <input class="form-control" name="password" placeholder="Password" type="password"/>
        </div>
        <div class="form-group">
            <input class="form-control" name="confirmation" placeholder="Password (again)" type="password"/>
        </div>
        <div class="form-group">
            <button class="btn btn-default" type="submit">Register</button>
        </div>
    </fieldset>
</form>
<div>
    or <a href="login.php">log in</a>
</div>



<!--<form action="register.php" method="post">-->
<!--    <fieldset>-->
<!--        <div class="form-group">-->
<!--            <input autocomplete="off" autofocus class="form-control" name="username" placeholder="Username" type="text"/>-->
<!--        </div>-->
<!--        <div class="form-group">-->
<!--            <input class="form-control" name="password" placeholder="Password" type="password"/>-->
<!--        </div>-->
<!--        <div class="form-group">-->
<!--            <input class="form-control" name="confirmation" placeholder="Password (again)" type="password"/>-->
<!--        </div>-->
<!--        <div class="form-group">-->
<!--            <button class="btn btn-default" type="submit">-->
<!--                <span aria-hidden="true" class="glyphicon glyphicon-log-in"></span>-->
<!--                Register-->
<!--            </button>-->
<!--        </div>-->
<!--    </fieldset>-->
<!--</form>-->
<!--<div>-->
<!--    or <a href="login.php">log in</a>-->
<!--</div>-->