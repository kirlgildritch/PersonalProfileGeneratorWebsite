<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

     
</head>
<body>
    <div class="container mt-3">
        <h2>Profile Form Page</h2>
    
  <form action="profile.php" method="post" enctype="multipart/form-data">
    <div class="form-floating mb-3 mt-3">
      <input type="text" class="form-control" id="fullname" placeholder="Full Name" name="fullname" required>
      <label for="fullname">Full Name</label>
    
    </div>
    <div class="form-floating mt-3 mb-3">
      <input type="number" class="form-control" id="age" placeholder="Enter Course" name="age" required>
      <label for="age">Age</label>
    </div>
     <div class="form-floating mt-3 mb-3">
      <input type="text" class="form-control" id="course" placeholder="Enter Course" name="course" required>
      <label for="course">Course / Program</label>
    </div>
 <div class="form-floating mt-3 mb-3">
      <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email" required>
      <label for="email">Email Address</label>
    </div>
 <p>Gender</p>
     <div class="form-check mt-3 mb-3">
       <input type="radio" class="form-check-input" id="male" name="optradio" value="male" checked>Male
        <label class="form-check-label" for="male"></label>

    </div>
     <div class="form-check mt-3 mb-3">
       <input type="radio" class="form-check-input" id="female" name="optradio" value="female" >Female
        <label class="form-check-label" for="female"></label>

    </div>


    <p>Hobbies</p>

   <div class="form-check mt-3 mb-3">
        <input class="form-check-input" type="checkbox" id="check1" name="Singing" value="Singing" >
        <label class="form-check-label">Singing</label>
    </div>
    <div class="form-check mt-3 mb-3">
        <input class="form-check-input" type="checkbox" id="check1" name="Dancing" value="Dancing" >
        <label class="form-check-label">Dancing</label>
    </div>
     
    <div class="form-check mt-3 mb-3">
        <input class="form-check-input" type="checkbox" id="check1" name="Gaming" value="Gaming" >
        <label class="form-check-label">Gaming</label>
    </div>
     
    <div class="form-check mt-3 mb-3">
        <input class="form-check-input" type="checkbox" id="check1" name="Drawing" value="Drawing" >
        <label class="form-check-label">Drawing</label>
    </div>
     <div class="form-check mt-3 mb-3">
        <input class="form-check-input" type="checkbox" id="check1" name="Coding" value="Coding" >
        <label class="form-check-label">Coding</label>
    </div>

    <div class="form-floating mt-3 mb-3">
        <textarea class="form-control" placeholder="Short Biography" id="bio" name="bio" style="height: 100px"></textarea>
        <label for="bio">Short Biography</label>
    </div>

       <div class="mb-3">
                    <label for="fileInput" class="form-label">Upload Profile Image</label>
                    <input class="form-control" type="file" id="fileInput" name="profileImage" accept="image/*" required>
        </div>



     
     







    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>



</body>
</html>