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
    <title>Manage Trashed Products</title>

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
        <a class="nav-link text-light navbar-brand" href="<?php echo e(route('tableManage')); ?>">Manage > Products > Trash</a>   
        <a class="nav-link text-light navbar-brand float-right" href="/track">Go to Track Module</a>   
  </nav>

 
  <div class="container">
    <div class="mt-2">
      <a href="<?php echo e(route('tableManage')); ?>">
        <button class="btn btn-success m-4 float-right">Go to manage table</button>
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
                
                <button type="button" data-toggle="modal" data-target="#exampleModal" class="btn btn-danger btn-sm">Delete</button>

                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete Manage Product</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                       Do you want to delete this entry permanently?
                      </div>
                      <div class="modal-footer">
                        
                        <a href="/forcedelete/<?php echo e($item->id); ?>" class="btn btn-danger btn-sm">Confirm Delete</a>
                      </div>
                    </div>
                  </div>
                </div>
              </td>
              <td>
                <a href="/restore/<?php echo e($item->id); ?>" class="btn btn-primary btn-sm">Restore</a>
              </td>
          </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
      </table>
      
  

  </div>
</body>
</html>
<?php /**PATH D:\Laravel\Task_1\resources\views/manage_trashtable.blade.php ENDPATH**/ ?>