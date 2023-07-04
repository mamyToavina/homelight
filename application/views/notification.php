<!DOCTYPE html>
<html lang="fr">
<head>
	<link rel="stylesheet" href="<?php echo base_url('assets/fontawesome-5/css/all.css');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/perso/style_notif.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/perso/main.css'); ?>">
</head>
<body>
    <div class="content">
        <div class="product-cart">
            <div class="panier-grid">
            <?php foreach ($all as $al): ?>
                <div class="produit-affiche-ensemble">
                    <div class="produit-affiche">
                        <p class="nom-produit-panier"><?php echo $al['datenotif']; ?></p>
                        <p class="category-produit-panier"><?php echo $al['action']; ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
        </div>
</body>
