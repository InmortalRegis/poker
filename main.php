<?php


namespace InmortalRegis\TestProject\Models;

class Poker
{

    /**
     * Return if the array is a poker straight
     * @param array $cards
     * @return bool
     */

    public static function isStraight(array $cards): bool
    {
        $cards = array_unique($cards);
        if (in_array(14, $cards)) {
            // Si hay una carta de 14, se añade una carta de 1 y se ordena, luego eliminamos 14
            $cards = array_merge($cards, [1]);
            sort($cards);
            array_pop($cards);
        }
        if (count($cards) < 5) {
            // Si ordenamos las cartas y/o eliminamos la de 14, si quedan menos de 5 cartas, no es una escalera
            return false;
        }

        for ($i = 0; $i < count($cards) - 1; $i++) {
            if ($cards[$i] + 1 != $cards[$i + 1]) {
                return false;
            }
        }
        return true;
    }
}

function main()
{
    $results1 = Poker::isStraight([2, 3, 4, 5, 6]);
    echo "2, 3, 4 ,5, 6: " . ($results1 ? "true" : "false") . PHP_EOL;
    $results2 = Poker::isStraight([14, 5, 4, 2, 3]);
    echo "14, 5, 4 ,2, 3: " . ($results2 ? "true" : "false") . PHP_EOL;
    $results3 = Poker::isStraight([7, 7, 12, 11, 3, 4, 14]);
    echo "7, 7, 12 ,11, 3, 4, 14: " . ($results3 ? "true" : "false") . PHP_EOL;
    $results4 = Poker::isStraight([7, 3, 2]);
    echo "7, 3, 2: " . ($results4 ? "true" : "false") . PHP_EOL;
}

main();
