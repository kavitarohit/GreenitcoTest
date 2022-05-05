<!-- start page content wrapper-->
<div class="page-content-wrapper">
  <!-- start page content-->
  <div class="page-content">

    <!--start breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
      <div class="breadcrumb-title pe-3">Dashboard</div>
      <div class="ps-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0 p-0 align-items-center">
            <li class="breadcrumb-item"><a href="javascript:;">
                <ion-icon name="home-outline"></ion-icon>
              </a>
            </li>
            <!-- <li class="breadcrumb-item active" aria-current="page">eCommerce</li> -->
          </ol>
        </nav>
      </div>
  
    </div>
    <!--end breadcrumb-->



    <div class="card radius-10 w-100">
      <div class="card-body">
        <div class="d-flex align-items-center">
          <h6 class="mb-0">Employee Details</h6>
        </div>
        <div class="table-responsive mt-2">
          <table class="table align-middle mb-0">
            <thead class="table-light">
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Login Time</th>
                <th>Logout Time</th>
                <th>Break Time</th>
                <th>Total Work Time</th>
              </tr>
            </thead>
            <tbody>
              @if(isset($arrTimeDetails))
              @foreach($arrTimeDetails as $key=>$row)
              <tr>
                <td>{{$key+1}}</td>
                <td>{{$row['get_user_name']['name']}}</td>
                <td>{{$row['login_time']}} </td>
                <td>{{$row['logout_time']}} </td>
                <td>{{$row['totalBreakTime']}} </td>
                <td>{{$row['totalWorkTime']}} </td>
              </tr>
              @endforeach
              @endif
            </tbody>
          </table>
        </div>
      </div>
    </div>
    
  </div>
  <!-- end page content-->
</div>
<!--end page content wrapper-->


    