/**
Filter a $firebaseArray
-------------

This example uses Firebase Queries to order a list of todos by their completed status. The ng-if directive determines whether the todo is shown based on the state of the "Show Completed" checkbox.

The entire list is downloaded with the query. If you want to only download the non-completed items you can use the equalTo() function:

All todos
  var ref = new Firebase("<my-firebase-db>")
  					.orderByChild('completed');
  
Non-completed todos
  var ref = new Firebase("<my-firebase-db>")
  					.orderByChild('completed')
                    .equalTo(false);
*/

angular
	.module('myApp', ['firebase'])
	.controller('MainCtrl', MainCtrl);

function MainCtrl($firebaseArray) {
  var ref = new Firebase("https://array-demo.firebaseio-demo.com/values").orderByChild('completed');
  
  this.todos = $firebaseArray(ref);
  this.showAll = false;
    
  this.showCompleted = function(todo) {
     return this.showAll || todo.completed === false;
  };
    
  this.toggleCompleted = function(todo) {
  	this.todos.$save(todo);
  };
}
MainCtrl.$inject = ['$firebaseArray'];