<?php

class Game {

    public $name;

    public $rolls;

    public function __construct( $name ) {
        $this->name = $name;
    }

    public function bowl( array $num_pins ) {

        // Log rolls to $this->rolls
        $this->rolls[] = $num_pins[0];
        $this->rolls[] = $num_pins[1];
    }

    public function score() {

        $score = 0;

        // Necessary info for loop
        $length = count( $this->rolls ) - 1;
        $rolls = $this->rolls;

        // Calculate Score Here
        for ( $i = 0; $i < $length; $i++ ) {
            
            // Calculates score in event of strike
            if ( $rolls[ $i ] == 10 ) {
                $score = $score + $rolls[ $i ] + $rolls[ $i + 1 ] + $rolls[ $i + 2 ];
            
            // Calculates score in event of spare
            } elseif ( $rolls[ $i ] + $rolls[ $i + 1 ] == 10 ) {
                $score = $score + $rolls[ $i ] + $rolls[ $i + 2 ];

            // Calculates score normally
            } else {
                $score = $score + $rolls[ $i ];
            }
        }

        return $score;

    }

}