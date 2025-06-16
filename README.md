# How to Set up
## Yang dibutuhkan 
- composer
- visual studio code
## Cara menjalankan
- lakukan git clone terhadap repository ini
- pada local repository yang sudah diclone, ubah .env.example menjadi .env
- pada .env barisan mail diganti menjadi berikut:
```
    MAIL_MAILER=smtp
    MAIL_HOST=smtp.gmail.com
    MAIL_PORT=587
    MAIL_USERNAME=bnccbos2024@gmail.com
    MAIL_PASSWORD=fxyjycbqxocijdkc
    MAIL_ENCRYPTION=tls
    MAIL_FROM_ADDRESS=ruang.guru@gmail.com
    MAIL_FROM_NAME="${APP_NAME}"
```
- buka visual studio code atau terminal 
- Jalankan command sebagai berikut: 
    + composer i
    + php artisan migrate
    + php artisan db:seed
    + php artisan key:generate
    + php artisan storage:link
    + php artisan serve untuk menjalankan program

## Akun Admin
- email: testing@example.com
- password: bitcoin
