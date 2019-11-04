<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{__('TestLaravelDev')}}</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('vendors/owl-carousel/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/owl-carousel/css/owl.theme.default.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/aos/css/aos.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.min.css')}}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body id="body" data-spy="scroll" data-target=".navbar" data-offset="100">

<header id="header-section">
    <nav class="navbar navbar-expand-lg pl-3 pl-sm-0" id="navbar">
        <div class="container">
            <div class="navbar-brand-wrapper d-flex w-100">
        <span class="text-muted text-danger">
          <img src="https://alkalab.com/wp/wp-content/uploads/2018/09/logo-black-small.png" width="auto" height="25" alt="">
        </span>
                <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="mdi mdi-menu navbar-toggler-icon"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse navbar-menu-wrapper" id="navbarSupportedContent">
                <ul class="navbar-nav align-items-lg-center align-items-start ml-auto">
                    <li class="d-flex align-items-center justify-content-between pl-4 pl-lg-0">
                        <div class="navbar-collapse-logo">
                            <img src="images/Group2.svg" alt="">
                        </div>
                        <button class="navbar-toggler close-button" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="mdi mdi-close navbar-toggler-icon pl-5"></span>
                        </button>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#header-section">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#features-section">About</a>
                    </li>
                    <li class="nav-item">

                        <div class="dropdown show">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Questions
                            </a>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                @foreach($categories as $category)
                                    <a class="dropdown-item" href="/category/{{$category->type}}">{{ucwords($category->type)}}</a>
                                @endforeach
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#feedback-section">Contact</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
</header>

<div class="banner" >
    <div class="container">
        <h1 class="font-weight-semibold text-muted">Simple answer to the Question & get<br>Reward.</h1>
        <h6 class="font-weight-normal text-muted pb-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim explicabo facilis veritatis!</h6>
        <div>
            <button class="btn btn-primary mr-1">Get started</button>
            <button class="btn btn-info ml-1">Learn more</button>
        </div>
        <img src="images/Group171.svg" alt="" class="img-fluid">
    </div>
</div>


<div class="content-wrapper">
    <div class="container">
        <section class="features-overview" id="features-section" >
            <div class="content-header">
                <h2 class="text-muted">Questions</h2>
                <h6 class="section-subtitle text-muted">One theme that serves as an easy-to-use operational toolkit<br>that meets customer's needs.</h6>
            </div>
            <div class="d-md-flex justify-content-between">

                       <div class="row">
                           @foreach($category_results as $category_result)
                               <div class="card border col-md-3 mt-4 mr-4" style="min-width:350px;">
                                   <div class="card-body">
                                       <strong>{{ __('Question') }} : </strong><p class="text-muted">{{$category_result->question_require}}</p>
                                       <small>{{$category_result->name}}</small>
                                       <small>Created at: {{ $category_result->date}}</small>
                                   </div>
                                   <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                       {{ __('Answer the Question') }}
                                   </button>

                                   <!-- Modal -->
                                   <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                       <div class="modal-dialog" role="document">
                                           <div class="modal-content">
                                               <div class="modal-header">
                                                   <h5 class="modal-title" id="exampleModalLabel">Submit Your Answer</h5>
                                                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                       <span aria-hidden="true">&times;</span>
                                                   </button>
                                               </div>
                                               <form action="{{route('answer.store')}}" method="POST">
                                                  <div class="modal-body">
                                                       @csrf
                                                       <div class="form-group">
                                                           <label class="control-label">{{ __('Short Answer') }} <span class="text-danger">*</span> </label>
                                                           <input type="text" name="answer" id="answer" required class="form-control @error('answer') is-invalid @enderror"
                                                                  placeholder="{{ __('Enter Your Answer') }}" value="{{ old('answer') }}" />
                                                           @error('answer')
                                                           <div class="form-control-feedback">{{ $message }}</div>
                                                           @enderror
                                                       </div>
                                                       <div class="form-group">
                                                           <label class="control-label">{{ __('Short Description') }} <span class="text-danger">(optional)</span> </label>
                                                           <textarea name="description" id="description" class="form-control @error('answer') is-invalid @enderror"></textarea>

                                                           @error('description')
                                                           <div class="form-control-feedback">{{ $message }}</div>
                                                           @enderror
                                                       </div>

                                                       <div class="form-group">
                                                           <label class="control-label">{{ __('Your Email') }} <span class="text-danger">*</span> </label>
                                                           <input type="email" name="user_name" id="user_name" required class="form-control @error('user_name') is-invalid @enderror"
                                                                  placeholder="{{ __('Enter Your Email') }}" value="{{ old('user_name') }}" />
                                                           @error('user_name')
                                                           <div class="form-control-feedback">{{ $message }}</div>
                                                           @enderror
                                                       </div>
                                                      <input type="hidden" name="question_id" value="{{$category_result->id}}">
                                               </div>
                                               <div class="modal-footer">
                                                   <input type="submit" class="btn btn-primary" value="Submit">
                                                   <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                               </div>
                                               </form>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                           @endforeach
                       </div>
                    </div>


        </section>

        <section class="features-overview" id="features-section" >

            <br>
        </section>


        <section class="contact-us" id="contact-section">
            <div class="contact-us-bgimage grid-margin" >
                <div class="pb-4">
                    <h4 class="px-3 px-md-0 m-0" data-aos="fade-down">Do you have any Query?</h4>
                    <h4 class="pt-1" data-aos="fade-down">Contact us</h4>
                </div>
                <div data-aos="fade-up">
                    <button class="btn btn-rounded btn-outline-success">Contact us</button>
                </div>
            </div>
        </section>
        <section class="contact-details" id="contact-details-section">
            <div class="row text-center text-md-left">
                <div class="col-12 col-md-6 col-lg-3 grid-margin">
                    <img src="https://alkalab.com/wp/wp-content/uploads/2018/09/logo-black-small.png" width="auto" height="25" alt="">
                    <div class="pt-2">
                        <p class="text-muted m-0">alkalab@yahoo.com</p>
                        <p class="text-muted m-0">001-875-0125</p>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3 grid-margin">
                    <h5 class="pb-2">Get in Touch</h5>
                    <p class="text-muted">Don’t miss any updates of our new Blog</p>
                    <form>
                        <input type="text" class="form-control " id="Email" placeholder="Email id">
                    </form>
                    <div class="pt-3">
                        <button class="btn btn-dark">Subscribe</button>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3 grid-margin">
                    <h5 class="pb-2">Our Guidelines</h5>
                    <a href="#"><p class="m-0 pb-2">Terms</p></a>
                    <a href="#" ><p class="m-0 pt-1 pb-2">Privacy policy</p></a>
                    <a href="#"><p class="m-0 pt-1 pb-2">Cookie Policy</p></a>
                    <a href="#"><p class="m-0 pt-1">Discover</p></a>
                </div>
                <div class="col-12 col-md-6 col-lg-3 grid-margin">
                    <h5 class="pb-2">Our address</h5>
                    <p class="text-muted">16 Place Madeleine Caulier<br>
                        59800 LILLE FRANCE</p>
                    <div class="d-flex justify-content-center justify-content-md-start">
                        <a href="#"><span class="mdi mdi-facebook"></span></a>
                        <a href="#"><span class="mdi mdi-twitter"></span></a>
                        <a href="#"><span class="mdi mdi-instagram"></span></a>
                        <a href="#"><span class="mdi mdi-linkedin"></span></a>
                    </div>
                </div>
            </div>
        </section>
        <footer class="border-top">
            <p class="text-center text-muted pt-4">Copyright © 2019<a href="https://alkalab.com/" class="px-1">Alkalab.</a>All rights reserved.</p>
        </footer>
        <!-- Modal for Contact - us Button -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel">Contact Us</h4>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="Name">Name</label>
                                <input type="text" class="form-control" id="Name" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <label for="Email">Email</label>
                                <input type="email" class="form-control" id="Email-1" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label for="Message">Message</label>
                                <textarea class="form-control" id="Message" placeholder="Enter your Message"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-success">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('vendors/jquery/jquery.min.js')}}"></script>
