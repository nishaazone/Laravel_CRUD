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
    <title>Edit Bills of Materials</title>
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

  <?php if($message = Session::get('success')): ?>
  <div class="alert alert-success alert-block">
     <strong><?php echo e($message); ?></strong>
 </div>
  <?php endif; ?>
  
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-sm-8">
          <div class="card mt-4 p-3"> 

            <form method="POST" action="/update/<?php echo e($bills->Component_id); ?>" enctype="multipart/form-data">
              <?php echo csrf_field(); ?>     
              <?php echo method_field('PUT'); ?>
              <h6 class="text-secondary">Edit Data for Bill Of Materials</h6>     
              <hr>   

              <div class="form-group">
                <label>Component Name</label>
                <select name="component_name" id="component_name" class="form-control">
                  <option value="">Select Component</option>
                    
                    <?php $__currentLoopData = $column; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $column): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($column->product_name); ?>" <?php if(old('component_name', $column->product_name) == $bills->component_name): ?> selected <?php endif; ?>><?php echo e($column->product_name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>           
                </select>
                 <?php if($errors->has('component_name')): ?>
                 <span class="text-danger"><?php echo e($errors->first('component_name')); ?>

               <?php endif; ?>
             </div>

              <div class="form-group">
                <label>Part Number</label>
                <input type="text" name="part_number" id="part_number" class="form-control" placeholder="Part Number" value="<?php echo e(old('part_number', $bills->part_number)); ?>"/>
                 <?php if($errors->has('part_number')): ?>
                 <span class="text-danger"><?php echo e($errors->first('part_number')); ?>

               <?php endif; ?>
             </div>
                  
             <div class="form-group">
                <label>Description</label>
                 <input type="text" name="description" placeholder="Enter Description" id="description" class="form-control" value="<?php echo e(old('description', $bills->description)); ?>"/>
                 <?php if($errors->has('description')): ?>
                   <span class="text-danger"><?php echo e($errors->first('description')); ?>

                 <?php endif; ?>
             </div>

             <div class="form-group">
                <label>Quantity Per Unit</label>
                 <input type="text" name="quantity_per_unit"  id="quantity_per_unit" placeholder="Enter Quantity Per Unit" class="form-control" value="<?php echo e(old('quantity_per_unit', $bills->quantity_per_unit)); ?>"/>
                 <?php if($errors->has('quantity_per_unit')): ?>
                   <span class="text-danger"><?php echo e($errors->first('quantity_per_unit')); ?>

                 <?php endif; ?>
             </div>

             <div class="form-group">
                <label>Quantity Purchased</label>
                <input type="text" name="quantity_purchased" id="quantity_purchased" class="form-control" placeholder="Enter Quantity Purchased" value="<?php echo e(old('quantity_purchased', $bills->quantity_purchased)); ?>"/>
                 <?php if($errors->has('quantity_purchased')): ?>
                 <span class="text-danger"><?php echo e($errors->first('quantity_purchased')); ?>

               <?php endif; ?>
             </div>

             <div class="form-group">
                <label>Quantity</label>
                <input type="text" name="quantity" id="quantity" class="form-control" placeholder="Enter Quantity" value="<?php echo e(old('quantity', $bills->quantity)); ?>"/>
                 <?php if($errors->has('quantity')): ?>
                 <span class="text-danger"><?php echo e($errors->first('quantity')); ?>

               <?php endif; ?>
             </div>

             <div class="form-group">
                <label>Quantity Unit</label>
                <select name="quantity_unit" id="quantity_unit" class="form-control" >
                    <option value="">Select Quantity Unit</option>
                    <option value="KG" <?php echo e($bills->quantity_unit  === "KG" ? 'selected' : ''); ?>>KG</option>
                    <option value="Metric Tonnes" <?php echo e($bills->quantity_unit === "Metric Tonnes" ? 'selected' : ''); ?>>Metric Tonnes</option> 
                    <option value="Litres" <?php echo e($bills->quantity_unit === "Litres" ? 'selected' : ''); ?>>Litres</option>
                    <option value="Gallons" <?php echo e($bills->quantity_unit === "Gallons" ? 'selected' : ''); ?>>Gallons</option>
                    <option value="Piece" <?php echo e($bills->quantity_unit === "Piece" ? 'selected' : ''); ?>

                      >Piece</option>
                </select>
                 <?php if($errors->has('quantity_unit')): ?>
                 <span class="text-danger"><?php echo e($errors->first('quantity_unit')); ?>

               <?php endif; ?>
             </div>

             <div class="form-group">
                <label>Source</label>
                <select name="source" id="source" class="form-control" >
                    <option value="">Select Source</option>
                    <option value="Internal" <?php echo e($bills->source === "Internal" ? 'selected' : ''); ?>>Internal</option>
                    <option value="External" <?php echo e($bills->source === "External" ? 'selected' : ''); ?>>External</option>
                </select>
                 <?php if($errors->has('source')): ?>
                 <span class="text-danger"><?php echo e($errors->first('source')); ?>

               <?php endif; ?>
             </div>

             <div class="form-group">
                <label>Supplier</label>
                <select name="supplier" id="supplier" class="form-control" >
                    <option value="">Select Supplier</option>
                    <option value="PolyolProducers Inc" <?php echo e($bills->supplier === "PolyolProducers Inc" ? 'selected' : ''); ?>>PolyolProducers Inc</option>
                    <option value="DiisoChem Ltd" <?php echo e($bills->supplier === "DiisoChem Ltd" ? 'selected' : ''); ?>>DiisoChem Ltd</option>
                    <option value="CatFast Solutions" <?php echo e($bills->supplier === "CatFast Solutions" ? 'selected' : ''); ?>>CatFast Solutions</option>
                </select>
                 <?php if($errors->has('supplier')): ?>
                 <span class="text-danger"><?php echo e($errors->first('supplier')); ?>

               <?php endif; ?>
             </div>

             <input type="hidden" name="track_id" value="<?php echo e($bills->track_id); ?>">

              </div> 
              <div class="mt-3">
                <button type="submit" class="btn btn-success">Update</button>
                <a href ="<?php echo e(route('billTable', $bills->track_id )); ?>">
                <button type="button" class="btn btn-outline-dark float-right">View Bills Table</button> 
               </a>
              </div>

            </form>
          </div>     
        </div>
      </div>
    </div>
  </body>
</html>

<?php /**PATH D:\Laravel\Task_1\resources\views/billEditMaterial.blade.php ENDPATH**/ ?>