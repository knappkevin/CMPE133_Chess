<?php
require_once("DBActions/DataBaseActions.php");
if ($_GET and $_GET["gameid"] and $_GET["color"]);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Board</title>
    <link rel="stylesheet" href="chess.css">


</head>

<body>
<!-- TODO: make a prototype for this page (on a separate branch):
      Stage 1:
      * The page should have the board on the left and a some kind of menu on the right
      * The menu should have tabs (around 3) with buttons and text on them
      * The page should be scalable and the tab menu should hide if the page is too narrow
      * There also should be a button to hide the menu manually
      * The top and the bottom should have footers with some temporary buttons/fields
      * An example of the page look is something like this:
      ___________________________________________________________
      |                      [top footer]                       |
      ___________________________________________________________
      |                                     |[tab1]|[tab2]|[tab3|
      |                                     |      |------|-----|
      |                                     |                   |
      |                                     |     [button]      |
      |               [board]               |                   |
      |                                     |     [button]      |
      |                                     |                   |
      |                                     |     [button]      |
      |                                     |                   |
      |                                     |                   |
      |_________________________________________________________|
      |                       [bottom footer]                   |
      |_________________________________________________________|

      -->
<!-- TODO: replace the table below with a structure of divs (on a separate branch).
      Stage 1:
      * Every div should be a class of "square" or something like that,
      * they should have fixed sizes or scale
      * they should display an image of class "piece" in the center, "legal-move" above anything else,
      * the board coloring should be made with a js function color() that takes 1 boolean argument
          where 1 is white and 0 is black (something like "boolean drawFromWhitePerspective").
      (Later at Stage 2: there should be also a way to highlight the square for a hint,
          and an image of class "comment" must be shown in the right top corner of the square)
          -->
<table id="board" class="chess-board">
    <tbody>
    <tr>
        <th></th>
        <th>a</th>
        <th>b</th>
        <th>c</th>
        <th>d</th>
        <th>e</th>
        <th>f</th>
        <th>g</th>
        <th>h</th>
    </tr>
    <tr>
        <th>8</th>
        <th id="a8" class="light"><img class="piece-img" onclick="pieceClicked(this)" id="r_4"
                                       src="pieces/black-rook.png"></th>
        <th id="b8" class="dark"><img class="piece-img" onclick="pieceClicked(this)" id="n_4"
                                      src="pieces/black-knight.png"></th>
        <th id="c8" class="light"><img class="piece-img" onclick="pieceClicked(this)" id="b_4"
                                       src="pieces/black-bishop.png"></th>
        <th id="d8" class="dark"><img class="piece-img" onclick="pieceClicked(this)" id="q_2"
                                      src="pieces/black-queen.png"></th>
        <th id="e8" class="light"><img class="piece-img" onclick="pieceClicked(this)" id="k_2"
                                       src="pieces/black-king.png"></th>
        <th id="f8" class="dark"><img class="piece-img" onclick="pieceClicked(this)" id="b_3"
                                      src="pieces/black-bishop.png"></th>
        <th id="g8" class="light"><img class="piece-img" onclick="pieceClicked(this)" id="n_3"
                                       src="pieces/black-knight.png"></th>
        <th id="h8" class="dark"><img class="piece-img" onclick="pieceClicked(this)" id="r_3"
                                      src="pieces/black-rook.png"></th>

    </tr>
    <tr>
        <th>7</th>
        <th id="a7" class="dark"><img class="piece-img" onclick="pieceClicked(this)" id="p_9"
                                      src="pieces/black-pawn.png"></th>
        <th id="b7" class="light"><img class="piece-img" onclick="pieceClicked(this)" id="p_10"
                                       src="pieces/black-pawn.png"></th>
        <th id="c7" class="dark"><img class="piece-img" onclick="pieceClicked(this)" id="p_11"
                                      src="pieces/black-pawn.png"></th>
        <th id="d7" class="light"><img class="piece-img" onclick="pieceClicked(this)" id="p_12"
                                       src="pieces/black-pawn.png"></th>
        <th id="e7" class="dark"><img class="piece-img" onclick="pieceClicked(this)" id="p_13"
                                      src="pieces/black-pawn.png"></th>
        <th id="f7" class="light"><img class="piece-img" onclick="pieceClicked(this)" id="p_14"
                                       src="pieces/black-pawn.png"></th>
        <th id="g7" class="dark"><img class="piece-img" onclick="pieceClicked(this)" id="p_15"
                                      src="pieces/black-pawn.png"></th>
        <th id="h7" class="light"><img class="piece-img" onclick="pieceClicked(this)" id="p_16"
                                       src="pieces/black-pawn.png"></th>

    </tr>
    <tr>
        <th>6</th>
        <th id="a6" class="light"></th>
        <th id="b6" class="dark"></th>
        <th id="c6" class="light"></th>
        <th id="d6" class="dark"></th>
        <th id="e6" class="light"></th>
        <th id="f6" class="dark"></th>
        <th id="g6" class="light"></th>
        <th id="h6" class="dark"></th>

    </tr>
    <tr>
        <th>5</th>
        <th id="a5" class="dark"></th>
        <th id="b5" class="light"></th>
        <th id="c5" class="dark"></th>
        <th id="d5" class="light"></th>
        <th id="e5" class="dark"></th>
        <th id="f5" class="light"></th>
        <th id="g5" class="dark"></th>
        <th id="h5" class="light"></th>

    </tr>
    <tr>
        <th>4</th>
        <th id="a4" class="light"></th>
        <th id="b4" class="dark"></th>
        <th id="c4" class="light"></th>
        <th id="d4" class="dark"></th>
        <th id="e4" class="light"></th>
        <th id="f4" class="dark"></th>
        <th id="g4" class="light"></th>
        <th id="h4" class="dark">

        </th>

    </tr>
    <tr>
        <th>3</th>
        <th id="a3" class="dark"></th>
        <th id="b3" class="light"></th>
        <th id="c3" class="dark"></th>
        <th id="d3" class="light"></th>
        <th id="e3" class="dark"></th>
        <th id="f3" class="light"></th>
        <th id="g3" class="dark"></th>
        <th id="h3" class="light"></th>

    </tr>
    <tr>
        <th>2</th>
        <th id="a2" class="light"><img class="piece-img" onclick="pieceClicked(this)" id="P_1"
                                       src="pieces/white-pawn.png"></th>
        <th id="b2" class="dark"><img class="piece-img" onclick="pieceClicked(this)" id="P_2"
                                      src="pieces/white-pawn.png"></th>
        <th id="c2" class="light"><img class="piece-img" onclick="pieceClicked(this)" id="P_3"
                                       src="pieces/white-pawn.png"></th>
        <th id="d2" class="dark"><img class="piece-img" onclick="pieceClicked(this)" id="P_4"
                                      src="pieces/white-pawn.png"></th>
        <th id="e2" class="light"><img class="piece-img" onclick="pieceClicked(this)" id="P_5"
                                       src="pieces/white-pawn.png"></th>
        <th id="f2" class="dark"><img class="piece-img" onclick="pieceClicked(this)" id="P_6"
                                      src="pieces/white-pawn.png"></th>
        <th id="g2" class="light"><img class="piece-img" onclick="pieceClicked(this)" id="P_7"
                                       src="pieces/white-pawn.png"></th>
        <th id="h2" class="dark"><img class="piece-img" onclick="pieceClicked(this)" id="P_8"
                                      src="pieces/white-pawn.png"></th>

    </tr>
    <tr>
        <th class=gameprefix>1</th>
        <th id="a1" class="dark"><img class="piece-img" onclick="pieceClicked(this)" id="R_2"
                                      src="pieces/white-rook.png"></th>
        <th id="b1" class="light"><img class="piece-img" onclick="pieceClicked(this)" id="N_2"
                                       src="pieces/white-knight.png"></th>
        <th id="c1" class="dark"><img class="piece-img" onclick="pieceClicked(this)" id="B_2"
                                      src="pieces/white-bishop.png"></th>
        <th id="d1" class="light"><img class="piece-img" onclick="pieceClicked(this)" id="Q_1"
                                       src="pieces/white-queen.png"></th>
        <th id="e1" class="dark"><img class="piece-img" onclick="pieceClicked(this)" id="K_1"
                                      src="pieces/white-king.png"></th>
        <th id="f1" class="light"><img class="piece-img" onclick="pieceClicked(this)" id="B_1"
                                       src="pieces/white-bishop.png"></th>
        <th id="g1" class="dark"><img class="piece-img" onclick="pieceClicked(this)" id="N_1"
                                      src="pieces/white-knight.png"></th>
        <th id="h1" class="light"><img class="piece-img" onclick="pieceClicked(this)" id="R_1"
                                       src="pieces/white-rook.png"></th>

      </tr>
  </tbody>
</table>
<?php
    if($_GET){
        echo '<h2>Your color is: <div id="color">'.$_GET["color"].'</div></h2>
<h2>Game ID: <div id="gameID">'.$_GET["gameid"].'</div></h2>';
    }
?>

<script src="model.js">
</script>
</body>
</html>

