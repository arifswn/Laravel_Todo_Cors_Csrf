# Laravel Todo menggunakan Cors dan CSRF

## Upload ke Railway
```
registrasi railway untuk deployment
https://railway.app/

```

## Settings di Railway
```
ganti APP_DEBUG sebelumnya true menjadi false
APP_DEBUG=false

tambahkan variabel:
NIXPACKS_BUILD_CMD="php artisan optimize:clear && php artisan storage:link && php artisan migrate --force"

menuju settings, lalu pilih networking, pada public networking:
klik generate domain

kemudian, salin/copy url domain yang udah di generate:
laraveltodocorscsrf-production.up.railway.app
kemudian tambahkan https:// di depannya, sehingga url menjadi seperti berikut:
https://laraveltodocorscsrf-production.up.railway.app
```
