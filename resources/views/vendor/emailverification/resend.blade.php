@extends('layouts.master')
@section('content')
<!-- HOME -->
    
    <section class="section-hero overlay inner-page bg-image" style="background-image: url({{ url('images/hero_1.jpg')}})" id="home-section">
      <div class="container">
        <div class="row">
          <div class="col-md-7">
            <h1 class="text-white font-weight-bold">Verification Email</h1>
            <div class="custom-breadcrumbs">
              <a href="#">Home</a> <span class="mx-2 slash">/</span>
              <span class="text-white"><strong>Verification Email</strong></span>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="site-section">
      <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">@lang('emailverification::messages.resend.title')</div>
                    <div class="panel-body">

                        @if($verified)
                            <div class="alert alert-success">
                                @lang('emailverification::messages.done')
                            </div>
                        @else

                            <form class="form-horizontal" role="form" method="POST"
                                  action="{{ route('resendVerificationEmail') }}">
                                {!! csrf_field() !!}


                                <div class="alert alert-warning dark">
                                    @lang('emailverification::messages.resend.warning', ['email' => $email])
                                </div>

                                <p>
                                    @lang('emailverification::messages.resend.instructions')
                                </p>

                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label class="col-md-4 control-label">@lang('emailverification::messages.resend.email')</label>

                                    <div class="col-md-6">

                                        <input type="text" class="form-control" name="email"
                                               value="{{ old('email', $email) }}">

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>


                                <div class="form-group">


                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                            @lang('emailverification::messages.resend.submit')
                                        </button>
                                    </div>
                                </div>


                            </form>


                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection