@extends('layouts.master')


@section('content')

    <div class="page-inner">
     @include('layouts.includes.crumbMenu',['pageTitle'=>'Import Student','Title'=>'Student'])
      <div class="row">
        <div class="col-md-12">
          @include('homepage.flash_message')
          <div class="card">
            <div class="card-header">
              <div class="card-title"> All Students information upload using file.</div>
            </div>
            <form class="" method="POST" enctype="multipart/form-data">
              @csrf
            <div class="card-body">
              <div class="row">
                <div class="col-md-6 col-lg-4">
                 
                  <div class="form-group">
                    <label for="exampleFormControlFile1">Select a csv file to upload</label>
                    {{-- <input type="file" class="form-control-file" id="exampleFormControlFile1"> --}}
                    <input type="file" id="file" required="required" class="form-control has-feedback-left" required name="csv_file">
                    <i class="fa fa-file-image-o form-control-feedback left" aria-hidden="true"></i>
                    <span id="msg_file" class="text-danger">{{ $errors->first('file') }}</span>
                      <br/>
                     <a href="/docs/sample_students.csv"><u>Download Sample CSV</u></a>
                  </div>
                 
                   
                </div>

              
              </div>
            </div>
            <div class="card-action">
              <button class="btn btn-success" type="submit">Submit</button>
              <a href="{{url('admin/home')}}" class="btn btn-danger">Back</a>
              <a href="/admin/studentinfo/create" class="btn btn-primary">Add Student Manually</a>
            </div>
            </form>
          </div>
        </div>
      </div>
   
 
</div>
@endsection
