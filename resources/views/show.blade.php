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
    <title>Show Details</title>

    <style>
       button{
              margin-top: 10px;
              margin-bottom: 10px;
          }
       th{
        background-color: #28a745;
        color: white;
       }
       .table-rounded {
        border-radius: 30px !important; 
        border: 1px solid #28a745;
      }
      h5{
        color: black;
      }
      th, td{
        text-align: center;
      }  
    </style>

</head>
<body>
    
    <nav class="navbar navbar-dark bg-success">     
        <a class="nav-link text-light navbar-brand" href="/track">Track > Products > Details > Bills Table</a>   
        <a class="nav-link text-light navbar-brand float-right" href="/">Go to Manage Module</a>   
   </nav>

  <div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-10 mt-4">
            <div class="card p-4">
              <h5 class="card-title text-muted">Product Details</h5>
              <hr>
                <p>Product Id: <b>{{ $track->id }}</b></p>
                <p>Product: <b>{{ $track->product_name }}</b></p>
                <p>Cateogory: <b>{{ $track->cateogory }}</b></p>
                <p>Quantity Produced: <b>{{ $track->quantity_produced }}</b></p>
                <p>Quantity Sold: <b>{{ $track->quantity_sold }}</b></p>
                <p>Quantity Unit: <b>{{ $track->quantity_unit }}</b></p>
                <p>Reporting Period: <b>{{ $track->reporting_period }}</b></p>
                <p>Start Date: <b>{{ $track->start_date }}</b></p>
                <p>End Date: <b>{{ $track->end_date }}</b></p>
            </div>
        </div>
    </div>
  </div>

  <div class="container">
     <div class="mt-3">
        <a href ="{{ route('billForm', $track->id) }}">
        <button type="button" class="btn btn-success float-right">+ Add</button> 
        <h5 class="float-left mt-3">Bills of Materials</h5>
       </a>
    </div>
    <table class="table table-hover mt-4 table-rounded">
        <thead>
          <tr>
            <th scope="col">Component ID</th>
            <th scope="col">Component Name</th>
            <th scope="col">Part Number</th>
            <th scope="col">Description</th>
            <th scope="col">Quantity per Unit</th>
            <th scope="col">Quantity Purchased</th>
            <th scope="col">Quantity</th>
            <th scope="col">Quantity Unit</th>
            <th scope="col">Source</th>
            <th scope="col">Supplier</th>
            <th colspan="2">Operations</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($bills as $bill)
          <tr>
            <td>{{ $bill->Component_id }}</td>
            <td>{{ $bill->component_name }}</td>
            <td>{{ $bill->part_number }}</td>
            <td>{{ $bill->description }}</td>
            <td>{{ $bill->quantity_per_unit }}</td>
            <td>{{ $bill->quantity_purchased }}</td>
            <td>{{ $bill->quantity }}</td>
            <td>{{ $bill->quantity_unit }}</td>
            <td>{{ $bill->source }}</td>
            <td>{{ $bill->supplier }}</td>

            <td>
              <a href="{{ route('billEdit', $bill->Component_id) }}">
                <button type ="button" class="btn btn-info btn-sm">Edit</button>
              </a>
            </td>

            <td>
              <button type="button" data-toggle="modal" data-target="#exampleModal" class="btn btn-danger btn-sm">Delete</button>
              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Delete Bill</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                     Do you want to delete this entry permanently?
                    </div>
                    <div class="modal-footer">
                      <a href="{{ route('billDelete', $bill->Component_id) }}" class="btn btn-danger btn-sm">Confirm Delete</a>
                    </div>
                  </div>
                </div>
              </div>
            </td>          
           </tr>
          @endforeach
        </tbody>
      </table>
      {{ $bills->links() }}
  </div>
</body>
</html>