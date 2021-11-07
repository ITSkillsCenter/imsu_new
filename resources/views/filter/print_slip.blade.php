<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>


  <link href="{{ URL::asset('assets/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{ URL::asset('assets/css/responsive.dataTables.min.css')}}" rel="stylesheet">
  <link href="{{ URL::asset('assets/css/buttons.bootstrap.min.css')}}" rel="stylesheet">
</head>

<body>

  <style>
    @media print {

        @page
        {
          size: A4;
          size: portrait;
        }

        /** Setting margins */       
        @page { margin: 2cm }
        /* Or: */
        @page :left {
        margin: 1cm;
        }
        @page :right {
        margin: 1cm;
        }
        /* The first page of a print can be manipulated as well */
        @page :first {
        margin: 1cm 2cm;
        }
        /* Your styles here */
        header,
        footer,
        aside,
        nav,
        form,
        iframe,
        .menu,
        .hero,
        .adslot {
          display: none !important;
        }

        /* print.css */
        * {
          background-image: none !important;
        }


        img.print,
        svg.print {
          display: block;
          max-width: 100%;
        }

        .slips {
          width: 25%;
          display: inline-block;
          text-align: left;
              border: 2px solid black;
        border-radius: 6px;
        margin: 10px;
        }
        h4{text-align: center;}
        table {
            width: 95%;
            margin: 0 auto;
        }
    }



     table {
                border-collapse: collapse;
            }
            th {
                background-color:green;
                Color:white;
            }
            th, td {
                width:150px;
                text-align:center;
                padding:5px 0px;
              
            }

    table {
        margin: 0 auto;
        width: 95%;
    }


    header,
    footer,
    aside,
    nav,
    form,
    iframe,
    .menu,
    .hero,
    .adslot {
      display: none !important;
    }

    /* print.css */
    * {
      background-image: none !important;
    }
    h4 {
        text-align: center;
        padding: 0;
        margin: 10px 0px;
    }
    hr {
        border: 2px solid #3db166;
    }

    img.print,
    svg.print {
      display: block;
      max-width: 100%;
    }

    .slips {
      width: 47%;
      display: inline-block;
      text-align: left;
          border: 2px solid #3db166;
    border-radius: 6px;
    margin: 10px;
    }
    h4{text-align: center;}
    p {
        font-size: 10pt;
        text-align: center;
        font-weight: bold;
    }
  </style>

  <div class="right_col" role="main">
    <div class="">
      <div class="clearfix"></div>
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <h2 style="text-align:center;">Students information of Department of {{ $dept->name }}
            </h2>
            <div class="x_title"></div>
            <div class="x_content">

              <div class="row">


                @if(count($students)>0)
                @foreach($students as $student)
                <div class="slips" style="width:45%;">
                  <div style="text-align:center;">
                  <img src="{{URL::asset('homepage/images/logo.png')}}" alt="" />
                   <h4 style=" font-size: 19pt;">Registration Slip</h4>
                   </div>
                 <hr/>
                  <table id="datatable-buttons" class="table table-striped table-bordered">
                    <tbody>
                      <tr>
                          <table>
                         <tr>
                        <td><b>Full Name:</b> {{$student->first_name}} {{$student->last_name}} </td>
                      </tr>
                      <tr>
                        <td><b>Matric Number :</b> {{$student->matric_number}}</td>
                      </tr>
                       <!-- <tr><td><b>Password : </b> {{$student->temp_password }}</td></tr> -->
                      <tr>
                        <td><b>Faculty:</b> {{$faculty->name}}</td>
                      </tr>
                      <tr>
                        <td><b>Department:</b> {{$dept->name}}</td>
                      </tr>
                      <tr>
                        <td><b>Admission Year:</b> {{$student->Batch}}</td>
                      </tr>
                      <tr>
                        <td><b>State:</b> {{$student->state_of_origin}}</td>
                      </tr>
                      <tr>
                        <td><b>LGA:</b> {{$student->lga}}</td>
                      </tr>
                          </table>
                        </td>
                      </tr>
                     
                    </tbody>
                  </table>
                  <p>**Proceed to the Portal and Complete Registration - https://imsu.edu.ng</p>
                </div>
                @endforeach
                @endif

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <script src="{{ URL::asset('assets/js/jquery.dataTables.min.js')}}"></script>
  <script src="{{ URL::asset('assets/js/dataTables.bootstrap.min.js')}}"></script>
  <script src="{{ URL::asset('assets/js/dataTables.responsive.min.js')}}"></script>
  <script src="{{ URL::asset('assets/js/dataTables.buttons.min.js')}}"></script>
  <script src="{{ URL::asset('assets/js/buttons.bootstrap.min.js')}}"></script>
  <script src="{{ URL::asset('assets/js/buttons.flash.min.js')}}"></script>
  <script src="{{ URL::asset('assets/js/buttons.html5.min.js')}}"></script>
  <script src="{{ URL::asset('assets/js/buttons.print.min.js')}}"></script>
  <script src="{{ URL::asset('assets/js/jszip.min.js')}}"></script>
  <script src="{{ URL::asset('assets/js/pdfmake.min.js')}}"></script>
  <script src="{{ URL::asset('assets/js/vfs_fonts.js')}}"></script>
  <script src="{{ URL::asset('assets/js/select2.full.min.js')}}"></script>

  <script>
    window.addEventListener('load', function () {
         window.print();
        window.onafterprint = back;

        function back() {
            window.history.back();
        }
    })
   

    </script>

</body>

</html>