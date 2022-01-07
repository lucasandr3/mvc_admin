<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?=url('')?>" style="color:#4f4f4f;font-weight:bold;">Home</a></li>
        <?php foreach($data as $key => $value): ?>
            <li class="breadcrumb-item" aria-current="page"><a href="<?=url($value['link']);?>" style="color:#4f4f4f;"><?=$key;?></a></li>
        <?php endforeach; ?>
    </ol>
</nav>