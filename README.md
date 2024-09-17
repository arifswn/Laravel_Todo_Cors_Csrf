# Laravel Todo Menggunakan CORS & CSRF

## Deskripsi

Materi ini dirancang untuk kelas Web Development (Laravel) dan membahas topik CORS (Cross-Origin Resource Sharing) dan CSRF (Cross-Site Request Forgery) dalam Laravel. Menggunakan Laravel 10, materi ini mencakup contoh implementasi CRUD sederhana untuk model Todo, serta penyediaan REST API untuk mengelola Todo.

Materi selanjutnya bisa anda akses di [HTML TODO CORS CSRF](https://github.com/arifswn/Simple_Todo_Cors_Csrf).

## Demo

Untuk melihat demo aplikasi, silakan kunjungi [Laravel Todo](https://laraveltodocorscsrf-production.up.railway.app/).

Berikut adalah materi lanjutan yang dibuat menggunakan HTML, CSS, dan JavaScript: Link Demo [Simple Todo CORS CSRF](https://simple-todo-cors-csrf.vercel.app/). Materi ini digunakan untuk menguji CORS pada aplikasi frontend. Perhatikan bahwa pada fungsi **DELETE**, Anda mungkin akan mengalami error CORS.

## Upload ke Railway

Registrasi Railway untuk deployment: [Railway](https://railway.app/)

## Settings di Railway

1. Ganti `APP_DEBUG` sebelumnya `true` menjadi `false`:

    ```env
    APP_DEBUG=false
    ```

2. Tambahkan variabel:

    ```env
    NIXPACKS_BUILD_CMD="php artisan optimize:clear && php artisan storage:link && php artisan migrate --force"
    ```

3. Konfigurasi PORT pada settings public networking (domain):

    ```bash
    Sesuaikan menjadi default 8080
    ```

4. Menuju settings, lalu pilih networking, pada public networking:

    - Klik generate domain
    - Salin/copy URL domain yang telah di-generate:
        ```plaintext
        laraveltodocorscsrf-production.up.railway.app
        ```

5. Menuju variabel, setel `APP_URL` seperti berikut:

    ```env
    https://laraveltodocorscsrf-production.up.railway.app
    ```

6. Config pada bagian `app/Providers/AppServiceProvider.php`, tambahkan kode berikut pada method `boot()`:

    ```php
    Schema::defaultStringLength(191);
    if ($this->app->environment('production')) {
        \URL::forceScheme('https');
    }
    ```

7. Config pada bagian `app/Http/Middleware/TrustProxies.php`, tambahkan kode berikut:
    ```php
    protected $proxies = '*';
    ```

## Custom Todo

Jalankan perintah berikut untuk membuat migration, model, controller, dan seeder:

```bash
php artisan make:migration create_todos_table --create=todos
php artisan make:model Todo
php artisan make:controller TodoController --resource
php artisan make:controller API/TodoController --api
php artisan make:seeder TodoSeeder
```

## Instalasi

Jalankan perintah berikut untuk instalasi dan setup:

```bash
composer install
npm install
npm run dev
php artisan migrate
php artisan db:seed --class=TodoSeeder
php artisan serve
```

## CORS

Digunakan untuk mengizinkan request dari domain yang berbeda.

## CSRF

Digunakan untuk mengamankan form request dari serangan CSRF.

## Thank You

Semoga materi ini bermanfaat dan membantu Anda dalam memahami dan mengimplementasikan CORS serta CSRF di Laravel. Selamat belajar!
