
<!DOCTYPE html>
<html>

<head>
    <title>{{ $mailData['title'] }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body
    style="font-family: Arial, sans-serif; font-size: 16px; line-height: 1.5; margin: 0; padding: 0; background-color: #f2f2f2;">
    <table border="0" cellpadding="0" cellspacing="0" width="100%"
        style="background-color: #ffffff; border-collapse: collapse;">
        <tr>
            <td align="center" style="padding: 40px 0;">
                <img src="https://instantdr.klickwash.net/admin/asset/images/logo.svg" alt="Logo" width="150"
                    height="auto" style="display: block;">
            </td>
        </tr>
        <tr>
            <td style="padding: 20px;">
                <p style="margin-bottom: 20px;">Dear {{ $mailData['doctor_name'] }},</p>
                <p style="margin-bottom: 20px;">Customer Name: {{$mailData['customer_name']}}</p>
                <p style="margin-bottom: 20px;">Appoinment time: {{$mailData['time']}}</p>
                <p style="margin-bottom: 20px;">Appoinment date: {{$mailData['date']}}</p>
                
               
            </td>
        </tr>
        <tr>
            <td align="center" style="padding: 40px 0;">
                <p style="margin-bottom: 20px;">Thanks,</p>
                <p style="margin-bottom: 0;">Instant Dr</p>
            </td>
        </tr>
    </table>
</body>

</html>
