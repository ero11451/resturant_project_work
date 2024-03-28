



<div id='notification' 
   class="absolute top-0 end-0 text-sm  max-w-xs m-5
      <?php echo $data['type'] == 'error' ? "bg-red-800 text-white " : "bg-gray-100 " ?> 
      <?php echo $data['type'] == 'success' ? "bg-green-800 text-white " : "bg-gray-100 " ?> 
      
      rounded-lg " style = 'z-index:9999; color:white !important'>
  <div class=" max-w-xs 
     rounded-xl  shadow-lg ">
    <div class="p-2 sm:p-4">
      <h3 class="text-xs  text-white  font-semibold sm:text-base">
   
      <?php echo ($data['message'] ) ?? '' ?>
      </h3>
    </div>

  </div>
</div>




<script>

setTimeout(function(){
    let toastContainer = document.getElementById('notification');
        toastContainer.style.display = 'none';
}, 3000)

</script>


