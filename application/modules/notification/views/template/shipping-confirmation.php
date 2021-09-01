<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body style="background:#f6f6f6; padding: 15px 0;" leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" offset="0">
    <div style="width:500px;margin: 20px auto;font-family: Helvetica Neue, Helvetica, Arial,sans-serif;background:#ffffff; padding: 10px;">
        <table width="100%" style="background:#f1f1f1;border-spacing:0;border-collapse:collapse;">
            <tbody>
                <tr>
                    <td style="text-align:center;padding:20px 0; background: #FFF;">
                        <a href="<?php echo site_url(); ?>" style="text-decoration:none">
                            <img src="<?php echo base_url(); ?>assets/logo.png" width="25%">
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
        <table width="100%" style="border-spacing:0;border-collapse:collapse; margin: 2px auto 15px;">
            <tbody>
                <tr>
                    <td colspan="2" style="font-size:15px; text-align:center; color: #777;padding: 30px 50px 0">
                        <h5>Thank you for your order!</h5>
                        <br>
                        Hi, <?php echo $customer_name; ?><br>
                        Your order is on its way! We hope you are excited as we are.<br>
                        <?php if($shipping_method): ?>
                            <h5 style="margin-bottom: 2px !important;">Shipping Method : <?php echo $shipping_method; ?></h5>
                        <?php endif; ?>
                        <h5>Resi : <?php echo $orders_resi; ?></h5>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="font-size:12px; padding: 30px 50px 0; text-align:center; color: #777;">
                        This email is sent automatically. Please do not send any replies to this email.
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <p style="width:500px;margin: 15px auto 10px;font-family:Helvetica Neue, Helvetica, Arial,sans-serif;font-size:12px;text-align:center;padding:3px 0;">&copy; <?php echo date('Y'); ?> Alacapa.com</p>
</body>
</html>