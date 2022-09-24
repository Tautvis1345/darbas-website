<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Best Airline</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  </head>
  <body>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  
    <nav class="navbar navbar-expand-lg bg-light">
   <div class="container-fluid">
    <a class="navbar-brand" href="#">Best Airline</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
      
        <a class="nav-link" href="/Airports">Airports</a>
        <a class="nav-link" href="/Countries">Countries</a>
        <a class="nav-link" href="/Airlines">Airlines</a>
      </div>
    </div>
      </div>
          </nav>
          <div class="text-center">
          <a class="btn btn-danger" href="/New_Airports" role="button">New Airport</a>
           
         </div>
<br>
         <select class="form-select" aria-label="Default select example">
  <option selected>Search by country</option>
  <option value="1">Italy</option>
  <option value="2">Japan</option>
  <option value="3">Three</option>
</select>

<br>

</div>
          </nav>
          <div class="text-center">
          <a class="btn btn-success" href="#" role="button">Search</a>
           
         </div>
         
         
         <div class="container-fluid mt-2">
         
          <table class="table table-dark table-hover">
        <tbody>
       <tr>
       
        <th scope="row">Name</th>
      <td colspan="2">Country</td>
      <td>location</td>
      <td>Airlines</td>
      <td></td>
      <td>
      <td class="text-center">
        Actions
</td>
      </td>

      





       </tr>

       <tr>
       
       <th scope="row">Fast Air</th>
      <td colspan="2">Italy</td>
      <td>38.406942, 16.249758</td>
      <td>Italy Airlines</td>
      <td></td>
      <td> 
        <div class="text-center">
        <td class="text-center">  <a class="btn btn-success" href="Add_Airline" role="button">Add Airline</a>
           
       
          <a class="btn btn-danger" href="Remove_Airline" role="button">Remove Airline</a>
        
        
          <a class="btn btn-warning" href="Edit" role="button">Edit</a>

          <a class="btn btn-danger" href="Delete" role="button">Delete</a>
</td>
         </div></td>




       </tr>


       <tr>
       
       <th scope="row">Tokyo Air</th>
      <td colspan="2">Japan</td>
      <td>35.746551, 139.185213</td>
      <td>Tokyo Airlines</td>
      <td></td>
      <td> 
        <div class="text-center">
        <td class="text-center">
        <a class="btn btn-success" href="Add_Airline" role="button">Add Airline</a>
           
       
          <a class="btn btn-danger" href="Remove_Airline" role="button">Remove Airline</a>
        
        
          <a class="btn btn-warning" href="Edit" role="button">Edit</a>

          <a class="btn btn-danger" href="Delete" role="button">Delete</a>
</td>
         </div></td>




       </tr>





        </tbody>

          </table>

          </div>
      
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  </body>
</html>