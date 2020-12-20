<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    {{-- <title>For Edu or Org Design</title> --}}

    <style>
    @media screen and (max-width: 600px) {
        .remove-flex-mobile {
            display: block !important;
        }

        .remove-flex-basis-mobile {
            flex-basis: unset !important;
            padding-left: 0 !important;
        }

        .list-header {
            padding-top: 20px !important;
        }

        .main-list-item {
            width: unset !important;
            display: block !important;
            margin-right: 0 !important;
            margin-bottom: 50px !important;
        }

        .navigation-footer {
            text-align: center !important;
        }

        .navigation-footer li {
            display: list-item !important;
            padding: 10px 0 !important;
        }

        .social-media img {
            width: 30px !important;
        }

        .social-media a {
            padding: 0 5px 0 0 !important;
        }

        .social-media a:last-of-type {
            padding-right: 0 !important;
        }

        .quick-reminder {
            margin-top: 10px !important;
        }
    }
    </style>
</head>

<body style="margin:0;">
    <table style="border: none; margin: 0 auto ; padding: 0;">
        <tr>
            <td style="padding: 0; background-color: #FFFFFF;">

                <div
                    style="max-width: 600px; min-width: 200px; font-family: sans-serif; font-size: 16px; background-color: #FFFFFF; line-height: 1.4; color: #4A4A4A; border: 1px solid #DFDFDF; border-radius: 10px; overflow: hidden;">

                    <div style="background-color: #0185D0; height: 60px;"></div>

                    <div
                        style="background: url('image-assets/img-4.jpg') #F5F5F5 no-repeat; background-size: cover; width: 90%; margin: 20px auto;">

                        <div
                            style="background: rgba(255, 255, 255, .8); padding: 30px; text-align: center; border-radius: 10px;">
                            <h1
                                style="font-size: 30px; color:#0185D0; margin:0; padding-bottom:10px;border-radius: 10px; text-transform: uppercase; ">
                                TIN TỨC BẤT ĐỘNG SẢN </h1>
                            <p style="margin: 0;">Xin chào {{$nguoinhan}},</p>
                            <h2 style="font-size: 24px; padding: 20px; text-align: center; color:#0185D0;">Những thông
                                tin về bất động sản ngày <br>{{$date}}</h2>
                        </div>

                    </div>



                    <table style="border-collapse:collapse; margin: 0 20px;">
                        <tbody style="vertical-align: top;"></tbody>
                    </table>

                    <div>
                        <ul style="padding: 0 20px;">
                            @foreach ($products as $item)
                            <li style="list-style-type: none; padding-bottom: 70px;">
                                <div style="flex-basis: 70%;" class="remove-flex-basis-mobile">
                                    <img src="{{ $message->embed(public_path() . '/assets/product/detail/'.$item->thumbnail) }}"
                                        alt="" style="display:block,width:100%">
                                </div>
                                <div class="remove-flex-mobile" style="display:flex; justify-content:space-between;">
                                    {{-- img --}}
                                </div>

                                <div style="padding-left: 30px; flex-basis: 100%; width: 100%;"
                                    class="remove-flex-basis-mobile">

                                    <h4 style="font-size: 20px; margin-top: 0; margin-bottom: 10px;"
                                        class="list-header">{{$item->title}}</h4>
                                    <a href="vifland.com/article/{{$item->slug}}"
                                        style="text-decoration: none; text-transform: capitalize; cursor: pointer; line-height: 1.1em; letter-spacing: 0; padding: 12px; background: #0185D0; color: #FFFFFF; border-radius: 5px; text-align: center; font-size: 16px; font-weight: bold; box-sizing: border-box;">Đọc
                                        thêm</a>
                                </div>
                    </div>
                    </li>
                    @endforeach
                    </ul>
                </div>


            </td>
        </tr>
    </table>
</body>

</html>