<?php
echo "<table border='1'>";
for ($row = 1; $row <= 10; $row++) {
    echo "<tr>";
    for ($col = 1; $col <= 10; $col++) {
        $x = $row * $col;
        if ($row % 2 == 0 && $col % 2 == 0) {
            echo "<td style='background:#CBF667;'>(" . $x . ")</td>";
        } elseif ($row % 2 != 0 && $col % 2 != 0) {
            echo "<td style='background:#FFF999;'>[" . $x . "]</td>";
        } else {
            echo "<td>$x</td>";
        }

    }
    echo "<tr>";
}

echo "</table>";