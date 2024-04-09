<?php


$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

?>
<div id="application-sidebar" class="
   hs-overlay hs-overlay-open:translate-x-0 -translate-x-full transition-all duration-300 
   transform hidden fixed top-0 start-0 bottom-0 z-[60] w-64 bg-white border-e border-gray-200 
   pt-7 pb-10 overflow-y-auto lg:block lg:translate-x-0 lg:end-auto
   lg:bottom-0 [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full 
   [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 
   dark:[&::-webkit-scrollbar-track]:bg-red-700 dark:[&::-webkit-scrollbar-thumb]:bg-red-500 
   bg-gradient-to-r from-red-800 via-red-800 to-red-800
 ">
  <div class="px-6">
    <a class="flex-none text-xl font-semibold dark:text-white dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" href="#" aria-label="Brand">Benin foodie</a>
  </div>

  <nav class="hs-accordion-group p-6 w-full flex flex-col flex-wrap">
    <ul class="space-y-1.5">

      <?php if ($_SESSION['user']['user_type'] !== 'user') : ?>
        <li>
          <a class="
          flex items-center gap-x-3.5 py-2 px-2.5 text-sm  rounded-lg 
           hover:bg-gray-100  hover:text-red-800  <?php echo $url == '/home' ? ' bg-white text-red-800' : 'text-white' ?> " href="/home">
            <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
              <polyline points="9 22 9 12 15 12 15 22" />
            </svg>
            Dashboard
          </a>
        </li>
      <?php endif ?>


        <!-- <li>
          <a class="
          flex items-center gap-x-3.5 py-2 px-2.5 text-sm  rounded-lg 
           hover:bg-gray-100  hover:text-red-800  <?php echo $url == '/profile' ? ' bg-white text-red-800' : 'text-white' ?> "
            href="/profile">
           <span class="inline-block size-[22px]  rounded-full overflow-hidden">
                  <svg class="size-full text-red-600" width="46" height="46" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect x="0.62854" y="0.359985" width="15" height="15" rx="7.5" fill="white" />
                    <path d="M8.12421 7.20374C9.21151 7.20374 10.093 6.32229 10.093 5.23499C10.093 4.14767 9.21151 3.26624 8.12421 3.26624C7.0369 3.26624 6.15546 4.14767 6.15546 5.23499C6.15546 6.32229 7.0369 7.20374 8.12421 7.20374Z" fill="currentColor" />
                    <path d="M11.818 10.5975C10.2992 12.6412 7.42106 13.0631 5.37731 11.5537C5.01171 11.2818 4.69296 10.9631 4.42107 10.5975C4.28982 10.4006 4.27107 10.1475 4.37419 9.94123L4.51482 9.65059C4.84296 8.95684 5.53671 8.51624 6.30546 8.51624H9.95231C10.7023 8.51624 11.3867 8.94749 11.7242 9.62249L11.8742 9.93184C11.968 10.1475 11.9586 10.4006 11.818 10.5975Z" fill="currentColor" />
                  </svg>
                </span>
            Profile
          </a>
        </li> -->


   <li>
        <a href="/recipes" class="w-full flex items-center gap-x-3.5 py-2 px-2.5 text-sm  rounded-lg hover:bg-gray-100 
        hover:text-red-800 
            <?php echo $url == '/recipes' ? ' bg-white text-red-800' : 'text-white' ?> 
            ">
          <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z" />
            <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z" />
          </svg>
          Recipes
        </a>
      </li>

      <li>
        <a href="/about" class="w-full flex items-center gap-x-3.5 py-2 px-2.5 text-sm  rounded-lg hover:bg-gray-100 
        hover:text-red-800 
            <?php echo $url == '/about' ? ' bg-white text-red-800' : 'text-white' ?> 
            ">
            <svg class="flex-shrink-0 size-4 " xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"/><path d="M12 17h.01"/></svg>

About
        </a>
      </li>

      <li>
        <a href="/contact_us" class="w-full flex items-center gap-x-3.5 py-2 px-2.5 text-sm  rounded-lg hover:bg-gray-100 
        hover:text-red-800 
            <?php echo $url == '/contact_us' ? ' bg-white text-red-800' : 'text-white' ?> 
            ">
            <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 9a2 2 0 0 1-2 2H6l-4 4V4c0-1.1.9-2 2-2h8a2 2 0 0 1 2 2v5Z"/><path d="M18 9h2a2 2 0 0 1 2 2v11l-4-4h-6a2 2 0 0 1-2-2v-1"/></svg>
       
          Contact
        </a>
      </li>

      <?php if ($_SESSION['user']['user_type'] !== 'user') : ?>
        <li>
          <a href="/recipes/mode/create" class="w-full flex items-center gap-x-3.5 py-2 px-2.5 text-sm  rounded-lg hover:bg-gray-100 
        hover:text-red-800 
            <?php echo $url == '/recipes/mode/create' ? ' bg-white text-red-800' : 'text-white' ?> 
            " href="#">
            <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m7 11 2-2-2-2"/><path d="M11 13h4"/><rect width="18" height="18" x="3" y="3" rx="2" ry="2"/></svg>
       
            Create Recipe
          </a>
        </li>
      <?php endif ?>
   

      <li>
        <a href="/logout" class="w-full flex items-center gap-x-3.5 py-2 px-2.5 text-sm  rounded-lg hover:bg-gray-100 
        hover:text-red-800 
            <?php echo $url == '/logout' ? ' bg-white text-red-800' : 'text-white' ?> 
            ">
          <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <rect width="18" height="18" x="3" y="4" rx="2" ry="2" />
            <line x1="16" x2="16" y1="2" y2="6" />
            <line x1="8" x2="8" y1="2" y2="6" />
            <line x1="3" x2="21" y1="10" y2="10" />
            <path d="M8 14h.01" />
            <path d="M12 14h.01" />
            <path d="M16 14h.01" />
            <path d="M8 18h.01" />
            <path d="M12 18h.01" />
            <path d="M16 18h.01" />
          </svg>

          logout
        </a>
      </li>
    </ul>
  </nav>
</div>