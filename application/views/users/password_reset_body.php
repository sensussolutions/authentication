<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Password Reset</title>
</head>
<body style="margin: 0px; padding: 0px;">
<table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
    <tr>
        <td>
            <h4 style="color: #707070; padding: 0px; margin: 0px; margin-top: 15px;">Online reporting account</h4>
        </td>
    </tr>
    <tr>
        <td>
            <div style="margin: 0px; margin-top: 15px;" >
              <span style="color: #3672EC; padding: 0px; font-size: 20px;">
                  Password reset request
              </span>
            </div>
        </td>
    </tr>
    <tr>
        <td>
            <div style="margin-top: 20px;">
              <span style="color: #707070; font-size:15px; " >Please use this link to reset the password for the Online reporting account
                  <span style="color:#3672EC; "><?php echo $user_email; ?></span>.
              </span>
            </div>
        </td>
    </tr>
    <tr>
        <td>
            <div style="margin-top: 20px;">
              <span style="color: #707070; font-size:15px; " >Here is the link:
                  <span style="color:#3672EC; "> <a href="http://localhost/OnlineReporting/reset_password?verify=<?php echo $activation_key;?>">Click here</a></span>
              </span>
            </div>
        </td>
    </tr>
    <tr>
        <td>
            <div style="margin-top: 20px;">
                <span style="color:#707070; ">Thanks,</span>

            </div>
            <div style="margin-top: 5px;">
                <span style="color:#707070; ">The Online reporting account team.</span>
            </div>
        </td>
    </tr>
</table>
</body>
</html>
