
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Admin</title>
    <link rel="stylesheet" href="css/style_a_add.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>

<body>
    <div class="box">
        <div class="nav">
            <img src="img/logo.png" alt="logo.png" style="width: 150px; height: 150px;">
            <h2><b>HK Duty Hours Monitoring System</b></h2>
            <h1> ADMIN </h1>  
        </div>

        <div class="section" id="AddForm">
            <form action="#" method="post" class="form-container">
                <h2>Add New HK Student</h2>

                <input type="text" placeholder="Enter Student ID" id="st_id" name="st_id">
                <input type="text" placeholder="Enter Student Name" id="st_name" name="st_name">
                <input type="password" placeholder="Enter Password" id="st_pass" name="st_pass"\>
                <input type="text" placeholder="Enter Student Course" id="st_crs" name="st_crs">
                <input type="text" placeholder="Enter Student Year Level" id="st_yrlvl" name="st_yrlvl">
                <input type="text" placeholder="Enter Student HK Type" id="st_hktype" name="st_hktype">
                <input type="text" placeholder="Enter Student to be Assigned Duty" id="st_duty" name="st_duty">

                <button type="submit" class="btn" name="add" id="add">ADD</button>
            </form>
            <?php
            if (isset($_POST['add'])){
                if(mysqli_query($conn, "INSERT INTO login_student (st_id, st_pass, st_name, st_course, st_yrlvl, st_hktype, st_duty) VALUES ('$_POST[st_id]','$_POST[st_pass]','$_POST[st_name]','$_POST[st_crs]','$_POST[st_yrlvl]','$_POST[st_hktype]','$_POST[st_duty]');")){
                    ?>
                    <script type="text/javascript">
                        alert("Successfully Added.")
                    </script>
                    <?php
                }else{
                    ?>
                    <script type="text/javascript">
                        alert("not Successfully.")
                    </script>
                    <?php
                }
            }
            ?>
        </div>
            <script>
                function openForm() {
                    document.getElementById("AddForm").style.display = "block";
                }
                function closeForm() {
                    document.getElementById("AddForm").style.display = "none";
                }
            </script>

        <button type="btn_exit" onclick="window.location.href='a_main.php'"><i class="fas fa-sign-out-alt"></i>Back</button>
    </div>
</body>
</html>