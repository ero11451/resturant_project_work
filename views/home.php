
<div>

  <?php
loadComponent('header');
loadComponent('sidebar');

?>

  <div class="w-full px-4 sm:px-6 md:px-8 lg:ps-72">



    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-4 mx-auto">
    <div class=" text-left my-4">
        <h2 class="text-1xl font-bold md:text-1xl md:leading-tight ">Statistics</h2>

      </div>

      <?php loadComponent('stats', [
    'categories' => $categories,
    'users' => $users,
    'locations' => $locations,
    'recipes' => $recipes,
])?>

      <div class=" text-left my-4">
        <h2 class="text-1xl font-bold md:text-1xl md:leading-tight ">Categories <?php echo count($categories); ?></h2>
        </h2>
      </div>
      <div class="max-w-screen  mx-auto ">
        <div class='flex gap-3 mb-3  overflow-scroll'>
          <?php foreach ($categories as $categorie): ?>
            <a class="py-1 px-3 inline-flex flex items-center
            <?php echo $selected_category_id == $categorie["category_id"] ? 'bg-red-800 text-white' : '' ?>
            flex-1 gap-x-1 text-sm  font-medium rounded border border-red-200  text-red-600 shadow-sm
            hover:bg-gray-50  disabled:opacity-50 disabled:pointer-events-none" href="/home?category=<?php echo $categorie["category_id"] ?>">

            <div class='p-2 rounded h-fit'>
           <svg class="flex-shrink-0 size-5  "  xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 11V5a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h6"/><path d="m12 12 4 10 1.7-4.3L22 16Z"/></svg>
</div>
            <p> <?php echo $categorie["categories_name"] ?> </p>

              <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="m9 18 6-6-6-6" />
              </svg>


            </a>

          <?php endforeach?>
        </div>
        <div class=" text-left ">
          <h2 class="text-1xl font-bold md:text-1xl md:leading-tight ">Our users <?php echo count($users); ?></h2>
          <!-- <p class="mt-1 text-gray-600 ">Creative people</p> -->
        </div>
        <div class=" flex flex-nowrap  overflow-scroll gap-8 my-3 ">

          <?php foreach ($users as $user): ?>

            <div class="grid sm:flex sm:items-center gap-y-3 gap-x-4">

              <?php // if ($user['user_img_url']): ?>
                <!-- <img class="rounded-lg size-20" src="https://images.unsplash.com/photo-1568602471122-7832951cc4c5?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2&w=900&h=900&q=80" alt="Image Description"> -->
              <?php // endif?>

              <?php // if (!$user['user_img_url']): ?>
                <span class="inline-block size-20 bg-gray-100 rounded-full overflow-hidden">
                  <svg class="size-full text-gray-300" width="46" height="46" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect x="0.62854" y="0.359985" width="15" height="15" rx="7.5" fill="white" />
                    <path d="M8.12421 7.20374C9.21151 7.20374 10.093 6.32229 10.093 5.23499C10.093 4.14767 9.21151 3.26624 8.12421 3.26624C7.0369 3.26624 6.15546 4.14767 6.15546 5.23499C6.15546 6.32229 7.0369 7.20374 8.12421 7.20374Z" fill="currentColor" />
                    <path d="M11.818 10.5975C10.2992 12.6412 7.42106 13.0631 5.37731 11.5537C5.01171 11.2818 4.69296 10.9631 4.42107 10.5975C4.28982 10.4006 4.27107 10.1475 4.37419 9.94123L4.51482 9.65059C4.84296 8.95684 5.53671 8.51624 6.30546 8.51624H9.95231C10.7023 8.51624 11.3867 8.94749 11.7242 9.62249L11.8742 9.93184C11.968 10.1475 11.9586 10.4006 11.818 10.5975Z" fill="currentColor" />
                  </svg>
                </span>
              <?php // endif?>

              <div class="sm:flex sm:flex-col sm:h-full items-cener align-c">
                <div>
                  <h3 class="font-medium text-gray-800 ">
                    <?php echo $user['username'] ?>
                  </h3>
                  <p class="mt-1 text-xs uppercase text-gray-500">
                    <?php echo $user['email'] ?>
                  </p>
                </div>

                <?php if (('admin' == ($_SESSION['user']['user_type'] ?? ''))): ?>
                  <div class="flex items-start b">

                    <a href='users/delete/<?php echo $user['user_id'] ?>' class="py-1 px-3 inline-flex text-[10px]
                   flex items-center bg-red-700 mt-2 text-white rounded ">
                      Delete
                    </a>
                    <!-- <a href='users/delete/<?php
//  echo $user['user_id']   ?>' class="py-1 px-3 inline-flex text-[10px]  flex items-center
                  bg-blue-700 mt-2 text-white rounded ">
                      Edit
                    </a> -->
                  </div>
                <?php endif?>
              </div>
            </div>
            <div>



            </div>
          <?php endforeach?>

        </div>


        <div class=" text-left my-4">
          <h2 class="text-1xl font-bold md:text-1xl md:leading-tight ">Locations</h2>
        </div>

        <?php foreach ($locations as $location): ?>
          <a class="py-1 px-3 inline-flex flex items-center
            <?php echo $selected_location_id == $location["location_id"] ? 'bg-red-800 text-white' : '' ?>
            flex-1 gap-x-1 text-sm
            font-medium rounded-full border border-red-200   text-red-600 shadow-sm hover:bg-gray-50
            disabled:opacity-50 disabled:pointer-events-none" href="/home?location=<?php echo $location["location_id"] ?>">
            <p> <?php echo $location["location_name"] ?> </p>

            <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="m9 18 6-6-6-6" />
            </svg>
          </a>


        <?php endforeach?>
      </div>

      <div class=" text-left my-4">
        <h2 class="text-2xl font-bold md:text-1xl md:leading-tight ">Recipes</h2>
        <!-- <p class="mt-1 text-gray-600 ">Best selections</p> -->
      </div>


      <?php loadComponent('recipeTable', ['recipes' => $recipes]);?>


    </div>
  </div>