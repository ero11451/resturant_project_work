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
            <a class="py-3 px-4 inline-flex flex items-center gap-x-1 text-sm 
            font-medium rounded-full border border-gray-200 
            bg-white text-blue-600 shadow-sm hover:bg-gray-50 
            disabled:opacity-50 disabled:pointer-events-none" href="#">
              Read more
              <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="m9 18 6-6-6-6" />
              </svg>
            </a>

          <?php endforeach ?>
        </div>
        <div class=" text-left ">
          <h2 class="text-2xl font-bold md:text-4xl md:leading-tight ">Our chef</h2>
          <p class="mt-1 text-gray-600 ">Creative people</p>
        </div>
        <div class=" flex flex-nowrap  overflow-scroll gap-8 my-3 ">

          <?php foreach ($users as $user) : ?>

            <div class="text-center    rounded">

              <?php if ($user['img_url']) : ?>
                <img class="rounded-full  " src="" alt="Image Description">
              <?php endif ?>

              <?php if (!$user['img_url']) : ?>
                <span class="inline-block size-16 bg-gray-100 rounded-full overflow-hidden">
                  <svg class="size-full text-gray-300" width="46" height="46" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect x="0.62854" y="0.359985" width="15" height="15" rx="7.5" fill="white" />
                    <path d="M8.12421 7.20374C9.21151 7.20374 10.093 6.32229 10.093 5.23499C10.093 4.14767 9.21151 3.26624 8.12421 3.26624C7.0369 3.26624 6.15546 4.14767 6.15546 5.23499C6.15546 6.32229 7.0369 7.20374 8.12421 7.20374Z" fill="currentColor" />
                    <path d="M11.818 10.5975C10.2992 12.6412 7.42106 13.0631 5.37731 11.5537C5.01171 11.2818 4.69296 10.9631 4.42107 10.5975C4.28982 10.4006 4.27107 10.1475 4.37419 9.94123L4.51482 9.65059C4.84296 8.95684 5.53671 8.51624 6.30546 8.51624H9.95231C10.7023 8.51624 11.3867 8.94749 11.7242 9.62249L11.8742 9.93184C11.968 10.1475 11.9586 10.4006 11.818 10.5975Z" fill="currentColor" />
                  </svg>
                </span>
              <?php endif ?>


              <div class="mt-2 sm:mt-4">
                <p class=" text-gray-800  text-xs	">
                  <?php echo $user['username'] ?>
                </p>
                <p class="text-sm text-gray-600 ">
                  <?php echo $user['bio'] ?>
                </p>
              </div>
            </div>

          <?php endforeach ?>

        </div>

      </div>
      <?php

      var_dump($_SESSION["user"]);
      ?>
      <div class=" text-left my-4">
        <h2 class="text-2xl font-bold md:text-4xl md:leading-tight ">Top Lessons</h2>
        <p class="mt-1 text-gray-600 ">Best selections</p>
      </div>


      <?php loadComponent('lessonsList'); ?>

      <div class="mt-12 text-center">
        <a class="py-3 px-4 inline-flex items-center gap-x-1 text-sm font-medium rounded-full border border-gray-200 
    bg-white text-blue-600 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none 
   " href="#">
          Read more
          <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="m9 18 6-6-6-6" />
          </svg>
        </a>
      </div>
    </div>

  </div>
</div>