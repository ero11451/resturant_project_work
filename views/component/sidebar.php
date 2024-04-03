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
    <a class="flex-none text-xl font-semibold dark:text-white dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" href="#" aria-label="Brand">Brand</a>
  </div>

  <nav class="hs-accordion-group p-6 w-full flex flex-col flex-wrap">
    <ul class="space-y-1.5">

      <?php if ($_SESSION['user']['user_type'] !== 'learner') : ?>
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

      <?php if ($_SESSION['user']['user_type'] !== 'learner') : ?>
        <li>
          <a href="/recipes/mode/create" class="w-full flex items-center gap-x-3.5 py-2 px-2.5 text-sm  rounded-lg hover:bg-gray-100 
        hover:text-red-800 
            <?php echo $url == '/recipes/mode/create' ? ' bg-white text-red-800' : 'text-white' ?> 
            " href="#">
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