<!-- class="bg-gradient-to-r from-red-100 via-red-100 to-red-100" -->
<div>

  <?php
  loadComponent('header');
  loadComponent('sidebar');

  ?>

  <div class="w-full px-4 sm:px-6 md:px-8 lg:ps-72">

    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-4 mx-auto">

      <div class="max-w-screen  mx-auto ">
        <div class='flex gap-3 mb-3  overflow-scroll'>
          <?php foreach ($categories as $categorie) : ?>
            <a class="py-1 px-3 inline-flex flex items-center    
            <?php echo $selected_category_id == $categorie["category_id"] ? 'bg-red-800 text-white' : '' ?>
            flex-1 gap-x-1 text-sm 
            font-medium rounded-full border border-red-200 
       text-red-600 shadow-sm hover:bg-gray-50 
            disabled:opacity-50 disabled:pointer-events-none" 
            href="/lessons?category=<?php echo $categorie["category_id"] ?>">
            <p> <?php  echo $categorie  ["categories_name"] ?> </p>
            
              <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="m9 18 6-6-6-6" />
              </svg>
            </a>

          <?php endforeach ?>
        </div>
   

      </div>

      <div class=" text-left my-4">
        <h2 class="text-2xl font-bold md:text-4xl md:leading-tight ">Lessons</h2>
        <p class="mt-1 text-gray-600 ">Best selections</p>
      </div>


      <?php loadComponent('lessonsList',  ['lessons' => $lessons]); ?>

      <!-- <div class="mt-12 text-center">
        <a class="p
        y-3 px-4 inline-flex items-center gap-x-1 text-sm font-medium rounded-full 
        border border-gray-200  bg-white text-blue-600 shadow-sm hover:bg-gray-50 
        disabled:opacity-50 disabled:pointer-events-none " href="#">
          Read more
          <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="m9 18 6-6-6-6" />
          </svg>
        </a>
      </div>
    </div> -->

  </div>
</div>