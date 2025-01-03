@extends('layouts.master')
@section('content')
    <!-- HOME -->
    <section class="section-hero overlay inner-page bg-image" style="background-image: url({{ url('images/hero_1.jpg')}})" id="home-section">
      <div class="container">
        <div class="row">
          <div class="col-md-7">
            <h1 class="text-white font-weight-bold">Chọn hình thức ứng tuyển</h1>
            <div class="custom-breadcrumbs">
              <a href="#">Home</a> <span class="mx-2 slash">/</span>
              <span class="text-white"><strong>Chọn hình thức ứng tuyển</strong></span>
            </div>
          </div>
        </div>
      </div>
    </section>

    
    <section class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-5 mb-5">
            <strong>Bạn muốn nộp hồ sơ vào vị trí <span class="text-danger">"{{$news->nganh}}"</span></strong>
            <hr>
            <span class="icon-data_usage mr-2"></span>Vui lòng chọn 1 trong 3 cách dưới đây:</br>

            <h3>Cách 1: <a href="{{ route('apply',$news->id) }}"><button class="btn btn-danger"><span class="icon-file mr-2"></span>Tạo hồ sơ mới</button></a> </h3>
            <span class="icon-hand-o-right mr-2"></span>Lưu ý: Hồ sơ sẽ đến tay nhà tuyển dụng sau khi <span class="text-danger">được duyệt</span>.
            <h3>Cách 2: chọn mẫu hồ sơ</h3>            
            <span class="icon-hand-o-right mr-2"></span>Lưu ý: Nếu mẫu hồ sơ <span class="text-danger">đang chờ duyệt</span> sẽ đến tay nhà tuyển dụng sau khi được duyệt.
            <h3>Cách 3: copy mẫu hồ sơ</h3>             
          
            <div class="border p-3 round" style="background-color: lavender; margin-top: 15px;">
                Bạn gặp khó khăn?</br> Liên hệ hotline hỗ trợ Người tim việc:</br>
              Giờ hành chính: miền Bắc (028) 5407 0399, miền Nam (093) 8922 315 hoặc liên hệ tới email <strong>{{config('mail.username')}}</strong>
            </div>             
          </div>

          <div class="col-lg-7 mb-5">
            <h2 class="mb-4 text-center"><span class="icon-file-text-o mr-2"></span>Hồ sơ của bạn (Có {{$profiles->total()}} mẫu)</h2>
            @if(!empty($profiles->toArray()))
            <form class="p-5 border rounded" method="get" 
            action="{{ url('/nguoitimviec/nop-ho-so') }}">
            	@if(session('error'))
    					<div class="alert alert-danger alert-dismissible fade show">
    					  <button type="button" class="close" data-dismiss="alert">&times;</button>
    					  {{session('error')}}
    					</div>            		
            	@endif
				
            	@foreach($profiles as $profile)
            	<div class="p-4 border rounded">
            		<h4><input type="radio" name="profile" value="{{$profile->id}}"> {{$profile->nganh}}</h4>					
      				  @if($profile->ad_pheduyet == 1)
                <span class="badge badge-success">Hồ sơ đã được duyệt</span> 
                @else 
                <span class="badge badge-danger">Hồ sơ chưa được duyệt</span> 
                @endif

                - <a data-toggle="modal" data-target="#viewModal{{$profile->id}}" href="javascript:void(0)"><strong>Xem hồ sơ</strong></a> 
      					-	<label for="lname">Ngày cập nhật: {{date('d/m/Y',strtotime($profile->updated_at))}}</label>              
            	</div> 

              
            	@endforeach
            <div style="margin-top: 20px;">
            @include('layouts.paginating',['job_listings' => $profiles])    
            </div>
				      <input type="hidden" value="{{$news->id}}" name="ttd_id">
            	<button name="filed" value="filed" class="btn btn-primary"><span class="icon-check mr-2"></span>Nộp hồ sơ</button>
              <button name="copy" value="copy" class="btn btn-dark"><span class="icon-content_copy mr-2"></span>Copy hồ sơ</button>
            </form>
            @endif                         
                  
          </div>  
          
                                         
        </div>

      </div>
    </section>

    @foreach($profiles as $profile)
