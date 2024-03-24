<?php 
  session_start();
  $_SESSION['notification'] 

?>

<?php if ($_SESSION['notification']) : ?>

<div class="absolute top-0 end-0 notification">
  <div class="
     max-w-xs <?php  echo $_SESSION['nofication']['type'] == 'error' ? 
     'bg-red-500 text-white' :
     'bg-gray-100' ?> 
     border border-gray-200  rounded-xl  shadow-lg ">
    <div class="p-2 sm:p-4">
      <h3 class="text-xs text-gray-800 font-semibold sm:text-base">
       <?php $_SESSION['notification']['message']  ?>
      </h3>
    </div>

  </div>
</div>

<? endif; ?>


<script>

setTimeout(function(){
    let toastContainer = document.getElementsByClassName('notification');
        toastContainer.style.display = 'none';
}, 3000)

</script>


<?php 

unset($_SESSION['notification'])

?>