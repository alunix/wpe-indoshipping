=== WPE Indoshipping ===
Contributors: ekaputra07
Tags: e-commerce, shipping, Indonesian Shipping, JNE, TIKI
Requires at least: 2.8
Tested up to: 3.1.2
Stable tag: 1.2.0

Plugin shipping Indonesia yang khusus untuk diintegrasikan dengan plugin WP-Ecommerce.

== Description ==

Dengan Plugin ini maka anda dapat menampilkan daftar ongkos kirim per daerah yang anda pilih.
Cocok digunakan untuk menampilkan ongkos kirim dari JNE, TIKI atau yang lainnya.
Hanya menggunakan file PHP untuk menyimpan daftar harga dan daerahnya, pengeditan harga dan nama daerah harus dilakukkan secara manual.

== Installation ==

Untuk menggunakkan nya, yang perlu anda siapkan adalah:

1. Plugin WP e-Commerce(http://wordpress.org/extend/plugins/wp-e-commerce/)
Setelah Plugin WP e-commerce terinstall, maka bisa dilanjutkan dengan menginstall plugin ini,
2. setelah aktif masuk ke bagian setting Shipping WP e-country, dan centang Nama shipping ini untuk mengintegrasikannya dengan WP e-commerce.
3. Jangan lupa untuk mengganti nama Shipping sesuai dengan Jasa pengiriman yang anda pakai.

/*
 * PERHATIAN :
 * Plugin ini hanya akan berfungsi dengan baik apabila modul shipping ini diaktifkan sendiri. Modul shipping lain harap jangan diaktifkan.
 */

== Frequently Asked Questions ==

= Sudah saya install, knapa ga muncul di halaman checkout? =
Pastikan Enable shipping sudah dicentang di halaman setting wp e-commerce.

= Sudah mau muncul di halaman checkout, knapa formnya juga muncul di modul shipping lain? =
Seperti yang sudah dijelaskan pada bagian instalasi diatas, diharapkan sekali modul shipping yang aktif hanyalah satu, yaitu WPE indoshipping ini.
Karena wp e-commerce memiliki cara khusus untuk menampilkan ongkos kirim, sedangkan untuk memanipulasi tampilan ongkos kirim per daerah/propinsi maka satu-satunya cara adalah dengan memanipulasi DOM dengan memasukkan form dengan Javascript.

= Apakah plugin ini bisa jalan apa Javascript di browser saya dimatikan/disable? =
Maaf, plugin ini mutlak memerlukan javascript.

== Changelog ==

= 1.2.0 =
* Display stabil di semua browser.
* Metode baru search propinsi, berbasis Javascript, dijamin lebih cepat tanpa load halaman berulang kali.

= 1.0.1 =
* Fixed bug, menghitung otomatis Ongkir diatas 1 Kg
* Default province featured removed

= 1.0 =
* Initial Release
* Database harga dan daerah berupa file PHP.

