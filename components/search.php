<div class="m-3">
    <div class="mb-1">
        <div class="px-1 bg-emerald-100 text-emerald-600 font-bold">
            Minepak
        </div>
        <em class="ml-1">
            Search results
        </em>
    </div>

    <ul>
        <?php foreach($results as $r): ?>
            <li>plugin: <i class="text-slate-500"><?php echo $r; ?></i><li>
        <?php endforeach; ?>
    </ul>
</div>