<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta name="x-apple-disable-message-reformatting">
  <!--[if !mso]><!-->
	  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<!--<![endif]-->
  <title></title>
	<!--[if mso]>
	<style type="text/css">
    table {border-collapse:collapse;border:0;border-spacing:0;margin:0;}
    div, td {padding:0;}
    div {margin:0 !important;}
	</style>
  <noscript>
    <xml>
      <o:OfficeDocumentSettings>
        <o:PixelsPerInch>96</o:PixelsPerInch>
      </o:OfficeDocumentSettings>
    </xml>
  </noscript>
  <![endif]-->
  <style type="text/css">
    @media screen and (max-width: 350px) {
      .three-col .column {
        max-width: 100% !important;
      }
    }
    @media screen and (min-width: 351px) and (max-width: 460px) {
      .three-col .column {
        max-width: 50% !important;
      }
    }
    @media screen and (max-width: 460px) {
      .two-col .column {
        max-width: 100% !important;
      }
      .two-col img {
        width: 100% !important;
      }
    }
    @media screen and (min-width: 461px) {
      .three-col .column {
        max-width: 33.3% !important;
      }
      .two-col .column {
        max-width: 50% !important;
      }
      .sidebar .small {
        max-width: 16% !important;
      }
      .sidebar .large {
        max-width: 84% !important;
      }
      .logo {
        text-align: center;
        padding-top: 30px;
      }
    }
  </style>
</head>
<body style="margin:0;padding:0;word-spacing:normal;background-color:#ffffff;">
  <div role="article" aria-roledescription="email" lang="en" style="-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;background-color:#ffffff;">
    <div class="logo">
      <img src="https://chaai.qodeinteractive.com/wp-content/uploads/2021/10/chaai-home-2-logo1.png" width="150px">
    </div>
    <table role="presentation" style="width:100%;border:0;border-spacing:0;">
            <div class="spacer" style="line-height:24px;height:24px;mso-line-height-rule:exactly;">&nbsp;</div>

            <div class="two-col" style="text-align:center;font-size:0;direction:rtl;">
              <!--[if mso]>
              <table role="presentation" width="100%" dir="rtl">
              <tr>
              <td style="width:50%;padding:10px;" valign="middle" dir="ltr">
              <![endif]-->
              <div class="column" style="width:100%;max-width:330px;display:inline-block;vertical-align:middle;direction:ltr;">
                <div style="padding:10px;font-size:14px;line-height:18px;">
                  <p style="margin:0;font-family:Arial,sans-serif;">
                    <img src="https://assets.codepen.io/210284/two-column-02.png" width="310" alt="" style="display:block;width:310px;max-width:100%;height:auto;" />
                  </p>
                </div>
              </div>
              <!--[if mso]>
              </td>
              <td style="width:50%;padding:10px;" valign="middle" dir="ltr">
              <![endif]-->
              <div class="column" style="width:100%;max-width:330px;display:inline-block;vertical-align:middle;direction:ltr;">
                <div style="padding:10px;font-size:14px;line-height:18px;text-align:left;">
                    <h2>Xin chào {{$user->name}}</h2>
                    <p style="margin-top:0;margin-bottom:12px;font-family:Arial,sans-serif;font-weight:bold;">Cảm ơn bạn vì đã chọn ChaaiTea</p>
                    <p style="margin-top:0;margin-bottom:14px;font-family:Arial,sans-serif;">Đơn hàng của bạn đang được chúng mình chuẩn bị và sẽ chuyển đến bạn sớm nhất. Bạn có thể nhấn nút bên dưới để xem chi tiết về đơn hàng của mình nhé !!</p>
                    <p style="margin:0;font-family:Arial,sans-serif;"><a href="{{route('order.detail',['id' => $order->order_id])}}" style="background: #ffffff; border: 2px solid #8dc1d6; text-decoration: none; padding: 10px 25px; color: #000000; border-radius: 4px; display:inline-block; mso-padding-alt:0;text-underline-color:#ffffff"><!--[if mso]><i style="letter-spacing: 25px;mso-font-width:-100%;mso-text-raise:20pt">&nbsp;</i><![endif]--><span style="mso-text-raise:10pt;font-weight:bold;">Chi tiết đơn hàng</span><!--[if mso]><i style="letter-spacing: 25px;mso-font-width:-100%">&nbsp;</i><![endif]--></a></p>
                </div>
              </div>
              <!--[if mso]>
              </td>
              </tr>
              </table>
              <![endif]-->
            </div>
                <div style="padding:10px;font-size:12px;line-height:18px;">
                  <p style="margin:0;font-family:Arial,sans-serif; color:#7c7c7c">*** Vui lòng không reply mail này, mọi thắc mắc về sản phẩm, đơn hàng, account,... phiền bạn vui lòng gửi mail về  <a href="https://mail.google.com/mail/u/0/#inbox" style="color:#a16767;text-decoration:underline;"><strong>địa chỉ này</strong></a> để được chúng mình hỗ trợ sớm nhất nha. ***</p>
                </div>
              </div>
              <!--[if mso]>
              </td>
              </tr>
              </table>
              <![endif]-->
            </div>

            <div class="spacer" style="line-height:40px;height:40px;mso-line-height-rule:exactly;">&nbsp;</div>

          </div>
        </td>
      </tr>
    </table>
  </div>
</body>
</html>