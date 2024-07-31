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
    <title>Manage Products Table</title>

    <style>
      .container{
        margin-top: 5px;
      }
      th, td{
        text-align: center;
      }
      </style>
</head>
<body>

    <nav class="navbar navbar-dark bg-success">     
        <a class="nav-link text-light navbar-brand" href="/">Manage > Products > Details</a>   
        <a class="nav-link text-light navbar-brand float-right" href="/track">Go to Track Module</a>   
  </nav>

  <div class="container">
    <div class="mt-2">
      <a href="<?php echo e(route('manageTrash')); ?>">
        <button class="btn btn-secondary m-4 float-right">Trash</button>
      </a>
    </div>
    
    <table class="table table-hover mt-4">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Product</th>
            <th scope="col">Cateogory</th>
            <th colspan="2">Operations</th>
          </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $manage; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
            <td><?php echo e($item->id); ?></td>
            <td><?php echo e($item->product_name); ?></td>
            <td><?php echo e($item->cateogory); ?></td>
            <td>
                <a href="/manage/edit/<?php echo e($item->id); ?>" class="btn btn-info btn-sm">Edit</a>
              </td>
              <td>
                <a href="/manage/delete/<?php echo e($item->id); ?>" class="btn btn-danger btn-sm">Delete</a>
              </td>
          </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
      </table>
      <div class="mt-3">
        <?php echo e($manage->links()); ?>

      </div>
  </div>
</body>
</html>
<?php /**PATH D:\Laravel\Task_1\resources\views/managetable.blade.php ENDPATH**/ ?>