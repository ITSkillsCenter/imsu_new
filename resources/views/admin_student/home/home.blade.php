@extends('admin_student.master')

@section('title')
Student||Home
@endsection

@section('main')
    <div class="row mt-3">
        <div class="col-md-12">
            <div id="accordion">
                <div class="card">
                    <div class="card-header bg-white" id="headingOne">
                      <h5 class="mb-0 text-info">
                        Student Service Contact Numbers  
                        <button class="btn btn-outline-info btn-md float-right" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                          view
                        </button>
                      </h5>
                    </div>
                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                      <div class="card-body">
                        <table class="table table-responsive">
                            <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">সেবাসমূহের নাম</th>
                          <th scope="col">সেবা প্রদানের সময়সীমা</th>
                          <th scope="col">দায়িত্বপ্রাপ্ত কর্মকর্তা (নাম, মোবাইল নাম্বার , ইমেইল)</th>
                        </tr>
                      </thead>
                            <tbody>
                        <tr>
                          <th scope="row">১</th>
                          <td>প্রশংসাপ্ত্র ও চারিত্রিক সনদ প্রদান </td>
                          <td>০১ কর্ম দিবস</td>
                          <td>মোঃ নাইমুল হক , এডমিশন অফিসার, মোবাইলঃ ০১৭৫৬৪৩৬৬৫৫</td>
                        </tr>
                        <tr>
                          <th scope="row">২</th>
                          <td>ভর্তি/ রেজিস্ট্রেশন বাতিল </td>
                          <td>০৭ দিন (উপাচার্যের অনুমোদন সাপেক্ষে ) </td>
                          <td>মোঃ নাইমুল হক , এডমিশন অফিসার, মোবাইলঃ ০১৭৫৬৪৩৬৬৫৫</td>
                        </tr>
                        <tr>
                          <th scope="row">৩</th>
                          <td>বোর্ড বৃত্তির আবেদন</td>
                          <td>শিক্ষাবোর্ড কর্তৃক বৃত্তি প্রদান সাপেক্ষে </td>
                          <td>মোঃ নাইমুল হক , এডমিশন অফিসার, মোবাইলঃ ০১৭৫৬৪৩৬৬৫৫</td>
                        </tr>
                        <tr>
                          <th scope="row">৪</th>
                          <td>ছাত্রছাত্রীদের সকল ধরনের ফি জমাদান সংক্রান্ত তথ্যবলী</td>
                          <td>০১  কর্ম দিবস </td>
                          <td>বায়েজীদ আরাফাত ,ক্যাশিয়ার,মোবাইলঃ ০১৮১২৯৪১৮৪৪ </td>
                        </tr>
                        <tr>
                          <th scope="row">৫</th>
                          <td>হোস্টেল ফি জমাদান সংক্রান্ত </td>
                          <td>-</td>
                          <td>ইব্রাহিম খলিল,হিসাবরক্ষক ,মোবাইলঃ ০১৭১৮৭৬২২৭,01873762275 </td>
                        </tr>
                        <tr>
                          <th scope="row">৬</th>
                          <td> সেমিষ্টার ফি, র্টাম রিপিট ফি,টার্ম উইথড্রয়াল, রেফার্ড, ব্যাকলগ ফি, ইম্প্ররুভমেন্ট ইত্যাদি।</td>
                          <td>০১  কর্ম দিবস </td>
                          <td>ইকবাল মাহমুদ চৌধুরী,হিসাবরক্ষক,মোবাইলঃ ০১৭৩১০৬৬৩৩৭ </td>
                        </tr>
                        <tr>
                          <th scope="row">৭</th>
                          <td>প্রভিশনাল সার্টফিকেট/ মূল ট্রান্সক্রিপ্ট </td>
                          <td>০২ কর্ম দিবসের মধ্যে</td>
                          <td>মোঃ শামসুল আরেফিন,শাখা কর্মকর্তা ।মোবাইলঃ ০১৩১৮৩৯০৬২৫ 
                        </td>
                        </tr>
                        <tr>
                          <th scope="row">৮</th>
                          <td>MoI(Medium of Instruction), Minimum CGPA Certificate.</td>
                           <td>০২ কর্ম দিবসের মধ্যে</td>
                          <td>সঞ্জয় কুমার সাহা, শাখা কর্মকর্তা ।( সি এস ই , ইইই, এবং ল বিভাগ)মোবাইলঃ ০১৩১৮৩৯০৬৩০ ইমেইলঃ  sanjoy.kumar@gmail.com</td>
                        </tr>
                        <tr>
                          <th scope="row">৯</th>
                          <td>MoI(Medium of Instruction), Minimum CGPA Certificate.</td>
                          <td>০২ কর্ম দিবসের মধ্যে</td>
                          <td>মোঃ শামসুল আরেফিন,শাখা কর্মকর্তা ।(বিবিএ, ইংরেজি এবং সিভিল বিভাগ)মোবাইলঃ ০১৩১৮৩৯০৬২৫ ইমেইলঃ  arifin@baiust.edu.bd</td>
                        </tr>
                        <tr>
                          <th scope="row">১০</th>
                          <td>আনফিসিয়াল ট্রন্সক্রিপ্ট  </td> 
                          <td>০৩ কর্ম দিবসের মধ্যে </td>
                          <td>মোঃ শামসুল আরেফিন,শাখা কর্মকর্তা ।(বিবিএ, ইংরেজি এবং সিভিল বিভাগ)মোবাইলঃ ০১৩১৮৩৯০৬২৫ ইমেইলঃ  arifin@baiust.edu.bd
                          <br>
                          সঞ্জয় কুমার সাহা, শাখা কর্মকর্তা ।( সি এস ই , ইইই, এবং ল বিভাগ)মোবাইলঃ ০১৩১৮৩৯০৬৩০ ইমেইলঃ  sanjoy.kumar@gmail.com
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">11</th>
                          <td>For CGPA Inquiry Please Email.</td>
                          <td></td>
                          <td>Email: dy_coe@baiust.edu.bd</td>
                        </tr>
                      </tbody>
                        </table>
                      </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingTwo">
                      <h5 class="mb-0 text-primary">
                        Semester Events
                        <button class="btn btn-outline-primary btn-md float-right" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                          view
                        </button>
                      </h5>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                  <th>Event</th>
                                  <th>Starts</th>
                                  <th>Ends</th>
                                </thead>
                                <tbody>
                                  @foreach ($events as $item)
                                      <tr>
                                        <td>{{ $item->type->title }}</td>
                                        <td>{{ \Carbon\Carbon::parse($item->starts)->format('d M Y') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($item->ends)->format('d M Y') }}</td>
                                      </tr>
                                  @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                 </div>
                <div class="card">
                    <div class="card-header" id="headingThree">
                      <h5 class="mb-0 text-success">
                        My Classes on: {{ \Carbon\Carbon::now()->format('d M Y') }}
                        <button class="btn btn-outline-success float-right" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                          view
                        </button>
                      </h5>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                      <div class="card-body table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <th>Course Code</th>
                                <th>Course Title</th>
                                <th>Section</th>
                                <th>Faculty</th>
                                <th>Faculty Email</th>
                                <th>Date & Time</th>
                                <th>Details</th>
                            </thead>
                            <tbody>
                                @foreach($classes as $item)
                                    @php
                                        $date = \Carbon\Carbon::parse($item->date_time);
                                    @endphp
                                    @if($date->isToday())
                                        <tr>
                                            <td>{{ $item->course->course_code }}</td>
                                            <td>{{ $item->course->course_name }}</td>
                                            <td>{{ $item->section }}</td>
                                            <td>{{ $item->faculty->name }}</td>
                                            <td>{{ $item->faculty->email }}</td>
                                            <td>{{ $date }}</td>
                                            <td>
                                                <a href="{{ $item->link }}">Join Class</a> <br>
                                                <span>Meeting ID: {{ $item->meeting_id }}</span> <br>
                                                <span>Meeting Password: {{ $item->meeting_password }}</span>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                      </div>
                    </div>
                 </div>
            </div>
        </div>
    </div>
@endsection