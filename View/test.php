<? session_start(); ob_start();?>
<?php



?>
<html>
    <head>
        <!-- load angular fame work start-->
    <script src="../js/jquery-2.1.1.js"></script>
	<script src="../js/angular.min.js"></script>
    <script src="../js/angular-route.js"></script>

    <script>
$(document).ready(function(){
//alert("hello jquery");
});
var app = angular.module("myApp", ["ngRoute"]);
app.config(function($routeProvider) {
	$routeProvider
	.when("/", {
        templateUrl : "home.php"
    })
    .when("/pages/:url", {
        templateUrl : "home1.php",
        controller:"pageController"
    	
    })
    .otherwise({
    	templateUrl : "home1.php"
    });
});

app.controller("pageController",function($scope, $route, $routeParams){

$route.current.templateUrl = $routeParams.url + ".php";
$.get($route.current.templateUrl, function (data){
    $("#mainContent").html(data);

    alert($routeParams.url);

    
});

});

    </script>
    

    </head>
    <body ng-app="myApp" >

    <div id="mainContent" class="ng-view"></div>

    </body>
</html>

