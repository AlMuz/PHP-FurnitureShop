<div class="products index large-9 medium-8 columns content">
    <?= $this->Html->link(__('Add New'), ['action' => 'add'], ['class' => 'btn btn-success pull-right']) ?>
    <h3 class="page-header"><?= __('Categories') ?></h3>
    <table class="table table-responsive table-condensed table-striped">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('idCategory') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Title') ?></th>
                <th scope="col"><?= 'Description' ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($category as $category): ?>
            <tr>
                <td><?= $this->Number->format($category->idCategory) ?></td>
                <td><?= h($category->Title) ?></td>
                <td><?= h($category->Description) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $category->idCategory]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $category->idCategory]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $category->idCategory], ['confirm' => __('Are you sure you want to delete # {0}?', $category->idCategory)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>