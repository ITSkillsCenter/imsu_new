@extends('admin_student.master')
@section('title')
Student||Payment
@endsection
@section('main')
  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          
          <div class="col-sm-12">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
      
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                  <a class="nav-item nav-link  btn btn-outline-success" href="#">Go Back <span class="sr-only">(current)</span></a>&nbsp;&nbsp;
                  
                </div>
              </div>
            </nav>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
          <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title">Payment Details</h3>
              </div>
              <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-default">
                            <div class="card-header">
                              <h3 class="card-title">Total Paid</h3>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped table-responsive">
                                  <thead>
                                    <tr>
                                      <th>Date</th>
                                      <th>Semester</th>
                                      <th>Level Term</th>
                                      <th>Total Payable</th>
                                      <th>Paid</th>
                                      <th>Registration type</th>
                                      <th>Payment Status</th>
                                      <th>Due </th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    @php $paid=0 @endphp
                                    @foreach($fees as $fee)
                                    <tr>
                                      <td>{{ $fee->date }}</td>
                                      <td>{{ $fee->semester }}</td>
                                      <td>{{ $fee->levelTerm }}</td>
                                      <td>{{ $fee->total_payable }}</td>
                                      <td>{{ $fee->paid }}/-</td>
                                      
                                      <td>
                                          <?php
                                          if($fee->reg_type ==1){
                                            echo '<b class="badge label-success"> Regular/ Term wise</b>';
                                          }elseif($fee->reg_type == 2){
                                            echo '<b class="badge label-danger"> Term Repeat</b>';
                                          }elseif($fee->reg_type == 3){
                                            echo '<b class="badge label-info"> Retake</b>';
                                          }else if($fee->reg_type == 4){
                                             echo '<b class="badge label-danger"> Improvment</b>';
                                          }
                                        ?>
                                      </td>
                                      <td>
                                          <?php
                                          if($fee->payment_type =='Paid'){
                                            echo '<b class="badge label-success"> Paid</b>';
                                          }elseif($fee->payment_type == 'due'){
                                            echo '<b class="badge label-danger"> Due</b>';
                                          }elseif($fee->payment_type == 'Partial'){
                                            echo '<b class="badge label-danger"> Partial </b>';
                                          }
                                        ?>
                                      </td>
                                      <td>{{ $fee->due }}/-</td>
                                    </tr>
                                    @php $paid=$paid+$fee->paid @endphp
                                    @endforeach
                                    <tr>
                                      <td colspan="4">Total Paid:</td>
                                      <td>{{ $paid }}/-</td> 
                                    </tr>
                                  </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    
                </div>
                     
              </div>
              <!-- /.card-body -->
             <div class="card-footer text-center">
                
             </div>
            </div>
            <!-- /.card -->
     </section>
@endsection

