<!DOCTYPE html>
<html lang="en">

<head>

     <base href="/public">
    <meta charset="utf-8">
    <title>Makaan - Real Estate HTML Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar Start -->
        <div class="container-fluid nav-bar bg-transparent">
            <nav class="navbar navbar-expand-lg bg-white navbar-light py-0 px-4">
                <a href="index.html" class="navbar-brand d-flex align-items-center text-center">
                    <div class="icon p-2 me-2">
                        <img class="img-fluid" src="img/icon-deal.png" alt="Icon" style="width: 30px; height: 30px;">
                    </div>
                    <h1 class="m-0 text-primary">HOUSE</h1>
                </a>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto">
                        <a href="/" class="nav-item nav-link active">Home</a>
                        <a href="/" class="nav-item nav-link active">About</a>
                        <div class="nav-item dropdown">
                            <a href="/" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Property</a>
                            <!--<div class="dropdown-menu rounded-0 m-0">
                                <a href="/" class="dropdown-item">Property List</a>
                                <a href="/" class="dropdown-item">Property Type</a>
                               </div>-->
                              <!-- <div>
                                <a href="property agent.html" class="dropdown-item">Property Agent</a>
                            </div>-->
                        </div>
                        <!--<div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                            <div class="dropdown-menu rounded-0 m-0">
                                <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                                <a href="/" class="dropdown-item">404 Error</a>
                            </div>-->
                        </div>
                        <a href="#" class="nav-item nav-link">Contact</a>



                        <li class="nav-item nav-link" style="background-color: blue;">
                          @auth  
                          <a href="{{url('/showcart',Auth::user()->id)}}">
                        Cart{{$count}}
                      </a>
                        @endauth

                        @guest
                        Cart[0]

                        @endguest
                        </li>



                        <li>


                        @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                     <x-app-layout>

                     </x-app-layout>

                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif


                        </li>
                    
            </nav>
        </div>
        <!-- Navbar End -->


        <!-- Header Start -->
        <div class="container-fluid header bg-white p-0">
            <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
               <div class="col-md-6 p-5 mt-lg-5">
                    <!--<h1 class="display-5 animated fadeIn mb-4">Find A <span class="text-primary">Perfect Home</span> To Live With Your Family</h1>-->
                    <!--<p class="animated fadeIn mb-4 pb-2">Vero elitr justo clita lorem. Ipsum dolor at sed stet
                        sit diam no. Kasd rebum ipsum et diam justo clita et kasd rebum sea elitr.</p>-->
                   <!-- <a href="" class="btn btn-primary py-3 px-5 me-3 animated fadeIn">Get Started</a>-->
                </div>
                <div class="col-md-6 animated fadeIn">
                    <div class="owl-carousel header-carousel">
                        <!--<div class="owl-carousel-item">
                            <img class="img-fluid" src="img/carousel-1.jpg" alt="">
                        </div>
                        <div class="owl-carousel-item">
                            <img class="img-fluid" src="img/carousel-2.jpg" alt="">
                        </div>-->
                    </div>
                </div>
            </div>
        </div>
     
     <div >

      <table align="center" bgcolor="black">

         
        <tr>
 
              <th style="padding: 30px;"> Property Name</th> 
             <th style="padding: 30px;"> PRICE</th> 
             <th style="padding: 30px;"> QUANTITY</th> 
             <th style="padding: 30px;"> Action</th> 
   


        </tr>

        <form action="{{url('orderconfirm')}}" method="POST">
            @csrf
            <?php $totalprice=0; ?>
        @foreach($data as $data)

        <tr align="center">

            <th>
                <input type="text" name= "propertyname[]"value="{{$data->title}}" hidden="">
                {{$data->title}}
            </th>
            <th>
            <input type="text" name= "price[]"value="{{$data->price}}" hidden="">
                {{$data->price}}</th>
            <th>
            <input type="text" name= "quantity[]"value="{{$data->quantity}}" hidden="">
                {{$data->quantity}}</th>
            

         </tr>

         <?php $totalprice=$totalprice + $data->price; ?>
         @endforeach
         @foreach($data2 as $data2)
          <tr style="position: relative; top: -80px; right:-360px;">
         <th><a href="{{url('/remove',$data2->id)}}" class="btn btn-warning">Remove</a></th>
          </tr>
         @endforeach


      </table>
       <div align="center" style="padding: 10px;">
        <h1>Total Price: {{$totalprice}}</h1>
       </div>

      <div align="center" style="padding: 10px;">

      <button class="btn btn-primary" type="button" id="order">Order Now</button>
      </div>


      <div id="appear" align="center" style="padding: 10px; display:none ">

      <div  style="padding: 10px;">
        <label>Name</label>
        <input type="text" name="name" placeholder="Name">

      </div>
      <div  style="padding: 10px;">
        <label>Phone</label>
        <input type="number" name="phone" placeholder="Phone Number">

      </div>
      <div  style="padding: 10px;">
        <label>Address</label>
        <input type="text" name="address" placeholder="Address">

      </div>


      <div  style="padding: 10px;">
       
        <input class="btn btn-success" type="submit" id="order"value="Order Confirm">
        <button class="btn btn-danger"  id="close">Close</button>

      </div>
      
      <div style="padding: 10px;">

         <h1><a href="{{url('stripe',$totalprice)}}"  class= "btn btn-danger"> Pay in Card </a></h1>

      </div>



      </div>
      </form>



   </div>  


   <script type="text/javascript">

    $("#order").click(
     function()
     {

        $("#appear").show();
     }


    );


    $("#close").click(
     function()
     {

        $("#appear").hide();
     }


    );

   </script>



         <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>

    
</body>

</html>