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
        <a class="nav-link text-light navbar-brand" href="/track">Track > Create Products</a>   
        <a class="nav-link text-light navbar-brand float-right" href="/">Go to Manage Module</a>   
      </nav>
  </nav>

  <?php if($message = Session::get('success')): ?>
  <div class="alert alert-success alert-block">
     <strong><?php echo e($message); ?></strong>
 </div>
  <?php endif; ?>
  
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-sm-8">
          <div class="card mt-4 p-3"> 

            <form method="POST" action="/products/track/store" enctype="multipart/form-data">
              <?php echo csrf_field(); ?>     
              <h6 class="text-secondary">Add Track Product Data</h6>     
              <hr>   

              <div class="form-group">
                <label>Product</label>
                <select name="product_name" id="product_name" class="form-control" aria-placeholder="Select Product">
                    <option value="">Select Prodcut</option>
                    <?php $__currentLoopData = $column; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $column): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($column->product_name); ?>"  <?php if(old('product') ==  $column->product_name): ?> selected <?php endif; ?>><?php echo e($column->product_name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                   
                </select>
                 <?php if($errors->has('product_name')): ?>
                 <span class="text-danger"><?php echo e($errors->first('product_name')); ?>

               <?php endif; ?>
             </div>

              <div class="form-group">
                <label>Cateogory</label>
                <select name="cateogory" id="cateogory" class="form-control" disabled>
                    <option value="">Select Cateogory</option>
                    <option value="Manufactured Goods" selected>Manufactured Goods</option>
                    <option value="Purchased Goods And Services">Purchased Goods And Services</option>  
                </select>
                 <?php if($errors->has('cateogory')): ?>
                 <span class="text-danger"><?php echo e($errors->first('cateogory')); ?>

               <?php endif; ?>
             </div>
                  
             <div class="form-group">
                <label>Quantity Produced</label>
                 <input type="number" name="quantity_produced" placeholder="Enter Quantity Produced" id="quantity_produced" class="form-control" value="<?php echo e(old('quantity_produced')); ?>"/>
                 <?php if($errors->has('quantity_produced')): ?>
                   <span class="text-danger"><?php echo e($errors->first('quantity_produced')); ?>

                 <?php endif; ?>
             </div>

             <div class="form-group">
                <label>Quantity Sold</label>
                 <input type="number" name="quantity_sold"  id="quantity_sold" placeholder="Enter Quantity Sold" class="form-control" value="<?php echo e(old('quantity_sold')); ?>"/>
                 <?php if($errors->has('quantity_sold')): ?>
                   <span class="text-danger"><?php echo e($errors->first('quantity_sold')); ?>

                 <?php endif; ?>
             </div>

             <div class="form-group">
                <label>Quantity Unit</label>
                <select name="quantity_unit" id="quantity_unit" class="form-control" aria-placeholder="Select Quantity Unit">
                    <option value="">Select Quantity Unit</option>
                    <option value="KG" <?php echo e(old('quantity_unit') === "KG" ? 'selected' : ''); ?>>KG</option>
                    <option value="Metric Tonnes" <?php echo e(old('quantity_unit') === "Metric Tonnes" ? 'selected' : ''); ?>>Metric Tonnes</option>  
                    <option value="Litres" <?php echo e(old('quantity_unit') === "Litres" ? 'selected' : ''); ?>>Litres</option>
                    <option value="Gallons" <?php echo e(old('quantity_unit') === "Gallons" ? 'selected' : ''); ?>>Gallons</option>
                    <option value="Piece" <?php echo e(old('quantity_unit') === "Piece" ? 'selected' : ''); ?>>Piece</option>
                </select>
                 <?php if($errors->has('quantity_unit')): ?>
                 <span class="text-danger"><?php echo e($errors->first('quantity_unit')); ?>

               <?php endif; ?>
             </div>

             <div class="form-group">
                <label>Reporting Period</label>
                <select name="reporting_period" id="reporting_period" class="form-control" >
                    <option value="">Select Reporting Period</option>
                    <option value="Monthly" <?php echo e(old('reporting_period') === "Monthly" ? 'selected' : ''); ?>>Monthly</option>
                    <option value="Quaterly"  <?php echo e(old('reporting_period') === "Quaterly" ? 'selected' : ''); ?>>Quaterly</option> 
                    <option value="Yearly" <?php echo e(old('reporting_period') === "Yearly" ? 'selected' : ''); ?>>Yearly</option>
                    <option value="Half-yearly" <?php echo e(old('reporting_period') === "Half-yearly" ? 'selected' : ''); ?>>Half-yearly</option>
                </select>
                 <?php if($errors->has('reporting_period')): ?>
                 <span class="text-danger"><?php echo e($errors->first('reporting_period')); ?>

               <?php endif; ?>
             </div>

                <div class="form-group">
                  <label>Start Date</label>
                  <input type="date" id="start_date" name="start_date" class="form-control" value="<?php echo e(old('start_date')); ?>"/>
                  <?php if($errors->has('start_date')): ?>
                  <span class="text-danger"><?php echo e($errors->first('start_date')); ?>

                <?php endif; ?>
                </div>

                <div class="form-group">
                  <label>End Date</label>
                  <input type="date" id="end_date" name="end_date" class="form-control" value="<?php echo e(old('end_date')); ?>"/>
                  <?php if($errors->has('end_date')): ?>
                  <span class="text-danger"><?php echo e($errors->first('end_date')); ?>

                  <?php endif; ?>
                </div>

              </div> 
              <div class="mt-3">
                <button type="submit" class="btn btn-success">Save</button>
                <a href ="<?php echo e(route('tableTrack')); ?>">
                <button type="button" class="btn btn-outline-dark float-right">View Track Table</button> 
               </a>
              </div>
            </form>

            <script>
              document.addEventListener('DOMContentLoaded', function () {
                  var startDateInput = document.getElementById('start_date');
                  var endDateInput = document.getElementById('end_date');
          
                  startDateInput.addEventListener('change', function () {
                      var startDate = new Date(startDateInput.value);
                      var endDate = new Date(startDate.getFullYear(), startDate.getMonth() + 1, startDate.getDate());
                      endDateInput.value = endDate.toISOString().slice(0, 10);
                  });
              });
          </script>

          </div>     
        </div>
      </div>
    </div>

    <script>
      // JavaScript to hide the error message when the user starts typing
      const inputFields = document.querySelectorAll('input[type="text"], input[type="number"], input[type="date"], select');
      inputFields.forEach(function (field) {
          field.addEventListener('input', function () {
              const errorSpan = this.nextElementSibling; 
              errorSpan.innerText = '';
          });
      });
  </script>
  </body>
</html><?php /**PATH D:\Laravel\Task_1\resources\views/track.blade.php ENDPATH**/ ?>