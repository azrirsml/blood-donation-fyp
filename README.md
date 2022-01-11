MVC

Model
- class
- Object to create

Controller

View
- ui  = user interface

new feature
- migration database
	- php artisan make:migration "create nama table"
	- define column name
- create model
	- php artisan make:model NamaModel
	- dalam setiap model include = protected $guarded = [];

- create route
	- Http request
		- GET
		- POST
		- PUT/PATCH
		- DELETE
	- define route (url, controller, function)

- create controller
	- php artisan make:controller NamaController -r
	- 7 function

- create view
	- resources/views
	- sort by feature name
