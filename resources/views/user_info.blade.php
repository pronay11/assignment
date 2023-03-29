<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
                        <form action="{{route('store.userinfo')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="" class="form-label">Name:</label>
                                <input type="text" class="form-control" id="name" name="name" >
                                @error('name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                                
                            </div>

                            <div class="mb-3">
                              <label for="email" class="form-label">Email:</label>
                              <input type="email" class="form-control" id="email" name="email">
                              @error('email')
                              <span class="text-danger">{{$message}}</span>
                              @enderror
                            </div>

                            <div class="mb-3">
                                <label for="image" class="form-label">Image:</label>
                                <input type="file" class="form-control" id="image" name="image" >
                                @error('image')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>


                           
                            <div class="mb-3">
                                <label for="gender" class="form-label">Gender:</label>
                                <div class="form-control">
                                    <input  type="radio" name="gender" id="male" value="male" >Male
                                    <input  type="radio" name="gender" id="female" value="female" >Female
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
                                            <input class="form-check-input" type="checkbox" name="skills[]" value="laravel" id="flexCheckChecked">
                                            <label class="form-check-label" for="flexCheckChecked">
                                              Laravel
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="skills[]" value="ajax" id="flexCheckChecked">
                                            <label class="form-check-label" for="flexCheckChecked">
                                              Ajax
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="skills[]" value="mysql" id="flexCheckChecked">
                                            <label class="form-check-label" for="flexCheckChecked">
                                                MySQL
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="skills[]" value="codeigniter" id="flexCheckChecked">
                                            <label class="form-check-label" for="flexCheckChecked">
                                                Codeigniter
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="skills[]" value="vue js" id="flexCheckChecked">
                                            <label class="form-check-label" for="flexCheckChecked">
                                                VUE JS
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="skills[]" value="api" id="flexCheckChecked">
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
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
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