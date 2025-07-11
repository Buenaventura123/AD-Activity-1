<?php
$products = [
    // Pickaxes
    ['id' => 1, "name" => "Poseidon's Pickaxe", "type" => "pickaxes", "price" => "$120", "image" => "pos.jpg"],
    ['id' => 2, "name" => "Hermes' Swift Pick", "type" => "pickaxes", "price" => "$110","image" => "Hermes.jpg"],
    ['id' => 3, "name" => "Atlas' Heavy Pickaxe", "type" => "pickaxes", "price" => "$130","image" => "Atlas.jpg"],
    ['id' => 4, "name" => "Apollo's Sun Pick", "type" => "pickaxes", "price" => "$125","image" => "Apollo.jpg"],
    ['id' => 5, "name" => "Artemis' Moon Pickaxe", "type" => "pickaxes", "price" => "$115","image" => "Artemis.jpg"],
    // Shovels
    ['id' => 6, "name" => "Hades' Shovel", "type" => "shovels", "price" => "$80", "image" => "Hades.jpg"],
    ['id' => 7, "name" => "Pluto's Spade", "type" => "shovels", "price" => "$85", "image" => "pluto.jpg"],
    ['id' => 8, "name" => "Gaia's Earth Digger", "type" => "shovels", "price" => "$95", "image" => "gaia.jpg"],
    ['id' => 9, "name" => "Thanatos' Grave Shovel", "type" => "shovels", "price" => "$90", "image" => "thanatos.jpg"],
    ['id' => 10, "name" => "Charon's Burial Spade", "type" => "shovels", "price" => "$88", "image" => "charon.jpg"],

    // Drills
    ['id' => 11, "name" => "Athena's Drill", "type" => "drills", "price" => "$150", "image" => "athena.jpg"],
    ['id' => 12, "name" => "Hephaestus' Core Drill", "type" => "drills", "price" => "$160", "image" => "hephaestus.jpg"],
    ['id' => 13, "name" => "Cyclops' Rock Borer", "type" => "drills", "price" => "$145", "image" => "cyclops.jpg"],
    ['id' => 14, "name" => "Aether's Precision Drill", "type" => "drills", "price" => "$155", "image" => "aether.jpg"],
    ['id' => 15, "name" => "Kraken's Deep Drill", "type" => "drills", "price" => "$165", "image" => "kraken.jpg"],

    // Helmets
    ['id' => 16, "name" => "Ares' Helmet", "type" => "helmets", "price" => "$60", "image" => "ares.jpg"],
    ['id' => 17, "name" => "Hercules' Battle Helmet", "type" => "helmets", "price" => "$70", "image" => "hercules.jpg"],
    ['id' => 18, "name" => "Achilles' War Helm", "type" => "helmets", "price" => "$80", "image" => "achilles.jpg"],
    ['id' => 19, "name" => "Perseus' Bronze Cap", "type" => "helmets", "price" => "$65", "image" => "perseus.jpg"],
    ['id' => 20, "name" => "Ajax's Iron Helm", "type" => "helmets", "price" => "$75", "image" => "ajax.jpg"],

    // TNTs
    ['id' => 21, "name" => "Zeus' TNT", "type" => "tnt", "price" => "$100", "image" => "zeus.jpg"],
    ['id' => 22, "name" => "Typhon's Thunder TNT", "type" => "tnt", "price" => "$115", "image" => "typhon.jpg"],
    ['id' => 23, "name" => "Chaos' Shock Charge", "type" => "tnt", "price" => "$125", "image" => "chaos.jpg"],
    ['id' => 24, "name" => "Hecate's Hex Bomb", "type" => "tnt", "price" => "$110", "image" => "hecate.jpg"],
    ['id' => 25, "name" => "Hydra's Blast Barrel", "type" => "tnt", "price" => "$130", "image" => "hydra.jpg"],

];

