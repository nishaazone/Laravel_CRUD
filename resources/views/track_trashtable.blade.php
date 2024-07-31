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
    <title>Track Trashed Products</title>

    <style>
      .container{
        margin-top: 10px;       
      }

      th, td{
        text-align: center;
      }
      
      </style>
</head>
<body>

    <nav class="navbar navbar-dark bg-success">     
        <a class="nav-link text-light navbar-brand" href="{{ route('tableTrack') }}">Track > Products > Trash</a>   
        <a class="nav-link text-light navbar-brand float-right" href="/">Go to Manage Module</a>   
  </nav>

  <div class="container">

    <div class="mt-2">
        <a href="{{  route('tableTrack') }}">
          <button class="btn btn-success m-4 float-right">Go to track table</button>
        </a>
      </div>

    <table class="table table-hover mt-4">
        <thead>
          <tr>
            <th scope="col">Product ID</th>
            <th scope="col">Product</th>
            <th scope="col">Cateogory</th>
            <th scope="col">Quantity Produced</th>
            <th scope="col">Quantity Sold</th>
            <th scope="col">Quantity Unit</th>
            <th scope="col">Reporting Period</th>
            <th scope="col">Start Date</th>
            <th scope="col">End Date</th>
            <th colspan="2">Operations</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($tracks as $track)
          <tr>
            <td><a href="#" class="link-dark">{{ $track->id }}</td>
            <td>{{ $track->product_name }}</td>
            <td>{{ $track->cateogory}}</td>
            <td>{{ $track->quantity_produced}}</td>
            <td>{{ $track->quantity_sold}}</td>
            <td>{{ $track->quantity_unit}}</td>
            <td>{{ $track->reporting_period}}</td>
            <td>{{ App\Helpers\MyHelpers::getFormattedDateAttribute($track->start_date) }}</td>
            <td>{{ App\Helpers\MyHelpers::getFormattedDateAttribute($track->end_date) }}</td>
            <td>
                <button type="button" data-toggle="modal" data-target="#exampleModal" class="btn btn-danger btn-sm">Delete</button>
                
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete Track Product</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                       Do you want to delete this entry permanently?
                      </div>
                      <div class="modal-footer">
                        <a href="/trash/forcedelete/{{ $track->id }}" class="btn btn-danger btn-sm">Confirm Delete</a>
                      </div>
                    </div>
                  </div>
                </div>

              </td>
              <td>
                <a href="/track/restore/{{ $track->id }}" class="btn btn-primary btn-sm">Restore</a>
              </td>
          </tr>
          @endforeach
        </tbody>
      </table>

  </div>
</body>
</html>
