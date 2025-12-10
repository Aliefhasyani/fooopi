

fooopi bisa diakses di : https://rapidapi.com/aliefhasyani05/api/fooopi1/playground/apiendpoint_7def617e-44ba-4dc0-9e3d-7a90c09f3599

fooopi adalah RESTful API yang dibangun menggunakan framework **Laravel** . API ini dirancang untuk mengelola data geografis dan alamat pengguna, termasuk Negara, Negara Bagian (State), Kota, dan Alamat spesifik.

Proyek ini menggunakan **Laravel Sanctum** untuk autentikasi token yang aman.





 Instalasi

1. **Clone repositori:**
   ```bash
   git clone https://github.com/Aliefhasyani/fooopi.git
   cd fooopi


2.  **Instal dependensi:**

    ```bash
    composer install
    ```

3.  **Setup Environment:**

    ```bash
    cp .env.example .env
    ```

4.  **Generate Application Key:**

    ```bash
    php artisan key:generate
    ```

5.  **Konfigurasi Database:**
    Buka file `.env` dan sesuaikan kredensial database Anda:

    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=fooopi
    DB_USERNAME=root
    DB_PASSWORD=
    ```

6.  **Migrasi Database:**

    ```bash
    php artisan migrate
    ```

7.  **Jalankan Localhost:**

    ```bash
    php artisan serve
    ```

**Autentikasi (Sanctum)**

API ini menggunakan **Bearer Token**.

1.  Gunakan endpoint `/register` atau `/login` untuk mendapatkan token.
2.  Sertakan token pada header request selanjutnya:
    ```
    Authorization: Bearer <token>
    Accept: application/json
    ```

**Dokumentasi Endpoint**

 Auth

| Method | Endpoint | Deskripsi |
| :--- | :--- | :--- |
| `POST` | `/api/register` | Mendaftarkan akun baru |
| `POST` | `/api/login` | Login user |
| `GET` | `/api/user` | Mendapatkan data user  |

 Country (Negara)

| Method | Endpoint | Deskripsi |
| :--- | :--- | :--- |
| `GET` | `/api/country` | List semua negara |
| `POST` | `/api/country` | Tambah negara baru |
| `GET` | `/api/country/{id}` | Detail negara |
| `PUT` | `/api/country/{id}` | Update negara |
| `DELETE` | `/api/country/{id}` | Hapus negara |

 State (Provinsi)

| Method | Endpoint | Deskripsi |
| :--- | :--- | :--- |
| `GET` | `/api/state` | List semua state |
| `POST` | `/api/state` | Tambah state baru |
| `GET` | `/api/state/{id}` | Detail state |
| `PUT` | `/api/state/{id}` | Update state |
| `DELETE` | `/api/state/{id}` | Hapus state |

City (Kota)

| Method | Endpoint | Deskripsi |
| :--- | :--- | :--- |
| `GET` | `/api/city` | List semua kota |
| `POST` | `/api/city` | Tambah kota baru |
| `GET` | `/api/city/{id}` | Detail kota |
| `PUT` | `/api/city/{id}` | Update kota |
| `DELETE` | `/api/city/{id}` | Hapus kota |

 Address (Alamat)

| Method | Endpoint | Deskripsi |
| :--- | :--- | :--- |
| `GET` | `/api/address` | List semua alamat |
| `POST` | `/api/address` | Tambah alamat baru |
| `GET` | `/api/address/{id}` | Detail alamat |
| `PUT` | `/api/address/{id}` | Update alamat |
| `DELETE` | `/api/address/{id}` | Hapus alamat |


[MIT license](https://opensource.org/licenses/MIT).

