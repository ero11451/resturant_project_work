
if ($_SERVER["REQUEST_METHOD"] == 'GET') {
   if ($_GET['chef_id']) {
      $chef_id = $_GET['chef_id'];
      $sql = "SELECT * FROM recipeTesting JOIN users ON users.id = recipeTesting.chef_id where chef_id = :chef_id";
      $result = $connection->query($sql);

      if  ($result->num_rows > 0){
            $response['status'] = 200;
            $response['message'] = 'successful';
            $response['data'] = $result;
      }
      else{
            $response['status'] = 200;
            $response['message'] = 'There was no data found';
            $response['data'] = null;
      }
   } else {
      $response['status'] = 404;
      $response['message'] = 'Unsuccessful there was no chef id on this request';
      $response['data'] = null;
   }
} 