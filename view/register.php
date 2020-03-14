<?php
session_start();
require "../controller/users.php";
$d=new Users();


?>
<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        body{
            direction: rtl;
            font-family: 'expo arabic';
            background: #ededed;

        }
        .container{
            margin-top: 10%;
            background: #fff;
            width: 60%;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 1px 1px 10px #ccc;

        }
        label{
            float: right;
        }
        .form-check {
            float: right;
            margin-right: 10px;
        }
        .form-check input {
            width: 20px;
            height: 20px;
            margin-right: 10px;
        }
    </style>
</head>
<body>
<section class="container">
    <form action="../validation.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="exampleInputun1">اسم المستخدم</label>
            <input type="text" class="form-control" id="exampleInputun1" aria-describedby="emailHelp" placeholder="الاسم الثنائي" name='un' required>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">البريد الالكتروني</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="ادخل البريد الالكتروني" name='email' required>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">كلمة السر</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="كلمة السر" name='pass' required>
        </div>
        <div style="float: right">
            <input type="radio"  id="exampleInputsex1"  name='sex' value="1" required>ذكر
            <input type="radio"  id="exampleInputsex1"  name='sex' value="2" required>أنثى
        </div>
        <br>
        <div class="form-group">
            <label for="exampleInputimg1">اختر صورة لك </label>
            <input type="file" class="form-control" id="exampleInputimg1"  name='img' required>
        </div>
        <div class="form-group ">
            <button type="submit" class="btn btn-primary form-control" name='reg'>تسجيل</button>
        </div>
    </form>
</section>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
