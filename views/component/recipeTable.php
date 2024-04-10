

<table class="w-full border-collapse">
    <thead>
        <tr class="bg-gray-100">
            <th scope="col" class="border p-3 text-left">Image</th>
            <th scope="col" class="border p-3 text-left">Title</th>
            <th scope="col" class="border p-3 text-left">Description</th>
            <th scope="col" class="border p-3 text-left">location</th>
            <th scope="col" class="border p-3 text-left">categories</th>
            <th scope="col" class="border p-3 text-left">Action</th>
        </tr>
    </thead>
    <tbody class="divide-y divide-gray-200">
        <?php foreach ($recipes as $value) : ?>

            <tr class="group hover:bg-gray-100 transition-all duration-300">
            <td class="border p-3">
                    <img class="w-14 h-14 object-cover rounded-lg" src="<?php
                    $img_url = explode('/', $value['img_url']);
                    echo !$value['img_url'] ? 'public/assests/images/defaultImages.jpg' :
                    './../uploads/' . end($img_url); ?>" alt="Image Description">
                    <?php  ?>
                </td>
                <td class="border p-3  ...">
                    <a  class='text-blue-800'
                      href="<?php echo  '/recipes'. '/' . $value['recipe_id'] ?>">
                      <?php echo limitString($value['title'], 30 )?>
                   </a>
                </td>
                <td class="border p-3 "><?php echo limitString($value['description'] ?? '', 20) ?? '' ?></td>
                <td class="border p-3 "><?php echo limitString($value['location_name'] ?? '' , 20) ?? ''?></td>
                <td class="border p-3 "><?php echo limitString($value['categories_name'] ?? '' , 20) ?></td>
               
                <td class="border p-3">
                    <div class="flex gap-2">
                        <?php if (($value['teacher_id'] == $_SESSION['user']['user_id']) || ('admin' == $_SESSION['user']['user_type'])) : ?>
                            <a href="/recipes/delete/<?php echo $value['recipe_id'] ?>" class="inline-block px-4 py-2 bg-red-600 text-white font-semibold rounded-lg hover:bg-red-700">
                                Delete
                            </a>
                            <a href="/recipes/mode/update?recipes=<?php echo $value['recipe_id'] ?>" class="inline-block px-4 py-2 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700">
                                Edit
                            </a>
                        <?php endif ?>
                    </div>
                </td>
            </tr>
        <?php endforeach ?>
        <?php if (!$recipes) : ?>
            <tr>
                <td colspan="4" class="text-center py-4">NO DATA FOUND</td>
            </tr>
        <?php endif ?>
    </tbody>
</table>

