<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en-GB">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>Discount Email</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <style type="text/css">
        a[x-apple-data-detectors] {
            color: inherit !important;
        }
    </style>

</head>
<body style="margin: 0; padding: 0; font-family:Helvetica Neue,  Helvetica;">
<table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <td style="padding: 20px 0 30px 0;">

            <table align="center" border="0" cellpadding="0" cellspacing="0" width="600"
                   style="border-collapse: collapse; border: 1px solid #cccccc;">
             @include('layouts.MailLayout._header')
                @yield('mailContent')
                <tr>
                    <td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;">
                        <table border="0" cellpadding="0" cellspacing="0" width="100%"
                               style="border-collapse: collapse;">

                            <tr>
                                <td style="color: #153643; font-size: 16px; line-height: 24px; padding: 20px 20px 30px 20px;">
                                    <p style="margin: 0;">
                                        To avail this offer, just go click on our <a
                                            href="https://www.facebook.com/fhgroupofcompany/posts/158804109372416"
                                            target="_blank"
                                            style="text-decoration: none;">Facebook</a> page where you will see a
                                        Promo
                                        Code. Copy and paste this code on our <a href="http://fhgroupoc.com/"
                                                                                 style="text-decoration: none;">Website</a>
                                        with Company Code mentioned above.</br>It’s our way of saying: Happy New Year!
                                        Wishing you all the best.
                                    </p></br>
                                    <p style="margin: 0;">
                                        PS: You know how busy it gets this time of year which means, we can’t offer this
                                        discount after January….so be sure to hit “reply” right away and avail of this
                                        fabulous offer sent your way.
                                    </p>
                                </td>
                            </tr>

                        </table>
                    </td>
                </tr>
             @include('layouts.MailLayout._footer')

            </table>

        </td>
    </tr>
</table>
</body>
</html>

