<?php 

  $error   = "";
  $email =  $password = "";

 if ($_SERVER["REQUEST_METHOD"] == "POST") {

      if (empty($_POST["password"])) {
        $passwordErr= "Password is required";
      } else {
        $password = test_input($_POST["password"]);
      }
        
      if (empty($_POST["email"])) {
        $error['email'] = "Email is required";
      } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $emailErr = "Invalid email format";
        }
      }
   

      }


?>



<div class="relative overflow-hidden">
  <div class="mx-auto max-w-screen-md  h-screen  py-12 px-4 sm:px-6 md:max-w-screen-xl md:py-20 lg:py-32 md:px-8">
    <div class="md:pe-8 md:w-1/2 xl:pe-0 xl:w-5/12">

      <h1 class="text-3xl text-gray-800 font-bold md:text-4xl md:leading-tight lg:text-5xl lg:leading-tight">
        Welcome back  <br> <span class="text-blue-600 dark:text-red-500">The plug</span>
      </h1>
      <p class="mt-3 text-base text-gray-500 mb-8">
        Built on standard web technology, teams use Preline to build beautiful cross-platform hybrid apps in a fraction of the time.
      </p>


 


      <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div class="mb-4">
          <label for="hs-hero-name-2" class="block text-sm font-medium dark:text-white"><span class="sr-only">Full name</span></label>
          <input type="text" id="hs-hero-name-2" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none 
          border" placeholder="Full name">
        </div>

        <div class="mb-4">
          <label for="hs-hero-email-2" class="block text-sm font-medium dark:text-white"><span class="sr-only">Email address</span></label>
          <input type="email" id="hs-hero-email-2" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none 
          border" placeholder="Email address">
        </div>

        <div class="mb-4">
          <label for="hs-hero-password-2" class="block text-sm font-medium dark:text-white"><span class="sr-only">Password</span></label>
          <input type="email" id="hs-hero-password-2" class="py-3 px-4 border block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none" placeholder="Password">
        </div>

        <div class="grid">
          <button type="submit" class="py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-red-600 text-white hover:bg-red-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-red-600">Sign up</button>
        </div>
      </form>
      <!-- End Form -->
    </div>
  </div>



  <div
  style="background-image: url('https://img.freepik.com/free-photo/woman-chef-cooking-vegetables-pan_1303-22282.jpg?w=1800&t=st=1711334080~exp=1711334680~hmac=2f236c51c111526d6f709d7dc3cc2afc900e2f4ef9a20b798b4ac62da2421609');"
  class="hidden md:block md:absolute md:top-0 md:start-1/2 md:end-0 h-full 
      bg-[url('https://img.freepik.com/free-photo/woman-chef-cooking-vegetables-pan_1303-22282.jpg?w=1800&t=st=1711334080~exp=1711334680~hmac=2f236c51c111526d6f709d7dc3cc2afc900e2f4ef9a20b798b4ac62da2421609')] bg-no-repeat bg-center bg-cover"></div>

</div>
