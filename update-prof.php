<!DOCTYPE html>
<html>
<head>
    <title>Edit Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
        }

        .profile-image {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            background-color: #ccc;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            cursor: pointer;
            margin: 0 auto 20px;
        }

        form {
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        textarea {
            height: 100px;
            resize: vertical;
        }

        input[type="submit"],
        .back-button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        input[type="file"] {
            display: none;
        }
    </style>
    <script>
        function handleImageUpload(event) {
            const file = event.target.files[0];
            const reader = new FileReader();
            const profileImage = document.getElementById('profileImage');

            reader.onload = function(e) {
                profileImage.style.backgroundImage = `url(${e.target.result})`;
            };

            reader.readAsDataURL(file);
        }
    </script>
</head>
<body>
    <div class="container">
        <h1>Edit Profile</h1>
        <div class="profile-image" onclick="document.getElementById('profilePicture').click()" id="profileImage"></div>
        <form action="update_profile.php" method="post" enctype="multipart/form-data">
            <input type="file" id="profilePicture" name="profilePicture" onchange="handleImageUpload(event)">

            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="bio">Bio:</label>
            <textarea id="bio" name="bio"></textarea>

            <input type="submit" value="Save Changes">
        </form>
        <a href="user_panel.php"><button class="back-button">Back</button></a>
    </div>
</body>
</html>
