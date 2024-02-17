<?php 
use Card\CartController;
$cart = new CartController;
$items = $cart->show_items();
?>

<link rel="stylesheet" href="./assets/css/table.css">
<style>.slider {display: none;}</style>
	<body>
	<section class="ftco-section">
		<div class="container">
		    <div class="row">
		    	<div class="col-md-12">
		    		<h3 style="font-size: 20px;" class=" mb-4 text-center">سبد خرید : <?php echo $_COOKIE['username'] ?></h3>
		    		<div class="table-wrap">
		    			<table class="table">
		    			  <thead class="thead-primary">
		    			    <tr>
								<th style="font-size: 18px;" >&nbsp;</th>
		    			        <th style="font-size: 18px;">محصول</th>
		    			        <th>&nbsp;</th>
		    			        <th style="font-size: 18px;">قیمت</th>
		    			        <th style="font-size: 18px;">تعداد</th>
		    			        <th style="font-size: 18px;">جمع</th>
		    			        <th style="font-size: 18px;">دستورات</th>
		    			    </tr>
		    			  </thead>
						  <?php foreach($items as $item) { ?>
		    			  <tbody>
							<?php
							$product_id = $item['product_id'];
							$product = self::$context->show_product($product_id);
							?>
		    			    <tr class="alert" role="alert">
		    			    	<td>

		    			    	</td>
		    			    	<td>
		    			    		<div class="img" style="background-image: url(<?php echo $product['image_url'] ?>);"></div>
		    			    	</td>
		    			      <td>
		    			      	<div class="email">
		    			      	</div>
		    			      </td>
		    			      <td style="font-size: 18px;"><?php echo $product['price'] ?></td>
		    			      <td style="font-size: 18px;" class="quantity">
		    		        	<div class="input-group">
								<?php echo $item['quantity'] ?>
		    	          	</div>
		    	          </td>
		    	          <td style="font-size: 18px;"><?php echo ($product['price'] * $item['quantity']) ?></td>
		    			      <td>
								<a class="close" style="  border-radius: 5px;background-color: red; border: 1px solid red;" href="cart/views/addordelete.php?item_id=<?php echo $item['item_id'] ?>">
                                  <img width="35"  src="./assets/icons/delete-48-w.png">
								</a>
		    	        	</td>
		    			    </tr>
		    			  </tbody>
						  <?php } ?>
		    			</table>
		    		</div>
					<button class="btn-add">پرداخت</button>
		    	</div>
		    </div>
		</div>
	</section>

    <script src="./assets/js/jquery.min.js"></script>
    <script src="./assets/js/popper.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
    <script src="./assets/js/main.js"></script>

	</body>
</html>

