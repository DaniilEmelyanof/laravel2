


<?php $__env->startSection('content'); ?>
          <main class="my-8">
            <div class="container px-6 mx-auto">
                <div class="flex justify-center my-6">
                    <div class="flex flex-col w-full p-8 text-gray-800 bg-white shadow-lg pin-r pin-y md:w-4/5 lg:w-4/5">
                      <?php if($message = Session::get('success')): ?>
                          <div class="p-4 mb-3 bg-green-400 rounded">
                              <p class="text-green-800"><?php echo e($message); ?></p>
                          </div>
                      <?php endif; ?>
                        <h3 class="text-3xl text-bold">Cart List</h3>
                      <div class="flex-1">
                        <table class="w-full text-sm lg:text-base" cellspacing="0">
                          <thead>
                            <tr class="h-12 uppercase">
                              <th class="hidden md:table-cell"></th>
                              <th class="text-left">Name</th>
                              <th class="pl-5 text-left lg:text-right lg:pl-0">
                                <span class="lg:hidden" title="Quantity">Qtd</span>
                                <span class="hidden lg:inline">Quantity</span>
                              </th>
                              <th class="hidden text-right md:table-cell"> price</th>
                              <th class="hidden text-right md:table-cell"> Remove </th>
                            </tr>
                          </thead>
                          <tbody>
                              <?php $__currentLoopData = $cartItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                              <td>
                                <a href="#">
                                  <p class="mb-2 md:ml-4"><?php echo e($item->name); ?></p>
                                  
                                </a>
                              </td>
                              <td class="justify-center mt-6 md:justify-end md:flex">
                                <div class="h-10 w-28">
                                  <div class="relative flex flex-row w-full h-8">
                                    
                                    <form action="<?php echo e(route('cart.update')); ?>" method="POST">
                                      <?php echo csrf_field(); ?>
                                      <input type="hidden" name="id" value="<?php echo e($item->id); ?>" >
                                    <input type="number" name="quantity" value="<?php echo e($item->quantity); ?>" 
                                    class="w-6 text-center bg-gray-300" />
                                    <button type="submit" class="px-2 pb-2 ml-2 text-white bg-blue-500">update</button>
                                    </form>
                                  </div>
                                </div>
                              </td>
                              <td class="hidden text-right md:table-cell">
                                <span class="text-sm font-medium lg:text-base">
                                    $<?php echo e($item->price); ?>

                                </span>
                              </td>
                              <td class="hidden text-right md:table-cell">
                                <form action="<?php echo e(route('cart.remove')); ?>" method="POST">
                                  <?php echo csrf_field(); ?>
                                  <input type="hidden" value="<?php echo e($item->id); ?>" name="id">
                                  <button class="px-4 py-2 text-white bg-red-600">x</button>
                              </form>
                                
                              </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                             
                          </tbody>
                        </table>
                        <div>
                         Total: $<?php echo e(Cart::getTotal()); ?>

                        </div>
                        <div>
                          <form action="<?php echo e(route('cart.clear')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <button class="px-6 py-2 text-red-800 bg-red-300">Remove All Cart</button>
                          </form>
                        </div>
                        <div class="pull-right">
            <a class="btn btn-primary" href="<?php echo e(route('products.index')); ?>"> Back</a>
        </div>

                      </div>
                    </div>
                  </div>
            </div>
        </main>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ORBP\LR5.1\lab-laravel\resources\views/cart.blade.php ENDPATH**/ ?>