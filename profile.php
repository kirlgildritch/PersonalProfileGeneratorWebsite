<?php
// Very basic protection - only allow POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
die("Please use the form to submit your data.");
}

// ─────────────── Collect form data ───────────────────────────────
$fullname = trim($_POST['fullname'] ?? 'Not provided');
$age = trim($_POST['age'] ?? 'Not provided');
$course = trim($_POST['course'] ?? 'Not provided');
$email = trim($_POST['email'] ?? 'Not provided');
$bio = trim($_POST['bio'] ?? '');

// Gender (your radio buttons use name="optradio")
$gender = trim($_POST['optradio'] ?? 'Not selected');

// Hobbies (multiple checkboxes with different names)
$hobbies = [];
if (!empty($_POST['Singing'])) $hobbies[] = $_POST['Singing'];
if (!empty($_POST['Dancing'])) $hobbies[] = $_POST['Dancing'];
if (!empty($_POST['Gaming'])) $hobbies[] = $_POST['Gaming'];
if (!empty($_POST['Drawing'])) $hobbies[] = $_POST['Drawing'];
if (!empty($_POST['Coding'])) $hobbies[] = $_POST['Coding'];

$hobbies_text = !empty($hobbies) ? implode(', ', $hobbies) : 'None selected';

// ─────────────── Image upload handling ───────────────────────────
$uploadDir = 'uploads/';
$profileImage = '';

if (!is_dir($uploadDir)) {
mkdir($uploadDir, 0755, true);
}

if (isset($_FILES['profileImage']) && $_FILES['profileImage']['error'] === UPLOAD_ERR_OK) {
$file = $_FILES['profileImage'];
$fileName = basename($file['name']);
$fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

// Basic image type check
$allowed = ['jpg', 'jpeg', 'png', 'gif'];
if (in_array($fileExt, $allowed)) {
$newName = time() . '_' . uniqid() . '.' . $fileExt;
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
<title>Your Profile</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
body {

min-height: 100vh;
color: #333;
padding: 2rem 1rem;
}
.profile-card {
max-width: 540px;
margin: 0 auto;
border: none;
border-radius: 16px;
overflow: hidden;
box-shadow: 0 10px 30px rgba(0,0,0,0.25);
}
.card-header {

color: white;
text-align: center;
padding: 2rem 1.5rem;
}
.profile-img {
width: 140px;
height: 140px;
object-fit: cover;
border-radius: 50%;
border: 5px solid white;
margin: -70px auto 1.5rem;
display: block;
box-shadow: 0 6px 15px rgba(0,0,0,0.3);
}
.card-body {
padding: 2rem;
background: white;
}
.info-label {
color: #6c5ce7;
font-weight: 600;
}
.hobbies-list {
background: #f8f9fa;
padding: 1rem;
border-radius: 10px;
}
.back-btn {
margin-top: 1.5rem;
}
</style>
</head>
<body>

<div class="container">
<div class="profile-card card">

<div class="card-header">
<h2 class="mb-0"><?= htmlspecialchars($fullname) ?></h2>
</div>

<?php if ($profileImage): ?>
<img src="<?= htmlspecialchars($profileImage) ?>" alt="Profile Picture" class="profile-img">
<?php else: ?>
<img src="https://via.placeholder.com/140?text=No+Photo" alt="No photo uploaded" class="profile-img">
<?php endif; ?>

<div class="card-body text-center">

<p><span class="info-label">Age:</span> <?= htmlspecialchars($age) ?></p>
<p><span class="info-label">Course / Program:</span> <?= htmlspecialchars($course) ?></p>
<p><span class="info-label">Email:</span> <?= htmlspecialchars($email) ?></p>
<p><span class="info-label">Gender:</span> <?= htmlspecialchars(ucfirst($gender)) ?></p>

<hr class="my-4">

<h5 class="info-label">Short Biography</h5>
<p class="mb-4"><?= nl2br(htmlspecialchars($bio ?: 'No biography provided.')) ?></p>

<h5 class="info-label">Hobbies</h5>
<div class="hobbies-list">
<?= htmlspecialchars($hobbies_text) ?>
</div>

<a href="index.php" class="btn btn-outline-primary back-btn">
← Create Another Profile
</a>

</div>
</div>
</div>

</body>
</html>     