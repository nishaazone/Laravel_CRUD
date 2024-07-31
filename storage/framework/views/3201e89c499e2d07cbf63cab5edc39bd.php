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
    <title>Create Manage Product</title>
</head>
<body>
    
  <nav class="navbar navbar-dark bg-success">     
        <a class="nav-link text-light navbar-brand" href="/">Manage > Create Products</a>   
        <a class="nav-link text-light navbar-brand float-right" href="/track">Go to Track Module</a>   
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
          <div class="card mt-5 p-3"> 

            <form method="POST" action="/products/manage/store" enctype="multipart/form-data">
              <?php echo csrf_field(); ?>     
              <h6 class="text-secondary">Add Manage Product Data</h6>     
              <hr>   
              <div class="form-group">
                 <label>Product</label>
                  <input type="text" name="product_name" placeholder="Product" class="form-control" value="<?php echo e(old('product_name')); ?>"/>
                  <?php if($errors->has('product_name')): ?>
                    <span class="text-danger"><?php echo e($errors->first('product_name')); ?>

                  <?php endif; ?>
              </div>

              <div class="form-group">
                <label>Cateogory</label>
                <select name="cateogory" id="cateogory" class="form-control">
                    <option value="">Select Cateogory</option>
                    <option value="Manufactured Goods"  <?php echo e(old('cateogory') === "Manufactured Goods" ? 'selected' : ''); ?>>Manufactured Goods</option>
                    <option value="Purchased Goods And Services"  <?php echo e(old('cateogory') === "Purchased Goods And Services" ? 'selected' : ''); ?>>Purchased Goods And Services</option>  
                </select>
                 <?php if($errors->has('cateogory')): ?>
                 <span class="text-danger"><?php echo e($errors->first('cateogory')); ?>

               <?php endif; ?>
             </div>
              </div> 

              <div class="mt-3">
                <button type="submit" class="btn btn-success">Save</button>
                <a href ="<?php echo e(route('tableManage')); ?>">
                <button type="button" class="btn btn-outline-dark float-right">View Manage Table</button> 
               </a>
              </div>

            </form>
          </div>     
        </div>
      </div>
    </div>

    <script>
      // JavaScript to hide the error message when the user starts typing
      const inputFields = document.querySelectorAll('input[type="text"], select');
      inputFields.forEach(function (field) {
          field.addEventListener('input', function () {
              const errorSpan = this.nextElementSibling; 
              errorSpan.innerText = '';
          });
      });
  </script>
  </body>
</html><?php /**PATH D:\Laravel\Task_1\resources\views/manage.blade.php ENDPATH**/ ?>