<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <style>
    .img-body #img {
        width: 100%;
        height: 100%;
    }

    .img-body #img img {
        width: 100%;
        height: 100%;
        max-width: 100%;
        object-fit: cover;
    }

    .img-body li+li {
        margin-top: 15px !important;
        border-top: thin solid #ccc;
        padding-top: 25px !important;
    }

    @media screen and (max-width: 600px) {
        .remove-flex-mobile {
            display: block !important;
        }

        .remove-flex-basis-mobile {
            flex-basis: unset !important;
            padding-left: 0 !important;
            width: 100%;
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

                <div class="img-body"
                    style="max-width: 600px; min-width: 200px; font-family: sans-serif; font-size: 16px; background-color: #FFFFFF; line-height: 1.4; color: #4A4A4A; border: 1px solid #DFDFDF; border-radius: 10px; overflow: hidden;border-radius:10px">

                    <div style="background-color: #124480; height: 30px;"></div>
                    <div
                        style="background: url(https://images.pexels.com/photos/1662159/pexels-photo-1662159.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500) #F5F5F5 no-repeat; background-size: cover; width: auto; padding: 15px; ">

                        <div style="text-align: center; border-radius: 10px;">
                            <h1
                                style="font-size: 25px; color:#ab843a;font-weight:bold; margin:0; padding-bottom:10px;border-radius: 10px; text-transform: uppercase; ">
                                TIN TỨC BẤT ĐỘNG SẢN </h1>
                            <p style="margin: 0;">Xin chào {{$nguoinhan}},</p>
                            <h2 style="font-size: 24px; text-align: center; color:#124480; padding:0px 15px">Những thông
                                tin về bất động sản ngày <br>{{$date}}</h2>
                        </div>

                    </div>

                    <table style="border-collapse:collapse; margin: 0 20px;">
                        <tbody style="vertical-align: top;"></tbody>
                    </table>
                    <div>
                        <ul style="padding:15px;margin:0">
                            @foreach ($products as $item)
                            <li style="list-style-type: none; padding-bottom: 15px; margin:0">
                                <div style="flex-basis: 70%;" class="remove-flex-basis-mobile" id="img">
                                    @if(!empty($item->thumbnail))
                                    {{-- nếu ảnh = null --}}
                                    <?php $thumbnail = $item->thumbnail ?>
                                    @else
                                    <?php
                                    //  <?php
                                    $thumbnail = "default.png";
                                    ?>

                                    @endif
                                    <img src="{{ $message->embed(public_path() . '/assets/product/detail/'.$thumbnail) }}"
                                        alt=""
                                        style="display:block;max-width:100%;width:100%;object-fit:cover;height:100%">
                                </div>
                                <div style="flex-basis: 100%; width: 100%;text-align:center"
                                    class="remove-flex-basis-mobile">

                                    <h4 style="font-size: 16px;font-weight:bold; margin:10px 0px;" class="list-header">
                                        {{$item->title}}</h4>

                                    <a href="vifland.com/article/{{$item->slug}}"
                                        style="text-decoration: none; text-transform: capitalize; cursor: pointer; line-height: 1.1em; letter-spacing: 0; padding: 8px 15px; background:#124480; color: #FFFFFF; border-radius: 5px; text-align: center; font-size: 16px; font-weight: bold; box-sizing: border-box;">Xem
                                        thêm
                                    </a>
                                </div>
                            </li>
                            @endforeach
                        </ul>

                    </div>
                </div>

                </div>


            </td>
        </tr>
    </table>
</body>

</html>