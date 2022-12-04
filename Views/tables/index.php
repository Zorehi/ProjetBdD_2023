<div class="globalContainer">
    <table>
        <thead>
            <tr>
                <?php foreach ($table->getChamps() as $champ) { ?>
                    <th><?= $champ ?></th>
                <?php } ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($lines as $line) { ?>
                <tr>
                    <?php foreach ($line as $value) { ?>
                        <td><?= $value ?></td>
                    <?php } ?>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>