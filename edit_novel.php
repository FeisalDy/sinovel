<?php
include('header.php');
include('config/db.php');

if(isset($_POST['edit'])){
$title = $_POST['title'];
$keterangan = $_POST['keterangan'];
 
$rand = rand();
$ekstensi =  array('png','jpg','jpeg','gif');
$filename = $_FILES['image']['name'];
$ukuran = $_FILES['image']['size'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);
 
if(!in_array($ext,$ekstensi) ) {
	header("location:edit_novel.php?alert=gagal_ekstensi");
}else{
	if($ukuran < 1044070){		
		$xx = $rand.'_'.$filename;
		move_uploaded_file($_FILES['image']['tmp_name'], 'resources/images/'.$rand.'_'.$filename);

        // menyiapkan query
        $sql = "INSERT INTO novels (title, image, keterangan) 
        VALUES (:title, :image, :keterangan)";
        $stmt = $db->prepare($sql);

        $params = array(
            ":title" => $title,
            ":image" => $xx,
            ":keterangan" => $keterangan
        );

        // eksekusi query untuk menyimpan ke database
        $saved = $stmt->execute($params);

		if($saved) header("Location: edit_novel.php?alert=berhasil");
	}else{
		header("location:edit_novel.php?alert=gagal_ukuran");
	}
}
}
?>

<div class="container w-50 p-3" style="margin-top: 10%;">
<form action="" method="POST" enctype="multipart/form-data">
  <div class="form-outline mb-4">
    <label class="form-label d-flex justify-content-start" for="form2Example1">Image</label>
    <input type="file" name="image" id="form2Example1" class="form-control" />
  </div>
  
  <!-- Email input -->
  <div class="form-outline mb-4">
    <label class="form-label d-flex justify-content-start" for="form2Example1">Title</label>
    <input type="text" name="title" placeholder="Title"id="form2Example1" class="form-control" />
  </div>

  <!-- Password input -->
  <div class="form-outline mb-4">
    <label class="form-label d-flex justify-content-start" for="form2Example2">Keterangan</label>
    <textarea class="form-control" name="keterangan" id="form2Example2" rows="5"></textarea>
  </div>

  <!-- Submit button -->
  <div class="d-flex justify-content-end">
    <input type="submit" class="btn btn-primary btn-block mb-4" name="edit" value="Edit" />
  </div>
</form>
</div>

<?php
include('footer.php');
?>