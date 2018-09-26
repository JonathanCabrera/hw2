<?php

$boardSize = 9;
$emptyValue = '.';

$gameBoard = array_fill(0, $boardSize, $emptyValue);


function play() {
    global $gameBoard;
    $winner = setBoard($gameBoard);
    displayBoard($gameBoard);
    echo "<h1>".$winner."</h1>";
}

function setBoard($gameBoard) {
    global $gameBoard;
    for ($i = 0; $i < 9; $i++) {
        
        $pos = getPlayPosition($gameBoard);
        if ($i % 2 == 0) {
            $gameBoard[$pos] = 'X';   
        } else {
            $gameBoard[$pos] = 'O';
        }
        if(hasWon('X')) {
            return "X WON!";
        } else if (hasWon('O')) {
            return "O WON!";
        }
        if ($i == 8) {
            return "Tie";
        }
    }
    
}

function convertToRC($row, $col) {
    return $row * 3 + $col;
}

function hasWon($piece) { 
    global $gameBoard;
    //check row
    for ($i = 0; $i < 3; $i++) {
        for ($j = 0; $j < 3; $j++) {
            if ($gameBoard[convertToRC($i, $j)] != $piece) {
                break;
            }
            if ($j == 2) {
                return true;
            }
        }
    }
    
    //check col
    for ($i = 0; $i < 3; $i++) {
        for ($j = 0; $j < 3; $j++) {
            if ($gameBoard[convertToRC($j, $i)] != $piece) {
                break;
            }
            if ($j == 2) {
                return true;
            }
        }
    }

    if ($gameBoard[0] == $piece &&
    $gameBoard[4] == $piece &&
    $gameBoard[8] == $piece) {
        return true;            
    }

    if ($gameBoard[2] == $piece &&
    $gameBoard[4] == $piece &&
    $gameBoard[6] == $piece) {
        return true;            
    }
}

function getPlayPosition($gameBoard) {
    $randomPosition = rand(0, 8);
    while($gameBoard[$randomPosition] != '.') {
        $randomPosition = rand(0, 8);
    }
    
    return $randomPosition;
}

function displayBoard($gameBoard) {
   echo "<div class='table'>";
       echo "<div class='row'>";
            echo "<div class='cell1'>";
                echo $gameBoard[0];
            echo"</div>";
            echo "<div class='cell2'>";
                echo $gameBoard[1];
            echo"</div>";
            echo "<div class='cell3'>";
                echo $gameBoard[2];
            echo"</div>";
        echo "</div>";
        echo "<div class='row'>";
            echo "<div class='cell1'>";
                echo $gameBoard[3];
            echo"</div>";
            echo "<div class='cell2'>";
                echo $gameBoard[4];
            echo"</div>";
            echo "<div class='cell3'>";
                echo $gameBoard[5];
            echo"</div>";
        echo "</div>";
        echo "<div class='row'>";
            echo "<div class='cell1'>";
                echo $gameBoard[6];
            echo"</div>";
            echo "<div class='cell2'>";
                echo $gameBoard[7];
            echo"</div>";
            echo "<div class='cell3'>";
                echo $gameBoard[8];
            echo"</div>";
        echo "</div>";
    echo "</div>";
}

?>
