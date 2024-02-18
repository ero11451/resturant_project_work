<?php 
   include('../api/DBconnect.php');
    if (!isset($_SESSION['username']) && !isset($_SESSION['user_type']) && !isset($_SESSION['email'])) {
      header('Location: login.php');
      echo 'you are not going';
    } 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body onload="functionToCall()">
    <?php include "../component/header.php"?>
    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <div class="grid lg:grid-cols-2 gap-6" id='cardContainer'>

        </div>
    </div>

    <script src="../../assets/vendor/preline/dist/index.js?v=1.0.0"></script>
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=G-B73TDMXKF5"></script>

    <script>
    window.dataLayer = window.dataLayer || [];


    function gtag() {
        dataLayer.push(arguments);
    }

    let cardContainerElement = document.getElementById('cardContainer')

    function functionToCall() {
        fetch('../api/controller/menu/get.php')
            .then(response => {
                if (response.ok) {
                    return response.json();
                } else {
                    throw new Error('API request failed');
                }
            })
            .then(res => {
                res.forEach((data) => {
                    let card = document.createElement('div')
                    card.innerHTML = `
                    <a class="group relative block rounded-xl dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                href="detailPage">
                <div
                    class="flex-shrink-0 relative rounded-xl overflow-hidden w-full h-[350px] before:absolute before:inset-x-0 before:w-full before:h-full before:bg-gradient-to-t before:from-gray-900/[.7] before:z-[1]">
                    <img 
                    src="${data["img_url"] !== '' ? data["img_url"] : './../assests/images/defaultImages.jpg' }"
                    class="w-full h-full absolute top-0 start-0 object-cover" />
                </div>

                <div class="absolute top-0 inset-x-0 z-10">
                    <div class="p-4 flex flex-col h-full sm:p-6">
                        <div class="flex items-center">
                         
                            <div class="ms-2.5 sm:ms-4">
                                <h4 class="font-semibold text-white">
                                   ${data[ "chef_name"]}
                                </h4>
                                <p class="text-xs text-white/[.8]">
                                   ${data["create_date"]}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="absolute bottom-0 inset-x-0 z-10">
                    <div class="flex flex-col h-full p-4 sm:p-6">
                        <h3 class="text-lg sm:text-3xl font-semibold text-white group-hover:text-white/[.8]">
                           ${data["title"]}
                        </h3>
                        <p class="mt-2 text-white/[.8]">
                            ${data[  "disciption"]}
                        </p>
                    </div>
                </div>
            </a> 
                    `
                    cardContainerElement.appendChild(card)
                })
                console.log(data);
            })
            .catch(error => {
                console.error(error);
            });
    }
    </script>

</body>
</body>

</html>