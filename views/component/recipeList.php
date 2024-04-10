<div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">


    <?php foreach ($recipes as  $value) : ?>
        <div class="group flex flex-col h-full border border-gray-200 hover:border-transparent hover:shadow-lg transition-all 
    duration-300 rounded-xl p-5 ">


            <a href="<?php echo  $_SERVER['REQUEST_URI'] . '/' . $value['recipe_id'] ?>">
                <div class="aspect-w-16 aspect-h-11">

                    <img class="w-full object-cover rounded-xl h-[250px]" 
                    src="<?php $img_url =  explode('/', $value['img_url']);
                                                                        echo !$value['img_url'] ? 'public/assests/images/defaultImages.jpg' :
                                                                            './../uploads/' . end($img_url); ?>" alt="Image Description">
                </div> 
                <div class="my-6">
                    <h3 class="text-xl font-semibold text-gray-800 ">
                        <?php echo $value['title'] ?>
                    </h3>
                    <p class="mt-5 text-gray-600 ">
                        <!-- <?php echo $value['description'] ?> -->
                    </p>
                </div>
                 
                
                <div class="mt-auto flex items-center gap-x-3">
                    <div>
                        <h5 class="text-sm text-gray-800 mb-4 ">
                            Created by
                          <?php echo $value['username'] ?? ''  ?>
                       </h5>
                    </div>
                </div>
                <div class="flex gap-2">

            </a>

            <?php if (($value['teacher_id'] ==  $_SESSION['user']['user_id']) || ('admin' ==  $_SESSION['user']['user_type'])) : ?>

                <!-- <a href="/recipes/delete/<?php echo $value['recipe_id']  ?>"
                 class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2
             text-sm font-semibold rounded-lg border border-transparent bg-red-600 
             text-white hover:bg-red-700 disabled:opacity-50 disabled:pointer-events-none 
            ">
                    Delete
                </a>

                <a href="/recipes/mode/update?recipes=<?php echo $value['recipe_id']  ?>" 
                class="
                  w-full py-3 px-4 inline-flex justify-center items-center gap-x-2
                  text-sm font-semibold rounded-lg border border-transparent bg-blue-600 
                  text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none 
                ">
                    Edit
                </a> -->

            <?php endif ?>

        </div>
</div>
<?php endforeach ?>

<?php if (!$recipes) : ?>
    <p> NO DATA FOUND</p>

<?php endif ?>
</div>



