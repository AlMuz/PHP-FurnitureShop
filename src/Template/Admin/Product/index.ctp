<div class="product index large-9 medium-8 columns content">
    <?= $this->Html->link(__('Add New'), ['action' => 'add'], ['class' => 'btn btn-success pull-right']) ?>
    <h3 class="page-header"><?= __('Products') ?></h3>
    <table class="table table-responsive table-condensed table-striped">
        <thead>
            <tr>
              <th scope="col"><?= $this->Paginator->sort('idProduct') ?></th>
              <th scope="col"><?= $this->Paginator->sort('Name') ?></th>
              <th scope="col"><?= $this->Paginator->sort('Price') ?></th>
              <th scope="col"><?= $this->Paginator->sort('Interest') ?></th>
              <th scope="col"><?= $this->Paginator->sort('Size') ?></th>
              <th scope="col"><?= $this->Paginator->sort('Weight') ?></th>
              <th scope="col"><?= ('MainImage') ?></th>
              <th scope="col"><?= ('Material') ?></th>
              <th scope="col"><?= ('Category') ?></th>
              <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($product as $product): ?>
            <tr>
              <td><?= $this->Number->format($product->idProduct) ?></td>
              <td><?= h($product->Name) ?></td>
              <td><?= $this->Number->currency($product->Price, $currency,['locale' => 'it_IT']) ?></td>
              <td><?= $this->Number->format($product->Interest) ?></td>
              <td><?= $product->Size ?></td>
              <td><?= $product->Weight ?></td>
              <td><?= ($this->Html->image($product->MainImage,['class'=>'img-responsive', 'style' => 'max-height: 300px'])) ?></td>
              <td><?= h($product->material->Title) ?></td>
              <td><?= $this->Html->link(__($product->category->Title), ['controller'=>'category','action' => 'view',$product->category->idCategory]) ?></td>

              <td class="actions">
                  <?= $this->Html->link(__('<i class="glyphicon glyphicon-eye-open"></i>'), ['action' => 'view',$product->idProduct], ['class' => 'btn btn-xs btn-primary', 'escapeTitle' => false]) ?>
                  <?= $this->Html->link(__('<i class="glyphicon glyphicon-edit"></i>'), ['action' => 'edit', $product->idProduct], ['class' => 'btn btn-xs btn-warning', 'escapeTitle' => false]) ?>
                  <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $product->idProduct], ['confirm' => __('Are you sure you want to delete # {0}?', $product->idProduct),'class' => 'btn btn-xs btn-danger', 'escapeTitle' => false]) ?>
              </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?= $this->element('paginator') ?>
</div>