<script src="{{asset('vendors/bootstrap/bootstrap.min.js')}}"></script>
<script src="{{asset('vendors/owl-carousel/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('vendors/aos/js/aos.js')}}"></script>
<script src="{{asset('js/landingpage.js')}}"></script>
<!-- Essential javascripts for application to work -->
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/main.js') }}" defer></script>
<!-- The javascript plugin to display page loading on top -->
<script src="{{ asset('js/plugins/pace.min.js') }}"></script>
<!-- Data table plugin -->
<script
        type="text/javascript"
        src="{{ asset('js/plugins/jquery.dataTables.min.js') }}"
></script>
<script
        type="text/javascript"
        src="{{ asset('js/plugins/dataTables.bootstrap.min.js') }}"
></script>
<script
        type="text/javascript"
        src="{{ asset('js/plugins/bootstrap-notify.min.js') }}"
></script>
<script
        type="text/javascript"
        src="{{ asset('js/plugins/bootstrap-datepicker.min.js') }}"
></script>
<script
        type="text/javascript"
        src="{{ asset('js/plugins/select2.min.js') }}"
></script>
<script type="text/javascript">
    $('.data-table').DataTable();
    $('.select2').select2();
    $('.date-picker').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
        todayHighlight: true
    });

    $(
        '.app-menu a[href^="' + location.href + '"].app-menu__item'
    ).addClass('active');
    $('a[href^="' + location.href + '"]')
        .closest('.treeview')
        .addClass('is-expanded');
</script>
@if(Session::has('response'))
    <script>
        var toastData = {
            html: '{{Session::get("response.message")}}',
            classes:
                '{{Session::get("response.type") == "success" ? "green" : "red"}}'
        };
        $.notify(
            {
                title: '',
                message: '{{Session::get("response.message")}}',
                icon:
                    '{{Session::get("response.type") == "success" ? "fa fa-check" : "fa fa-close"}}'
            },
            {
                type:
                    '{{Session::get("response.type") == "success" ? "success" : "danger"}}'
            }
        );
    </script>
    @endif
</body>
</html>