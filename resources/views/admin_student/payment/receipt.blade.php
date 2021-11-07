<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <title>payment Recepit</title>
  <style>
    div.page_break+div.page_break {
      page-break-before: always;
    }

    tbody>td {

      border-bottom: 1px solid #ddd;

    }
  </style>
</head>

<body style="background-image:url('https://i.ibb.co/kc1bYks/baiust.gif'); background-repeat: no-repeat;background-size: cover;background-position: center;opacity:0.1;">
  <div>
    <table style="width:100%;">
      <td style="width:10%;">
        <img style="width:80px!important; height:60px!important;" src="https://i.ibb.co/FYVLhSY/logo.png" alt="logo">

      </td>
      <td style="width:90%; font-family: monospace; font-weight:590; text-align:center; font-size:19px;">
        BANGLADESH ARMY INTERNATIONAL UNIVERSITY OF SCIENCE AND TECHNOLOGY(BAIUST), COMILLA CANTONMENT
      </td>
    </table>
    <table style="width:100%; margin-top:-20px!important;">
      <td style="width:33.33%;"> </td>
      <td style="width:90%; font-family: monospace; font-weight:bold; text-align:center;">Fee's Payment Receipt</td>
      <td style="width:33.33%;">(Bank copy)</td>
    </table>
    <table style="width:100%;">
      <td style="width:45%">Student's Name: {{ $student->Full_Name }}</td>
      <td style="width:45%;">Registration For: {{ $semester }}</td>
    </table>
    <table style="width:100%;">
      <td style="width:45%;">Student ID: {{ $student->Registration_Number }} </td>
      <td style="width:45%; margin-left:40px!important;">Deparment: {{ $student->Program }}</td>
    </table>
    <table style="width:100%;">
      <td style="width:45%;">Level Term: {{ $levelTerm }} </td>
      <td style="width:45%; margin-left:40px!important;">Registration Type: @if($reg_type==1)
        {{ 'Regular/Term wise' }}@endif
      </td>
    </table>
    <table style="width:100%; border:2px solid black; ">
      <thead style="text-align:center;">
        <tr>
          <th>Description</th>
          <th>Taka</th>
        </tr>
      </thead>

      <tbody>
        @php $total1=0; @endphp
        @foreach($fees as $fee)
        <tr style="border:1px solid black!important;">
          <td>{{ $fee->fee_name }}</td>
          <td>{{ $fee->fee_amount }}/-</td>
        </tr>
        @php $total1=$total1+$fee->fee_amount; @endphp
        @endforeach
        <tr style="border:1px solid black;">
          <td>Credit Fee ({{ $credit_cost }}) for {{ $total_credit }} Credit hr</td>
          <td>{{ $credit_fee }}/-</td>
        </tr>
        <tr>
          <td style="text-align:center"><b>Total:</b></td>
          <td><b>{{ $total_sum }}/-</b></td>
        </tr>
      </tbody>
    </table>
    <br>
    In Words: {{ strtoupper($word) }} TAKA ONLY.
    <br>
    <br>
    <table>
      <tr>
        <td>Signature of Recipient<br> The Trust Bank Ltd</td>
        <td>Signature of Depositor<br>Name:<br>Date</td>
      </tr>
      <tr>
        <td>
          Account Name:BAIUST OPERATION
          <br>
          Account No: 000-0210033136 <br>
          <span style="font-size:8px;">BANGLADESH ARMY INTERNATIONAL UNIVERSITY OF SCIENCE AND TECHNOLOGY(BAIUST), COMILLA CANTONMENT</span>
        </td>
      </tr>
    </table>
  </div>

  <div style="page-break-inside:avoid;">
    <table style="width:100%;">
      <td style="width:10%;">
        <img style="width:80px!important; height:60px!important;" src="https://i.ibb.co/FYVLhSY/logo.png" alt="logo">

      </td>
      <td style="width:90%; font-family: monospace; font-weight:590; text-align:center; font-size:19px;">
        BANGLADESH ARMY INTERNATIONAL UNIVERSITY OF SCIENCE AND TECHNOLOGY(BAIUST), COMILLA CANTONMENT
      </td>
    </table>
    <table style="width:100%; margin-top:-20px!important;">
      <td style="width:33.33%;"> </td>
      <td style="width:90%; font-family: monospace; font-weight:bold; text-align:center;">Fee's Payment Receipt</td>
      <td style="width:33.33%;">(Student copy)</td>
    </table>
    <table style="width:100%;">
      <td style="width:45%">Student's Name: {{ $student->Full_Name }}</td>
      <td style="width:45%;">Registration For: {{ $semester }}</td>
    </table>
    <table style="width:100%;">
      <td style="width:45%;">Student ID: {{ $student->Registration_Number }} </td>
      <td style="width:45%; margin-left:40px!important;">Deparment: {{ $student->Program }}</td>
    </table>
    <table style="width:100%;">
      <td style="width:45%;">Level Term: {{ $levelTerm }} </td>
      <td style="width:45%; margin-left:40px!important;">Registration Type: @if($reg_type==1)
        {{ 'Regular/Term wise' }}@endif
      </td>
    </table>
    <table style="width:100%; border:2px solid black; ">
      <thead style="text-align:center;">
        <tr>
          <th>Description</th>
          <th>Taka</th>
        </tr>
      </thead>

      <tbody>
        @php $total1=0; @endphp
        @foreach($fees as $fee)
        <tr style="border:1px solid black!important;">
          <td>{{ $fee->fee_name }}</td>
          <td>{{ $fee->fee_amount }}/-</td>
        </tr>
        @php $total1=$total1+$fee->fee_amount; @endphp
        @endforeach
        <tr style="border:1px solid black;">
          <td>Credit Fee ({{ $credit_cost }}) for {{ $total_credit }} Credit hr</td>
          <td>{{ $credit_fee }}</td>
        </tr>
        <tr>
          <td style="text-align:center"><b>Total:</b></td>
          <td><b>{{ $total_sum }}/-</b></td>
        </tr>
      </tbody>
    </table>
    <br>
    In Words: {{ strtoupper($word) }} TAKA ONLY.
    <br>
    <br>
    <table>
      <tr>
        <td>Signature of Recipient<br> The Trust Bank Ltd</td>
        <td>Signature of Depositor<br>Name:<br>Date</td>
      </tr>
      <tr>
        <td>
          Account Name:BAIUST OPERATION
          <br>
          Account No: 000-0210033136 <br>
          <span style="font-size:8px;">BANGLADESH ARMY INTERNATIONAL UNIVERSITY OF SCIENCE AND TECHNOLOGY(BAIUST), COMILLA CANTONMENT</span>
        </td>
      </tr>
    </table>
  </div>

  <div style="page-break-inside:avoid;">
    <table style="width:100%;">
      <td style="width:10%;">
        <img style="width:80px!important; height:60px!important;" src="https://i.ibb.co/FYVLhSY/logo.png" alt="logo">

      </td>
      <td style="width:90%; font-family: monospace; font-weight:590; text-align:center; font-size:19px;">
        BANGLADESH ARMY INTERNATIONAL UNIVERSITY OF SCIENCE AND TECHNOLOGY(BAIUST), COMILLA CANTONMENT
      </td>
    </table>
    <table style="width:100%; margin-top:-20px!important;">
      <td style="width:33.33%;"> </td>
      <td style="width:90%; font-family: monospace; font-weight:bold; text-align:center;">Fee's Payment Receipt</td>
      <td style="width:33.33%;">(Account's copy)</td>
    </table>
    <table style="width:100%;">
      <td style="width:45%">Student's Name: {{ $student->Full_Name }}</td>
      <td style="width:45%;">Registration For: {{ $semester }}</td>
    </table>
    <table style="width:100%;">
      <td style="width:45%;">Student ID: {{ $student->Registration_Number }} </td>
      <td style="width:45%; margin-left:40px!important;">Deparment: {{ $student->Program }}</td>
    </table>
    <table style="width:100%;">
      <td style="width:45%;">Level Term: {{ $levelTerm }} </td>
      <td style="width:45%; margin-left:40px!important;">Registration Type: @if($reg_type==1)
        {{ 'Regular/Term wise' }}@endif
      </td>
    </table>
    <table style="width:100%; border:2px solid black; ">
      <thead style="text-align:center;">
        <tr>
          <th>Description</th>
          <th>Taka</th>
        </tr>
      </thead>

      <tbody>
        @php $total1=0; @endphp
        @foreach($fees as $fee)
        <tr style="border:1px solid black!important;">
          <td>{{ $fee->fee_name }}</td>
          <td>{{ $fee->fee_amount }}/-</td>
        </tr>
        @php $total1=$total1+$fee->fee_amount; @endphp
        @endforeach
        <tr style="border:1px solid black;">
          <td>Credit Fee ({{ $credit_cost }}) for {{ $total_credit }} Credit hr</td>
          <td>{{ $credit_fee }}</td>
        </tr>
        <tr>
          <td style="text-align:center"><b>Total:</b></td>
          <td><b>{{ $total_sum }}/-</b></td>
        </tr>
      </tbody>
    </table>
    <br>
    In Words: {{ strtoupper($word) }} TAKA ONLY.
    <br>
    <br>
    <table>
      <tr>
        <td>Signature of Recipient<br> The Trust Bank Ltd</td>
        <td>Signature of Depositor<br>Name:<br>Date</td>
      </tr>
      <tr>
        <td>
          Account Name:BAIUST OPERATION
          <br>
          Account No: 000-0210033136 <br>
          <span style="font-size:8px;">BANGLADESH ARMY INTERNATIONAL UNIVERSITY OF SCIENCE AND TECHNOLOGY(BAIUST), COMILLA CANTONMENT</span>
        </td>
      </tr>
    </table>
  </div>
</body>

</html>