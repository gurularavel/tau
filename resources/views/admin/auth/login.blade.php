<x-admin.layout>

    <div class="auth-page-wrapper pt-5">
        <!-- auth page bg -->


        <!-- auth page content -->
        <div class="auth-page-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center mt-sm-5 mb-4 text-white-50">
                            <div>
                               <a href="https://kvadrat.az/az" class="d-inline-block auth-logo">
                                    <img src="{{asset('/assets/admin/images/kvadrat-logo.png')}}" alt="" height="100">
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end row -->

                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card mt-4 card-bg-fill">

                            <div class="card-body p-4">
                                <div class="text-center mt-2">
                                    <h5 class="text-primary">{{__('translate.Welcome back!')}}</h5>
                                    <p class="text-muted">{{__('translate.Log in to get started')}}</p>
                                </div>
                                <div class="p-2 mt-4">
                                    <form action="{{route('admin.login.store')}}" method="POST">
                                        @csrf

                                        <div class="mb-3">
                                            <label for="email" class="form-label">{{__('translate.Email')}}</label>
                                            <input type="email" class="form-control" name="email" placeholder="{{__('translate.Enter your email')}}"  value="{{ old('email') }}">
                                            @error('email')
                                            <span class="form-text text-danger pt-2">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            {{-- <div class="float-end">
                                                <a href="auth-pass-reset-basic.html" class="text-muted">Forgot password?</a>
                                            </div> --}}
                                            <label class="form-label" for="password-input">{{__('translate.Password')}}</label>
                                            <div class="position-relative auth-pass-inputgroup mb-3">
                                                <input type="password" name="password" class="form-control pe-5 password-input" placeholder="{{__('translate.Please enter a password')}}" value="{{ old('password') }}">
                                                <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon material-shadow-none" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                                            </div>
                                            @error('password')
                                            <span class="form-text text-danger pt-2">{{ $message }}</span>
                                        @enderror
                                        </div>
                                        {{-- {!! htmlFormSnippet() !!} --}}

                                        <div class="form-check">
                                            <input name="remember" class="form-check-input" type="checkbox" value="">
                                            <label class="form-check-label" for="auth-remember-check">{{__('translate.Remember me')}}</label>
                                        </div>

                                        <div class="mt-4">
                                            <button style="background-color: #236DB5; color: white;" class="btn w-100" type="submit">{{__('translate.log in')}}</button>
                                        </div>


                                    </form>
                                </div>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->



                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end auth page content -->

        <!-- footer -->
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <p class="mb-0 text-muted">&copy;
                                <script>document.write(new Date().getFullYear())</script> .kvadrat.az
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->
    </div>

</x-admin.layout>
