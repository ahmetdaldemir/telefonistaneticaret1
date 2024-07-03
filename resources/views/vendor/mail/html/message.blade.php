<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f6f6f6;
            margin: 0;
            padding: 0;
        }
        .email-container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border: 1px solid #dddddd;
        }
        .email-header {
            background-color: #ffffff;
            color: #ffffff;
            padding: 20px;
            text-align: center;
            border-bottom: 1px solid #ccc;
        }
        .email-header h1 {
            margin: 0;
            font-size: 24px;
        }
        .email-body {
            padding: 20px;
            color: #333333;
        }
        .email-body h2 {
            font-size: 20px;
            margin-top: 0;
        }
        .email-footer {
            background-color: #f6f6f6;
            padding: 10px;
            text-align: center;
            font-size: 12px;
            color: #999999;
        }
        .email-footer a {
            color: #007bff;
            text-decoration: none;
        }
    </style>
</head>
<body>
<table class="email-container">
    <tr>
        <td class="email-header" style="    padding: 5px;">
            <img src="https://eticaret.phonehospital.com.tr/storage/setting/1714316310.png" class="img-fluid"  style="    width: 150px;float: left;">
        </td>
    </tr>
    <tr>
        <td class="email-body">
            {!! $slot !!}

            @isset($subcopy)
                {!! $subcopy !!}
            @endisset
        </td>
    </tr>
    <tr>
        <td class="email-footer">
            @isset($footer)
                {!! $footer !!}
            @else
                © {{ date('Y') }} {{ config('app.name') }}. Tüm hakları saklıdır.
            @endisset
        </td>
    </tr>
</table>
</body>
</html>
