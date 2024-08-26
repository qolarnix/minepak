<div class="m-3">
    <div class="mb-1">
        <div class="px-1 bg-emerald-100 text-emerald-600 font-bold">
            <?php echo $view->escape($title); ?>
        </div>
        <em class="ml-1">
            <?php echo $view->escape($text); ?>
        </em>
    </div>
    
    <p class="font-bold">Example usage:</p>
    <ul>
        <?php foreach($commands as $c): ?>
            <li>minepak <?php echo $c['name']; ?> <i class="text-slate-500"><?php echo $c['description']; ?></i></li>
        <?php endforeach; ?>
    </ul>
</div>