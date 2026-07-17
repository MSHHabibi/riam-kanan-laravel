# Riam Kanan Explorer - Laravel 10

Aplikasi UAS Pemrograman Web 2: Smart Tourism Information System dengan autentikasi, CRUD, database MySQL, dashboard admin, destinasi, kategori, pulau, kelotok, galeri, review, export PDF/Excel sederhana.

## Cara Install

```bash
composer install
cp .env.example .env
php artisan key:generate
```

Buat database MySQL:

```sql
CREATE DATABASE riam_kanan_explorer;
```

Atur `.env`:

```env
DB_DATABASE=riam_kanan_explorer
DB_USERNAME=root
DB_PASSWORD=
```

Jalankan migrasi dan seed:

```bash
php artisan migrate --seed
php artisan storage:link
php artisan serve
```

Login admin:

```text
Email: admin@riamkanan.test
Password: password
```

Login user:

```text
Email: user@riamkanan.test
Password: password
```

## Fitur
- Landing page modern
- Login multi role admin/user
- Middleware admin
- Dashboard admin KPI
- CRUD kategori
- CRUD destinasi
- CRUD pulau
- CRUD kelotok
- CRUD galeri
- CRUD review
- Search destinasi
- Database MySQL
- Export PDF/Excel sederhana
- PRD tersedia di folder `docs/PRD-Riam-Kanan-Explorer.md`
