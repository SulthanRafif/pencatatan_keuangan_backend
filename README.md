## Keterangan

Test - Backend Internship Inagata - Sulthan Rafif

## Instalasi Aplikasi

-   Unduh aplikasi ini
-   Install xampp dan composer
-   Copy aplikasi ini ke `xampp/htdocs/`
-   Copy file `.env.example` dan ubah nama file menjadi `.env`
-   Ubah konfigurasi yang ada di file .env seperti database dan nama aplikasi anda
-   Buka terminal dan masuk ke folder aplikasi anda
-   Run `$ composer install`
-   Run `$ php artisan key:generate`
-   Run `$ php artisan storage:link`
-   Run `$ php artisan passport:install`
-   Run `$ php artisan optimize`
-   Run `$ php artisan db:seed --class=UserSeeder`
-   Run `$ php artisan db:seed --class=CategorySeeder`
-   Run `$ php artisan serve untuk akses aplikasi`
-   Buka postman dan ketik url ini: `http://localhost:8000` untuk menguji API

## Pengujian di POSTMAN

-   Link API untuk Profile: 'https://api.postman.com/collections/9552691-62458498-52d0-4f97-ba5b-7a62c51bf020?access_key=PMAT-01GKQEFZ4H13MP65R2GZ638HV1'
-   Link API untuk Auth: 'https://api.postman.com/collections/9552691-8178d394-797d-4272-bb01-66cdb0ecb8d8?access_key=PMAT-01GKQE2RYCY25VFQ0RDEMZS6T3'
-   Link API untuk Financial Record: 'https://api.postman.com/collections/9552691-b1b268e8-1285-4cc9-a605-5af8263ec50b?access_key=PMAT-01GKQEDDV4ATM6XJ09V0FBNZ1H'
-   Link API untuk Category: 'https://api.postman.com/collections/9552691-12c18743-2ea9-486a-adb5-62c87cd3a4f0?access_key=PMAT-01GKQEAKTTJZ0ZT3829CS61JRT'

## Spesifikasi

-   Laravel 9
-   PHP 8.1.2
-   MySQL 5.7.33

## Data login

-   email : admin@admin.com
-   password : password

## Link Google Drive Screenshot Pengujian API di POSTMAN

-   https://drive.google.com/drive/u/0/folders/1LFrtwhIAQhE4-TexHpnSYWCXfUc8i8PW
