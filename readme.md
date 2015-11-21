## Mini Accounting

[![Build Status](https://travis-ci.org/ngadep/akuntansi.svg)](https://travis-ci.org/ngadep/akuntansi)

Mini Accounting adalah aplikasi sederhana untuk membantu memahami akuntansi.

### Installation
#### server requirement
- php >= 5.5.9
- OpenSSL PHP Extension
- PDO PHP Extension
- Mbstring PHP Extension
- Tokenizer PHP Extension
#### Installing Mini Accounting
untuk memudahkan installasi, download dan install [Composer](https://getcomposer.org/) terlebih dahulu. pada folder utama jalankan perintah:

    composer install

Langkah ini dilakukan untuk men-download ketergantunan paket.

Copy dan rename file `.env.example` menjadi `.env` kemudian ubah pengaturan sesuai kebutuhan. kemudian jalankan perintah:

    php artisan migrate --seed

Langkah ini dilakukan untuk membuat database awal untuk aplikasi kita.

Langkah terahir jalankan aplikasi dengan:

    email     : admin@akuntansi.com
    passsword : 123

### Documentation

### Licence
mini accounting adalah aplikasi sumber terbuka dibawah [lisensi MIT](http://opensource.org/licenses/MIT).
