<aside class="main-sidebar sidebar-light-primary">
  
  <a href="<?php echo e(url('/')); ?>" class="brand-link w-100 text-center">
        <img src="<?php echo e(asset('admin/images/logxo.png')); ?>" alt="AdminLTE Logo" class="brand-image-xl ourlogo">

      </a>


  <div class="sidebar">
  


 
    <nav class="mt-4">
     
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      
        <li class="nav-item">
        <a href="<?php echo e(url('/dashboard')); ?>" class="nav-link <?php echo e(Request::is('dashboard*') ? 'active' : ''); ?>">
            <i class="nav-icon fas fa-tachometer-alt">
               </i>
            <p>
              Dashboard

            </p>
          </a>

        </li>
        <li class="nav-item">
      <a href="<?php echo e(route('portfolio.blog')); ?>" class="nav-link <?php echo e(Request::is('portfolio/blog*') ? 'active' : ''); ?>">
            <i class="nav-icon fas fa-tachometer-alt">
               </i>
            <p>
              Portfolio

            </p>
          </a>

        </li>



          <li class="nav-item">
          <a href="<?php echo e(url('/servies')); ?>" class="nav-link <?php echo e(Request::is('servies.index*') ? 'active' : ''); ?>">
              <i class="nav-icon fas fa-tachometer-alt">
                </i>
              <p>
                Servies
              </p>
            </a>
</li>
  
        </ul>
      </nav>

  </div>

</aside><?php /**PATH C:\xampp\htdocs\conceptiqs12\conceptiqs\resources\views\configuration\layouts\sidebar.blade.php ENDPATH**/ ?>