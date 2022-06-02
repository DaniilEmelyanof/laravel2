
<?php $__env->startSection('content'); ?>

    

    <div class="container px-6 mx-auto">
        <h3 class="text-2xl font-medium text-gray-700">Product List</h3>
        <div class="pull-right">
                <a class="btn btn-success" href="<?php echo e(route('products.create')); ?>"> Create New Product</a>
            </div>
        <div class="grid grid-cols-1 gap-6 mt-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="w-full max-w-sm mx-auto overflow-hidden rounded-md shadow-md">
                 <div class="flex items-end justify-end w-full bg-cover">
                    
                </div>
                <div class="px-5 py-3">
                    <h3 class="text-gray-700 uppercase"><?php echo e($product->name); ?></h3>
                    <span class="mt-2 text-gray-500">$<?php echo e($product->price); ?></span>
                    <form action="<?php echo e(route('cart.store')); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" value="<?php echo e($product->id); ?>" name="id">
                        <input type="hidden" value="<?php echo e($product->name); ?>" name="name">
                        <input type="hidden" value="<?php echo e($product->description); ?>" name="description">
                        <input type="hidden" value="<?php echo e($product->price); ?>"  name="price">
                        <input type="hidden" value="1" name="quantity">
                        <button class="px-4 py-2 text-white bg-blue-800 rounded">Add To Cart</button> 
                    </form>
                    <a class="btn btn-info" href="<?php echo e(route('products.show',$product->id)); ?>">Show</a>
                    <a class="btn btn-primary" href="<?php echo e(route('products.edit',$product->id)); ?>">Edit</a>
                     <form action="<?php echo e(route('products.destroy',$product->id)); ?>" method="POST">
                     <?php echo csrf_field(); ?>
                     <?php echo method_field('DELETE'); ?>
                     <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                 </div>
                
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ORBP\LR5.1\lab-laravel\resources\views/index.blade.php ENDPATH**/ ?>