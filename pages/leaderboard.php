<?php
$q = $db->prepare("SELECT pseudo, xp FROM `users` WHERE admin = 0 ORDER BY xp DESC");
$q->execute();

$result = $q->fetchAll();

function division_entiere($xp, $xplvl){
    $niveau = 0;
    while($xp >= $xplvl){
        $xp = $xp - $xplvl;
        $niveau++;
        $xplvl = round($xplvl * 1.1);
    }
    return $niveau;
}

function reste_division_entiere($xp, $xplvl){
    $niveau = 0;
    while($xp >= $xplvl){
        $xp = $xp - $xplvl;
        $niveau++;
        $xplvl = round($xplvl * 1.1);
    }
    return $xp;
}

function xpmax_final($xp, $xplvl){
    $niveau = 0;
    while($xp >= $xplvl){
        $xp = $xp - $xplvl;
        $niveau++;
        $xplvl = round($xplvl * 1.1);
    }
    return $xplvl;
}

?>

<div class="div_accueil"><a href="#" class="accueil" data-target="accueil">Accueil</a></div>

<div class="leaderboard">
  <div class="podium">
    <?php $topThree = array_slice($result, 0, 3); ?>
    <?php foreach ($topThree as $index => $user): ?>
      <div class="user carre_lead pos<?php echo ($index - 1) ?><?php echo ($index - 1) ?>"></div>
      <div class="user carre_lead pos<?php echo ($index + 1) ?>">
        <div class="rank"><?php echo ($index + 1); ?></div>
        <div class="pseudo"><?php echo $user["pseudo"]; ?></div>
        <div class="lvl"><?php echo division_entiere($user["xp"], 500); ?> LvL</div>
        <div class="xp"><?php echo $user["xp"]; ?> XP</div>
      </div>
    <?php endforeach; ?>
    
      <div class="user carre_lead pos22"></div>
      <div class="user carre_lead pos"></div>
      <div class="user carre_lead pos33"></div>
  </div>

  <div class="list">
    <?php $nextSeven = array_slice($result, 3, 7); ?>
    <?php foreach ($nextSeven as $index => $user): ?>
      <div class="user posX">
        <div class="rank"><?php echo ($index + 4); ?></div>
        <div class="pseudo"><?php echo $user["pseudo"]; ?></div>
        <div class="lvl"><?php echo division_entiere($user["xp"], 500); ?> LvL</div>
        <div class="xp"><?php echo $user["xp"]; ?> XP</div>
      </div>
    <?php endforeach; ?>
  </div>
</div>