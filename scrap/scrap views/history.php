<table class="table table-striped">

    <thead>
        <tr>
            <th>Transaction</th>
            <th>Date/Time</th>
            <th>Symbol</th>
            <th>Shares</th>
            <th>Price</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($history as $counter): ?>
        
            <tr>
                <th><?= $counter["transaction"] ?></th>
                <th><?= $counter["datetime"] ?></th>
                <th><?= $counter["symbol"] ?></th>
                <th><?= $counter["shares"] ?></th>
                <th><?= '$' . number_format($counter["price"], 2) ?></th>
            </tr>
        
        <?php endforeach ?>
        

</table>