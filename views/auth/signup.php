<div class="relative overflow-hidden">
  <div class="mx-auto max-w-screen-md  h-screen  py-12 px-4 sm:px-6 md:max-w-screen-xl md:py-20 lg:py-32 md:px-8">
    <div class="md:pe-8 md:w-1/2 xl:pe-0 xl:w-5/12">

      <h1 class="text-3xl text-gray-800 font-bold md:text-4xl md:leading-tight lg:text-5xl lg:leading-tight">
        Welcome to <br> <span class="text-blue-600 dark:text-red-500">Benin foodie</span>
      </h1>
      <p class="mt-3 text-base text-gray-500 mb-8">
      Become the next top chef in the world by learing from the best.
      </p>




      <p class='text-red-500'> <?php echo $data[0] ?? '' ?> </p>

      <form method="POST" action="/register">


        <div>
          <label for="hs-firstname-hire-us-1" class="block mb-2 text-sm text-gray-700 font-medium ">User Name</label>
          <input type="text" name="username" id="hs-firstname-hire-us-1" class="py-3 bg-gray-100 px-4 block w-full border border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none ">


          <p class='text-red-500'> <?php echo $errorMessage['username'] ?? '' ?></p>
        </div>

        <div>
          <label for="hs-firstname-hire-us-1" class="block mb-2 text-sm text-gray-700 font-medium my-3 ">Email</label>
          <input type="text" name="email" id="hs-firstname-hire-us-1" class="py-3 bg-gray-100 px-4 block w-full border border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none ">

          <p class='text-red-500'> <?php echo $errorMessage['email'] ?? '' ?></p>
        </div>

        <div>
          <label for="hs-lastname-hire-us-1" class="block mb-2 text-sm text-gray-700 font-medium  my-3 ">Password</label>
          <input type="password" name="password" id="hs-lastname-hire-us-1" class="py-3 bg-gray-100 px-4 block border w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none ">

          <p class='text-red-500'> <?php echo $errorMessage['password'] ?? '' ?></p>
        </div>

        <div>
          <label for="hs-lastname-hire-us-1" class="block mb-2 text-sm text-gray-700 font-medium  my-3 ">User type</label>
          <select name="user_type" id="hs-lastname-hire-us-1" class="py-3 bg-gray-100 px-4 block border w-full border-gray-200 rounded-lg text-sm focus:border-blue-500
                 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none ">
            <option value="chef">Chef</option>
            <option value="user">User</option>
            <option value="admin">Admin</option>

          </select>

          <p class='text-red-500'> <?php echo $errorMessage['password'] ?? '' ?></p>
        </div>

        <div class="grid mt-3">
          <button type="submit" class="py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-red-600 text-white hover:bg-red-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-red-600">Sign up</button>
        </div>
      </form>
      <div class="mt-3">
        <label for="remember-me" class="text-sm text-gray-600 dark:text-gray-400 ">
          If you don't have an account
          <a class="text-red-600 decoration-2 hover:underline font-medium" href="login">Login</a></label>
      </div>
    </div>
  </div>




  <div style="background-image: url('/public/assests/images/woman-chef-cooking.jpg');" class="hidden md:block md:absolute md:top-0 md:start-1/2 md:end-0 h-full 
      bg-[url('/public/assests/images/woman-chef-cooking-vegetables-pan.jpg')] bg-no-repeat bg-center bg-cover"></div>

</div>