<!DOCTYPE html>
<html lang="zxx">
	<head>
	<link rel="stylesheet" href="<?php echo base_url('assets/perso/styles.css');?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/fontawesome-5/css/all.css');?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/perso/main.css'); ?>">
	</head>
	<body>
		<div class="shopping-cart section">
				<div class="row">
					<div class="col-16">
						<table class="table shopping-summery">
								<thead>
									<tr class="main-hading">
										<th>Produit</th>
										<th>Description</th>
										<th class="text-center">Prix Unitaire</th>
										<th class="text-center">Quantité en stock</th>
										<th class="text-center">Abonnement mensuel</th>
										<th class="text-center"><i class="fas fa-cart-arrow-down"></i></th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td class="product-name" >
											<?php echo $produit['nom'] ;?>
										</td>
										<td class="product-des">
											<p class="product-des"><?php echo $produit['description'] ;?></p>
										</td>
										<td class="price"><?php echo $produit['prixunitaire'] ;?></td>
										<td class="total-amount"><?php echo $produit['nombre'] ;?></td>
										<td class="total-amount"><?php echo $produit['prixabonnementservice']; ?></td>
										<td class="action"><a href="<?php echo base_url('Panier/show'); ?>"><i class="fas fa-cart-plus" style="color: #85725b"></i></a></td>
									</tr>
								</tbody>
						</table>
					</div>
			</div>
		</div>


		<!-- Jquery -->
		<script src="js/jquery.min.js"></script>
		<script src="js/jquery-migrate-3.0.0.js"></script>
		<script src="js/jquery-ui.min.js"></script>

		<!-- Bootstrap JS -->
		<script src="js/bootstrap.min.js"></script>
		<!-- Color JS -->
		<script src="js/colors.js"></script>



		<!-- Nice Select JS -->
		<script src="js/nicesellect.js"></script>

		<script src="js/active.js"></script>
	</body>
</html>