<div class="modal fade" id="viewModal{{$profile->id}}" tabindex="-1">
      <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">          
          <div class="row">
          <div class="col-lg-4 mr-auto">
            <div class="border p-3 rounded">
              <ul class="list-unstyled block__47528 mb-0">
                <li><span class="active"><h3>{{$profile->nganh}}</h3></span></li>
                <li>Họ & tên: <a href="#">{{$profile->hoten}}</a></li>
                <li>Giới tính: <a href="#">{{$profile->gioitinh}}</a></li>
                <li>Ngày sinh: <a href="#">{{date('d/m/Y',strtotime($profile->ngaysinh))}}</a></li>
                <li>Email: <a href="#">{{$profile->emaillienhe}}</a></li>
                <li>SDT liên hệ: <a href="#">{{$profile->sdtlienhe}}</a></li>
                <li>Khu vực: <a href="#">{{$profile->khuvuc}}</a></li>
                <li>Hôn nhân: <a href="#">{{$profile->honnhan}}</a></li>
                <li>Hình thức làm việc mong muốn: <a href="#">{{$profile->hinhthuc_lv}}</a></li>
                <li>Mức lương mong muốn: <a href="#">{{$profile->mucluongmm}}</a></li>
                <li>Bằng cấp: <a href="#">{{$profile->bangcap}}</a></li>
                <li>Cấp bậc: <a href="#">{{$profile->capbac}}</a></li>
                <li>Kinh Nghiệm: <a href="#">{{$profile->kinhnghiem}}</a></li>              
                <li><span class="text-info">Trạng thái: </span>
                  <a href="#">
                  @if($profile->congkhai == 1) <span class="badge badge-info">Công khai</span>
                  @else <span class="badge badge-danger">Chưa công khai</span>
                  @endif
                  </a>
                </li>
                @if($profile->ad_pheduyet == 1)
                <li><span class="text-danger">Lượt xem: {{$profile->luotxem}}</span></li>
                @endif
              </ul>
            </div>

            <div class="border p-4 rounded">
            <h3>Kĩ năng</h3>
            @foreach(json_decode($profile->kinang) as $kinang)
            <div><span class="icon-hand-o-right"> {{$kinang}}</span></div>
            @endforeach
            </div>
            @if($profile->ngoaingu)
            <div class="border p-4 rounded">
            <h3>Ngoại ngữ</h3>
            @foreach(json_decode($profile->ngoaingu) as $ngoaingu)
            <div><span class="icon-language mx-2"> {{$ngoaingu}}</span></div>
            @endforeach
            </div>
            @endif
            @if($profile->tinhoc)
            <div class="border p-4 rounded">
            <h3>Tin học</h3>
            @foreach(json_decode($profile->tinhoc) as $tinhoc)
            <div><span class="icon-caret-right mr-2"> {{$tinhoc}}</span></div>
            @endforeach
            </div>
            @endif
          </div>
          <div class="col-lg-8">
            <span class="text-primary d-block mb-5">
              <span class="icon-search display-1"></span>
              <span class="icon-star display-1"></span>
              <span class="icon-files-o display-1"></span>
              <span class="icon-file-text-o display-1"></span>
              <span class="icon-file-text display-1"></span>
              <span class="icon-file display-1"></span>
              <span class="icon-file-word-o display-1"></span>
              <span class="icon-insert_drive_file display-1"></span>
            </span>
            @if($profile->hinh)
            <img src="{{asset('hinhdaidien/'.$profile->hinh)}}" alt="{{$profile->hinh}}" style="width: 200px; height: 200px">
            @else
            <img src="{{asset('hinhdaidien/default.png')}}" alt="Chưa có hình">
            @endif
            <h2 class="mb-4">Mục tiêu</h2>
            <p>
              {!! $profile->muctieu ? nl2br($profile->muctieu) : 'Bạn để trống mục này!' !!}
            </p>           
            <h2 class="mb-4">Sở trường</h2>          
            <p>
              {!! $profile->sotruong ? nl2br($profile->sotruong) : 'Bạn để trống mục này!' !!}
            </p>
            <h2 class="mb-4">Thông tin thêm</h2>
            <p>
              {!! $profile->thongtinthem ? nl2br($profile->thongtinthem) : 'Bạn để trống mục này!' !!}
            </p>            
            <p>
              <a href="javascript::void(0)" class="btn btn-primary btn-md mt-4">Ngày đăng: {{time_elapsed_string($profile->created_at)}}</a>
              <a href="javascript::void(0)" class="btn btn-primary btn-md mt-4">Ngày cập nhật: {{time_elapsed_string($profile->updated_at)}}</a>
            </p>

          </div>
        </div>
          <div class="modal-footer">           
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
          </div>
        </div>
      </div>
    </div>  
    @endforeach
@endsection