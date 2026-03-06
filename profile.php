<?php
// Only allow POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die("Invalid request method. Please use the form.");
}

// ─── Collect & sanitize form data ───────────────────────────────────────
$fullname = trim($_POST['fullname'] ?? 'Not provided');
$age      = trim($_POST['age'] ?? 'Not provided');
$course   = trim($_POST['course'] ?? 'Not provided');
$email    = trim($_POST['email'] ?? 'Not provided');
$bio      = trim($_POST['bio'] ?? '');
$gender   = trim($_POST['gender'] ?? 'Not selected');   // ← fixed name

// Hobbies (now using array from form)
$hobbies = $_POST['hobbies'] ?? [];
$hobbies = is_array($hobbies) ? array_map('trim', $hobbies) : [];
$hobbies_text = !empty($hobbies) ? implode(', ', $hobbies) : 'None selected';

// ─── Image upload handling ──────────────────────────────────────────────
$uploadDir    = 'uploads/';
$profileImage = '';
$defaultAvatar = 'https://via.placeholder.com/160?text=' . urlencode(substr($fullname, 0, 1) ?: '?');

if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0755, true);
}

if (!empty($_FILES['profileImage']['name']) && $_FILES['profileImage']['error'] === UPLOAD_ERR_OK) {
    $file     = $_FILES['profileImage'];
    $fileName = basename($file['name']);
    $ext      = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
    $allowed  = ['jpg', 'jpeg', 'png', 'gif'];

    if (in_array($ext, $allowed) && $file['size'] <= 5 * 1024 * 1024) { // max 5MB
        $newName    = time() . '_' . bin2hex(random_bytes(6)) . '.' . $ext;
        $targetPath = $uploadDir . $newName;

        if (move_uploaded_file($file['tmp_name'], $targetPath)) {
            $profileImage = $targetPath;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($fullname) ?> • Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: #fff;
            min-height: 100vh;
            padding: 2rem 1rem;
            font-family: system-ui, -apple-system, sans-serif;
        }
        .profile-card {
            max-width: 540px;
            margin: 0 auto;
            border: none;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 15px 40px rgba(0,0,0,0.35);
            background: rgba(255,255,255,0.98);
            backdrop-filter: blur(8px);
        }
        .card-header {
            background: linear-gradient(90deg, #4e54c8, #8f94fb);
            color: white;
            padding: 2.5rem 1.5rem 4.5rem;
            text-align: center;
            position: relative;
        }
        .profile-img {
            width: 160px;
            height: 160px;
            object-fit: cover;
            border-radius: 50%;
            border: 6px solid white;
            box-shadow: 0 8px 25px rgba(0,0,0,0.3);
            position: absolute;
            top: 80 px;
            left: 50%;
            transform: translateX(-50%);
        }
        .card-body {
            padding: 5.5rem 2rem 2rem;
            color: #2d3436;
        }
        .info-item {
            margin-bottom: 1.1rem;
            font-size: 1.05rem;
        }
        .info-label {
            color: #5f27cd;
            font-weight: 700;
            display: inline-block;
            min-width: 140px;
        }
        .bio-box {
            background: #f8f9fc;
            padding: 1.25rem;
            border-radius: 12px;
            margin: 1.5rem 0;
            border-left: 5px solid #a29bfe;
            white-space: pre-wrap;
        }
        .hobbies-list {
            background: #f1f2f6;
            padding: 1.25rem;
            border-radius: 12px;
            font-size: 1.05rem;
        }
        .btn-back {
            margin-top: 2rem;
            padding: 0.75rem 1.8rem;
            font-size: 1.1rem;
        }
        @media (max-width: 576px) {
            .info-label { min-width: 110px; }
            .profile-img { width: 140px; height: 140px; bottom: -70px; }
            .card-body { padding-top: 4.5rem; }
        }
    </style>
</head>
<body>

<div class="container">
    <div class="profile-card card">

        <div class="card-header">
            <img 
            src="<?= $profileImage ? htmlspecialchars($profileImage) : $defaultAvatar ?>" 
            alt="Profile Picture" 
            class="profile-img">
           
        </div>

        

        <div class="card-body">
             <h2 class="mb-0 text-center"><?= htmlspecialchars($fullname) ?></h2>
             <br>
             <br>
            <div class="info-item">
                <span class="info-label">Age:</span> 
                <?= htmlspecialchars($age) ?>
            </div>

            <div class="info-item">
                <span class="info-label">Course:</span> 
                <?= htmlspecialchars($course) ?>
            </div>

            <div class="info-item">
                <span class="info-label">Email:</span> 
                <?= htmlspecialchars($email) ?>
            </div>

            <div class="info-item">
                <span class="info-label">Gender:</span> 
                <?= htmlspecialchars(ucfirst($gender)) ?>
            </div>

            <hr class="my-4" style="opacity: 0.4;">

            <h5 class="info-label mb-3" style="display:block;">Biography</h5>
            <div class="bio-box">
                <?= nl2br(htmlspecialchars($bio ?: 'No biography provided.')) ?>
            </div>

            <h5 class="info-label mb-3" style="display:block;">Hobbies</h5>
            <div class="hobbies-list">
                <?= htmlspecialchars($hobbies_text) ?>
            </div>

            <a href="index.php" class="btn btn-primary btn-lg btn-back">
                ← Create Another Profile
            </a>

        </div>
    </div>
</div>

</body>
</html>