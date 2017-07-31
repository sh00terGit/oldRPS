
            <?php if ($this->news) { ?>
                <table id="newsTable"  class="table table-hover table-sm">
                    <tr>
                        <th>Новость</th>
                        <th>Дата публикования</th>
                        <th></th>
                        <th></th>
                    </tr>

                    <?php foreach ($this->news as $news) : ?>
                        <tr id="<?= $news->getId() ?>">
                            <td><?= $news->getTitle() ?></td>
                            <td><?= $news->getDate() ?></td>
                            <td> <a href="#" type="button" class="btn btn-warning btn-sm" onclick="selectAjax(<?= $news->getId() ?>)">Редактировать</a></td>
                            <td><a  type="button" class="btn btn-danger btn-sm" onclick="deleteAjax(<?= $news->getId() ?>)">Удалить</a></td>                
                        </tr>
                    <?php endforeach; ?>

                </table>
            <?php } else { ?>
        <div class=" col-md-offset-4">
            <div class="alert alert-warning alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Нет новостей за указанный год!</strong> 
            </div>
        </div>
    <?php } ?>

