<html>

<body
  style="background-color:#e2e1e0;font-family: Open Sans, sans-serif;font-size:100%;font-weight:400;line-height:1.4;color:#000;">
  <table
    style="max-width:670px;margin:50px auto 10px;background-color:#fff;padding:50px;-webkit-border-radius:3px;-moz-border-radius:3px;border-radius:3px;-webkit-box-shadow:0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24);-moz-box-shadow:0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24);box-shadow:0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24); border-top: solid 10px green;">
    <thead>
      <tr>
        <th style="text-align:left;"><img style="max-width: 150px;"
            src="https://imsu.edu.ng/homepage/images/logo.png" alt="IMSU"></th>
        <th style="text-align:right;font-weight:400;">{{date("F d, Y ")}}</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td style="height:35px;"></td>
      </tr>
      <tr>
        <td colspan="2" style="border: solid 1px #ddd; padding:10px 20px;">
          <p style="font-size:14px;margin:0 0 6px 0;"><span
              style="font-weight:bold;display:inline-block;min-width:150px">Status</span><b
              style="color:green;font-weight:normal;margin:0">
              @if($details['status'] == null)
               Success
               @else
                {{$details['status']}}
               @endif
              </b></p>
          <p style="font-size:14px;margin:0 0 6px 0;"><span
              style="font-weight:bold;display:inline-block;min-width:146px">Transaction ID</span>
            {{$details['reference_id']}}</p>
          <p style="font-size:14px;margin:0 0 0 0;"><span
              style="font-weight:bold;display:inline-block;min-width:146px">Amount</span>
            ₦{{number_format($details['amount'], 2)}}</p>
        </td>
      </tr>
      <tr>
        <td style="height:35px;"></td>
      </tr>
      <tr>
        <td style="width:50%;padding:20px;vertical-align:top">
          <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span
              style="display:block;font-weight:bold;font-size:13px">Name</span> {{$details['name']}}</p>
          <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span
              style="display:block;font-weight:bold;font-size:13px;">Email</span> {{$details['email']}}</p>
        </td>
        <td style="width:50%;padding:20px;vertical-align:top">
          <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span
              style="display:block;font-weight:bold;font-size:13px;">Matric No.</span> {{$details['matric']}}</p>
          <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span
              style="display:block;font-weight:bold;font-size:13px;">Phone</span> {{$details['phone']}}</p>
        </td>
      </tr>
      <tr>
        <td colspan="2" style="font-size:20px;padding:30px 15px 0 15px;">Items</td>
      </tr>
      <tr>
        <td colspan="2" style="padding:15px;">
          <p style="font-size:14px;margin:0;padding:10px;border:solid 1px #ddd;font-weight:bold;">
            <span style="display:block;font-size:13px;font-weight:normal;">{{$details['item']}}</span>
            ₦{{number_format($details['amount'], 2)}}<b style="font-size:12px;font-weight:300;"> </b>
          </p>
        </td>
      </tr>
      
    </tbody>
    <tfooter>
      <tr>
        <td colspan="2" style="font-size:14px;padding:50px 15px 0 15px;">
          <strong style="display:block;margin:0 0 10px 0;">Regards</strong>Imo State University, Owerri<br><br>
          For any clarification and question, send an email to the address below<br>
          <b>Email:</b> info@imsu.edu.ng
        </td>
      </tr>
    </tfooter>
    <tr>
      <td colspan="2" class="drow" valign="top" align="center"
        style="background-color: #ffffff; box-sizing: border-box; font-size: 0px; text-align: center;">
        <!--[if (gte mso 9)|(IE)]><table width="100%" align="center" cellpadding="0" cellspacing="0" border="0"><tr><td valign="top"><![endif]-->
        <div class="layer_2" style="max-width: 600px; display: inline-block; vertical-align: top; width: 100%;">
          <table border="0" cellspacing="0" class="edcontent" style="border-collapse: collapse;width:100%">
            <tbody>
              <tr>
                <td valign="top" class="edtext"
                  style="padding: 20px; text-align: left; color: #5f5f5f; font-size: 14px; font-family: Helvetica, Arial, sans-serif; word-break: break-word; direction: ltr; box-sizing: border-box;">
                  <p class="text-center" style="text-align: center; margin: 0px; padding: 0px;">
                    Address:&nbsp;
                    <span style="text-align: left;">•&nbsp;</span>Okigwe Rd, Ugwu Orji, Owerri2&nbsp;•&nbsp;Nigeria
                  </p>
                  <p class="text-center" style="text-align: center; margin: 0px; padding: 0px;">
                    Phone Number :&nbsp;
                    <span style="text-align: left;">•&nbsp;</span> +234-705-8694328, +234-705-8693121
                  </p>

                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <!--[if (gte mso 9)|(IE)]></td></tr></table><![endif]-->
      </td>
    </tr>
    <tr>
      <td colspan="2" class="drow" valign="top" align="center"
        style="background-color: #ffffff; box-sizing: border-box; font-size: 0px; text-align: center;">
        <!--[if (gte mso 9)|(IE)]><table width="100%" align="center" cellpadding="0" cellspacing="0" border="0"><tr><td valign="top"><![endif]-->
        <div class="layer_2" style="max-width: 600px; display: inline-block; vertical-align: top; width: 100%;">
          <table border="0" cellspacing="0" cellpadding="0" class="edcontent"
            style="border-collapse: collapse;width:100%">
            <tbody>
              <tr>
                <td valign="top" class="edimg" style="padding: 0px; box-sizing: border-box; text-align: center;">
                  <!-- <img src="https://api.elasticemail.com/userfile/12301ee9-d04b-4adb-84db-0e43666eaa22/geometric_footer1.png"
                                      alt="Image" width="587"
                                      style="border-width: 0px; border-style: none; max-width: 587px; width: 100%;"> -->
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <!--[if (gte mso 9)|(IE)]></td></tr></table><![endif]-->
      </td>
    </tr>
    <tr>
      <td colspan="2" class="drow" valign="top" align="center"
        style="background-color: #efefef; box-sizing: border-box; font-size: 0px; text-align: center;">
        <!--[if (gte mso 9)|(IE)]><table width="100%" align="center" cellpadding="0" cellspacing="0" border="0"><tr><td valign="top"><![endif]-->
        <div class="layer_2" style="max-width: 600px; display: inline-block; vertical-align: top; width: 100%;">
          <table border="0" cellspacing="0" class="edcontent" style="border-collapse: collapse;width:100%">
            <tbody>
              <tr>
                <td valign="top" class="edtext"
                  style="padding: 20px; text-align: left; color: #5f5f5f; font-size: 14px; font-family: Helvetica, Arial, sans-serif; word-break: break-word; direction: ltr; box-sizing: border-box;">
                  <p style="text-align: center; font-size: 15px; margin: 0px; padding: 0px;">
                    Privacy policy
                    <a href="https://imsu.edu.ng/privacy-policy"
                      style="background-color: initial; font-size: 15px; color: #16c2d0; font-family: Helvetica, Arial, sans-serif; text-decoration: none;">click
                      here</a>
                    <!-- <br>{accountaddress} -->
                  </p>
                  <p style="text-align: center; font-size: 15px; margin: 0px; padding: 0px;">
                    If you no longer wish to receive mail from us, you can
                    <a href="https://imsu.edu.ng/unsubscribe/i2712"
                      style="background-color: initial; font-size: 15px; color: #16c2d0; font-family: Helvetica, Arial, sans-serif; text-decoration: none;">Unsubscribe</a>
                    <!-- <br>{accountaddress} -->
                  </p>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <!--[if (gte mso 9)|(IE)]></td></tr></table><![endif]-->
      </td>
    </tr>
  </table>
  
</body>

</html>