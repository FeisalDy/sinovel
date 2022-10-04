<?php
include('header.php');
include('config/db.php');
?>

<div class="container w-100 p-3" style="margin-top: 5%;">

<div class="d-grid gap-2 d-md-block">
  <button class="btn btn-primary" type="button">Edit</button>
  <div class="input-group">
  <div class="form-outline">
    <input id="search-focus" type="search" id="form1" class="form-control" />
    <label class="form-label" for="form1">Search</label>
  </div>
  <button type="button" class="btn btn-primary">
    <i class="fas fa-search"></i>
  </button>
</div>
</div>
		<br>
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
include('footer.php');
?>
