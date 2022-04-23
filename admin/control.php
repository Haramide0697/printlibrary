<?php
require 'core/connection.php';

if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH'])== 'xmlhttprequest'){
$date = date('l M d, Y H:i');
if (isset($_POST['departmentname'])) {
	$name = $_POST['departmentname'];
		$fetch = $conn->query("SELECT * FROM department WHERE name = '$name'");
		$result = $fetch->fetchAll(PDO::FETCH_OBJ);
		$count = $fetch->rowCount();
		if ($count > 0) {
		echo "Department already Exists";
		}else{
			$in = array('name' => $name, );
			create('department',$in);
			echo "success";
		}
		
		
}


if (isset($_POST['title'])) {
	$title = $_POST['title'];
	$author = $_POST['author'];
	$cm = $_POST['cm'];
	$an = $_POST['an'];
	$department = $_POST['department'];
	$publisher = $_POST['publisher'];
	$pop = $_POST['pop'];
	$yop = $_POST['yop'];
	$subject = $_POST['subject'];
	$description = $_POST['description'];
	
		$fetch = $conn->query("SELECT * FROM books WHERE title = '$title' AND author = '$author'");
		$result = $fetch->fetchAll(PDO::FETCH_OBJ);
		$count = $fetch->rowCount();
		if ($count > 0) {
		echo "Book already Exists";
		}else{
			$in = array('title' => $title, 
						'author' => $author, 
						'classmark' => $cm, 
						'accessionno' => $an, 
						'department' => $department, 
						'publisher' => $publisher, 
						'pop' => $pop, 
						'yop' => $yop, 
						'dateentered' => $date, 
						'subject' => $subject, 
						'description' => $description, 
						'borrowed' => 'no', 
		);
			create('books',$in);
			echo "success";
		}
		
		
}


if (isset($_POST['ptitle'])) {
	$title = $_POST['ptitle'];
	$author = $_POST['author'];
	$dates = $_POST['date'];
	$supervisor = $_POST['supervisor'];
	$department = $_POST['department'];
	$description = $_POST['description'];
	
		$fetch = $conn->query("SELECT * FROM project WHERE title = '$title' AND author = '$author'");
		$result = $fetch->fetchAll(PDO::FETCH_OBJ);
		$count = $fetch->rowCount();
		if ($count > 0) {
		echo "Project already Exists";
		}else{
			$in = array('title' => $title, 
						'author' => $author, 
						'date' => $dates, 
						'supervisor' => $supervisor, 
						'department' => $department, 
						'date' => $dates, 
						'dateadded' => $date, 
						'description' => $description, 
		);
			create('project',$in);
			echo "success";
		}
		
		
}

if (isset($_POST['aname'])) {
	$aname = $_POST['aname'];
	$volume = $_POST['volume'];
	$number = $_POST['number'];
	$cm = $_POST['cm'];
	$an = $_POST['an'];
	$department = $_POST['department'];
	$publisher = $_POST['publisher'];
	$pop = $_POST['pop'];
	$yop = $_POST['yop'];
	$subject = $_POST['subject'];
	$description = $_POST['description'];
	$article = $_POST['article'];
	$iden = rand(1000000000,9999999999);
	
		$fetch = $conn->query("SELECT * FROM journals WHERE name = '$aname' AND volume = '$volume'");
		$result = $fetch->fetchAll(PDO::FETCH_OBJ);
		$count = $fetch->rowCount();
		if ($count > 0) {
		echo "Journal already Exists";
		}else{
			$in = array('iden' => $iden,
						'name' => $aname, 
						'volume' => $volume, 
						'number' => $number, 
						'classmark' => $cm, 
						'accessionno' => $an, 
						'department' => $department, 
						'publisher' => $publisher, 
						'pop' => $pop, 
						'yop' => $yop, 
						'dateentered' => $date, 
						'article' => $article, 
						'subject' => $subject, 
						'description' => $description, 
						'borrowed' => 'no', 
		);

		if ($article > 0) {
			for ($i=0; $i < $article; $i++) { 
			$author = $_POST['author'.$i];
			$page = $_POST['page'.$i];
			$title = $_POST['title'.$i];

			$in2 = array('iden' => $iden,
						'author' => $author, 
						'page' => $page, 
						'title' => $title, 
		);
			create('article',$in2);
			}
		}
			create('journals',$in);
			echo "success";
		}
		
		
}






if (isset($_POST['uname'])) {
    $uname = sanitize($_POST['uname']);
    $address = sanitize($_POST['address']);
    $pnum = sanitize($_POST['pnum']);
    $email = sanitize($_POST['email']);
    $pass = $_FILES['pass']['tmp_name'];

$fetch = $conn->query("SELECT * FROM users WHERE name = '$unae' || phonenumber = '$pnum' || email = '$email'");
		$count = $fetch->rowCount();
		if ($count > 0) {
		echo "User already Exists";
		}else{
       
        $temporary = explode("." , $_FILES [ "pass" ][ "name" ]);
        $file_extension = end ($temporary );
        $pic = $_FILES['pass']['name'];
        $picp = $_FILES['pass']['tmp_name'];
        $pics = $_FILES['pass']['size'];

        

        $rando = rand(00001,99999);
        $hash = sha1($pic);
        $hash = $hash.$rando;

        $ext1 = pathinfo($pic, PATHINFO_EXTENSION);
        $ext1 = strtolower($ext1);

        $upload_folder1 = "../passport/".$hash.".".$ext1;
        $uploadpic = $hash.".".$ext1;

        $in = array('name' => $uname,
                    'address' => $address, 
                    'phonenumber' => $pnum, 
                    'email' => $email, 
                    'dateadded' => $date, 
                    'image' => $uploadpic, 
                      );
        move_uploaded_file($picp, $upload_folder1);
        create('users',$in);
        echo "success";

    }
}






if(isset($_POST['action']) && $_POST['action'] == 'deletebook'){
		$id = $_POST['id'];
	
		$conn->query("DELETE FROM books WHERE id = $id");
		echo "Deleted";		
	}

	if(isset($_POST['action']) && $_POST['action'] == 'deletearticle'){
		$id = $_POST['id'];
	
		$conn->query("DELETE FROM article WHERE id = $id");
		echo "Deleted";		
	}


if(isset($_POST['action']) && $_POST['action'] == 'deleteuser'){
		$id = $_POST['id'];
	
		$conn->query("DELETE FROM users WHERE id = $id");
		echo "Deleted";		
	}

if(isset($_POST['action']) && $_POST['action'] == 'returnbook'){
		$id = $_POST['id'];
	
		$in = array('borrowed' => 'no',
                        'borrower' => '', 
                        'dateborrowed' => '', 
        );
            update('books',$in,'id',$id);
		echo "Book Returned";		
	}

	if(isset($_POST['action']) && $_POST['action'] == 'returnjournal'){
		$id = $_POST['id'];
	
		$in = array('borrowed' => 'no',
                        'borrower' => '', 
                        'dateborrowed' => '', 
        );
            update('journals',$in,'id',$id);
		echo "Journal Returned";		
	}

	if(isset($_POST['action']) && $_POST['action'] == 'deletejournal'){
		$id = $_POST['id'];
	
		$conn->query("DELETE FROM journals WHERE iden = $id");
		$conn->query("DELETE FROM article WHERE iden = $id");
		echo "Deleted";		
	}

}
?>