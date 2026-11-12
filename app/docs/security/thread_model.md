# 1 System Information

System Name :
GT Production and Inventory System (GTPIS)

Purpose :
Sistem untuk mngelola data produk,material,supplier,production order,inventory,file/ dokumen , dan audit log.

Technologi:
-php
-codeigniter 4
-mysql/mariaDB
-laragon

Enviroment :
Development

# 2 Asset

1. Business Data
   -produk data
   -material data
   -Supplier data
   -production order data
   -inventory transaction data

2. Documents
   -production document / Uploaded files

3. Security Data
   -audit logs
   -user credentials
   -session / authentication data

4. Application Infrastructure
   -Database
   -Application Source Code
   -Environment Configuration (env)

# 3 Security Objectives

1. Confidentiality
   Data hanya dapat diakses oleh user yang memiliki hak akses.

2. Integrity
   Data tidak boleh diubah, dihapus ,atau dimanipulasi oleh yang tidak memiliki hak akses.

3. Avabiality
   Aplikasi dan data harus tersedia bagi user yang berwenang ketika dibutuhkan.

# 4 Actors / Users

1. Admin
   Responsibilities :
   -Mengelola User dan Role
   -Mengelola Master Data
   -Mengelola Konfigurasi Sistem
   -Melakukan Administrasi Sistem

Security Concern :
Admin memiliki privilage tinggi sehingga akun admin harus mendapatkan perlindungan yang lebih ketat.

2. Production Staff
   Responsibilities :
   -Melihat data produk dan material
   -membuat dan mengubah production order
   -mengelola aktivitas produksi sesuai kewenangan

Security Concern :
Production Staff tidak bolej melakukan approval yang hanya menjadi kewenangan supervisor

3. Warehouse Staff
   Responsibilities :
   -Melihat data material
   -Mengelola transaksi inventory
   -melakukan aktivitas warehouse sesuai kewenangan

Security concern :
Warehouse staff tidak boleh memanipulasi data inventory di luar kewenangan

4. Supervisor
   Responsibilities :
   -Melihat data oprasional
   -Melakukan pemerikasaan
   -Melakukan approval terhadap aktivitas tertentu

Security Concern :
Approval harus dibatasi hanya kepada user yang memiliki kewenangan

5. Auditor
   Responsibilities :
   -Membaca data yang diperlukan untuk audit
   -Membaca audit log
   -Melakukan pemeriksaan aktivitas sistem

Security Concern :
Auditor membutuhkan akses baca tapi tidak seharusnya dapat mengubah data oprasional atau audit log

6. Guest
   Responsibilities :
   -Mengakses fungsi publik yang memang tersedia tanpa login

Security Concern :
Guest tidak boleh mendapatkan akses ke data atau fungsi internal

7. Attacker
   Potensial Activities :
   -Mencoba login menggunakan credential uang diperoleh
   -Mencoba mengakses URL secara langsung
   -Mengirim input berbahaya
   -Mencoba mengakses data yang bukan haknya
   \_Mencoba mengubah data
   -Mencoba mengunggah file berbahaya

Security Concern :
Sistem harus menganggap bahwa input dan request dari client dapat dimanipulasi

# 5 Initial Access Matrix

Actor : Admin

Produk --> Create, Read, Update, Delete (CRUD)
Material --> Create, Read, Update, Delete (CRUD)
Supplier --> Create, Read, Update, Delete (CRUD)
Production Order --> Create, Read, Update, Delete (CRUD)
Inventory --> Create, Read, Update, Delete (CRUD)
File --> Create, Read, Update, Delete (CRUD)
Audit Log --> Read Only (Berdasarkan standar keamanan, log tidak boleh diubah atau dihapus agar integritas riwayat sistem tetap terjaga)
Actor : Production Staff

Produk --> Read Only
Material --> Read Only
Supplier --> No Access
Production Order --> Create, Read, Update (Dibatasi: hanya bisa mengubah yang belum di-approve/kewenangannya)
Inventory --> Read Only
File --> Create, Read (Upload dokumen produksi dan membaca dokumen terkait task-nya)
Audit Log --> No Access

Actor : Warehouse Staff

Produk --> Read
Material --> Create/Update
Supplier --> Read
Production Order --> Read
Inventory --> Create, Read, Update (Mencatat transaksi barang masuk/keluar. Delete umumnya tidak diperbolehkan, harus via mekanisme adjusment)
File --> Read/Uploud
Audit Log --> No Access

Actor : Supervisor

