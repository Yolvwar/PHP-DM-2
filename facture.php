<?php

$tableau_client = array(
  array(
    'nom' => 'MALLET',
    'prenom' => 'Yoann',
    'adresse' => '5 Rue Emile Zola, 78480'
  ),
  array(
    'nom' => 'MENNAD',
    'prenom' => 'Julien',
    'adresse' => '20 Allée des Lilas, 75100'
  ),
  array(
    'nom' => 'ETIENNE',
    'prenom' => 'Fabrice',
    'adresse' => '37 Rue du Capitole, 78320'
  ),
  array(
    'nom' => 'ZOUNON',
    'prenom' => 'Axel',
    'adresse' => '86 Rue des fours a chaux, 78501'
  )
);

$tableau_produits = array(
  array(
    'product_code' => 'XVA3785CAR',
    'product_name' => 'Carotte',
    'product_price' => 2
  ),
  array(
    'product_code' => 'XVA3698AUB',
    'product_name' => 'Aubergine',
    'product_price' => 3
  ), array(
    'product_code' => 'XVA3248RAD',
    'product_name' => 'Radis',
    'product_price' => 4
  ), array(
    'product_code' => 'XVA6578MAN',
    'product_name' => 'Mangue',
    'product_price' => 7
  ),
  array(
    'product_code' => 'XVA6578NOI',
    'product_name' => 'Noix de Coco',
    'product_price' => 4
  ),
);


function tva($price)
{
  $tva = 1.2;
  $result = ($price * $tva)-$price;
  return($result);
};

function tva_total($price)
{
  $tva = 1.2;
  $result = $price * $tva;
  return($result);
};


// récupérer date + heure + configurer le réseau horaires au format france/europe
date_default_timezone_set('Europe/Paris');
$date = date('d') . '-' . date('m') . '-' . date('Y');
$hours = date('H:i:s');

$subtotal = 0;

$choice_random_user = mt_rand(0, 3);
echo ('<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css">
  <title>Lidl</title>
</head>

<body>
  <nav>
    <div class="nav-wrapper">
    <div class="nav-lidl-info">
      <img class="logo" src="images/Lidl-Logo.svg.png" alt="logo_lidl">
      <ul class="lidl-liste-infos">
      <li>LIDL VR</li>
      <li>78 All. des Resedas</li>
      <li>78540 Vernouillet</li>
      <li>Lundi - Samedi : 8h30 - 19h30</li>
      </ul>
    </div>
      <div class="facture"><p>LIDL : VOTRE FACTURE</p></div>
      <div class="nav-wrapper-client-info">
        <ul class="client-info-txt">
          <li class="name">' . $tableau_client[$choice_random_user]['nom'] . ' ' . $tableau_client[$choice_random_user]['prenom'] . '</li>
          <li>' . $tableau_client[$choice_random_user]['adresse'] . '</li>
          <li>' . $date . '</li>
        </ul>
      </div>
    </div>
  </nav>
 
  <main>
    <div class="main-table-facture">
      <table class="table-content">
            <tr class="table-titles">
                <th >REF & DATE</th>
                <th >Services</th>
                <th >Quantity</th>
                <th >Price</th>
                <th >Amount</th>
            </tr>');
foreach ($tableau_produits as $items) {
  $choice_random_user = mt_rand(0, count($tableau_client) - 1);
  $quantity = mt_rand(0, 9);
  $amount = $items['product_price'] * $quantity;
  $subtotal += $amount;
  if ($quantity != 0) {
    echo ('<tr class="table-lines">
              <td>' . $items['product_code'] . '</td>
                            <td>' . $items['product_name'] . '</td>
                            <td>' . $quantity . '</td>
                            <td>' . $items['product_price'] . '€</td>
                            <td>' . $amount . '€</td></tr>');
  }
};

echo ('</table>
    </div>
    <div class="container">
    <div class="THT">
    <p>THT : '.$subtotal.'€</p>
    </div>
    <div class="TVA">
    <p>TVA 20% : '.tva($subtotal).'€</p>
    </div>
    <div class="Total">
    <p>Total : '.tva_total($subtotal).'€</p>
    </div>
    </div>
  </main>

  <footer>

  </footer>
</body>

</html>');
