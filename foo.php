<?php 
 
  function foo($array) {
    if (is_array($array)) {
        // Trier le tableau par ordre numérique
        sort($array);

        // Définir les valeurs par défaut
        $prev = array();
        $prev_key = null;

        foreach ($array as $key => $item) {
            // Données par défaut de configuration pour la première fois
            if (empty($prev)) {
                $prev = $item;
                $prev_key = $key;
                continue;
            }

            if ($item[0] >= $prev[0] && $item[0] <= $prev[1]) {
                // Si le dernier nombre était inférieur à ne pas mettre à jour
                if ($array[$prev_key][1] < $item[1])
                    $array[$prev_key][1] = $item[1];

                unset($array[$key]);
            }else {
                $prev_key = $key;
            }       

            $prev = $item;
        }
    }

    return $array;
}

$array = array(
     
    0 => array(3, 6),
    1 => array(3, 4),
    1 => array(15, 20),
    2 => array(16, 17),
    3 => array(1, 4),
    4 => array(6, 10),
    6 => array(3, 6),
  );
  
  var_dump(foo($array));