Produk --> Read Only
Material --> Read Only
Supplier --> Read Only
Production Order --> Read/Approve
Inventory --> Read, Update (Approval untuk adjustment material/inventory)
File --> Read Only
Audit Log --> Read Only (Dibatasi pada log operasional bawahannya / log transaksi)

Actor : Auditor

Produk --> Read Only
Material --> Read Only
Supplier --> Read Only
Production Order --> Read Only
Inventory --> Read Only
File --> Read Only
Audit Log --> Read Only (Memerlukan akses penuh untuk audit)

Actor : Guest

Produk --> Read
Material --> No Access
Supplier --> No Access
Production Order --> No Access
Inventory --> No Access
File --> No Access
Audit Log --> No Access

Actor : Attacker

Produk --> No Legetimate Access
Material --> No Legetimate Access
Supplier --> No Legetimate Access
Production Order --> No Legetimate Access
Inventory --> No Legetimate Access
File --> No Legetimate Access
Audit Log --> No Legetimate Access

# 6 Entry Points

1. Authentication

- POST /login
- POST /logout

INPUT :
-Username
-Password
-Session Infoemation

Security Concern :
-Authentication
-Credensial Protection
-Session Security
-Bruce Force Protection

2. Product management
   Get /Products
   Get /Products{id}
   Post /products
   PUT /products{id}
   DELETE /products/{id}

INPUT :
-product_code
-name
-description
-unit
-minimnum_stock
-status
-id

Security Concern :
-Input validation
-Sql Injection
-Cross-Site Scripting (XSS)
-Insecure Direct Object Reference (IDOR)
-Mass Assignment

3.  Material Management

        GET /materials
        GET /materials/{id}
        POST /materials
        PUT /materials/{id}
        DELETE /materials/{id}

    INPUT :

-material_code
-name
-description
-unit
-default_supplier_id
-status
-id

Security Concern :

-Input Validation
-SQL Injection
-XSS
-IDOR (Mengakses/mengubah material di luar kewenangan)
-Broken Access Control (Warehouse staff bisa create/update, dilarang delete)

4.  Supplier Management

        GET /suppliers
        GET /suppliers/{id}
        POST /suppliers
        PUT /suppliers/{id}
        DELETE /suppliers/{id}

    INPUT :

-supplier_code
-company_name
-contact_person
-contact_email
-contact_phone
-string_address
-id

Security Concern :

-Input Validation (Email & Phone format)
-SQL Injection
-Stored XSS (Menyematkan script pada kolom alamat/nama)
-IDOR
-Broken Access Control

5. Production Order Management
   POST /production-orders/{id}/approve

INPUT :

-order_number
-product_id
-quantity_planned
-start_date
-target_date
-status
-supervisor_notes
-id

Security Concern :

-Audit logging
-IDOR (Merubah order departemen/tim lain)
-Business Logic Flaw (Memanipulasi status dari "pending" langsung ke "completed" via Mass Assignment)

6. Inventory Management

-GET /inventory
-GET /inventory/history/{id}
-POST /inventory/transaction (In/Out)
-POST /inventory/adjustment
-PUT /inventory/adjustment/{id}/approve

INPUT :

-material_id
-transaction_type (IN/OUT/ADJUST)
-quantity_change
-reference_doc_id
-description_notes
-id

Security Concern :

Input Validation (Cegah kuantitas minus/huruf)
SQL Injection
Race Conditions (Dua staff submit transaksi bersamaan menyebabkan perhitungan stok kacau)
Broken Access Control (Warehouse mem-bypass persetujuan adjustment)
IDOR 7. Inventory transaction
GET /inventory-transactions
GET /inventory-transactions/{id}
POST /inventory-transactions
PUT /inventory-transactions/{id}/approve
INPUT :

material_id
transaction_type (IN/OUT/ADJUSTMENT)
quantity
document_reference
notes
id
Security Concern :

Input Validation (Validasi angka negatif atau huruf pada jumlah)
SQL Injection
Broken Access Control (Warehouse Staff mengubah transaksi tanpa approval)
Race Conditions / Concurrency (Masalah integritas jika dua user memproses barang yang sama di waktu bersamaan)
IDOR

8. File Upload
   Post /files/upload
   Get /files/{id}

input :

-

Security Concern :
-Authorization
-file type validation
-mime validation
-file size
-file name handling
-path traversal
-executable file upload
-information disclosure
-file upload scanning

9. Audit Logs

GET /audit-logs
GET /audit-logs/{id}

INPUT :

user_id_filter
action_filter
date_start
date_end
id
Security Concern :
-Authorization
-Information disclosure
-audit log integrity
