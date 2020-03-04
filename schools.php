<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <title>School Details</title>
</head>
    <style type="text/css">
    .footer-buttons {
          display: flex;
          justify-content: center;
        }
    table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}
td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
<body>
 <h1>School Details</h1>
 <div>

 <?php
error_reporting(E_ALL);
ini_set('display_errors', true);
//ini_set('display_startup_errors',true);
  $data = '{
    "schoolRef": "THS2334-2020",
    "schoolID": "123456",
    "period": "2019",
    "returnType": "0",
    "students": [
        {
            "index": "9162003002",
            "nemis": "BPCS631",
            "name": "BRYSON OIRERE",
            "absent": "1",
            "DoB": "22/10/2003",
            "bcert_number": "9302576"
        },
        {
            "index": "5652005003",
            "nemis": "BPCS120",
            "name": "JOSEPH THAIRU",
            "absent": "7",
            "DoB": "01/08/2005",
            "bcert_number": "9671063"
        }
    ]
}';
    $ajson = json_decode($data, true);   
    if (isset($_POST['pass'])){
        $result = $_POST['pass']; 

    
        $url="http://localhost/api/v1/fas/store";
        $headers = array('Content-Type: application/json');
         try{
         if ($result === '1'){

            $curl = curl_init();

            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($curl, CURLOPT_URL, $url);

            curl_setopt($curl, CURLOPT_TIMEOUT, 10);
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

            $resp = curl_exec($curl);
                                   echo "here";

            curl_close($curl);
            if(strlen($resp)>0){
                print_r($resp);
            }
         } 
         }
         catch(Exception $e){
             print_r(e.getMessage());
         }
    }
?>
  <ul>
    <li>School Id: <?php echo $ajson['schoolID'];?></li>
   <li>School Name:  <?php echo $ajson['schoolID'];?></li>
   <li>Period:  <?php echo $ajson['schoolID'];?></li>
   <li>email:  abc@def.com</li>
   <li>phone:  254700123456</li>
</ul>
  <table>
  <tr>
  <th>index</th>
   <th>nemis</th>
   <th>name</th>
   <th>absent </th>
    <th>DoB</th>
   <th>bcert_number</th>
  </tr>
     
   <?php  
/*

*/

  $ajson = json_decode($data, true);

        $students = $ajson['students'];
          foreach ($students as $student){
            ?>
            <form id="School" method=POST action="schools.php">
              <tr>
                <td> <?php echo $student['index']; ?></td> 
                <td> <?php echo $student['nemis']; ?></td> 
                <td> <?php echo $student['name']; ?></td> 
                <td> <?php echo $student['absent']; ?></td> 
                <td> <?php echo $student['DoB']; ?></td> 
                <td> <?php echo $student['bcert_number']; ?></td> 
            </tr>
        
    
 <?php                 
  }
 ?>
     <input type="hidden" id="test" name="pass" value="1">              
    <input type='submit' value="Submit"/>
  </form>
</table>
    </div> 


</body>
</html>