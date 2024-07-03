<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html
    style="-moz-osx-font-smoothing: grayscale; -webkit-font-smoothing: antialiased; background-color: #464646; margin: 0; padding: 0;">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="format-detection" content="telephone=no">
    <title>Phone Hospital Email Templates: Generic Template</title>

</head>
<body bgcolor="#d7d7d7" class="generic-template"
      style="-moz-osx-font-smoothing: grayscale; -webkit-font-smoothing: antialiased; background-color: #d7d7d7; margin: 0; padding: 0;">
<!-- Header Start -->
<div class="bg-white header" bgcolor="#ffffff" style="background-color: white; width: 100%;">
    <table align="center" bgcolor="#ffffff"
           style="border-left: 10px solid white; border-right: 10px solid white; max-width: 600px; width: 100%;">
        <tr height="80">
            <td align="left" class="vertical-align-middle"
                style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: middle;">
                <a href="https://phonehospital.com.tr" target="_blank"
                   style="-webkit-text-decoration-color: #F16522; color: #F16522; text-decoration: none; text-decoration-color: #F16522;">
                    <img src="{{asset('Saasio')}}/assets/img/logo.png" alt="Phone Hospital"
                           style="width:150px;border: 0; font-size: 0; margin: 0; max-width: 100%; padding: 0;">
                </a>
            </td>
        </tr>
    </table>
</div>
<!-- Header End -->

<!-- Content Start -->
<table cellpadding="0" cellspacing="0" cols="1" bgcolor="#d7d7d7" align="center" style="max-width: 600px;">
    <tr bgcolor="#d7d7d7">
        <td height="50"
            style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;"></td>
    </tr>

    <!-- This encapsulation is required to ensure correct rendering on Windows 10 Mail app. -->
    <tr bgcolor="#d7d7d7">
        <td style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
            <!-- Seperator Start -->
            <table cellpadding="0" cellspacing="0" cols="1" bgcolor="#d7d7d7" align="center"
                   style="max-width: 600px; width: 100%;">
                <tr bgcolor="#d7d7d7">
                    <td height="30"
                        style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;"></td>
                </tr>
            </table>
            <!-- Seperator End -->

            <!-- Generic Pod Left Aligned with Price breakdown Start -->
            <table align="center" cellpadding="0" cellspacing="0" cols="3" bgcolor="white" class="bordered-left-right"
                   style="border-left: 10px solid #d7d7d7; border-right: 10px solid #d7d7d7; max-width: 600px; width: 100%;">
                <tr height="50">
                    <td colspan="3"
                        style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;"></td>
                </tr>
                <tr align="center">
                    <td width="36"
                        style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;"></td>
                    <td class="text-primary"
                        style="color: #F16522; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                        <?php if($request['MdStatus'] == 1){ ?>

                        <img src="{{asset('icon/ok.png')}}" alt="Phone Hospital"
                             width="50" style="border: 0; font-size: 0; margin: 0; max-width: 100%; padding: 0;">
                        <?php }else{ ?>

                        <img src="{{asset('icon/failure.png')}}" alt="Phone Hospital"
                             width="50" style="border: 0; font-size: 0; margin: 0; max-width: 100%; padding: 0;">
                        <?php } ?>
                    </td>
                    <td width="36"
                        style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;"></td>
                </tr>
                <tr height="17">
                    <td colspan="3"
                        style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;"></td>
                </tr>
                <tr align="center">
                    <td width="36"  style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;"></td>
                    <td class="text-primary"
                        style="color: #F16522; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                       <?php if($request['MdStatus'] == 1){ ?>
                        <h1 style="color: #F16522; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 30px; font-weight: 700; line-height: 34px; margin-bottom: 0; margin-top: 0;">
                            Odeme Basarili</h1>
                        <?php }else{ ?>
                        <h1 style="color: #F16522; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 30px; font-weight: 700; line-height: 34px; margin-bottom: 0; margin-top: 0;">
                            Odeme Basarisiz</h1>
                        <?php } ?>

                    </td>
                    <td width="36"
                        style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;"></td>
                </tr>
                <tr height="30">
                    <td colspan="3"
                        style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;"></td>
                </tr>
                <tr align="left">
                    <td width="36"
                        style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;"></td>
                    <td style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                        <p style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 22px; margin: 0;">
                            Merhabalar {{$order->customer->firstname??'Bulunamadi'}} {{$order->customer->lastname??'Bulunamadi'}},
                        </p>
                    </td>
                    <td width="36"
                        style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;"></td>
                </tr>
                <tr height="10">
                    <td colspan="3"
                        style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;"></td>
                </tr>
                <tr align="left">
                    <td width="36"
                        style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;"></td>
                    <td style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                        <p style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 22px; margin: 0;">
                            {{$request['BankResponseMessage']}}!</p>
                        <br>
                        <p style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 22px; margin: 0; ">
                            <strong>Odeme Detayi:</strong><br/>

                            Tutar: {{$order->price??0}} TL <br/>
                            Siparis No: {{$request['OrderId']}}.<br/></p>
                        <br>
                    </td>
                    <td width="36"
                        style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;"></td>
                </tr>
                <tr height="30">
                    <td style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;"></td>
                    <td style="border-bottom: 1px solid #D3D1D1; color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;"></td>
                    <td style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;"></td>
                </tr>
                <tr height="30">
                    <td colspan="3"
                        style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;"></td>
                </tr>
                <tr align="center">
                    <td width="36"
                        style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;"></td>
                    <td style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">

                        <p style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 22px; margin: 0;">
                            Siparis Tarihi: {{$order->created_at??date('d-m-Y H:i:s')}}</p>
                        <p style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 22px; margin: 0;"></p>
                    </td>
                    <td width="36"
                        style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;"></td>
                </tr>

                <tr height="50">
                    <td colspan="3"
                        style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;"></td>
                </tr>

            </table>
            <!-- Generic Pod Left Aligned with Price breakdown End -->

            <!-- Seperator Start -->
            <table cellpadding="0" cellspacing="0" cols="1" bgcolor="#d7d7d7" align="center"
                   style="max-width: 600px; width: 100%;">
                <tr bgcolor="#d7d7d7">
                    <td height="50"
                        style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;"></td>
                </tr>
            </table>
            <!-- Seperator End -->

        </td>
    </tr>
</table>
<!-- Content End -->

<!-- Footer Start -->
<div class="bg-gray-dark footer" bgcolor="#464646" height="165" style="background-color: #464646; width: 100%;">
    <table align="center" bgcolor="#464646" style="max-width: 600px; width: 100%;">

        <tr height="15">
            <td style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;"></td>
        </tr>

        <tr>
            <td align="center"
                style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                <img src="{{asset('Saasio')}}/assets/img/logo.png" alt="Phone Hospital"
                     style="width:150px; border: 0; font-size: 0; margin: 0; max-width: 100%; padding: 0;">
            </td>
        </tr>

        <tr height="2">
            <td style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;"></td>
        </tr>

        <tr>
            <td align="center"
                style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;">
                <p class="text-white"
                   style="color: white; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 22px; margin: 0;">
                    Copyright © Phone Hospital. All rights reserved.</p>
                <p class="text-primary"
                   style="color: #F16522; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 22px; margin: 0;">
                </p>
            </td>
        </tr>

        <tr height="15">
            <td style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;"></td>
        </tr>


        <tr height="10">
            <td style="color: #464646; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 16px; vertical-align: top;"></td>
        </tr>

    </table>
</div>
<!-- Footer End -->
</body>
</html>
