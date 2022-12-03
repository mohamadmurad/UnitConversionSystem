<?php

namespace App\Helpers;

class Convert
{


    public static function calc_product_quantity($allQuantities)
    {
        $result = [];
        foreach ($allQuantities as $unit) {
            if (!$unit->parent_id) { // unit
                if (!array_key_exists($unit->id, $result)) {

                    $result[$unit->id] = [
                        'id' => $unit->id,
                        'name' => $unit->name,
                        'total' => $unit->pivot->quantity,

                    ];

                } else {

                    $result[$unit->id]['total'] =
                        $result[$unit->id]['total'] + self::Down2Up($unit, null, $unit->pivot->quantity);;
                }


            } else { // subunit

                $parent_unit = $unit->parent;

                if (!array_key_exists($parent_unit->id, $result)) {

                    $result[$parent_unit->id] = [
                        'id' => $parent_unit->id,
                        'name' => $parent_unit->name,
                        'total' => $unit->pivot->quantity / $unit->value,

                    ];

                } else {

                    $result[$parent_unit->id]['total'] =
                        $result[$parent_unit->id]['total'] + self::Down2Up($unit, null, $unit->pivot->quantity);


                }

            }


        }

        return $result;
    }

    public static function Up2Dow($superUnit, $subUnit, $superValue)
    {

        return $superValue * $subUnit->value;
    }

    public static function Down2Up($subUnit, $superUnit, int $subValue)
    {

        return $subValue / $subUnit->value;


    }


}
