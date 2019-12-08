<?php
include_once "config/database.php";
include_once "object/software.php";
include_once "object/link.php";

// get database connection
$database = new Database();
$db = $database->getConnection();

// initialize objects
$software = new Software($db);
$link = new Link($db);

// get ID of the product to be edited
$id_product = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');

// set the id as product id property
$software->id = $id_product;

// to read single record product
$software->readOne();
?>

<?php
include 'layout_head.php';
?>
<div class="container">
	<div style="margin-top: 30px;" class="bread-crumb flex-w p-l-25">

	</div>
</div>

<section class="sec-product-detail bg0 p-t-65 p-b-60">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-lg-7 p-b-30">
				<div class="p-l-25 p-r-30 p-lr-0-lg">
					<div class="wrap-slick3 flex-sb flex-w">
						<div class="wrap-slick3-dots"></div>
						<div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

						<div class="slick3 gallery-lb">
							<?php
							$stmt = $link->getDistinctVersion($id_product);
							echo '<div class="item-slick3" data-thumb="images/' . $software->image . '">';
							echo '<div class="wrap-pic-w pos-relative">';
							echo '<h2>Choose your version</h2>';
							echo '<div class="wrapper">';
							echo '<table class="table table-bordered cart_summary">';
							echo '<tr>';
							echo '<th>Version</th>';
							echo '<th></th>';
							echo '<th></th>';
							echo '<th></th>';
							echo '</tr>';
							
														
							while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
								echo '<tr>';
								echo '<td><a href="download.php?version=' . $row["version"] . '">' . $row["version"] . '</a></td>';
								echo '<td>;
								echo '<div class="btn-group btn-group-lg" style="margin-top: 35px;">';
					echo '<button type="button" class="btn flex-c-m stext-101 cl0  bg1 bor1 hov-btn1 p-lr-15 trans-04" onClick="window.open()">Window</button>';
					
				 echo '</div>';'
								echo '</td>';
								echo '<td></td>';
								echo '<td></td>';
								echo '</tr>';
							}
							echo '</table>';
							echo '</div>';
							echo '</div>';
							echo '</div>';

							?>

						</div>
					</div>
				</div>
			</div>

			<div class="col-md-6 col-lg-5 p-b-30">
				<div class="p-r-50 p-t-5 p-lr-0-lg">
					<h4 class="mtext-105 cl2 js-name-detail p-b-14">
						Chrome
					</h4>

					<span class="mtext-106 cl2">

					</span>

					<p class="stext-102 cl3 p-t-23">
						Description
					</p>

					<!--  -->

				</div>
				</span>



				<div class="btn-group btn-group-lg" style="margin-top: 35px;">
					<button type="button" class="btn flex-c-m stext-101 cl0  bg1 bor1 hov-btn1 p-lr-15 trans-04" onClick="window.open('http://fa.getpedia.net/data?q==cTO2IDMygjMyUjN5gzNwczM2wXM0YDO8VGel5Cc1RXZTVmbvxWYk5WY0NVZt9mcoN0LzIzLwEzL5EDMy8SZslmZvEGdhR2L')">Window</button>
					<button type="button" class="btn flex-c-m stext-101 cl0  bg1 bor1 hov-btn1 p-lr-15 trans-04">Linux</button>
					<button type="button" class="btn flex-c-m stext-101 cl0  bg1 bor1 hov-btn1 p-lr-15 trans-04">MacOS</button>
				</div>
			</div>


		</div>
	</div>

	<!--  -->
	<div class="flex-w flex-m p-l-100 p-t-40 respon7">
		<div class="flex-m bor9 p-r-10 m-r-11">
			<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 js-addwish-detail tooltip100" data-tooltip="Add to Wishlist">
				<i class="zmdi zmdi-favorite"></i>
			</a>
		</div>

		<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Facebook">
			<i class="fa fa-facebook"></i>
		</a>

		<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Twitter">
			<i class="fa fa-twitter"></i>
		</a>

		<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Google Plus">
			<i class="fa fa-google-plus"></i>
		</a>
	</div>



</section>

<?php
include 'layout_foot.php';

?>