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

## Lưu ý (cập nhật lúc 14:44 ngày 16/11/2020):

-- Sau khi khi chạy composer install, chạy tiếp lệnh :
-- **composer require brian2694/laravel-toastr**

-   Chạy lệnh ở dưới đây để publish config của laravel-excel package
    > php artisan vendor:publish --provider="Maatwebsite\Excel\ExcelServiceProvider

--1. Để sửa lỗi thiếu bộ nhớ khi cài lệnh trên, vào Xampp Control Panel, chọn Config của Apache -> PHP.ini , thay giá trị của memory_limit = -1
[php.ini]
**; Maximum amount of memory a script may consume
; http://php.net/memory-limit
memory_limit= -1**

---

-   2. Chạy lệnh \*\* composer require spatie/laravel-newsletter để cài đặt package NewsLetter
-   Sau khi đã cài package, bổ sung 2 dòng vào cuối .env (tạm thời)
-   **MAILCHIMP_APIKEY=382c609f5e4fa85ef07cd4176bede4de-us2**
-   **MAILCHIMP_LIST_ID=fb224cafd9**
-   Chạy lệnh \*\*
    ** hoặc **php artisan config:cache** để .env nhận config mới
    -- Chạy **php artisan migrate\*\* để thực thi file migration 2020_11_10_080944_create_newsletter_table để tạo table newsletter trong Database vifland

## =>Tổng hợp chạy 2 lệnh kia nếu chưa chạy lần nào => composer install

-- **composer require maatwebsite/excel**

## Tài khoản nạp tiền

Ngân hàng	    NCB
Số thẻ	        9704198526191432198
Tên chủ thẻ	    NGUYEN VAN A
Ngày phát hành	07/15
Mật khẩu OTP	123456