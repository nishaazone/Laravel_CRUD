<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Track Product</title>
    <style>
        .container{
            margin-top: 30px;
            margin-bottom: 30px;
        }
   </style>
</head>
<body>
    
      <nav class="navbar navbar-dark bg-success">     
        <a class="nav-link text-light navbar-brand" href="#">Bills of materials</a>   
        <a class="nav-link text-light navbar-brand float-right" href="/track">Go to Track Module</a>   
      </nav>
  </nav>

  @if($message = Session::get('success'))
  <div class="alert alert-success alert-block">
     <strong>{{ $message }}</strong>
 </div>
  @endif
  
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-sm-8">
          <div class="card mt-4 p-3"> 

            <form method="POST" action="{{ route('billPost') }}" enctype="multipart/form-data">
              @csrf     
              <h6 class="text-secondary">Add Data for Bill Of Materials</h6>     
              <hr>   

              <div class="form-group">
                <label>Component Name</label>
                <select name="component_name" id="component_name" class="form-control">
                  <option value="">Select Component</option>
                    {{-- <option value="Component A" {{ old('componentname') === "Component A" ? 'selected' : ''}}>Component A</option>
                    <option value="Component B" {{ old('componentname') === "Component B" ? 'selected' : ''}}>Component B</option> --}}
                    @foreach ($column as $column)
                    <option value="{{ $column->product_name }}"  @if(old('component_name') ==  $column->product_name) selected @endif>{{ $column->product_name }}</option>
                    @endforeach           
                </select>
                 @if($errors->has('component_name'))
                 <span class="text-danger">{{ $errors->first('component_name') }}
               @endif
             </div>

              <div class="form-group">
                <label>Part Number</label>
                <input type="text" name="part_number" id="part_number" class="form-control" placeholder="Part Number" value="{{ old('part_number') }}"/>
                 @if($errors->has('part_number'))
                 <span class="text-danger">{{ $errors->first('part_number') }}
               @endif
             </div>
                  
             <div class="form-group">
                <label>Description</label>
                 <input type="text" name="description" placeholder="Enter Description" id="description" class="form-control" value="{{ old('description') }}"/>
                 @if($errors->has('description'))
                   <span class="text-danger">{{ $errors->first('description') }}
                 @endif
             </div>

             <div class="form-group">
                <label>Quantity Per Unit</label>
                 <input type="text" name="quantity_per_unit"  id="quantity_per_unit" placeholder="Enter Quantity Per Unit" class="form-control" value="{{ old('quantity_per_unit') }}"/>
                 @if($errors->has('quantity_per_unit'))
                   <span class="text-danger">{{ $errors->first('quantity_per_unit') }}
                 @endif
             </div>

             <div class="form-group">
                <label>Quantity Purchased</label>
                <input type="text" name="quantity_purchased" id="quantity_purchased" class="form-control" placeholder="Enter Quantity Purchased" value="{{ old('quantity_purchased') }}"/>
                 @if($errors->has('quantity_purchased'))
                 <span class="text-danger">{{ $errors->first('quantity_purchased') }}
               @endif
             </div>

             <div class="form-group">
                <label>Quantity</label>
                <input type="text" name="quantity" id="quantity" class="form-control" placeholder="Enter Quantity" value="{{ old('quantity') }}"/>
                 @if($errors->has('quantity'))
                 <span class="text-danger">{{ $errors->first('quantity') }}
               @endif
             </div>

             <div class="form-group">
                <label>Quantity Unit</label>
                <select name="quantity_unit" id="quantity_unit" class="form-control" >
                    <option value="">Select Quantity Unit</option>
                    <option value="KG" {{ old('quantity_unit') === "KG" ? 'selected' : ''}}>KG</option>
                    <option value="Metric Tonnes" {{ old('quantity_unit') === "Metric Tonnes" ? 'selected' : ''}}>Metric Tonnes</option> 
                    <option value="Litres" {{ old('quantity_unit') === "Litres" ? 'selected' : ''}}>Litres</option>
                    <option value="Gallons" {{ old('quantity_unit') === "Gallons" ? 'selected' : ''}}>Gallons</option>
                    <option value="Piece">Piece</option>
                </select>
                 @if($errors->has('quantity_unit'))
                 <span class="text-danger">{{ $errors->first('quantity_unit') }}
               @endif
             </div>

             <div class="form-group">
                <label>Source</label>
                <select name="source" id="source" class="form-control" >
                    <option value="">Select Source</option>
                    <option value="Internal" {{ old('source') === "Internal" ? 'selected' : ''}}>Internal</option>
                    <option value="External" {{ old('source') === "External" ? 'selected' : ''}}>External</option>
                </select>
                 @if($errors->has('source'))
                 <span class="text-danger">{{ $errors->first('source') }}
               @endif
             </div>

             <div class="form-group">
                <label>Supplier</label>
                <select name="supplier" id="supplier" class="form-control" >
                    <option value="">Select Supplier</option>
                    <option value="PolyolProducers Inc" {{ old('supplier') === "PolyolProducers Inc" ? 'selected' : ''}}>PolyolProducers Inc</option>
                    <option value="DiisoChem Ltd" {{ old('supplier') === "DiisoChem Ltd" ? 'selected' : ''}}>DiisoChem Ltd</option>
                    <option value="CatFast Solutions" {{ old('supplier') === "CatFast Solutions" ? 'selected' : ''}}>CatFast Solutions</option>
                </select>
                 @if($errors->has('supplier'))
                 <span class="text-danger">{{ $errors->first('supplier') }}
               @endif
             </div>

             <input type="hidden" name="track_id" value="{{ $track->id }}">

              </div> 
              <div class="mt-3">
                <button type="submit" class="btn btn-success">Save</button>
                <a href ="{{ route('billTable', $track->id ) }}">
                <button type="button" class="btn btn-outline-dark float-right">View Bills Table</button> 
               </a>
              </div>

            </form>
          </div>     
        </div>
      </div>
    </div>

    <script>
      // JavaScript to hide the error message when the user starts typing
      const inputFields = document.querySelectorAll('input[type="text"], input[type="number"], select');
      inputFields.forEach(function (field) {
          field.addEventListener('input', function () {
              const errorSpan = this.nextElementSibling; 
              errorSpan.innerText = '';
          });
      });
  </script>
  </body>
</html>

