<?php
  loadComponent('header');
  loadComponent('sidebar');
  $user_recipes;
?>
  <div class="w-full px-4 sm:px-6 md:px-8 lg:ps-72">

<div class="max-w-[85rem]  sm:px-6 lg:px-8 l mx-auto">

  <div class="max-w-screen  mx-auto ">

<div class="max-w-[85rem] px-4 sm:px-6 lg:px-8 mx-auto">
    <div class="grid lg:grid-cols-3 gap-y-8 lg:gap-y-0 lg:gap-x-6">
     
      <div class="lg:col-span-2">
        <div class="py-8 lg:pe-8">
          <div class="space-y-5 lg:space-y-8">
            <a class="inline-flex items-center gap-x-1.5 text-sm text-gray-600 decoration-2 hover:underline
            " href="#">
              <svg class="flex-shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"/></svg>
              Back to Blog
            </a>
  
            <h2 class="text-3xl font-bold lg:text-5xl ">
              <?php  echo $data['title'] ?>
            </h2>
  
            <div class="flex items-center gap-x-5">
              <a class="inline-flex items-center gap-1.5 py-1 px-3 sm:py-2 sm:px-4 rounded-full
               text-xs sm:text-sm bg-gray-100 text-gray-800 hover:bg-gray-200  " >
                <?php echo $data['categories_name'] ?>
              </a>
              <p class="text-xs sm:text-sm text-gray-800 ">
                <?php 
                echo format_date ( $data['create_date'], 'd/m/y H:i:s');
                
                  ?>
              </p>
            </div>
  
            <p class="text-lg text-gray-800 ">
            <?php 
             echo $data['description'] ?>
            </p>
  

  
            <figure>
              <img class="w-full object-cover rounded-xl"
               src="<?php $img_url =  explode('/', $data['img_url']);
                                     echo !$data['img_url'] ? 'public/assests/images/defaultImages.jpg' :
                                    './../uploads/' . $img_url[6]; ?>" 
                alt="Image Description">
         


            </figure>
  
       
  
          
          </div>
        </div>
      </div>
      <!-- End Content -->
  
      <!-- Sidebar -->
      <div class="lg:col-span-1 lg:w-full lg:h-full lg:bg-gradient-to-r lg:from-gray-50 lg:via-transparent lg:to-transparent ">
        <div class="sticky top-0 start-0 py-8 lg:ps-8">
          <!-- Avatar Media -->
          <div class="group flex items-center gap-x-3 border-b border-gray-200 pb-8 mb-8">
            <a class="block flex-shrink-0" >
          
        
               <?php if ($data['user_img_url']) : ?>
                <img class="h-10 w-10 rounded-full" 
             
                  src="https://images.unsplash.com/photo-1568602471122-7832951cc4c5?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2&w=300&h=300&q=80" alt="Image Description" />

              <?php endif ?>
              <?php if (!$data['user_img_url']) : ?>
                <span class="inline-block size-[52px] bg-gray-100 rounded-full overflow-hidden">
                  <svg class="size-full text-gray-300" width="46" height="46" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect x="0.62854" y="0.359985" width="15" height="15" rx="7.5" fill="white" />
                    <path d="M8.12421 7.20374C9.21151 7.20374 10.093 6.32229 10.093 5.23499C10.093 4.14767 9.21151 3.26624 8.12421 3.26624C7.0369 3.26624 6.15546 4.14767 6.15546 5.23499C6.15546 6.32229 7.0369 7.20374 8.12421 7.20374Z" fill="currentColor" />
                    <path d="M11.818 10.5975C10.2992 12.6412 7.42106 13.0631 5.37731 11.5537C5.01171 11.2818 4.69296 10.9631 4.42107 10.5975C4.28982 10.4006 4.27107 10.1475 4.37419 9.94123L4.51482 9.65059C4.84296 8.95684 5.53671 8.51624 6.30546 8.51624H9.95231C10.7023 8.51624 11.3867 8.94749 11.7242 9.62249L11.8742 9.93184C11.968 10.1475 11.9586 10.4006 11.818 10.5975Z" fill="currentColor" />
                  </svg>
                </span>
              <?php endif ?> 
         
             </a>
  
            <a class="group grow block" href="">
              <h5 class="group-hover:text-gray-600 text-sm font-semibold text-gray-800 0">
               <?php echo  $data['username'] ?>
              </h5>
              <p class="text-sm text-gray-500">
                <?php echo $data['email'] ?>
              </p>
            </a>
  
            <div class="grow">
              <div class="flex justify-end">
                <button type="button" class="py-1.5 px-2.5 inline-flex items-center gap-x-2 text-xs font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none
                ">
                  <svg class="flex-shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><line x1="19" x2="19" y1="8" y2="14"/><line x1="22" x2="16" y1="11" y2="11"/></svg>
                 <?php echo $data['user_type'] ?>
                </button>
              </div>
            </div>
          </div>

  
          <div class="space-y-6">
           <?php foreach(  $user_recipes as   $user_lesson) : ?>
            <a class="group flex items-center gap-x-6" href="#">
              <div class="grow">
                <span class="text-sm font-bold text-gray-800 group-hover:text-blue-600 ">
                <?php  echo $user_lesson['title'] ?>
                
                </span>
              </div>
  
              <div class="flex-shrink-0 relative rounded-lg overflow-hidden w-20 h-20">
                <img class="w-full h-full absolute top-0 start-0 object-cover rounded-lg" 
                src="<?php $img_url =  explode('/', $user_lesson['img_url']);
                                     echo !$user_lesson['img_url'] ? 'public/assests/images/defaultImages.jpg' :
                                    './../uploads/' . $img_url[6]; ?>"  alt="Image Description">
              </div>
            </a>
         <?php endforeach ?>
          </div>
        </div>
      </div>
    
    </div>
  </div>
  </div>
  </div>
  <div>