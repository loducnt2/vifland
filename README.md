##

-- Sau khi clone code về chạy các lệnh sau:

-   composer install
-   npm install
-   npm run dev

##

-- Copy + Paste file .env.example thành .env

-   tải db về : https://docs.google.com/spreadsheets/d/1OERZGeZw_B-G4J1Bb3wzeJ2zg5rNbbV_qlxEf4DiKAQ/edit?fbclid=IwAR0zuOsSNvcaqMzbMS2gAYvzlQRYEUBOv9h8hq_n7wxA3CjuCvSgfsv0UAs#gid=895171359
-   mở file .env đổi tên database tại dòng DB_DATABASE=
-   chạy lệnh php artisan key:generate

##
## 

php artisan migrate
( nếu tải database mới thì k cần chạy migrate )
-- php artisan serve

##

-- Trước khi push code lên github:

-   git add .
-   git commit -m 'comment'
-   git git pull

## Trang admin : /admin/index

username : admin
pass : 1
## Lưu ý (cập nhật lúc 16:00 ngày 11/11/2020): 
-- Sau khi khi chạy composer install, chạy tiếp lệnh : 
-- **composer require brian2694/laravel-toastr** 

--1. Để sửa lỗi thiếu bộ nhớ khi cài lệnh trên, vào Xampp Control Panel, chọn Config của Apache -> PHP.ini , thay giá trị của memory_limit = -1 
[php.ini]
**; Maximum amount of memory a script may consume
; http://php.net/memory-limit
memory_limit= -1**
-- -------------------------------------------------------------------------------------------
- 2. Chạy lệnh ** composer require spatie/laravel-newsletter để cài đặt package NewsLetter
- Sau khi đã cài package, bổ sung 2 dòng vào cuối .env (chính thức) 
- **MAILCHIMP_APIKEY=dfbb49bddc54a110d726feb3731286c9-us2**
- **MAILCHIMP_LIST_ID=1917eb0f36**
- Chạy lệnh **php artisan config:clear** hoặc **php artisan config:cache** để .env nhận config mới
-- Chạy **php artisan migrate** để thực thi file migration 2020_11_10_080944_create_newsletter_table để tạo table newsletter trong Database vifland

