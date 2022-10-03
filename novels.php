<?php
include('header.php');
include('config/db.php');
?>

<div class="container w-100 p-3" style="margin-top: 5%;">
<br>
		<a href="user_tambah.php" class="btn btn-info btn-sm">Tambah Data</a>
		<br>		
		<br>
        <div style="overflow:auto;">
		<table class="table table-bordered">
			<tr>
                <th width="20%">Image</th>
				<th width="20%">Title</th>
				<th width="40%">Keterangan</th>
			</tr>
			<?php

            $sql = "SELECT * FROM novels";
            $stmt = $db->prepare($sql);
            $stmt->execute();

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC))    {
                ?>
				<tr>
                    <td><img src="resources/images/<?php echo $row['image'] ?>" width="150" height="140"></td>
					<td><?php echo $row['title']; ?></td>
					<td><?php echo $row['keterangan']; ?></td>
				</tr>
				<?php
            }
			?>
		</table>
	</div>
</div>

<?php
include('footer.php');
?>
