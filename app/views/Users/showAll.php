<div class="container">
    <table class="table">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Login</th>
            <th scope="col">Password</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($users as $id => $arProps) {?>
        <tr>
            <th scope="row"><?=$id?></th>
            <?php foreach ($arProps as $key => $value) {?>
            <td><?=$value?></td>
            <?php } ?>
        </tr>
        <?php } ?>
        </tbody>
    </table>
</div>

