<pre>
Chào bạn, {{$user->ho.' '.$user->ten}}!
Chúng tôi đã nhận được ý kiến từ bạn!

Tiêu đề: {{$user->tieude}}
Lời nhắn: {{$user->noidung}}


Chúng tôi xin giải đáp vấn đề này là:
{{$repond}}

Cảm ơn bạn đã tin tưởng và lựa chọn website tuyển dụng {{config('app.url')}}. Chúc bạn sớm tìm được việc làm như mong muốn.
Nếu bạn cần hỗ trợ, vui lòng liên hệ tới email {{config('mail.username')}} hoặc gọi tới hotline Miền Nam: (028) 5407 0399 và Miền Bắc: (093) 8922 315.
<strong>{{ config('app.name') }}</strong> chúc bạn sớm tìm được công việc như ý.
</pre>