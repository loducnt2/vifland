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
## Lưu ý (cập nhật lúc 8 giờ sáng ngày 10/11/2020): 
-- Sau khi khi chạy composer install, chạy tiếp lệnh : 
-- **composer require brian2694/laravel-toastr** 

Để sửa lỗi thiếu bộ nhớ khi cài lệnh trên, vào Xampp Control Panel, chọn Config của Apache -> PHP.ini , thay giá trị của memory_limit = -1 
[php.ini]
**; Maximum amount of memory a script may consume
; http://php.net/memory-limit
memory_limit= -1**
