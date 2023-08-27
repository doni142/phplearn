<ul>
<?php foreach($tpl["pets"] as $pet) { ?>
<li><?php print $pet["name"] . ' (' . $pet['species'] . ')';?></li>
<?php }?>
</ul>