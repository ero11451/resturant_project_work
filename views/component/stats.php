
  <!-- Grid -->
  <div class="grid md:grid-cols-4 border border-gray-200 shadow-sm rounded-xl overflow-hidden ">
    <!-- Card -->
    <a class="block p-4 md:p-5 relative bg-white hover:bg-gray-50 before:absolute before:top-0 before:start-0 before:w-full before:h-px md:before:w-px md:before:h-full before:bg-gray-200 before:first:bg-transparent " href="#">
      <div class="flex md:grid lg:flex gap-y-3 gap-x-5">
      <div class='p-2 bg-red-800 rounded h-fit'>
           <svg class="flex-shrink-0 size-5 text-white "  xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
</div>
        <div class="grow">
          <p class="text-xs uppercase tracking-wide font-medium text-gray-800 ">
            Total users
          </p>
          <h3 class="mt-1 text-xl sm:text-2xl font-semibold ">
          <?php echo count($users); ?>
          </h3>
       
        </div>
      </div>
    </a>
    <!-- End Card -->

    <!-- Card -->
    <a class="block p-4 md:p-5 relative bg-white hover:bg-gray-50 before:absolute before:top-0 before:start-0 before:w-full before:h-px md:before:w-px md:before:h-full before:bg-gray-200 before:first:bg-transparent " href="#">
      <div class="flex md:grid lg:flex gap-y-3 gap-x-5">
        <div class='p-2 bg-red-800 rounded h-fit'>
           <svg class="flex-shrink-0 size-5 text-white " xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 22h14"/><path d="M5 2h14"/><path d="M17 22v-4.172a2 2 0 0 0-.586-1.414L12 12l-4.414 4.414A2 2 0 0 0 7 17.828V22"/><path d="M7 2v4.172a2 2 0 0 0 .586 1.414L12 12l4.414-4.414A2 2 0 0 0 17 6.172V2"/></svg>
 
        </div>
      
        <div class="grow">
          <p class="text-xs uppercase tracking-wide font-medium text-gray-800 ">
          Total  categories
          </p>
          <h3 class="mt-1 text-xl sm:text-2xl font-semibold  ">
          <?php echo count($categories); ?>
          </h3>
        
        </div>
      </div>
    </a>
    <!-- End Card -->

    <!-- Card -->
    <a class="block p-4 md:p-5 relative bg-white hover:bg-gray-50 before:absolute before:top-0 before:start-0 before:w-full before:h-px md:before:w-px md:before:h-full before:bg-gray-200 before:first:bg-transparent 
   0" href="#">
      <div class="flex md:grid lg:flex gap-y-3 gap-x-5">
      <div class='p-2 bg-red-800 rounded h-fit'>
           <svg class="flex-shrink-0 size-5 text-white "  xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 11V5a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h6"/><path d="m12 12 4 10 1.7-4.3L22 16Z"/></svg>
</div>
        <div class="grow">
          <p class="text-xs uppercase tracking-wide font-medium text-gray-800 ">
          Total  locations
          </p>
          <h3 class="mt-1 text-xl sm:text-2xl font-semibold  ">
          <?php echo count($locations); ?>
          </h3>
       
        </div>
      </div>
    </a>
    <!-- End Card -->

    <!-- Card -->
    <a class="block p-4 md:p-5 relative bg-white hover:bg-gray-50 before:absolute before:top-0 before:start-0 before:w-full before:h-px md:before:w-px md:before:h-full before:bg-gray-200 before:first:bg-transparent 
   " href="#">
      <div class="flex md:grid lg:flex gap-y-3 gap-x-5">
      <div class='p-2 bg-red-800 rounded h-fit'>
           <svg class="flex-shrink-0 size-5 text-white " xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12s2.545-5 7-5c4.454 0 7 5 7 5s-2.546 5-7 5c-4.455 0-7-5-7-5z"/><path d="M12 13a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/><path d="M21 17v2a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-2"/><path d="M21 7V5a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2"/></svg>
</div>
        <div class="grow">
          <p class="text-xs uppercase tracking-wide font-medium text-gray-800 ">
           recipes
          </p>
          <h3 class="mt-1 text-xl sm:text-2xl font-semibold">
          <?php echo count($recipes); ?>
          </h3>
         
        </div>
      </div>
    </a>
    <!-- End Card -->
  </div>
  <!-- End Grid -->