function getAllProducts() {
    return [
        ['id' => 1, 'name' => "Poseidon's Pickaxe", 'type' => "pickaxes", 'price' => 120.00, 'image' => "pos.jpg"],
        ['id' => 2, 'name' => "Hermes' Swift Pick", 'type' => "pickaxes", 'price' => 110.00, 'image' => "Hermes.jpg"],
        ['id' => 3, 'name' => "Atlas' Heavy Pickaxe", 'type' => "pickaxes", 'price' => 130.00, 'image' => "Atlas.jpg"],
        ['id' => 4, 'name' => "Apollo's Sun Pick", 'type' => "pickaxes", 'price' => 125.00, 'image' => "Apollo.jpg"],
        ['id' => 5, 'name' => "Artemis' Moon Pickaxe", 'type' => "pickaxes", 'price' => 115.00, 'image' => "Artemis.jpg"],
        // Shovels
        ['id' => 6, 'name' => "Hades' Shovel", 'type' => "shovels", 'price' => 80.00, 'image' => "Hades.jpg"],
        ['id' => 7, 'name' => "Pluto's Spade", 'type' => "shovels", 'price' => 85.00, 'image' => "pluto.jpg"],
        ['id' => 8, 'name' => "Gaia's Earth Digger", 'type' => "shovels", 'price' => 95.00, 'image' => "gaia.jpg"],
        ['id' => 9, 'name' => "Thanatos' Grave Shovel", 'type' => "shovels", 'price' => 90.00, 'image' => "thanatos.jpg"],
        ['id' => 10, 'name' => "Charon's Burial Spade", 'type' => "shovels", 'price' => 88.00, 'image' => "charon.jpg"],

        // Drills
        ['id' => 11, 'name' => "Athena's Drill", 'type' => "drills", 'price' => 150.00, 'image' => "athena.jpg"],
        ['id' => 12, 'name' => "Hephaestus' Core Drill", 'type' => "drills", 'price' => 160.00, 'image' => "hephaestus.jpg"],
        ['id' => 13, 'name' => "Cyclops' Rock Borer", 'type' => "drills", 'price' => 145.00, 'image' => "cyclops.jpg"],
        ['id' => 14, 'name' => "Aether's Precision Drill", 'type' => "drills", 'price' => 155.00, 'image' => "aether.jpg"],
        ['id' => 15, 'name' => "Kraken's Deep Drill", 'type' => "drills", 'price' => 165.00, 'image' => "kraken.jpg"],

        // Helmets
        ['id' => 16, 'name' => "Ares' Helmet", 'type' => "helmets", 'price' => 60.00, 'image' => "ares.jpg"],
        ['id' => 17, 'name' => "Hercules' Battle Helmet", 'type' => "helmets", 'price' => 70.00, 'image' => "hercules.jpg"],
        ['id' => 18, 'name' => "Achilles' War Helm", 'type' => "helmets", 'price' => 80.00, 'image' => "achilles.jpg"],
        ['id' => 19, 'name' => "Perseus' Bronze Cap", 'type' => "helmets", 'price' => 65.00, 'image' => "perseus.jpg"],
        ['id' => 20, 'name' => "Ajax's Iron Helm", 'type' => "helmets", 'price' => 75.00, 'image' => "ajax.jpg"],

        // TNTs
        ['id' => 21, 'name' => "Zeus' TNT", 'type' => "tnt", 'price' => 100.00, 'image' => "zeus.jpg"],
        ['id' => 22, 'name' => "Typhon's Thunder TNT", 'type' => "tnt", 'price' => 115.00, 'image' => "typhon.jpg"],
        ['id' => 23, 'name' => "Chaos' Shock Charge", 'type' => "tnt", 'price' => 125.00, 'image' => "chaos.jpg"],
        ['id' => 24, 'name' => "Hecate's Hex Bomb", 'type' => "tnt", 'price' => 110.00, 'image' => "hecate.jpg"],
        ['id' => 25, 'name' => "Hydra's Blast Barrel", 'type' => "tnt", 'price' => 130.00, 'image' => "hydra.jpg"]
    ];
}


function getProductById($productId) {
    $products = getAllProducts(); // Get your product data
    foreach ($products as $product) {
        if ($product['id'] == $productId) {
            $product['price'] = (float)str_replace('$', '', $product['price']);
            return $product;
        }
    }
    return null; // Return null if product not found
}
?>


