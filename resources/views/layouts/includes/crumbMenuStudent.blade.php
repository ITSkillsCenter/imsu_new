<div class="page-header">
    <h4 class="page-title">{{$pageTitle ?? ' '}}</h4>
    <ul class="breadcrumbs">
      <li class="nav-home">
        <a href="/student-home">
          <i class="flaticon-home"></i>
        </a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="{{$pageLink ?? '#'}}">{{$pageTitle ?? ' '}}</a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="#">{{$Title ?? ' '}}</a>
      </li>
    </ul>
  </div>