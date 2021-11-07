<!doctype html>
<html lang="en-US">

<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <title>New Account Email Template</title>
    <meta name="description" content="New Account Email Template.">
    <style type="text/css">
        a:hover {
            text-decoration: underline !important;
        }
    </style>
</head>

<body marginheight="0" topmargin="0" marginwidth="0" style="margin: 0px; background-color: #f2f3f8;" leftmargin="0">
    <!-- 100% body table -->
    <table cellspacing="0" border="0" cellpadding="0" width="100%" bgcolor="#f2f3f8" style="@import url(https://fonts.googleapis.com/css?family=Rubik:300,400,500,700|Open+Sans:300,400,600,700); font-family: 'Open Sans', sans-serif;">
        <tr>
            <td>
                <table style="background-color: #f2f3f8; max-width:870px; margin:0 auto; text-align:left" width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                        <td style="height:80px;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td style="text-align:center;">
                            <!-- <a href="https://rakeshmandal.com" title="logo" target="_blank"> -->
                                <img width="50%" src="https://imsu.edu.ng/homepage/images/logo.png" title="logo" alt="logo">
                            <!-- </a> -->
                        </td>
                    </tr>
                    <tr>
                        <td style="height:20px;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td>
                            <table width="100%" border="0" align="left" cellpadding="0" cellspacing="0" style="padding-left:20px; max-width:870px; background:#fff; border-radius:3px; text-align:left;-webkit-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);-moz-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);box-shadow:0 6px 18px 0 rgba(0,0,0,.06);">
                                <tr>
                                    <td style="height:40px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="height:40px;" align="center">Basic Information</td>
                                </tr>
                                <tr>
                                    <td style="height:40px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="">Faculty: </label>
                                        <span>{{$faculty->name}}</span>
                                    </td>
                                    <td>
                                        <label for="">Department: </label>
                                        <span>{{$department->name}}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="height:40px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td> <label for="">Level: </label>
                                        <span>{{$student->level}}</span>
                                    </td>
                                    <td><label for="">Matric Number: </label>
                                        <span>{{$student->matric_number}}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="height:40px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td><label for="">First Name: </label>
                                        <span>{{ucwords($student->first_name)}}</span>
                                    </td>
                                    <td><label for="">Last Name: </label>
                                        <span>{{ucwords($student->last_name)}}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="height:40px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td><label for="">Email Address: </label>
                                        <span>{{$student->Email_Address}}</span>
                                    </td>
                                    <td><label for="">Email Address: </label>
                                        <span>{{$student->Email_Address}}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="height:40px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td><label for="">Phone Number: </label>
                                        <span>{{$student->Student_Mobile_Number}}</span>
                                    </td>
                                    <td><label for="">Date of Birth: </label>
                                        <span>{{$student->date_of_birth}}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="height:40px;">&nbsp;</td>
                                </tr>

                                <tr>
                                    <td><label for="">Gender: </label>
                                        <span>{{ucwords($student->gender)}}</span>
                                    </td>
                                    <td> <label for="">Blood Group: </label>
                                        <span>{{$student->blood_group}}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="height:40px;">&nbsp;</td>
                                </tr>

                                <tr>
                                    <td><label for="">Marital Status: </label>
                                        <span>{{ucwords($student->marital_status)}}</span>
                                    </td>
                                    <td>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="height:40px;">&nbsp;</td>
                                </tr>

                                <tr>
                                    <td colspan="2" style="height:40px;" align="center">Residential Information</td>
                                </tr>
                                <tr>
                                    <td style="height:40px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td><label for="">State of residence: </label>
                                        <span>{{$student->state_of_residence}}</span>
                                    </td>
                                    <td>
                                    <label for="">Country of Residence: </label>
                                        <span>{{ucwords($student->country_residence)}}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="height:40px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td> <label for="">LGA: </label>
                                        <span>{{$student->lga_of_residence}}</span>
                                    </td>
                                </tr>

                                <tr>
                                    <td style="height:40px;">&nbsp;</td>
                                </tr>

                                <tr>
                                    <td colspan="2" style="height:40px;" align="center">Origin</td>
                                </tr>
                                <tr>
                                    <td style="height:40px;">&nbsp;</td>
                                </tr>

                                <tr>
                                    <td> <label for="">Country: </label>
                                        <span>{{ucwords($student->nationality)}}</span>
                                    </td>
                                    <td><label for="">State of Origin: </label>
                                        <span>{{$student->state_of_origin}}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="height:40px;">&nbsp;</td>
                                </tr>

                                <tr>
                                    <td><label for="">LGA of Origin: </label>
                                        <span>{{$student->lga}}</span>
                                    </td>
                                    
                                </tr>
                                <tr>
                                    <td style="height:40px;">&nbsp;</td>
                                </tr>

                                

                                <tr>
                                    <td colspan="2" style="height:40px;" align="center">Father's Information</td>
                                </tr>
                                <tr>
                                    <td style="height:40px;">&nbsp;</td>
                                </tr>

                                <tr>
                                    <td><label for="">Full name: </label>
                                        <span>{{ucwords($student->fathers_name)}}</span>
                                    </td>
                                    <td><label for="">Residential Address: </label>
                                        <span>{{ucwords($student->fathers_address)}}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="height:40px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td><label for="">Phone number: </label>
                                        <span>{{$student->fathers_phone}}</span></td>
                                </tr>
                                <tr>
                                    <td style="height:40px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="height:40px;" align="center">Mother's Information</td>
                                </tr>
                                <tr>
                                    <td style="height:40px;">&nbsp;</td>
                                </tr>

                                <tr>
                                    <td> <label for="">Full name: </label>
                                        <span>{{ucwords($student->mothers_name)}}</span>
                                    </td>
                                    <td><label for="">Residential Address: </label>
                                        <span>{{$student->mothers_address}}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="height:40px;">&nbsp;</td>
                                </tr>

                                <tr>
                                    <td><label for="">Phone number: </label>
                                        <span>{{$student->mothers_phone}}</span>
                                    </td>
                                    
                                </tr>
                                <tr>
                                    <td style="height:40px;">&nbsp;</td>
                                </tr>
                               
                                <tr>
                                    <td colspan="2" style="height:40px;" align="center">Guardian's Information</td>
                                </tr>
                                <tr>
                                    <td style="height:40px;">&nbsp;</td>
                                </tr>

                                <tr>
                                    <td> <label for="">Full name: </label>
                                        <span>{{$student->guardians_name}}</span>
                                    </td>
                                    <td><label for="">Residential Address: </label>
                                        <span>{{$student->guardians_address}}</span>
                                    </td>
                                    
                                </tr>
                                <tr>
                                    <td style="height:40px;">&nbsp;</td>
                                </tr>

                                <tr>
                                    <td><label for="">Phone number: </label>
                                        <span>{{$student->guardians_phone}}</span>
                                    </td>
                                    <td><label for="">Relationship with student: </label>
                                        <span>{{$student->guardians_relationship}}</span>
                                    </td>
                                    
                                </tr>
                                <tr>
                                    <td style="height:40px;">&nbsp;</td>
                                </tr>
                                @if($student->sponsors_name !== null)
                                <tr>
                                    <td colspan="2" style="height:40px;" align="center">Sponsor's Information</td>
                                </tr>
                                <tr>
                                    <td style="height:40px;">&nbsp;</td>
                                </tr>

                                <tr>
                                    <td><label for="">Full name: </label>
                                        <span>{{$student->sponsors_name}}</span>
                                    </td>
                                    <td><label for="">Residential Address: </label>
                                        <span>{{$student->sponsors_address}}</span>
                                    </td>
                                    
                                </tr>
                                <tr>
                                    <td style="height:40px;">&nbsp;</td>
                                </tr>
                                

                                <tr>
                                    <td><label for="">Phone number: </label>
                                        <span>{{$student->sponsors_phone}}</span>
                                    </td>
                                    <td><label for="">Relationship with student: </label>
                                        <span>{{$student->sponsors_relationship}}</span>
                                    </td>
                                    
                                </tr>
                                <tr>
                                    <td style="height:40px;">&nbsp;</td>
                                </tr>
                                @endif
                                <tr>
                                    <td style="height:40px;">&nbsp;</td>
                                </tr>

                                <tr>
                                    <td colspan="2" style="height:40px;" align="center">Medical Information</td>
                                </tr>
                                <tr>
                                    <td style="height:40px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="gdlr-core-course-search-field gdlr-core-course-field-course-id">
                                            <div>{{$student->medical_info}}</div>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td style="height:40px;">&nbsp;</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    
                    <tr>
                        <td style="height:80px;">&nbsp;</td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
          <td class="drow" valign="top" align="center"
              style="background-color: #ffffff; box-sizing: border-box; font-size: 0px; text-align: center;">
              <!--[if (gte mso 9)|(IE)]><table width="100%" align="center" cellpadding="0" cellspacing="0" border="0"><tr><td valign="top"><![endif]-->
              <div class="layer_2"
                  style="max-width: 600px; display: inline-block; vertical-align: top; width: 100%;">
                  <table border="0" cellspacing="0" class="edcontent"
                      style="border-collapse: collapse;width:100%">
                      <tbody>
                          <tr>
                              <td valign="top" class="edtext"
                                  style="padding: 20px; text-align: left; color: #5f5f5f; font-size: 14px; font-family: Helvetica, Arial, sans-serif; word-break: break-word; direction: ltr; box-sizing: border-box;">
                                  <p class="text-center"
                                      style="text-align: center; margin: 0px; padding: 0px;">
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
          <td class="drow" valign="top" align="center"
              style="background-color: #ffffff; box-sizing: border-box; font-size: 0px; text-align: center;">
              <!--[if (gte mso 9)|(IE)]><table width="100%" align="center" cellpadding="0" cellspacing="0" border="0"><tr><td valign="top"><![endif]-->
              <div class="layer_2"
                  style="max-width: 600px; display: inline-block; vertical-align: top; width: 100%;">
                  <table border="0" cellspacing="0" cellpadding="0" class="edcontent"
                      style="border-collapse: collapse;width:100%">
                      <tbody>
                          <tr>
                              <td valign="top" class="edimg"
                                  style="padding: 0px; box-sizing: border-box; text-align: center;">
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
          <td class="drow" valign="top" align="center"
              style="background-color: #efefef; box-sizing: border-box; font-size: 0px; text-align: center;">
              <!--[if (gte mso 9)|(IE)]><table width="100%" align="center" cellpadding="0" cellspacing="0" border="0"><tr><td valign="top"><![endif]-->
              <div class="layer_2"
                  style="max-width: 600px; display: inline-block; vertical-align: top; width: 100%;">
                  <table border="0" cellspacing="0" class="edcontent"
                      style="border-collapse: collapse;width:100%">
                      <tbody>
                          <tr>
                              <td valign="top" class="edtext"
                                  style="padding: 20px; text-align: left; color: #5f5f5f; font-size: 14px; font-family: Helvetica, Arial, sans-serif; word-break: break-word; direction: ltr; box-sizing: border-box;">
                                  <p
                                      style="text-align: center; font-size: 15px; margin: 0px; padding: 0px;">
                                      Privacy policy
                                      <a href="https://imsu.edu.ng/privacy-policy"
                                          style="background-color: initial; font-size: 15px; color: #16c2d0; font-family: Helvetica, Arial, sans-serif; text-decoration: none;">click here</a>
                                      <!-- <br>{accountaddress} -->
                                  </p>
                                  <p
                                      style="text-align: center; font-size: 15px; margin: 0px; padding: 0px;">
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
    <!--/100% body table-->
</body>

</html>