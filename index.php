<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Form</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <style>
        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            font-family: system-ui, -apple-system, sans-serif;
        }
        .profile-card {
            background: white;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            overflow: hidden;
            max-width: 540px;
            margin: 2rem auto;
        }
        .card-header {
            background: #0d6efd;
            color: white;
            padding: 1.5rem;
            text-align: center;
        }
        .form-control, .form-select {
            border-radius: 10px;
        }
        .form-check-input:checked {
            background-color: #0d6efd;
            border-color: #0d6efd;
        }
        .btn-primary {
            border-radius: 10px;
            padding: 0.75rem 1.5rem;
            font-weight: 500;
        }
        .hobbies-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(130px, 1fr));
            gap: 0.75rem;
        }
        .image-preview {
            width: 140px;
            height: 140px;
            border-radius: 12px;
            object-fit: cover;
            background: #f1f3f5;
            border: 2px dashed #adb5bd;
            margin: 0 auto 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #6c757d;
            font-size: 0.9rem;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="profile-card">
        <div class="card-header">
            <h3 class="mb-0">Create Your Profile</h3>
        </div>

        <div class="card-body p-4 p-md-5">
            <form action="profile.php" method="post" enctype="multipart/form-data">

                <!-- Profile Image Upload -->
                <div class="text-center mb-4">
                    <div class="image-preview" id="preview">
                        Profile Image Preview
                    </div>
                    <div class="mb-3">
                        <input class="form-control form-control-lg" type="file" id="profileImage" name="profileImage" accept="image/*" required>
                    </div>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="fullname" placeholder="Full Name" name="fullname" required>
                    <label for="fullname">Full Name</label>
                </div>

                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="number" class="form-control" id="age" placeholder="Age" name="age" required min="16">
                            <label for="age">Age</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="course" placeholder="Course / Program" name="course" required>
                            <label for="course">Course / Program</label>
                        </div>
                    </div>
                </div>

                <div class="form-floating mt-3 mb-4">
                    <input type="email" class="form-control" id="email" placeholder="name@example.com" name="email" required>
                    <label for="email">Email Address</label>
                </div>

                <!-- Gender -->
                <div class="mb-4">
                    <label class="form-label fw-bold">Gender</label>
                    <div class="d-flex gap-4">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="male" value="male">
                            <label class="form-check-label" for="male">Male</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                            <label class="form-check-label" for="female">Female</label>
                        </div>
                    </div>
                </div>

                <!-- Hobbies -->
                <div class="mb-4">
                    <label class="form-label fw-bold">Hobbies</label>
                    <div class="hobbies-grid">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="hobby1" name="hobbies[]" value="Singing">
                            <label class="form-check-label" for="hobby1">Singing</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="hobby2" name="hobbies[]" value="Dancing">
                            <label class="form-check-label" for="hobby2">Dancing</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="hobby3" name="hobbies[]" value="Gaming">
                            <label class="form-check-label" for="hobby3">Gaming</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="hobby4" name="hobbies[]" value="Drawing">
                            <label class="form-check-label" for="hobby4">Drawing</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="hobby5" name="hobbies[]" value="Coding">
                            <label class="form-check-label" for="hobby5">Coding</label>
                        </div>
                    </div>
                </div>

                <div class="form-floating mb-4">
                    <textarea class="form-control" placeholder="Tell us a bit about yourself..." id="bio" name="bio" style="height: 120px"></textarea>
                    <label for="bio">Short Biography</label>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-lg">Submit Profile</button>
                </div>

            </form>
        </div>
    </div>
</div>

<!-- Optional: Simple image preview script -->
<script>
    document.getElementById('profileImage').addEventListener('change', function(e) {
        const preview = document.getElementById('preview');
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.innerHTML = `<img src="${e.target.result}" alt="Preview" style="width:100%;height:100%;object-fit:cover;border-radius:12px;">`;
            }
            reader.readAsDataURL(file);
        }
    });
</script>

</body>
</html>