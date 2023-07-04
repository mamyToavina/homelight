<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin-top: 20px;
        }

        h2 {
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f5f5f5;
            font-weight: bold;
        }

        p {
            margin-bottom: 10px;
        }

        form {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="date"] {
            padding: 5px;
        }

        .btn-container {
            display: flex;
            align-items: center;
        }

        .btn-container input[type="text"] {
            margin-right: 10px;
        }

        button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <!-- Vue pour la fonction "calculate_total_price" -->
    <h2>Votre produit inclus dans l'abonnement</h2>
    <p style="color: blue"><?php if(isset($message)){ echo($message); }?></p>
    
    <div class="btn-container">

        <form method="post" action="<?php echo site_url('PayementController/payer'); ?>">
            <label for="reference">Référence :</label>
            <input type="text" name="reference" id="reference" required>

            <button type="submit">Valider</button>
        </form>

    </div>

    <table style="margin: 0 auto;">
        <thead>
            <tr>
                <th>Produit</th>
                <th>Prix</th>
            </tr>
        </thead>
        <tbody>

            <?php foreach ($produits as $produit) : ?>
                <tr>
                    <td><?php echo $produit->emplacement; ?></td>
                    <td><?php echo $produit->prix; ?></td>
                </tr>
            <?php endforeach; ?>

        </tbody>
    </table>

    <p>Prix total:  <?php echo $prix; ?></p>

    <hr>

</body>
</html>
