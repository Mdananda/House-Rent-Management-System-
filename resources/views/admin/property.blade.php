<x-app-layout>

</x-app-layout>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include("admin.admincss");
  </head>
  <body>
  <div class="container-scroller">
    
       @include("admin.navbar");
       <div style="position: relative; top: 60px; right: -160px">
        <form action="{{url('/uploadproperty')}}" method="post" enctype="multipart/form-data">
            @csrf

          <div>
            <label >Title</label>
            <input style="color:blue;" type="text" name="title" placeholder="Write a title"  require>

            
          </div>
          <div>
            <label >Price</label>
            <input style="color:blue;" type="num" name="price" placeholder="Write a price"  require>

            
          </div>

          <div>
            <label >Location</label>
            <input style="color:blue;" type="text" name="location" placeholder="Write a location"  require>

            
          </div>
          <div>
            <label >Image</label>
            <input type="file" name="image"  require>

            
          </div>
          <div>
            <label >Description</label>
            <input style="color:blue;" type="text" name="description" placeholder="Description"  require>

            
          </div>

          <div>
            <input style="color:white;" type="submit" value="Save">

            
          </div>



        </form>

        <div>

        <table bgcolor="black">
          <tr>

          <th style="padding: 30px"> Property Name</th>
          <th style="padding: 30px">Price</th>
          <th style="padding: 30px">Description</th>
          <th style="padding: 30px">Location</th>
          <th style="padding: 30px">Image</th>
          <th style="padding: 30px">Action</th>
          </tr>

          @foreach($data as $data)
          <tr align="center">

          <td>{{$data->title}}</td>
          <td>{{$data->price}}</td>
          <td>{{$data->description}}</td>
          <td>{{$data->location}}</td>

          <td><img height="200" width="200" src="/propertyimage/{{$data->image}}" ></td>
          <td><a href="{{url('deletemenu',$data->id)}}">DELETE</a></td>
          </tr>
          @endforeach
        </table>
        </div>



       </div>


    </div>   
    
    @include("admin.adminscript");
  
  </body>
</html>