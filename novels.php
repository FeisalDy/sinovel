<?php
include('header.php');
include('config/db.php');
if(!ISSET($_POST['cari'])){
?>

<div class="container w-100 p-3" style="margin-top: 5%;">

<div style="width: 100%; display: table;">
    <div style="display: table-row">
        <div style="display: table-cell;"> 
		<form method="post" action="">
		<div class="input-group rounded">
			<input type="text" class="form-control rounded" name="keyword" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
			<span class="input-group-text border-0" id="search-addon">
			<button class="btn btn-primary" type="submit" name="cari">Search</button>
			</span>
			</div>
		</form>
		</div>
    </div>
</div>

</div>
	<br>
		<div class="row height d-flex justify-content-end align-items-end">
        <div style="overflow:auto;">
		<table class="table table-bordered" style=" word-wrap: break-word; width: 100%; table-layout: fixed;">
			<tr>
                <th width="15%">Image</th>
				<th width="20%">Title</th>
				<th width="50%">Keterangan</th>
				<th width="15%">Aksi</th>
			</tr>

			<?php
			
			$limit = 5;
			$nRows = $db->query("SELECT count(*) from novels")->fetchColumn();
			$total_pages = ceil($nRows / $limit);

			if (!isset($_GET['page'])) {
				$page = 1;
			} else{
				$page = $_GET['page'];
			}

			$starting_limit = ($page-1)*$limit;

			$previous = $page - 1;
			$next = $page + 1;

			

            $sql = "SELECT * FROM novels LIMIT $starting_limit, $limit";
            $stmt = $db->prepare($sql);
            $stmt->execute([$starting_limit, $limit]);

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                ?>
				<tr>
                    <td><img src="resources/images/<?php echo $row['image'] ?>" width="150" height="140"></td>
					<td><?php echo $row['title']; ?></td>
					<td><?php echo $row['keterangan']; ?></td>
					

					<?php
					 if(isset($_SESSION['level']) && $_SESSION['level'] == "admin"): ?>
						<td>
						<form method="get" action="edit_novel.php">
							<button class="btn btn-primary" type="submit">Edit</button>
							<input type="hidden" name="id" value="<?php echo $row['id'];?>">
						</form>
						<form method="get" action="controller/hapus.php">
							<button class="btn btn-primary" type="submit">Delete</button>
							<input type="hidden" name="id" value="<?php echo $row['id'];?>">
						</form>
						<?php endif; ?>
				</tr>
				<?php
            }
			?>
		</table>
		<nav>
			<ul class="pagination justify-content-center">
				<li class="page-item">
					<a class="page-link" <?php if($page > 1){ echo "href='?page=$previous'"; } ?>>Previous</a>
				</li>
				<?php 
				for($x=1;$x<=$total_pages;$x++){
					?> 
					<li class="page-item"><a class="page-link" href="?page=<?php echo $x ?>"><?php echo $x; ?></a></li>
					<?php
				}
				?>				
				<li class="page-item">
					<a  class="page-link" <?php if($page < $total_pages) { echo "href='?page=$next'"; } ?>>Next</a>
				</li>
			</ul>
		</nav>
	</div>
</div>

<?php
}else{?>

<div class="container w-100 p-3" style="margin-top: 5%;">

<div style="width: 100%; display: table;">
    <div style="display: table-row">
        <div style="display: table-cell;"> 
		<form method="post" action="">
		<div class="input-group rounded">
			<input type="text" class="form-control rounded" name="keyword" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
			<span class="input-group-text border-0" id="search-addon">
			<button class="btn btn-primary" type="submit" name="cari">Search</button>
			</span>
			</div>
		</form>
		</div>
    </div>
</div>

</div>
	<br>
		<div class="row height d-flex justify-content-end align-items-end">
        <div style="overflow:auto;">
		<table class="table table-bordered" style=" word-wrap: break-word; width: 100%; table-layout: fixed;">
			<tr>
                <th width="15%">Image</th>
				<th width="30%">Title</th>
				<th width="55%">Keterangan</th>
			</tr>

			<?php
			$keyword = $_POST['keyword'];
            $sql = "SELECT * FROM novels where title LIKE '%$keyword%' or keterangan LIKE '%$keyword%'";
            $stmt = $db->prepare($sql);
            $stmt->execute();

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
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
	}
?>

<?php
include('footer.php');
?>
