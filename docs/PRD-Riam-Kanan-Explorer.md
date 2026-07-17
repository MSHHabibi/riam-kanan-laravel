# Product Requirement Document (PRD)

## Project Overview
Nama aplikasi: Riam Kanan Explorer. Latar belakang: informasi wisata Waduk Riam Kanan perlu disatukan dalam aplikasi web modern. Target pengguna: wisatawan, user login, admin.

## User Personas & User Flow
Guest melihat landing page, mencari destinasi, melihat detail dan peta. User login dapat memberi review. Admin login dan mengelola CRUD data.

## Functional Requirements
| ID | Nama Fitur | Deskripsi | Status |
|---|---|---|---|
| F-001 | Landing Page | Hero dan daftar destinasi populer | Wajib |
| F-002 | Login | Login multi-role admin/user | Wajib |
| F-003 | Dashboard | KPI destinasi, kategori, kelotok, review | Wajib |
| F-004 | CRUD Destinasi | Tambah, edit, hapus, search destinasi | Wajib |
| F-005 | CRUD Kategori | Kelola kategori wisata | Wajib |
| F-006 | CRUD Pulau | Kelola data pulau | Wajib |
| F-007 | CRUD Kelotok | Kelola data kelotok | Wajib |
| F-008 | Galeri | Kelola galeri destinasi | Wajib |
| F-009 | Review | Kelola rating dan komentar | Wajib |
| F-010 | Export | Export PDF/Excel sederhana | Opsional |

## Non-Functional Requirements
Stack: Laravel 10, Blade, MySQL, CSS custom, DomPDF, Laravel Excel. Keamanan: password hashing, CSRF, validasi input, middleware admin, Eloquent ORM.

## Database Schema
Tabel: users, categories, destinations, islands, boats, facilities, galleries, reviews, favorites, settings.
