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
    <title>Track Products Table</title>

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
        <a class="nav-link text-light navbar-brand" href="/track">Track > Products > Details</a>   
        <a class="nav-link text-light navbar-brand float-right" href="/">Go to Manage Module</a>   
  </nav>

  <div class="container">
    <div class="mt-2">
      <a href="<?php echo e(route('trackTrash')); ?>">
        <button class="btn btn-secondary m-4 float-right">Trash</button>
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
            <?php $__currentLoopData = $tracks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $track): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
            <td><a href="products/<?php echo e($track->id); ?>/show" class="link-dark"><?php echo e($track->id); ?></td>
            <td><?php echo e($track->product_name); ?></td>
            <td><?php echo e($track->cateogory); ?></td>
            <td><?php echo e($track->quantity_produced); ?></td>
            <td><?php echo e($track->quantity_sold); ?></td>
            <td><?php echo e($track->quantity_unit); ?></td>
            <td><?php echo e($track->reporting_period); ?></td>
            <td><?php echo e(App\Helpers\MyHelpers::getFormattedDateAttribute($track->start_date)); ?></td>
            <td><?php echo e(App\Helpers\MyHelpers::getFormattedDateAttribute($track->end_date)); ?></td>
            <td>
                <a href="/track/edit/<?php echo e($track->id); ?>" class="btn btn-info btn-sm">Edit</a>
              </td>
              <td>
                <a href="/track/delete/<?php echo e($track->id); ?>" class="btn btn-danger btn-sm">Delete</a>
              </td>
          </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
      </table>
      <div class="mt-3">
        <?php echo e($tracks->links()); ?>

      </div>
  </div>
</body>
</html>
<?php /**PATH D:\Laravel\Task_1\resources\views/tracktable.blade.php ENDPATH**/ ?>