<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mailing Feedback</title>
</head>
<body>
<table border="0" cellpadding="0" cellspacing="0" width="100%" style="background: #ffffff; height: 311px; margin: 0 auto; max-width: 629px;">
    <tr>
        <td>
            <table border="0" cellspacing="0" cellpadding="0" width="100%" style="border: 1px solid #e8e8e8; box-shadow: 0px 8px 26px 0px rgba(0, 0, 0, .12); font-family: arial; margin: 0 auto; max-width: 518px;">
                <thead style="background: #ffffff;">
                <tr style="width: 100%; background-color:#9ba4a1;">
                    <td style="border-bottom: 1px solid #9ba4a1 ; height: 63px; padding: 6px 4px 4px 4px; text-align: center;">
                        <div style="width: 100px; height: 100px; background-color: #ffffff; margin: auto; padding: 19px 0; box-sizing: border-box;">
                            <img src="https://store-qp.s3.amazonaws.com/company/mailing-assets/img/hrlatam-logo.png" alt="" height="63px" style="line-height: 63px;">
                        </div>
                    </td>
                </tr>
                <tr style="width: 100%; background-color:#fc8619;">
                    <td style="height: 4px; border-bottom: 1px solid #fc8619;"></td>
                </tr>
                <tr style="width: 100%; background-color:#8fd342;">
                    <td style="height: 4px; border-bottom: 1px solid #8fd342;"></td>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>
                        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="background-color: #ffffff; height: 246px; padding: 10px 30px;">
                            <tbody>
                            <tr>
                                <br>
                                <br>
                                <td style="color: #2f302f; font-size: 14px; font-weight: bold;">Hola, {{$name}}</td>
                                <td style="color: #818181; font-size: 11px; padding: 0px; text-align: right;">
                                    <img src="https://store-qp.s3.amazonaws.com/company/mailing-assets/img/calendar.png" alt="" style="height: 9px ;vertical-align: middle; width: 9px;">
                                    <span style="vertical-align: middle; padding-right: 7px;">{{$date}}</span>
                                    <img src="https://store-qp.s3.amazonaws.com/company/mailing-assets/img/clock.png" alt="" style="height: 9px ;vertical-align: middle; width: 9px;">
                                    <span style="vertical-align: middle;">{{$time}}</span>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" style="color: #9fa69f; font-size: 13px; text-align: left;">
													<span style="display: block; margin-bottom: 10px;">Usted a sido seleccionado para un proceso de evaluación de
														sus compañeros y autoevaluación.</span>
                                    <span style="display: block; margin-bottom: 10px;">Ingrese a este link: <a href="https://hrlatam.com/" style="color: #2972e2; text-decoration: none;">http://hrlatam.georelax.com</a>.</span>
                                    <span style="display: block; margin-bottom: 10px;">Resuelva todas las preguntas</span>
                                    <span style="display: block; margin-bottom: 10px;"><label style="font-weight: bold; color: #2f302f;">Usuario:</label> {{$user}}</span>
                                    <span style="display: block; margin-bottom: 10px;"><label style="font-weight: bold; color: #2f302f;">Contraseña:</label> {{$password}}</span>
                                    <span style="color: #2f302f; display: block; margin-bottom: 10px; font-weight: bold;">Gracias</span>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3" style="text-align: center;">
                                    <br>
                                    <br>
                                    <a href="http://feedbackinn.com" style="text-decoration:none;">
                                        <span style="color: #818181; display: block; font-size: 9px; text-align: center; vertical-align: bottom;">Powered by HR Latam © 2017</span>
                                    </a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
</table>
</body>
</html>