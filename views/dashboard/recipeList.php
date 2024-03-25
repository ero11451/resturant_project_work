<?php

include('../api/db/connection.php');

$user_id = $_SESSION["user"]['user_id'];

if (isset($recipe_id)) {
  $recipe_id = $_GET['recipe_id'];
  $deleteSql = "DELETE FROM recipeTesting WHERE id =  $recipe_id";
  if ($connection->query($deleteSql) ==  TRUE) {
    echo 'this record was deleted successfully';
  }
} else {
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  </style>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body >


  <!-- Table Section -->
  <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
    <!-- Card -->
    <div class="flex flex-col">
      <div class="-m-1.5 overflow-x-auto">
        <div class="p-1.5 min-w-full inline-block align-middle">
          <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden ">
            <!-- Header -->
            <div class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200 ">
              <div>
                <h2 class="text-xl font-semibold text-gray-800 ">
                  Recipe
                </h2>
                <p class="text-sm text-gray-600 ">
                  Add users, edit and more.
                </p>
              </div>

              <div>
                <div class="inline-flex gap-x-2">
                  <button  onclick="refresh()"
                  class="py-2 px-3 inline-flex items-center gap-x-2 text-sm 
                  font-medium rounded-lg border border-gray-200 bg-white text-gray-800 
                  shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none " >
                  Refresh
                  </button>

                  <a 
                   class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg
                   border border-transparent bg-blue-600 text-white hover:bg-blue-700
                    disabled:opacity-50 disabled:pointer-events-none " 
                  href="/pages/dashboard/createRecipe.php">
                    <svg class="flex-shrink-0 size-3" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                      <path d="M2.63452 7.50001L13.6345 7.5M8.13452 13V2" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                    </svg>
                    Add recipe
                  </a>
                </div>
              </div>
            </div>
            <!-- End Header -->

            <!-- Table -->
            <table class="min-w-full divide-y divide-gray-200 ">
              <thead class="bg-gray-50 ">
                <tr>
                  <th scope="col" class="ps-6 py-3 text-start">

                  </th>

                  <th scope="col" class="ps-6 lg:ps-3 xl:ps-0 pe-6 py-3 text-start">
                    <div class="flex items-center gap-x-2">
                      <span class="text-xs font-semibold uppercase tracking-wide text-gray-800">
                        Food
                      </span>
                    </div>
                  </th>

                  <th scope="col" class="px-6 py-3 text-start">
                    <div class="flex items-center gap-x-2">
                      <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 ">
                        Created by
                      </span>
                    </div>
                  </th>

                  <th scope="col" class="px-6 py-3 text-start">
                    <div class="flex items-center gap-x-2">
                      <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 ">
                        Status
                      </span>
                    </div>
                  </th>

                  <th scope="col" class="px-6 py-3 text-start">
                    <div class="flex items-center gap-x-2">
                      <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 ">
                        Portfolio
                      </span>
                    </div>
                  </th>

                  <th scope="col" class="px-6 py-3 text-start">
                    <div class="flex items-center gap-x-2">
                      <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 ">
                        Created
                      </span>
                    </div>
                  </th>

                  <th scope="col" class="px-6 py-3 text-end"></th>
                </tr>
              </thead>

              <tbody id='table-container' class="divide-y divide-gray-200 ">
              <td class="size-px whitespace-nowrap">

</td>
<td class="size-px whitespace-nowrap">
  <div class="ps-6 lg:ps-3 xl:ps-0 pe-6 py-3">
    <div class="flex items-center gap-x-3">
           <img class="inline-block size-[38px] rounded-lg" 
     src="${data["img_url"] !== '' ? data["img_url"] : './../assests/images/defaultImages.jpg' }"
       alt="Image Description">
      <div class="grow">
        <span class="block text-sm font-semibold text-gray-800">    ${data["title"]}</span>
        <span class="block text-sm text-gray-500">  ${data[  "disciption"]}</span>
      </div>
    </div>
  </div>
</td>
<td class="h-px w-72 whitespace-nowrap">
  <div class="px-6 py-3">
    <span class="block text-sm font-semibold text-gray-800 ">  ${data[ "chef_name"]}</span>
    <span class="block text-sm text-gray-500">Chef</span>
  </div>
</td>
<td class="size-px whitespace-nowrap">
  <div class="px-6 py-3">
    <span class="py-1 px-1.5 inline-flex items-center gap-x-1 text-xs font-medium bg-teal-100 text-teal-800 rounded-full ">
      <svg class="size-2.5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
      </svg>
      Active
    </span>
  </div>
</td>
<td class="size-px whitespace-nowrap">
  <div class="px-6 py-3">
    <div class="flex items-center gap-x-3">
      <span class="text-xs text-gray-500">1/5</span>
      <div class="flex w-full h-1.5 bg-gray-200 rounded-full overflow-hidden">
        <div class="flex flex-col justify-center overflow-hidden bg-gray-800 " role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
      </div>
    </div>
  </div>
</td>
<td class="size-px whitespace-nowrap">
  <div class="px-6 py-3">
    <span class="text-sm text-gray-500"> ${data["create_date"]}</span>
  </div>
</td>
<td class="size-px whitespace-nowrap">
  <div class="px-6 py-1.5 flex gap-2">
    <a class="inline-flex items-center gap-x-1 text-sm text-blue-600 decoration-2 hover:underline font-medium "
     href="/pages/dashboard/createRecipe.php?id=${data['id']}">
      Edit
    </a>
    <button onclick="deleteRecipe(${data["id"]})" class="inline-flex items-center gap-x-1 text-sm text-blue-600 decoration-2 hover:underline font-medium ">
      Delete
    </button>
  </div>
  
</td>

              </tbody>
            </table>
            <!-- End Table -->

            <!-- Footer -->
            <div class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-t border-gray-200 ">
              <!-- <div>
                <p class="text-sm text-gray-600 ">
                  <span class="font-semibold text-gray-800 ">6</span> results
                </p>
              </div>

              <div>
                <div class="inline-flex gap-x-2">
                  <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none ">
                    <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                      <path d="m15 18-6-6 6-6" />
                    </svg>
                    Prev
                  </button>

                  <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none ">
                    Next
                    <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                      <path d="m9 18 6-6-6-6" />
                    </svg>
                  </button>
                </div>
              </div>
            </div> -->
            <!-- End Footer -->
          </div>
        </div>
      </div>
    </div>
    <!-- End Card -->
  </div>
  <!-- End Table Section -->



</body>

</html>