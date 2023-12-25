<?php
<div class="paints">
<?php
foreach ($paints as $paint) {
    if(isset($paint['image']) && isset($paint['name'])) {
        echo "<div class='paint'>";
        echo $this->Html->image($paint['image'], ['alt' => $paint['name']]);
        echo "<h3>" . htmlspecialchars($paint['name']) . "</h3>";
        echo "</div>";
    }
}
?>
</div>
