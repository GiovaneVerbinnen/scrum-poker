<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
This is a Livewire project - TALL STACK(TailwindCSS Alpine Laravel Livewire)
</p>
<p align="center"><a href="https://laravel.com" target="_blank"><img src="./resources/room-page.png" width="100%"></a></p>

---

### For running localy you need:

I recomment using Valet if you have Linux or Mac, in case of Windows use Laragon/XAMPP.

Database is PostgreSQL.

```
   composer install
   npm install
   config the .env file according the .env.example and create a database for the project
   php artisan migrate

   php artisan serve(optional)
```

### From Running in Docker
Copy the .env.example to .env

```bash
   docker-compose up -d
   docker-compose exec pg-app bash
   psql
   create database scrum_poker;
   exit
   exit
   docker-compose exec laravel-app bash
   php artisan migrate
   php artisan key:generate
```
Now you can hit the localhost:8080

### About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

### License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
