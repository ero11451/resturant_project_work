<?php
loadComponent('header');
loadComponent('sidebar');
$currentUrl = $_SERVER['REQUEST_URI'];
?>

<div class="w-full px-4 sm:px-6 md:px-8 lg:ps-72">

    <section class=''>
        <form method="POST" enctype="multipart/form-data" action="<?php echo $currentUrl ?>">
            <div class="mt-6 grid gap-4 grid lg:gap-6 grid-cols-2">


                <div>
                    <label for="hs-firstname-hire-us-1" class="block mb-2 text-sm text-gray-700 font-medium ">Title</label>
                    <input type="text" name="title" value='<?php echo  $selectedData['title'] ?? '' ?>' id="hs-firstname-hire-us-1" required class="py-3 px-4 block w-full border border-gray-200 rounded-lg text-sm focus:border-blue-500
                  focus:ring-blue-500 bg-gray-100 disabled:opacity-50 disabled:pointer-events-none ">

                </div>

                <div>
                    <label for="hs-firstname-hire-us-1" class="block mb-2 text-sm text-gray-700 font-medium ">Video url</label>
                    <input type="text" name="video_url" value='<?php echo  $selectedData['video_url']  ?? '' ?>'
                     id="hs-firstname-hire-us-1"  class="py-3 px-4 block w-full border border-gray-200 rounded-lg text-sm focus:border-blue-500
                  focus:ring-blue-500 bg-gray-100 disabled:opacity-50 disabled:pointer-events-none ">

                </div>

                <div>

                <label for="hs-firstname-hire-us-1" class="block mb-2 text-sm text-gray-700 
                font-medium ">Category</label>
                <select name="category_id" value='<?php echo  $selectedData["category_id"] ?> ' class="bg-gray-100  py-3 px-4 border pe-9 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none ">
                    <?php foreach ($categories as $categorie) : ?>
                        <option value=' <?php echo $categorie['category_id']  ?>'> <?php echo $categorie['categories_name']  ?></option>
                    <?php endforeach ?>
                </select>
                </div>

                <div>

                <label for="hs-firstname-hire-us-1" class="block mb-2 text-sm text-gray-700 
                font-medium ">Location</label>
                <select name="location_id" value='<?php echo $selectedData["location_id"] ?>'
                 class="bg-gray-100  py-3 px-4 border pe-9 block w-full border-gray-200 rounded-lg text-sm 
                 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none ">
                    <?php foreach ($locations as $location) : ?>
                        <option value='<?php echo $location['location_id']  ?>'> <?php echo $location['location_name']  ?></option>
                    <?php endforeach ?>
                </select>
                </div>

                <div>
                    <label for="hs-firstname-hire-us-1" class="block mb-2 text-sm text-gray-700 font-medium ">Image</label>
                    <input type="file" name="file" id="file" value='<?php echo  $selectedData["img_url"] ?>'
                     class="py-3 px-4 bg-gray-100 block w-full border border-gray-200 rounded-lg text-sm focus:border-blue-500
                           focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none ">

                </div>


                <div>
                    <label for="hs-work-email-hire-us-1" class="block mb-2 text-sm text-gray-700 font-medium ">Status</label>
                    <select name="status" required value='<?php echo  $selectedData["status"] ?> ' class="py-3 px-4 border bg-gray-100 block w-full border-gray-200 rounded-lg text-sm 
                     focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none ">
                        <option value="Public">Public</option>
                        <option value="Private">Private</option>
                    </select>

                </div>

                <!-- <div>
                    <label for="hs-work-email-hire-us-1" class="block mb-2 text-sm text-gray-700 font-medium ">User type</label>
                    <select name="user_type" required
                     class="py-3 px-4 border block w-full border-gray-200 rounded-lg text-sm 
                     focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none ">
                        <option value="chef">Chef</option>
                        <option value="learner">Learner</option>
                    </select>

                </div> -->


                <div class='col-span-2'>

                    <label for="hs-firstname-hire-us-1" class="block mb-2 text-sm text-gray-700 font-medium ">Description</label>
                    <textarea type="text" name="description" rows="4" required class="py-3 px-4 bg-gray-100  border block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 
                focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none ">
                 <?php echo  $selectedData["description"] ?? '' ?> 
                </textarea>

                </div>




                <div class="mt-6 grid">
                    <button type="submit" name="submit" class="
            w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold
            rounded-lg border border-transparent   bg-red-600 text-white hover:bg-red-700 
            disabled:opacity-50 disabled:pointer-events-none ">submit</button>
                </div>
        </form>

    </section>
</div>