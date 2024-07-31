<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Manage Product</title>
</head>
<body>
    
  <nav class="navbar navbar-dark bg-success">     
        <a class="nav-link text-light navbar-brand" href="/">Manage > Products > Edit</a>   
        <a class="nav-link text-light navbar-brand float-right" href="/track">Go to Track Module</a>   
  </nav>

  @if($message = Session::get('success'))
  <div class="alert alert-success alert-block">
     <strong>{{ $message }}</strong>
 </div>
  @endif
  
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-sm-8">
          <div class="card mt-5 p-3"> 

            <form method="POST" action="/manage/update/{{ $manage->id }}" enctype="multipart/form-data">
              @csrf     
              @method('PUT')    
              <h6 class="text-secondary">Edit Product Data</h6>     
              <hr>   
              <div class="form-group">
                 <label>Product</label>
                  <input type="text" name="product_name" placeholder="Product" class="form-control" value="{{ old('product_name', $manage->product_name) }}"/>
                  @if($errors->has('product_name'))
                    <span class="text-danger">{{ $errors->first('product_name') }}
                  @endif
              </div>

              <div class="form-group">
                <label>Cateogory</label>
                <select name="cateogory" id="cateogory" class="form-control">
                    <option value="">Select Cateogory</option>
                    <option value="Manufactured Goods"  {{ $manage->cateogory === 'Manufactured Goods' ? 'selected' : '' }}>Manufactured Goods</option>
                    <option value="Purchased Goods And Services" {{ $manage->cateogory  === 'Purchased Goods And Services' ? 'selected' : '' }}>Purchased Goods And Services</option>  {{--selected='selected'--}}
                </select>
                 @if($errors->has('cateogory'))
                 <span class="text-danger">{{ $errors->first('cateogory') }}
               @endif
             </div>
              </div> 

              <div class="mt-3">
                <button type="submit" class="btn btn-success">Update</button>
              </div>

            </form>
          </div>     
        </div>
      </div>
    </div>
  </body>
</html>