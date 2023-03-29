<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >
    <title>Document</title>
</head>
<body>
    <div class="container py-5">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card">
                    <div class="card-header text-center">
                       <h2>User Info</h2>
                    </div>
                    <div class="card-body">
                        @php
                          $skills=json_decode($info->skills);
                        @endphp
                        <form action="{{route('update.userinfo',$info->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="" class="form-label">Name:</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $info->name}}" >
                                @error('name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                                
                            </div>

                            <div class="mb-3">
                              <label for="email" class="form-label">Email:</label>
                              <input type="email" class="form-control" id="email" name="email" value="{{ $info->email}}">
                              @error('email')
                              <span class="text-danger">{{$message}}</span>
                              @enderror
                            </div>

                            <div class="mb-3">
                                <label for="image" class="form-label">Image:</label>
                                <input type="file" class="form-control" id="image" name="image" value="{{$info->image}}" >
                                @error('image')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">  </label>
                               <div class="col-sm-10">
                                   <img id="showImage" class="rounded avatar-lg" src="{{ asset($info->image) }}" style="width:60px; height:50px" alt="Card image cap">
                               </div>
                           </div>


                           
                            <div class="mb-3">
                                <label for="gender" class="form-label">Gender:</label>
                                <div class="form-control">
                                    <input  type="radio" name="gender" id="male" value="male" {{ $info->gender == 'male' ? 'checked' : ''}} >Male
                                    <input  type="radio" name="gender" id="female" value="female" {{ $info->gender == 'female' ? 'checked' : ''}}>Female
                                   
                                    @error('gender')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror 
                                </div>
                            </div>


                            <div class="mb-3">
                                <div class="row">
                                    <label for="image" class="form-label">Skills:</label>
                                    <div class="col-md-6">
                                       
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="skills[]" value="laravel" {{ in_array('laravel',$skills)?'checked':''}}>
                                            <label class="form-check-label" for="flexCheckChecked">
                                              Laravel
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="skills[]" value="ajax" {{ in_array('ajax',$skills)?'checked':''}}>
                                            <label class="form-check-label" for="flexCheckChecked">
                                              Ajax
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="skills[]" value="mysql" {{ in_array('mysql',$skills)?'checked':''}}>
                                            <label class="form-check-label" for="flexCheckChecked">
                                                MySQL
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="skills[]" value="codeigniter" {{ in_array('codeigniter',$skills)?'checked':''}}>
                                            <label class="form-check-label" for="flexCheckChecked">
                                                Codeigniter
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="skills[]" value="vue js" {{ in_array('vue js',$skills)?'checked':''}}>
                                            <label class="form-check-label" for="flexCheckChecked">
                                                VUE JS
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="skills[]" value="api" {{ in_array('api',$skills)?'checked':''}}>
                                            <label class="form-check-label" for="flexCheckChecked">
                                                API
                                            </label>
                                        </div>
                                    </div>
                                
                                    @error('skills')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                               
                                
                            </div>
                            
                        
                            <input type="submit" class="btn btn-primary" value="SUBMIT">
                          </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
    
        $(document).ready(function(){
            $('#image').change(function(e){
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#showImage').attr('src',e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
     <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        @if(Session::has('message'))
        var type = "{{ Session::get('alert-type','info') }}"
        switch(type){
           case 'info':
           toastr.info(" {{ Session::get('message') }} ");
           break;
       
           case 'success':
           toastr.success(" {{ Session::get('message') }} ");
           break;
       
           case 'warning':
           toastr.warning(" {{ Session::get('message') }} ");
           break;
       
           case 'error':
           toastr.error(" {{ Session::get('message') }} ");
           break; 
        }
        @endif 
       </script>
</body>
</html>