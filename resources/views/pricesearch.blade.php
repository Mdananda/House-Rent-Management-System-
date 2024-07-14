<!---poperty start-->
<div class="container-xxl py-5">
            <div class="container">
                <div class="row g-0 gx-5 align-items-end">
                    <div class="col-lg-6">
                        <div class="text-start mx-auto mb-5 wow slideInLeft" data-wow-delay="0.1s">
                            
                            <h1 class="display-5 animated fadeIn mb-4">  Property Listing </h1>
                            
                        </div>
                    </div>
                   <!-- <div class="col-lg-6 text-start text-lg-end wow slideInRight" data-wow-delay="0.1s">
                        <ul class="nav nav-pills d-inline-flex justify-content-end mb-5">
                            <li class="nav-item me-2">
                                <a class="btn btn-outline-primary active" data-bs-toggle="pill" href="#tab-1">Featured</a>
                            </li>
                            <li class="nav-item me-2">
                                <a class="btn btn-outline-primary" data-bs-toggle="pill" href="#tab-2">For Sell</a>
                            </li>
                            <li class="nav-item me-0">
                                <a class="btn btn-outline-primary" data-bs-toggle="pill" href="#tab-3">For Rent</a>
                            </li>
                        </ul>
                    </div>
                </div>-->
                <form action="{{url('searchprice')}}" method="Get">
            @csrf
        <div class="container-fluid bg-primary mb-5 wow fadeIn" data-wow-delay="0.1s" style="padding: 35px;">
            <div class="container">
                
                            <div class="col-md-4">
                                <input type="text" class="form-control border-0 py-3" placeholder="Price" name="search">
                            </div>
                        
                            
                       
                    
                             <div class="col-md-2">
                                  <button class="btn btn-dark border-0 w-100 py-3">Search</button>
                             </div>
                </div>
           
        </div> 
        </form>

                @foreach($data2 as $data2)

                <form action="{{url('/addcart',$data->id)}}" method="post">
                    @csrf
                <div class="tab-content">
                    <div id="tab-1" class="tab-pane fade show p-0 active">
                        <div class="row g-4">
                            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                <div class="property-item rounded overflow-hidden">
                                    <div class="position-relative overflow-hidden">
                                        <a href=""><img stlye ="background-image:url('/propertyimage/{{$data2->image}}');" class="img-fluid" src="/propertyimage/{{$data2->image}}" alt=""></a>
                                       <!-- <div class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">For Sell</div>
                                        <div class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3">Appartment</div>-->
                                    </div>
                                    <div class="p-4 pb-0">
                                        <h5 class="text-primary mb-3">{{$data2->price}}</h5>
                                        <a class="d-block h5 mb-2" href="">{{$data2->description}}</a>
                                        <p><i class="fa fa-map-marker-alt text-primary me-2"></i>{{$data2->title}}</p>
                                    </div>
                                   <!-- <div class="d-flex border-top">
                                        <small class="flex-fill text-center border-end py-2"><i class="fa fa-ruler-combined text-primary me-2"></i>1000 Sqft</small>
                                        <small class="flex-fill text-center border-end py-2"><i class="fa fa-bed text-primary me-2"></i>3 Bed</small>
                                        <small class="flex-fill text-center py-2"><i class="fa fa-bath text-primary me-2"></i>2 Bath</small>
                                    </div>-->
                                </div>
                            </div>
                            

                           
                            <div class="col-12 text-center">
                                <a class="btn btn-primary py-3 px-5" href="">Browse More Property</a>
                            </div>
                            <div>
                       
                        <input type="number" name="quantity" min="1"  value= "1"style="width: 80px;">
                           <input type="submit" value="add cart">
                     </div>

                            </form>
                            @endforeach
                    
                </div>
            </div>
            
        </div>

        <!--poperty end-->