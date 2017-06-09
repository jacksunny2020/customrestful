# customrestful
custom restful resource controller plugin for laravel

How to install and configurate package

1. install the laravel package 
  composer require jacksunny/customrestful

2. add restful route in route file like routes/web.php
  Route::resource('model', 'ModelController');

3. create the resource controller named ModelController
  php artisan make:controller ModelController --resource
 
4. append new service provider file line in the section providers of file app.config
  after appended,it should looks like
   'providers' => [
        Illuminate\Auth\AuthServiceProvider::class,
        ......
        Jacksunny\CustomRestful\CustomRestfulServiceProvider::class,
    ],
4.  test if it works
  http://localhost/model/query?view=card
  
5. if you need to custom diff route , related controller method mapping and acceptable route method,
   just modify each ResourceRegistrarRuleXXX class or create new registrar rule class which implements ResourceRegistrarRuleContract

6. please notify me if you got any problem or error on it,thank you!
