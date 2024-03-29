<div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
    <?php foreach ($lessons as  $value) : ?>
        <div class="group flex flex-col h-full border border-gray-200 hover:border-transparent hover:shadow-lg transition-all 
    duration-300 rounded-xl p-5 ">

            <a  href="<?php echo $_SERVER['REQUEST_URI'] .'/'. $value['lessons_id'] ?>">
                <div class="aspect-w-16 aspect-h-11">
                    <img class="w-full object-cover rounded-xl" src="public/assests/images/defaultImages.jpg" alt="Image Description">
                </div>
                <div class="my-6">
                    <h3 class="text-xl font-semibold text-gray-800 ">
                        <?php echo $value['title'] ?>
                    </h3>
                    <p class="mt-5 text-gray-600 ">
                        <?php echo $value['description'] ?>
                    </p>
                </div>
                <!-- <div class="mt-auto flex items-center gap-x-3">
                <img class="size-8 rounded-full" src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2&w=320&h=320&q=80" alt="Image Description">
                <div>
                    <h5 class="text-sm text-gray-800 ">By Lauren Waller</h5>
                </div>
            </div> -->

            </a>

            <?php if ($value['teacher_id'] ==  $_SESSION['user']['user_id']) : ?>
            <a 
            href="/lessons/delete/<?php echo $value['lessons_id']  ?>"
            class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2
             text-sm font-semibold rounded-lg border border-transparent bg-blue-600 
             text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none 
             dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                Delete
    </a>

    <?php endif ?>
        </div>
    <?php endforeach ?>

</div>