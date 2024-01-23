@extends('layout.auth')
@section('content')

<div class="container-md">
    <div class="row">
        <div class="col-lg-7 offset-lg-5 p-sm-0">
            <div class="ugf-content pt270">

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
                @endif
                @if (session()->has('error'))
                <div class="alert alert-danger">
                    {{ session()->get('error') }}
                </div>
                @endif

                <h2>Let's go! <span>Join with our Platform</span></h2>
                <p>Inter your valid email address and complete some easy steps <br> for register your account</p>

                <form action="email-verification" method="POST" class="form-flex email-form">
                    @csrf
                    <div class="form-group">
                        <label for="inputMail">Eamil Address</label>
                        <input type="email" placeholder="example@domain.com" class="form-control" id="inputMail"
                            name="email"required>
                    </div>
                    <button class="btn"><span>Let's Start</span> <i class="las la-arrow-right"></i></button>
                </form>


            </div>
        </div>
    </div>
</div>
<div class="alternet-access">
    <p>Already have an account? <a href="login">&nbsp; Log in now!</a></p>
</div>
</div>
@endsection
